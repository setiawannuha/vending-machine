<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    function list(Request $request) {
        try {
            $page = $request->query('page', 1);
            $limit = $request->query('limit', 5);
            $search = $request->query('search', '');
            $products = Products::where('name', 'like', '%' . $search . '%')->paginate($limit, ['*'], 'page', $page);
            $response = [
                'data' => $products->items(),
                'pagination' => [
                    'currentPage' => $page,
                    'limit' => $limit,
                    'totalPage' => $products->lastPage(),
                    'totalData' => $products->total(),
                ],
                'message' => "Get all products success",
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (\Throwable $th) {
            $response = [
                'data' => null,
                'message' => "Internal Server Error",
            ];
            return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
