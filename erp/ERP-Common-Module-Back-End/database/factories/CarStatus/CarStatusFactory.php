<?php

namespace Database\Factories\CarStatus;

use App\Models\CarStatus\CarStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = CarStatus::class;

    public function definition()
    {
        return [
            'name_ar' =>   $this->faker->name('ar'),
            'name_en' => $this->faker->name('en'),
            'code' => $this->faker->numberBetween(11111, 55555),
        ];
    }
}
