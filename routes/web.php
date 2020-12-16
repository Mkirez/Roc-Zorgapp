<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\http\Controllers\FileuploadController;
use App\http\Controllers\ProfileController;
use App\http\Controllers\StudentgegevensController;
use App\http\Controllers\StudentinfoController;
use App\http\Controllers\UrenregistratieController;
use App\http\Controllers\LogController;
use App\http\Controllers\Qualification_fileController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('fileupload', FileuploadController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('profile', ProfileController::class);

Route::resource('studentgegevens', StudentgegevensController::class);

route::resource('studentinfo', StudentinfoController::class);

route::resource('urenregistratie', UrenregistratieController::class);

route::resource('log', LogController::class);

route::resource('qualification_file', Qualification_fileController::class);