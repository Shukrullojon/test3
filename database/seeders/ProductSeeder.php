<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => "Ko'ylak",
                'code' => "00000001",
            ],
            [
                'name' => "Shim",
                'code' => "00000002",
            ],
        ];
        foreach ($products as $product){
            Product::create($product);
        }
    }
}
