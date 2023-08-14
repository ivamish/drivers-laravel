<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /*
     * Получение всех водителей
     */
    public function index()
    {
        return "Все водители";
    }

    /*
     * Профиль водителя
     */
    public function profile($id)
    {
        return "Профиль водителя";
    }
}
