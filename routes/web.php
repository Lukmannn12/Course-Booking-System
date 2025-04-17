<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::resource('datakursus', CourseController::class)
    ->parameters(['datakursus' => 'course']) // ✅ rapi dan sesuai model
    ->middleware(['auth', 'verified']);
    

    Route::view('jadwalkursus', 'jadwalkursus.index')
    ->middleware(['auth', 'verified'])
    ->name('jadwalkursus');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
