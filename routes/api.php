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
use App\Http\Controllers\ProgrammpunktController;
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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Public routes
Route::get('/aussteller/search/{name}', [AusstellerController::class, 'search']);
Route::get('/aussteller', [AusstellerController::class, 'index']);
Route::get('/aussteller/{id}', [AusstellerController::class, 'show']);
Route::get('/news', [NewsController::class, 'index']);
Route::get('/fotogalerie', [FotogalerieController::class, 'index']);

 //Route::post('/admin/register', [AuthController::class, 'register']);
//Route::post('/admin/register', [AuthController::class, 'register']);
//Admin-Public-Routes

 //Protected routes through Sanctum. Token-based requests
Route::group(['middleware' => ['auth:sanctum']], function () {
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

});



//Achtung, de Routen müssn no abgeändert werdn, nicht für Diplomarbeit verwenden so




Route::resource('programm', ProgrammController::class);
Route::resource('programmpunkt', ProgrammpunktController::class);
Route::resource('sponsoren', SponsorenController::class);


