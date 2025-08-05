<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [];

        for ($i = 1; $i <= 1000; $i++) {
            $products[] = [
                'name' => 'Product ' . $i,
                'description' => 'Description for product ' . $i,
                'price' => rand(100, 10000) / 100,
                'stock' => rand(0, 500),
                'category' => ['Electronics', 'Clothing', 'Home & Kitchen', 'Books'][array_rand(['Electronics', 'Clothing', 'Home & Kitchen', 'Books'])],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($products);
    }
}
