<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AusstellerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AusstellerfotoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FotogalerieController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProgrammController;
use App\Http\Controllers\ProgrammpunktController;
use App\Http\Controllers\SponsorenController;

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

//Public routes - posts noch verhindern!

Route::get('/aussteller/search/{name}', [AusstellerController::class, 'search']);
Route::get('/aussteller', [AusstellerController::class, 'index']);
Route::get('/aussteller/{id}', [AusstellerController::class, 'show']);

//Admin-Public-Routes

Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout']);


 //Protected routes through Sanctum -- Token-based requests
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::post('/aussteller', [AusstellerController::class, 'store']);
    Route::put('/aussteller/{id}', [AusstellerController::class, 'update']);
    Route::delete('/aussteller/{id}', [AusstellerController::class, 'destroy']);

    //Nur Admins könnten sich registrieren
    Route::post('/admin/register', [AuthController::class, 'register']);
    //logout
    
});




Route::resource('ausstellerfoto', AusstellerfotoController::class);
Route::resource('fotogalerie', FotogalerieController::class);
Route::resource('news', NewsController::class);
Route::resource('product', ProductController::class);
Route::resource('programm', ProgrammController::class);
Route::resource('programmpunkt', ProgrammpunktController::class);
Route::resource('sponsoren', SponsorenController::class);


