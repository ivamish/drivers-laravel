<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Models\CarState;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{

    public function index()
    {
        return CarResource::collection(Car::all());
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return CarResource::make(Car::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
