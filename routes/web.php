<?php

use App\Http\Controllers\ViolationController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ViolationsTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('pages.app.dashboard');
    });
    Route::resource('user', UserController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('siswa', SiswaController::class);
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


// Route::middleware(['auth'])->group(function () {
//     Route::put('generate-qrcode-update/{violations}', [ScheduleController::class, 'generateQrCodeUpdate'])->name('generate-qrcode-update');
// });
