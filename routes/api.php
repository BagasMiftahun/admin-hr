<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AttendanceController;

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

Route::get('/absen', [App\Http\Controllers\API\DataController::class, 'index']);

Route::group(['prefix' => 'users'], function(){
    Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
    Route::post('/auth',  [App\Http\Controllers\API\AuthController::class, 'auth']);
    Route::post('/password-reset',  [App\Http\Controllers\API\AuthController::class,'reset']);
    Route::post('update-fcm', [AuthController::class, 'updateFcm']);
});

// Notifikasi
Route::group(['prefix' => 'notifications'], function(){
    Route::post('/store', [NotificationsController::class, 'store']);
    Route::get('/', [NotificationsController::class, 'get']);
    Route::get('/update/{id}', [NotificationsController::class, 'update']);
    Route::get('/count', [NotificationsController::class, 'count']);
});

// User need auth
Route::group(['middleware' =>['auth:api']], function(){
    // User User
    Route::group(['prefix' => 'users'], function(){
        Route::get('detail', [App\Http\Controllers\API\AuthController::class, 'detail']);
        Route::get('email-verif', [App\Http\Controllers\API\AuthController::class, 'emailVerif']);
        Route::get('logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
        Route::post('update', [AuthController::class, 'update']);
        Route::post('update/password', [AuthController::class, 'editPassword']);
        Route::post('update-fcm', [AuthController::class, 'updateFcm']);
    });

        // Employes
    Route::group(['prefix' => 'employes'], function(){
        Route::get('/category', [App\Http\Controllers\API\EmployesController::class, 'getCategory']);
        Route::post('/category', [App\Http\Controllers\API\EmployesController::class, 'storeCategory']);
        Route::get('/', [App\Http\Controllers\API\EmployesController::class, 'get']);
        Route::get('/show/{id}', [App\Http\Controllers\API\EmployesController::class, 'show']);
        Route::get('/get/category/{id}', [App\Http\Controllers\API\EmployesController::class, 'getByCategory']);
        Route::post('/', [App\Http\Controllers\API\EmployesController::class, 'store']);
        Route::post('/search', [App\Http\Controllers\API\EmployesController::class, 'search']);
        Route::get('/save/{id}', [App\Http\Controllers\API\EmployesController::class, 'save']);
        Route::get('/unsave/{id}', [App\Http\Controllers\API\EmployesController::class, 'unsave']);
        Route::get('/saved', [App\Http\Controllers\API\EmployesController::class, 'saved']);
    });
});

