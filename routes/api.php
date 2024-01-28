<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ViolationController;
use App\Http\Controllers\Api\ViolationTypeController;

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::apiResource('/violations', ViolationController::class);
//     Route::apiResource('/violations/all', ViolationController::class);
// });

// auth controller
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout',  [AuthController::class, 'logout'])->middleware('auth:sanctum');

// user controller
Route::get('/user',  [UserController::class, 'index'])->middleware('auth:sanctum');
Route::get('/user/point',  [UserController::class, 'point'])->middleware('auth:sanctum');
Route::get('/student',  [UserController::class, 'student']);
Route::get('/teacher',  [UserController::class, 'teacher']);

// violation controller
Route::get('/violations', [ViolationController::class, 'index'])->middleware('auth:sanctum');
Route::get('/violations/recap', [ViolationController::class, 'recap'])->middleware('auth:sanctum');
Route::post('/violations/store', [ViolationController::class, 'store'])->middleware('auth:sanctum');
Route::put('/violations/update/{violation}', [ViolationController::class, 'update'])->middleware('auth:sanctum');
Route::put('/violations/validation/{violation}', [ViolationController::class, 'validation'])->middleware('auth:sanctum');
Route::delete('/violations/delete/{violation}', [ViolationController::class, 'destroy'])->middleware('auth:sanctum');

// violations-types controller
Route::get('/violations-types', [ViolationTypeController::class, 'index']);
Route::post('/violations-types/store', [ViolationTypeController::class, 'store'])->middleware('auth:sanctum');
Route::put('/violations-types/update/{violations_types}', [ViolationTypeController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/violations-types/delete/{violations_types}', [ViolationTypeController::class, 'destroy'])->middleware('auth:sanctum');
