<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

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

// Route::post('login','Api\AuthController@login');
Route::post('login',[App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('register',[App\Http\Controllers\Api\AuthController::class, 'register']);
Route::get('logout',[App\Http\Controllers\Api\AuthController::class, 'logout']);



