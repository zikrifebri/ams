<?php

use Illuminate\Http\Request;

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

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('surat-masuk', [App\Http\Controllers\ApiController::class, 'get_surat_masuk']);
Route::get('surat-keluar', [App\Http\Controllers\ApiController::class, 'get_surat_keluar']);
Route::get('departement', [App\Http\Controllers\ApiController::class, 'departement']);
Route::get('user', [App\Http\Controllers\ApiController::class, 'user']);
Route::get('total', [App\Http\Controllers\ApiController::class, 'get_total']);
Route::post('login', [App\Http\Controllers\ApiController::class, 'login']);
Route::get('logout', [App\Http\Controllers\ApiController::class, 'logout']);