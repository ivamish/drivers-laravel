<?php

namespace Database\Factories;

use App\Models\CarState;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarStateFactory extends Factory
{
    protected $model = CarState::class;

    public function definition()
    {
        return [
            'description' => $this->faker->word
        ];
    }
}
