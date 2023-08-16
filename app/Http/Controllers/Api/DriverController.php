<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{

    public function index()
    {
        return Driver::all();
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return Driver::findOrFail($id);
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
