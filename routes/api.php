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
use App\Http\Controllers\ImageUploadController;

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


Route::post('/admin/register', [AuthController::class, 'register']);
//Admin-Public-Routes

 //Protected routes through Sanctum -- Token-based requests
Route::group(['middleware' => ['auth:sanctum']], function () {

    //Route::post('/admin/register', [AuthController::class, 'register']);
    
    Route::post('/aussteller', [AusstellerController::class, 'store']);
    Route::put('/aussteller', [AusstellerController::class, 'update']);
    Route::delete('/aussteller/{id}', [AusstellerController::class, 'destroy']);

    //imageupload
    Route::post('/aussteller/upload', [ImageUploadController::class, 'handle']);
   
    //logout
    Route::post('/admin/logout', [AuthController::class, 'logout']);
    //login
    Route::post('/admin/login', [AuthController::class, 'login']);

});




Route::resource('ausstellerfoto', AusstellerfotoController::class);
Route::resource('fotogalerie', FotogalerieController::class);
Route::resource('news', NewsController::class);
Route::resource('product', ProductController::class);
Route::resource('programm', ProgrammController::class);
Route::resource('programmpunkt', ProgrammpunktController::class);
Route::resource('sponsoren', SponsorenController::class);


