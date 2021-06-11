<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/contacts', [App\Http\Controllers\ContactsController::class, 'get']);

Route::get('/conversation/{id}', [App\Http\Controllers\ContactsController::class, 'getMessageFor']);

Route::post('/conversation/send', [App\Http\Controllers\ContactsController::class, 'send']);
