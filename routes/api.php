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
use App\Http\Controllers\HomeContentController;

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
Route::get('/aussteller/{id}', [AusstellerController::class, 'show']); //returns produktreiter of aussteller
Route::get('/getAllAusstellerOfSpecificProduktreiter/{produktReiterName}', [AusstellerController::class, 'getAllAusstellerOfSpecificProduktreiter']); //returns produktreiter of aussteller
Route::get('/news', [NewsController::class, 'index']);
Route::get('/fotogalerie', [FotogalerieController::class, 'index']);
Route::get('/programm', [ProgrammController::class, 'index']);
Route::get('/homecontent', [HomeContentController::class, 'index']);

//login
Route::post('/admin/login', [AuthController::class, 'login']);
//logout
Route::post('/admin/logout', [AuthController::class, 'logout']);
/**
 * Protected routes through Sanctum.
 * Token-based requests
 */

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/admin/register', [AuthController::class, 'register']);



    //Aussteller-Post-Routes
    Route::post('/aussteller', [AusstellerController::class, 'store']);
    Route::post('/homecontent', [HomeContentController::class, 'store']);
    Route::put('/aussteller', [AusstellerController::class, 'update']);
    Route::delete('/aussteller/{id}', [AusstellerController::class, 'destroy']);
    Route::post('/aussteller/getproduktreiterofaussteller', [AusstellerController::class, 'getProduktReiter']);

    //Imageupload
    Route::post('/imageupload', [ImageController::class, 'handle']);

    //Fotogalerie upload/edit
    Route::post('fotogalerie', [FotogalerieController::class, 'store']);
    Route::delete('/fotogalerie/{id}', [FotogalerieController::class, 'destroy']);
    Route::put('fotogalerie', [FotogalerieController::class, 'update']);


    //News
    Route::post('/news', [NewsController::class, 'store']);
    Route::delete('/news/{id}', [NewsController::class, 'destroy']);
    Route::put('/news/{id}', [NewsController::class, 'update']);

    //Programm
    Route::post('/programm', [ProgrammController::class, 'store']);
    Route::delete('/programm/{id}', [ProgrammController::class, 'destroy']);
    Route::put('/programm/{id}', [ProgrammController::class, 'update']);

    //HomeContent
    Route::post('/homecontent', [HomeContentController::class, 'store']);
    Route::delete('/homecontent', [HomeContentController::class, 'destroy']);

});


//Route::resource('sponsoren', SponsorenController::class);


