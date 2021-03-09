<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/**
 * Alle Routen zulassen und zu PagesController-Methoden weiterleiten
 */
Route::get('/{any}', 'App\Http\Controllers\PagesController@index')->where('any', '.*');

/**
 * Offline-Route
 * responds with a default view, if network connection is down.
 * 
 * Falls nicht funkt -> modules/laravel... vendor/laravelpwa/offline bzw. vendor.laravelpwa.offline
 */

Route::get('/offline', function () {    
    return view('vendor/laravelpwa/offline');
    });