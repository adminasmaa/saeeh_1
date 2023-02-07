<?php

namespace Database\Seeders;

//use App\Models\Vehicle\VehicleType;

use App\Models\Vehicle\VehicleData;
use Illuminate\Database\Seeder;

class VehicleDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleData::factory()->count(10)->create();
    }
}
