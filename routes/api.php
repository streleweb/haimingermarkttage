<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AusstellerController;
use App\Http\Controllers\AusstellerfotoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FotogalerieController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProgrammController;
use App\Http\Controllers\ProgrammpunktController;
use App\Http\Controllers\SponsorenController;
use App\Http\Controllers\AuthController;




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

Route::resource('aussteller', AusstellerController::class);
Route::resource('ausstellerfoto', AusstellerfotoController::class);
Route::resource('fotogalerie', FotogalerieController::class);
Route::resource('news', NewsController::class);
Route::resource('product', ProductController::class);
Route::resource('programm', ProgrammController::class);
Route::resource('programmpunkt', ProgrammpunktController::class);
Route::resource('sponsoren', SponsorenController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');


