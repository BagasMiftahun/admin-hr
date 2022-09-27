<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\AbsensiController;

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
    return view('welcome');
});


// Confirm Email
Route::get('/confirm-email/{token}', [AuthController::class, 'confirm'])->name('confirm');

// Absensi
Route::get('/absensi', [AbsensiController::class, 'index']);
Route::get('absensi-create', [AbsensiController::class, 'create']);
Route::get('absensi-destroy/{id}', [AbsensiController::class, 'destroy']);
Route::get('absensi-edit.{id}', [AbsensiController::class, 'edit']);
Route::post('absensi-store', [AbsensiController::class, 'store']);
