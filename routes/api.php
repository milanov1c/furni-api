<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user()->load('addresses');
});
Route::apiResource('brands', \App\Http\Controllers\BrandController::class);

Route::apiResource('categories', \App\Http\Controllers\CategoryController::class);

Route::apiResource('furnitures', \App\Http\Controllers\FurnitureController::class);

Route::apiResource('users', \App\Http\Controllers\UserController::class);

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('orders', \App\Http\Controllers\OrderController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::put('/user', [\App\Http\Controllers\UserController::class, 'update']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/addresses/user', [\App\Http\Controllers\AddressController::class, 'userAddress']);
    Route::post('/addresses', [\App\Http\Controllers\AddressController::class, 'store']);
    Route::put('/addresses/{id}', [\App\Http\Controllers\AddressController::class, 'update']);
});








