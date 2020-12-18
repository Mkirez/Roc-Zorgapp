<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\http\Controllers\ProfileController;
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

Route::resource('profile', ProfileController::class);

Route::resource('studentinfo', StudentinfoController::class);

Route::resource('log', LogController::class);

Route::resource('qualification_file', Qualification_fileController::class);

Route::resource('competition', CompetitionController::class);
// Route::post('qualification_file', [App\Http\Controllers\Qualification_fileController::class, 'storeCompetition']);
});