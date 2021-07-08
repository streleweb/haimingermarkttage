<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AusstellerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FotogalerieController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProgrammController;
use App\Http\Controllers\SponsorenController;
use App\Http\Controllers\ImageController;

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

/**
 * Public-Routes
 * Zugänglich für Admin und Benutzer
 */

Route::get('/aussteller/search/{name}', [AusstellerController::class, 'search']);
Route::get('/aussteller', [AusstellerController::class, 'index']);
Route::get('/aussteller/{id}', [AusstellerController::class, 'show']);
Route::get('/news', [NewsController::class, 'index']);
Route::get('/fotogalerie', [FotogalerieController::class, 'index']);
Route::get('/programm', [ProgrammController::class, 'index']);

/**
 * Protected routes through Sanctum. 
 * Token-based requests
 */
 
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/admin/register', [AuthController::class, 'register']);
    //logout
    Route::post('/admin/logout', [AuthController::class, 'logout']);
    //login
    Route::post('/admin/login', [AuthController::class, 'login']);

    //Aussteller-Post-Routes
    Route::post('/aussteller', [AusstellerController::class, 'store']);
    Route::put('/aussteller', [AusstellerController::class, 'update']);
    Route::delete('/aussteller/{id}', [AusstellerController::class, 'destroy']);

    //Imageupload
    Route::post('/imageupload', [ImageController::class, 'handle']);

    //Fotogalerie upload/edit 
    Route::post('fotogalerie', [FotogalerieController::class, 'store']);
    Route::delete('/fotogalerie/{id}', [FotogalerieController::class, 'destroy']);
    Route::put('fotogalerie', [FotogalerieController::class, 'update']);

   
    //News
    Route::post('/news', [NewsController::class, 'store']);
    Route::delete('/news/{id}', [NewsController::class, 'destroy']);

    //Programm
    Route::post('/programm', [ProgrammController::class, 'store']);
    Route::delete('/programm/{id}', [ProgrammController::class, 'destroy']);

});



//Achtung, de Routen müssn no abgeändert werdn, nicht für Diplomarbeit verwenden so


Route::resource('sponsoren', SponsorenController::class);


