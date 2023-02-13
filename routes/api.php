<?php

use App\Http\Controllers\API\BarangController;
use App\Http\Controllers\Auth\JWTController;
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
Route::get('/jwt',[JWTController::class, 'index']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['Middleware'=> 'api'], function($router){
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/refresh', [JWTController::class, 'refresh']);

});



Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang', [BarangController::class, 'store']);
Route::put('/barang/edit/{id}', [BarangController::class, 'update']);
Route::get('/barang/{id}' , [BarangController::class, 'show']);

