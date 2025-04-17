<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourseController::class, 'welcome'])->name('home');

Route::get('dashboard', [CourseController::class, 'total'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::resource('datakursus', CourseController::class)
    ->parameters(['datakursus' => 'course']) 
    ->middleware(['auth', 'verified']);
    



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
