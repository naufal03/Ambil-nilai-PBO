<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route ke Product
Route::get('/get-product', [\App\Http\Controllers\Api\ProductApiController::class, 'index']);
Route::post('/create', [\App\Http\Controllers\Api\ProductApiController::class, 'store']);
Route::put('/up/{id}', [\App\Http\Controllers\Api\ProductApiController::class, 'update']);
Route::delete('/product/{id}', [\App\Http\Controllers\Api\ProductApiController::class, 'destroy']);


