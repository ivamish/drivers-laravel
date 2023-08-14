<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
     * Форма регистрации водителя
     */
    public function register()
    {
        return view('drivers.add');
    }

    /*
     * добавление пользователя
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'driver_type_id' => 1,
            'district_id' => 1,
            'status_id' => 1,
            'password' => $request->password,
        ]);
    }
}
