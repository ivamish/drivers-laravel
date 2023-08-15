<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarState;
use App\Models\CarStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'cars_status_id' => CarStatus::all()->random()->id,
            'cars_state_id' => CarState::all()->random()->id,
        ];
    }
}
