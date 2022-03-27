<?php

use App\Http\Controllers\CartControllerApi; //nih "yang di atas"
use App\Http\Controllers\OrderControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductControllerApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductControllerApi::class, 'index']);

Route::get('/products/{product}', [ProductControllerApi::class, 'show']);

Route::post('/cart', [CartControllerApi::class, 'store']); //kalo udah masukin ini jangan lupa buat yang di atas

Route::post('/order', [OrderControllerApi::class, 'store']);
