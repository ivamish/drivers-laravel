<?php

namespace App\Http\Controllers\Api;

use App\Actions\ConvertXmlToJsonAction;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DriverController extends Controller
{

    public function index(ConvertXmlToJsonAction $converter)
    {
        // todo Здесь будет подключение к базе 1С:ТМС для получения списка всех водителей
        // todo В качестве заглушки используется XML-файл с примерными параметрами

        /*
         * Получение строки XML с файла
         */
        $xml = file_get_contents(storage_path('app\files\XmlExamples') . "\drivers.xml");

        /*
         * Передача готовой XML-строки в объект
         */
        $converter->setSimpleXML($xml);

        /*
         * Установка родительского и дочернего тега, с которыми мы будем работать
         */
        $converter->root = 'пользователи';
        $converter->child = 'пользователь';

        /*
         * Переводим теги, которые нам придут с 1с
         */
        $params = [
            'id' => 'идентификатор',
            'name' => 'имя',
            'last_name' => 'фамилия',
            'middle_name' => 'отчество',
            'email' => 'почта',
            'phone' => 'телефон',
            'age' => 'возраст',
            'cars_id' => 'транспортноеСредство',
            'distcrict' => 'район',
            'type' => 'тип',
            'status' => 'статус',
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
        // todo Здесь будет подключение к базе 1С:ТМС для получения информации об одном водителе


        $xml = file_get_contents(storage_path('app\files\XmlExamples') . "\driver.xml");
        $converter->setSimpleXML($xml);
        $converter->root = 'пользователи';
        $converter->child = 'пользователь';
        $params = [
            'id' => 'идентификатор',
            'name' => 'имя',
            'last_name' => 'фамилия',
            'middle_name' => 'отчество',
            'email' => 'почта',
            'phone' => 'телефон',
            'age' => 'возраст',
            'cars_id' => 'транспортноеСредство',
            'distcrict' => 'район',
            'type' => 'тип',
            'status' => 'статус',
        ];

        return $converter->getAllChildren($params);
    }


    public function update(Request $request, $id)
    {
        /*
         | todo : Здесь будет подключение к базе 1С:ТМС для изменения информации о водителе
         | todo : В частности, водитель сможет изменить свой статус
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
