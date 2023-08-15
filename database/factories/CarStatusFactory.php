<?php

namespace Database\Factories;

use App\Models\CarStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarStatusFactory extends Factory
{
    protected $model = CarStatus::class;

    public function definition()
    {
        return [
            'description' => $this->faker->word
        ];
    }
}
