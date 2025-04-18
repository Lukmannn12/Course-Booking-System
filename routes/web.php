<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourseController::class, 'welcome'])->name('home');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::resource('datakursus', CourseController::class)
    ->parameters(['datakursus' => 'course']) 
    ->middleware(['auth', 'verified']);
    
    Route::resource('enrollments', EnrollmentController::class)->middleware(['auth', 'verified']);
    Route::resource('testimonials', TestimonialController::class)->middleware(['auth', 'verified']);

    // Route
Route::get('/history', [EnrollmentController::class, 'history'])->name('history_kelas')->middleware(['auth', 'verified']);

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
