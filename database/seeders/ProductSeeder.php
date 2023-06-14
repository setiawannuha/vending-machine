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
                'picture' => 'https://cdn1-production-images-kly.akamaized.net/o0YCeq51Qo7q2AdU7YIFML3-oSI=/733x0:3541x3745/469x625/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3003675/original/003404800_1577085953-shutterstock_599728544.jpg',
            ],
            [
                'name' => 'Chips',
                'price' => 8000,
                'stock' => 100,
                'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Potato-Chips.jpg/1200px-Potato-Chips.jpg',
            ],
            [
                'name' => 'Oreo',
                'price' => 10000,
                'stock' => 100,
                'picture' => 'https://images.tokopedia.net/img/cache/500-square/VqbcmM/2022/12/4/b86192e8-6bc8-4f55-bd70-b611354d18f2.jpg',
            ],
            [
                'name' => 'Tango',
                'price' => 12000,
                'stock' => 100,
                'picture' => 'https://www.bhinneka.com/_next/image?url=https%3A%2F%2Fd1r7omh34z6onh.cloudfront.net%2Fgk%2Fproduction%2Fba42db254f7e5b3fc23ad0a5bb8cb77f.jpg&w=1080&q=75',
            ],
            [
                'name' => 'Cokelat',
                'price' => 15000,
                'stock' => 100,
                'picture' => 'https://akcdn.detik.net.id/visual/2018/07/06/f63d1c4e-e42a-49f7-a49c-557f702ef47a_169.jpeg?w=650',
            ],
        ];
        foreach ($data as $key => $value) {
            Products::create($value);
        }
    }
}
