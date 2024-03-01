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

Route::get('/clients', [App\Http\Controllers\Api\v1\ClientController::class, 'index']);

Route::get('/clients/{id}', [App\Http\Controllers\Api\v1\ClientController::class, 'show']);

Route::patch('/clients/{client}', [App\Http\Controllers\Api\v1\ClientController::class, 'update']);

Route::post('/clients', [App\Http\Controllers\Api\v1\ClientController::class, 'store']);

Route::delete('/clients/{id}', [App\Http\Controllers\Api\v1\ClientController::class, 'destroy']);
