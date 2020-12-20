<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\http\Controllers\ProfilesController;
use App\http\Controllers\StudentinfoController;
use App\http\Controllers\LogController;
use App\http\Controllers\Qualification_fileController;
use App\http\Controllers\CompetitionController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('log', LogController::class);
    
    Route::resource('qualification_file', Qualification_fileController::class);
    
    Route::resource('competition', CompetitionController::class);

    Route::get('/profiles/{user}', [App\Http\Controllers\ProfilesController::class, 'show'])->name('profile');

    Route::resource('profiles', ProfilesController::class);
    
    Route::resource('studentinfo', StudentinfoController::class);
});
// Route::resource('profiles', ProfilesController::class);

