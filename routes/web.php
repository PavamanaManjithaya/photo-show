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

Route::get('/', [App\Http\Controllers\AlbumsController::class, 'index']);
Route::get('/albums', [App\Http\Controllers\AlbumsController::class, 'index']);
Route::get('/albums/create', [App\Http\Controllers\AlbumsController::class, 'create']);
Route::get('/albums/{id}', [App\Http\Controllers\AlbumsController::class, 'show']);

Route::post('/albums/store', [App\Http\Controllers\AlbumsController::class, 'store']);
Route::get('/photos/create/{id}', [App\Http\Controllers\PhotosController::class, 'create']);
Route::post('/photos/store', [App\Http\Controllers\PhotosController::class, 'store']);
Route::get('/photos/{id}', [App\Http\Controllers\PhotosController::class, 'show']);
Route::delete('/photos/{id}', [App\Http\Controllers\PhotosController::class, 'destroy']);


