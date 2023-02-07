<?php

namespace Database\Seeders\Area;

use App\Models\Area\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::factory()->count(20)->create();
    }
}
