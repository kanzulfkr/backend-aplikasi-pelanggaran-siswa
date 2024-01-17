<?php

use App\Http\Controllers\ClassNameController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ViolationsTypeController;
use App\Http\Controllers\UserController;
use App\Models\ClassName;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('pages.app.dashboard');
    });
    Route::resource('user', UserController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('students', StudentController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('teachers', TeacherController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('parents', ParentsController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('violations-types', ViolationsTypeController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('violations', ViolationController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('validation', ValidationController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('class-names', ClassNameController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('student-classes', StudentClassController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('recapitulation}', [StudentClassController::class, 'recapitulation'])->name('recapitulation');
});
