<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'status' => random_int(1, 4),
            'driver_id' => Driver::all()->random()->id,
            'location' => $this->faker->address,
            'start' => now(),
            'end' => now(),
        ];
    }
}
