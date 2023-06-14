<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Biskuit',
                'price' => 6000,
                'stock' => 100,
            ],
            [
                'name' => 'Chips',
                'price' => 8000,
                'stock' => 100,
            ],
            [
                'name' => 'Oreo',
                'price' => 10000,
                'stock' => 100,
            ],
            [
                'name' => 'Tango',
                'price' => 12000,
                'stock' => 100,
            ],
            [
                'name' => 'Cokelat',
                'price' => 15000,
                'stock' => 100,
            ],
        ];
        foreach ($data as $key => $value) {
            Products::create($value);
        }
    }
}
