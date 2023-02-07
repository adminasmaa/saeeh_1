<?php

namespace Database\Seeders;

use App\Models\CarStatus\CarStatus;
use Illuminate\Database\Seeder;

class CarStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarStatus::factory()->count(20)->create();
    }
}
