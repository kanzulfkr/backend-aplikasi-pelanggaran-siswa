<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ViolationController;
use App\Http\Controllers\Api\ViolationTypeController;

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::apiResource('/violations', ViolationController::class);
//     Route::apiResource('/violations/all', ViolationController::class);
// });


Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout',  [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/auth/user',  [AuthController::class, 'user'])->middleware('auth:sanctum');

Route::get('/violations', [ViolationController::class, 'index'])->middleware('auth:sanctum');
Route::get('/violations/all', [ViolationController::class, 'all'])->middleware('auth:sanctum');
Route::post('/violations/store', [ViolationController::class, 'store'])->middleware('auth:sanctum');
Route::put('/violations/update/{violation}', [ViolationController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/violations/delete/{violation}', [ViolationController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/violations-types', [ViolationTypeController::class, 'index'])->middleware('auth:sanctum');
Route::post('/violations-types/store', [ViolationTypeController::class, 'store'])->middleware('auth:sanctum');
Route::put('/violations-types/update/{violation}', [ViolationTypeController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/violations-types/delete/{violation}', [ViolationTypeController::class, 'destroy'])->middleware('auth:sanctum');
