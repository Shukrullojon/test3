<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'material_id' => 1,
                'remainder' => 12,
                'price' => 1500,
            ],
            [
                'material_id' => 1,
                'remainder' => 200,
                'price' => 1600,
            ],
            [
                'material_id' => 2,
                'remainder' => 40,
                'price' => 500,
            ],
            [
                'material_id' => 2,
                'remainder' => 300,
                'price' => 550,
            ],
            [
                'material_id' => 3,
                'remainder' => 500,
                'price' => 300,
            ],
            [
                'material_id' => 4,
                'remainder' => 1000,
                'price' => 2000,
            ],
        ];

        foreach ($datas as $data){
            Warehouse::create($data);
        }
    }
}
