<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\{Car, CarState, CarStatus, District, Driver, DriverStatus, DriverType, Order};

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        CarState::factory(3)->create();
        CarStatus::factory(3)->create();
        Car::factory(10)->create();
        District::factory(4)->create();
        DriverStatus::factory(3)->create();
        DriverType::factory(3)->create();
        Driver::factory(10)->create();
        Order::factory(10)->create();
    }
}
