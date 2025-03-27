<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    AuthController,
    UserController,
    CandidateController,
    EmployerController,
    JobController,
    JobCategoryController,
    ApplicationController,
    SkillController,
    NewsCategoryController,
    NewsController,
    ContactController,
    ConfigController
};

// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);

// // API yêu cầu xác thực
// Route::middleware('auth:sanctum')->group(function () {
//     // Chỉ admin mới có quyền CRUD với users
//     Route::middleware('can:manage-users')->group(function () {
//         Route::apiResource('users', UserController::class);
//     });

//     Route::apiResource('candidates', CandidateController::class);
//     Route::apiResource('employers', EmployerController::class);
//     Route::apiResource('jobs', JobController::class);
//     Route::apiResource('job-category', JobCategoryController::class);
//     Route::apiResource('applications', ApplicationController::class);
//     Route::apiResource('skills', SkillController::class);
//     Route::apiResource('news', NewsController::class);
//     Route::apiResource('news-categories', NewsCategoryController::class);
//     Route::apiResource('contacts', ContactController::class);
//     Route::apiResource('configs', ConfigController::class);

//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::get('/profile', [AuthController::class, 'profile']);
// });

// API công khai 
