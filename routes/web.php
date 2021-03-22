<?php

use Illuminate\Support\Facades\Route;

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

// resources
Route::resource('student','StudentController',['only'=>['index','store','show','update','destroy']]);
Route::resource('teacher','TeacherController',['only'=>['index','store','show','update','destroy']]);
Route::resource('classes','ClassesController',['only'=>['index','store','show','update','destroy']]);