<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\http\Controllers\ProfileController;
use App\http\Controllers\StudentinfoController;
use App\http\Controllers\LogController;
use App\http\Controllers\Qualification_fileController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('profile', ProfileController::class);

route::resource('studentinfo', StudentinfoController::class);

route::resource('log', LogController::class);

route::resource('qualification_file', Qualification_fileController::class);
