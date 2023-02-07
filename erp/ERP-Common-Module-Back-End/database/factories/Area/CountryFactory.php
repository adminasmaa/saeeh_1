<?php

namespace Database\Factories\Area;

use App\Models\Area\Country;
use App\Models\Area\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Country::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->uuid,
            'name_en' => $this->faker->name,
            'name_ar' => $this->faker->name,
        ];
    }
}
