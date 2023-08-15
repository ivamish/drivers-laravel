<?php

namespace Database\Factories;

use App\Models\DriverType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DriverTypeFactory extends Factory
{
    protected $model = DriverType::class;

    public function definition()
    {
        return [
            'description' => $this->faker->word
        ];
    }
}
