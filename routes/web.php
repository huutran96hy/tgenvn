<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
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
    HomeController,
    JobDetailController
};

require __DIR__ . '/admin.php';

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/job-detail/{jobId}', [JobDetailController::class, 'index'])->name('job_detail');

// Đăng ký, đăng nhập
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Trang danh sách job & chi tiết job
// Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
// Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

// Trang danh mục công việc
Route::get('/job-categories', [JobCategoryController::class, 'index'])->name('job-categories.index');

// Tin tức & danh mục tin tức
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news-categories', [NewsCategoryController::class, 'index'])->name('news-categories.index');

// Form liên hệ
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Các route yêu cầu đăng nhập
Route::middleware('auth')->group(function () {
    // Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

    // // Nhà tuyển dụng
    // Route::middleware('can:manage-employers')->group(function () {
    //     Route::resource('employers', EmployerController::class)->except(['index']);
    //     Route::resource('jobs', JobController::class)->except(['index', 'show']);
    // });

    // // Ứng viên
    // Route::middleware('can:manage-candidates')->group(function () {
    //     Route::resource('candidates', CandidateController::class)->except(['index']);
    //     Route::resource('applications', ApplicationController::class);
    // });

    // // Quản lý tin tức (Chỉ Admin)
    // Route::middleware('can:manage-news')->group(function () {
    //     Route::resource('news', NewsController::class)->except(['index', 'show']);
    //     Route::resource('news-categories', NewsCategoryController::class)->except(['index']);
    // });

    // // Quản lý liên hệ (Admin)
    // Route::middleware('can:manage-contacts')->group(function () {
    //     Route::resource('contacts', ContactController::class)->except(['create', 'store']);
    // });

    // // Cấu hình hệ thống (Admin)
    // Route::middleware('can:manage-configs')->group(function () {
    //     Route::resource('configs', ConfigController::class);
    // });
});

// Route::get('/news/create', function () {
//     return view('admin.news.create');
// });
// Route::resource('jobs', JobController::class);
// Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
//     ->name('ckfinder_connector');

// Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
//     ->name('ckfinder_browser');
