<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            IndoRegionDistrictSeeder::class,
            IndoRegionProvinceSeeder::class,
            IndoRegionRegencySeeder::class,
            IndoRegionVillageSeeder::class,
            SuppliersSeeder::class,
            ProduksSeeder::class,
        ]);
    }
}
