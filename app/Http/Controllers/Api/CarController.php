<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Models\CarState;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Http;

class CarController extends Controller
{

    /*
     | Получение списка всех машин
     |
     | todo Необходимо реализовать получение данных из 1С
     */
    public function index()
    {
        // todo Здесь будет подключение к базе 1С:ТМС для получения списка всех машин

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
        //todo Здесь будет подключение к базе 1С:ТМС для получения определенной машины

        $client = Http::get("https://jsonplaceholder.typicode.com/todos/$id");
        return $client->body();
    }


    public function update(Request $request, $id)
    {
        //Данный метод скорее не будет использоваться в приложении

        return false;
    }


    public function destroy($id)
    {
        //Данный метод скорее не будет использоваться в приложении

        return false;
    }
}
