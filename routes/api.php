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
Route::get('/home', 'App\Http\Controllers\ControllerAsk@index');
Route::apiResource('/home', 'App\Http\Controllers\ControllerAsk');
Route::post('add', 'App\Http\Controllers\ControllerAsk@add');