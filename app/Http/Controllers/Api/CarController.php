<?php

namespace App\Http\Controllers\Api;

use App\Actions\ConvertXmlToJsonAction;
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
    public function index(ConvertXmlToJsonAction $converter)
    {
        // todo Здесь будет подключение к базе 1С:ТМС для получения списка всех машин
        // todo В качестве заглушки используется XML-файл с примерными параметрами

        /*
         * Получение строки XML с файла
         */
        $xml = file_get_contents(storage_path('app\files\XmlExamples') . "\cars.xml");

        /*
         * Передача готовой XML-строки в объект
         */
        $converter->setSimpleXML($xml);

        /*
         * Установка родительского и дочернего тега, с которыми мы будем работать
         */
        $converter->root = 'машины';
        $converter->child = 'машина';

        /*
         * Переводим теги, которые нам придут с 1с
         */
        $params = [
            'id' => 'идентификатор',
            'name' => 'название',
            'status' => 'статус',
            'state' => 'состояние',
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
        //todo Здесь будет подключение к базе 1С:ТМС для получения определенной машины

        $xml = file_get_contents(storage_path('app\files\XmlExamples') . "\car.xml");
        $converter->setSimpleXML($xml);
        $converter->root = 'машины';
        $converter->child = 'машина';
        $params = [
            'id' => 'идентификатор',
            'name' => 'название',
            'status' => 'статус',
            'state' => 'состояние',
        ];

        return $converter->getAllChildren($params);
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
