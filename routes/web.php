<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContributorsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('api/collections',[CollectionController::class, 'CreateCollection']);
Route::get('api/collections',[CollectionController::class, 'GetCollections']);
Route::get('api/collections/filter',[CollectionController::class, 'GetFilteredCollectionByAmounts']);
Route::get('api/collections/{id}',[CollectionController::class, 'GetCollectionById']);
Route::post('api/contributors',[ContributorsController::class, 'CreateContribution']);

