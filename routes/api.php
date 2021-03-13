<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AusstellerfotoController;
use App\Http\Controllers\AusstellerController;
use App\Http\Controllers\FotogalerieController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('ausstellerfoto', AusstellerfotoController::class);
Route::resource('products', ProductController::class);
Route::resource('aussteller', AusstellerController::class);
Route::resource('fotogalerie', FotogalerieController::class);

