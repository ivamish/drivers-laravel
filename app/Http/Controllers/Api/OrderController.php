<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{

    public function index()
    {
        // todo Здесь будет подключение к базе 1С:ТМС для получения списка всех невыполненных заказов

        $client = Http::get('https://jsonplaceholder.typicode.com/todos/');
        return $client->body();
    }

    public function store(Request $request)
    {
        //Данный метод скорее не будет использоваться в приложении

        return false;
    }

    public function show($id)
    {
        // todo Здесь будет подключение к базе 1С:ТМС для получения информации об одном заказе

        $client = Http::get("https://jsonplaceholder.typicode.com/todos/{$id}");
        return $client->body();
    }

    public function update(Request $request, $id)
    {
        /*
         | todo : Здесь будет подключение к базе 1С:ТМС для изменения информации о заказе
         | todo : В частности, когда водитель берет или доставляет заказ, его статус меняется
         */

        $client = Http::put("https://jsonplaceholder.typicode.com/todos/{$id}", $request->all());
        return $client->body();
    }

    public function destroy($id)
    {
        //Данный метод скорее не будет использоваться в приложении

        return false;
    }
}
