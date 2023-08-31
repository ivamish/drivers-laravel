<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Users\RegisterController;
use App\Http\Controllers\Orders\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index']);
Route::get('orders', [OrderController::class, 'index']);
Route::get('orders/add', [OrderController::class, 'add']);
Route::post('orders/store', [OrderController::class, 'store'])->name('order.store');
Route::get('orders/show/{id}', [OrderController::class, 'show']);

Route::prefix('admin')->group(function () {
    Route::get('users', function (){
        return 'Все пользователи';
    });
    Route::get('users/add', [RegisterController::class, 'register'])->name('user.register');
    Route::post('users/store', [RegisterController::class, 'store'])->name('user.store');
});
