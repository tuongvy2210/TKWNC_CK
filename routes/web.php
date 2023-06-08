<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'authenticate']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::post('orders/checkout/{order}', [OrderController::class, 'checkout'])->name('orders.checkout');
    Route::post('orders/service/{order}', [OrderController::class, 'service'])->name('orders.service');
    Route::resource('customers', CustomerController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('types', TypeController::class);
    Route::resource('services', ServiceController::class);
});
