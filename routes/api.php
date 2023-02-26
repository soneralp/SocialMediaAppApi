<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;
use App\Http\Middleware\JWTMiddleware;
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


// Post
//update this route group !!
Route::middleware('jwtAuth')->group(function () {
    Route::get('posts',[App\Http\Controllers\Api\PostsController::class, 'posts' ]);
    Route::post('posts/create',[App\Http\Controllers\Api\PostsController::class, 'create' ]);
    Route::post('posts/delete',[App\Http\Controllers\Api\PostsController::class, 'delete' ]);
    Route::post('posts/update',[App\Http\Controllers\Api\PostsController::class, 'update' ]);    
});

