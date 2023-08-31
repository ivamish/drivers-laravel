<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'generatePassword']]);
    }

    public function generatePassword()
    {
        /* Сюда приходит номер */

        $number = '8 (904) 142 46-54';

        $driver = Driver::where('phone', $number)->first();

        if(!$driver){

            return \response('Пользователь с таким номером телефона не найден', 404);
        }

        //сброс пароля после успешной авторизации
        $prepassword = strval(random_int(1000, 9999));
        $password = Hash::make($prepassword);
        $driver->password = $password;
        $driver->save();

        //todo отправка номера телефона клиенту через СМС
        $apiId = 
        $client = new \Zelenin\SmsRu\Api(new \Zelenin\SmsRu\Auth\ApiIdAuth($apiId), new \Zelenin\SmsRu\Client\Client());

        dd($prepassword);
    }


    public function login(Response $response)
    {

        $credentials = request(['phone', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Неверный пароль'], 401);
        }

        $driver = Driver::where('phone', $credentials['phone'])->first();
        $driver->password = Hash::make(md5(random_bytes(12)));
        $driver->save();

        return $this->respondWithToken($token);
    }


    public function me()
    {
        return response()->json(auth()->user());
    }


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
