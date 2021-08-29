<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PlaceController;
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

Route::get('/', function () {
    return view('pages.main');
});

Route::get('/places', [PlaceController::class, 'getAllPlaces']);
Route::get('/places/{id}', [PlaceController::class, 'getPlace'])->where('id', '[0-9]+');
Route::get('/places/create', [PlaceController::class, 'showFormCreatePlace']);
Route::post('/places/create', [PlaceController::class, 'createPlace']);
