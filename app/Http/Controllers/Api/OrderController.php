<?php

namespace App\Http\Controllers\Api;

use App\Actions\ConvertXmlToJsonAction;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{

    public function index(ConvertXmlToJsonAction $converter)
    {
        // todo Здесь будет подключение к базе 1С:ТМС для получения списка всех невыполненных заказов
        // todo В качестве заглушки используется XML-файл с примерными параметрами

        /*
         * Получение строки XML с файла
         */
        $xml = file_get_contents(storage_path('app\files\XmlExamples') . "\orders.xml");

        /*
         * Передача готовой XML-строки в объект
         */
        $converter->setSimpleXML($xml);

        /*
         * Установка родительского и дочернего тега, с которыми мы будем работать
         */
        $converter->root = 'заказы';
        $converter->child = 'заказ';

        /*
         * Переводим теги, которые нам придут с 1с
         */
        $params = [
            'id' => 'идентификатор',
            'status' => 'статус',
            'driver_id' => 'водитель',
            'address' => 'адрес',
            'start' => 'начало',
            'end' => 'конец',
        ];

        return $converter->getAllChildren($params);
    }

    public function store(Request $request)
    {
        //Данный метод скорее не будет использоваться в приложении

        return false;
    }

    public function show($id, ConvertXmlToJsonAction $converter)
    {
        // todo Здесь будет подключение к базе 1С:ТМС для получения информации об одном заказе


        $xml = file_get_contents(storage_path('app\files\XmlExamples') . "\order.xml");
        $converter->setSimpleXML($xml);
        $converter->root = 'заказы';
        $converter->child = 'заказ';
        $params = [
            'id' => 'идентификатор',
            'status' => 'статус',
            'driver_id' => 'водитель',
            'address' => 'адрес',
            'start' => 'начало',
            'end' => 'конец',
        ];
        return $converter->getAllChildren($params);
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
