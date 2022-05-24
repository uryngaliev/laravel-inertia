<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\IndexController;
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

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/post/{id}', 'show')->name("show");
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'ShowLoginForm')->name('login');
    Route::post('/login_process', 'login')->name('login_process');

    Route::get('/register', 'ShowRegisterForm')->name('register');
    Route::post('/register_process', 'register')->name('register_process');

    Route::delete('/logout', 'logout')->name('logout');
});


    Route::resource("posts", \App\Http\Controllers\PostController::class);

    Route::resource("users", \App\Http\Controllers\UserController::class);

