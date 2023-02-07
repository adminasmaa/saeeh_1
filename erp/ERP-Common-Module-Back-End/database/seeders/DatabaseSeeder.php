<?php

namespace Database\Seeders;

use Database\Seeders\Area\CountriesTableSeeder;
use Database\Seeders\Area\RegionsTableSeeder;
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
        // ExampleTableSeeder::class,
        $this->call([

            LocalizationSeeder::class,
            CostCenterSeeder::class,
            AccountSeeder::class,
            RegionsTableSeeder::class,
            CountriesTableSeeder::class,
            VehicleTypeTableSeeder::class,
            WheelTableSeeder::class,
            CarStatusSeeder::class,
            DocumentIssuerSeeder::class,
            DocumentTypeSeeder::class,
            VehicleClassificationTableSeeder::class,
            VehicleDataTableSeeder::class,
            VehicleDocumentTableSeeder::class,
            VehicleWheelTableSeeder::class,
            UnitSeeder::class,
        ]);
    }
}
