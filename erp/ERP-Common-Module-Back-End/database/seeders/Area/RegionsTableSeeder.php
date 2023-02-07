<?php

namespace Database\Seeders\Area;

use App\Models\Area\Region;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::factory()->count(20)->create();
    }
}
