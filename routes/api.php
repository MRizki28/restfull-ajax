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

// Route::post('/register', [App\Http\Controllers\Auth\AuthController::class, 'register']);
// //API route for login user
// Route::post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login']);


// Route::get('/jwt', [JWTController::class, 'index']);
// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::get('/profile', function(Request $request) {
//         return auth()->user();
//     });
   

//     // API route for logout user
//     Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout']);
// });

Route::post('/refresh', [JWTController::class, 'refresh']);
Route::post('/login', [JWTController::class, 'login']);
Route::post('/register', [JWTController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function ($router) {

    Route::get('/barang', [BarangController::class, 'index']);
    Route::post('/barang', [BarangController::class, 'store']);
    Route::put('/barang/edit/{id}', [BarangController::class, 'update']);
    Route::get('/barang/{id}', [BarangController::class, 'show']);



});




