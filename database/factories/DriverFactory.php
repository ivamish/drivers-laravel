<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\District;
use App\Models\Driver;
use App\Models\DriverStatus;
use App\Models\DriverType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    protected $model = Driver::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'middle_name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'age' => random_int(18, 36),
            'cars_id' => Car::all()->random()->id,
            'districts_id' => District::all()->random()->id,
            'drivers_type_id' => DriverType::all()->random()->id,
            'drivers_status_id' => DriverStatus::all()->random()->id,
            'password' => $this->faker->password,
        ];
    }
}
