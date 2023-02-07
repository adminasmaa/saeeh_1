<?php

namespace Database\Seeders;

//use App\Models\Vehicle\VehicleType;

use App\Models\Vehicle\VehicleType;
use Illuminate\Database\Seeder;

class VehicleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleType::factory()->count(10)->create();
    }
}
