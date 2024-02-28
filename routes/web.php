<?php

use App\Http\Controllers\ClassNameController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\RecapitulationController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ViolationsTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'CheckRole:1,2,3,4,5']], function () {
    // Route::get('/dashboard', [UserController::class, 'dashboard'])->name('/dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('/dashboard');
    Route::resource('students', StudentController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('violations', ViolationController::class);
    Route::resource('violations-types', ViolationsTypeController::class);
    Route::resource('parents', ParentsController::class);
    Route::resource('validation', ValidationController::class);
    Route::resource('class-names', ClassNameController::class);
    Route::resource('student-classes', StudentClassController::class);
    Route::resource('recapitulation', RecapitulationController::class)->only(['index']);
    Route::get('/recapitulation/print', [RecapitulationController::class, 'print'])->name('recapitulation.print');
    Route::get('/recapitulation/ayang', [RecapitulationController::class, 'ayang'])->name('recapitulation.ayang');
});

// Route::group(['middleware' => ['auth', 'CheckRole:4,5']], function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('/dashboard');
//     Route::resource('students', StudentController::class);
//     Route::resource('teachers', TeacherController::class);
//     Route::resource('violations', ViolationController::class);
//     Route::resource('violations-types', ViolationsTypeController::class);
//     Route::resource('parents', ParentsController::class);
//     Route::resource('class-names', ClassNameController::class);
//     Route::resource('student-classes', StudentClassController::class);
//     Route::resource('recapitulation', RecapitulationController::class)->only(['index']);
//     Route::get('/recapitulation/print', [RecapitulationController::class, 'print'])->name('recapitulation.print');
//     Route::get('/recapitulation/ayang', [RecapitulationController::class, 'ayang'])->name('recapitulation.ayang');
// });
Route::group(['middleware' => ['auth', 'CheckRole:6,7']], function () {
    Route::get('/', [ErrorController::class, 'index'])->name('/');
});
