<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ProductSeeder::class);
        $this->call(MaterialSeeder::class);
        $this->call(ProductMaterialSeeder::class);
        $this->call(WarehouseSeeder::class);
    }
}
