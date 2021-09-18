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
})->name('mainPage');

Route::prefix('places')->group(function (){
    Route::get('/', [PlaceController::class, 'getAllPlaces'])->name('places');
    Route::get('/{id}', [PlaceController::class, 'getPlace'])->where('id', '[0-9]+')->name('place');
    Route::get('/create', [PlaceController::class, 'showFormCreatePlace'])->name('placesFormSHow');
    Route::post('/create', [PlaceController::class, 'createPlace'])->name('placesAdd');
    Route::get('/{id}/photos/add', [PlaceController::class, 'showFormAddPhoto'])->where('id', '[0-9]+')->name('photoFormShow');
    Route::post('/{id}/photos/add', [PlaceController::class, 'addPhoto'])->where('id', '[0-9]+')->name('photoAdd');
});

Route::prefix('photos')->group(function (){
    Route::get('/add', [PlaceController::class, 'showFormAddPhotoV2'])->name('photoAddV2');
    Route::post('/add', [PlaceController::class, 'addPhotoV2']);
});

