<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Products;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    protected $permittedDenominations = [2000, 5000, 10000, 20000, 50000];
    public function store(TransactionRequest $request)
    {
        DB::beginTransaction();
        try {
            $customerName = $request->get('customerName');
            $pay = $request->get('pay');
            $data = $request->get('data');
            $diff = collect($pay)->diff($this->permittedDenominations);
            if ($diff->isEmpty()) {
                $total = 0;
                $totalPay = 0;
                foreach ($data as $item) {
                    $product = Products::find($item['productId']);
                    if (!$product) {
                        DB::rollBack();
                        $response = [
                            'data' => null,
                            'message' => "Product not found",
                        ];
                        return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
                    }
                    if ($item['qty'] > $product->stock) {
                        DB::rollBack();
                        $response = [
                            'data' => null,
                            'message' => "Qty melebihi stock pada Product " . $product->name . "",
                        ];
                        return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
                    }
                    $total += $product->price * $item["qty"];
                }
                foreach ($pay as $item) {
                    $totalPay += $item;
                }
                if ($totalPay >= $total) {
                    $dataTransaction = [
                        'customer_name' => $customerName,
                        'total' => $total,
                        'paid' => $totalPay,
                        'change' => $totalPay - $total,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                    $insertMasterTransaction = DB::table('transactions')->insertGetId($dataTransaction);
                    foreach ($data as $item) {
                        $product = Products::find($item['productId']);
                        $dataDetail = [
                            'transaction_id' => $insertMasterTransaction,
                            'product_id' => $item['productId'],
                            'product_name' => $product->name,
                            'product_price' => $product->price,
                            'qty' => $item['qty'],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                        DB::table('transaction_details')->insert($dataDetail);
                        DB::table('products')->where('id', $item['productId'])->decrement('stock', $item['qty']);
                    }
                    DB::commit();
                    $response = [
                        'data' => null,
                        'message' => "Insert transaction success",
                    ];
                    return response()->json($response, Response::HTTP_OK);
                }
                $response = [
                    'data' => null,
                    'message' => "Pembayaran tidak sesuai, total transaksi anda " . $total . " dan uang yang anda bayarkan " . $totalPay,
                ];
                return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);

            }
            $response = [
                'data' => null,
                'message' => "Pecahan yang diijinkan adalah 2,000, 5,000, 10,000, 20,000, 50,000",
            ];
            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Throwable $th) {
            DB::rollBack();
            $response = [
                'data' => null,
                'message' => "Internal Server Error",
            ];
            return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
