<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    AuthController,
    UserController,
    CandidateController,
    EmployerController,
    JobController,
};

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// API yêu cầu xác thực
Route::middleware('auth:sanctum')->group(function () {
    // Chỉ admin mới có quyền CRUD với users
    Route::middleware('can:manage-users')->group(function () {
        Route::apiResource('users', UserController::class);
    });

    Route::apiResource('candidate', CandidateController::class);
    Route::apiResource('employer', EmployerController::class);
    Route::apiResource('job', JobController::class);
    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
});

// API công khai 
