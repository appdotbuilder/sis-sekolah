<?php

use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    // School dashboard
    Route::get('/school', [SchoolController::class, 'index'])->name('school.index');
    
    // Resource routes
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
});