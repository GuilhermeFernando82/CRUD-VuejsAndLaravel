<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\questionController;
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
Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');
Route::get('/home', 'App\Http\Controllers\ControllerAsk@index');
//Route::resource('/home', 'App\Http\Controllers\ControllerAsk');