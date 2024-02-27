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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/