<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\http\Controllers\ProfilesController;
use App\http\Controllers\InternshipController;
use App\http\Controllers\LogController;
use App\http\Controllers\Qualification_fileController;
use App\http\Controllers\CompetitionController;
use App\http\Controllers\StudentFileController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('log', LogController::class);

    Route::patch('{log}', [App\Http\Controllers\ApproveController::class, 'approveLog'])->name('approveLog');
    
    Route::resource('qualification_file', Qualification_fileController::class);

    Route::resource('competition', CompetitionController::class);
    
    Route::resource('student_file', StudentFileController::class);
    
    Route::get('/profiles', [App\Http\Controllers\ProfilesController::class, 'index']);
    Route::get('/profiles/{user}', [App\Http\Controllers\ProfilesController::class, 'show'])->name('profile');
    Route::patch('/profiles/{user}', [App\Http\Controllers\ProfilesController::class, 'update']);
    
    Route::resource('/profiles/intern', InternshipController::class);

    Route::resource('studentinfo', StudentinfoController::class);
});

