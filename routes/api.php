<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('blog', App\Http\Controllers\BlogController::class)->only(['index', 'store', 'update', 'show', 'destroy']);

Route::resource('user', App\Http\Controllers\UserController::class)->only(['index', 'store', 'update', 'show', 'destroy']);

Route::post('login', 'App\Http\Controllers\AuthController@login')->name('login');