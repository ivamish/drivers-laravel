<?php

namespace Database\Factories;

use App\Models\DriverStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DriverStatusFactory extends Factory
{
    protected $model = DriverStatus::class;

    public function definition()
    {
        return [
            'description' => $this->faker->word
        ];
    }
}
