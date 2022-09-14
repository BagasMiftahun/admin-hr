<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

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
Route::group(['prefix' => 'users'], function(){
    Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
    Route::post('/auth',  [App\Http\Controllers\API\AuthController::class, 'auth']);
    Route::post('/password-reset',  [App\Http\Controllers\API\AuthController::class,'reset']);
    Route::post('update-fcm', [AuthController::class, 'updateFcm']);
});

// User need auth
Route::group(['middleware' =>['auth:api']], function(){
    // User User
    Route::group(['prefix' => 'users'], function(){
        Route::get('detail', [AuthController::class, 'detail']);
        Route::get('email-verif', [App\Http\Controllers\API\AuthController::class, 'emailVerif']);
        Route::get('logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
        Route::post('update', [AuthController::class, 'update']);
        Route::post('update/password', [AuthController::class, 'editPassword']);
        Route::post('update-fcm', [AuthController::class, 'updateFcm']);
    });
});

