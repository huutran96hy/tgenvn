<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    AuthController,
    CandidateController,
    EmployerController,
    JobController,
    NewsCategoryController,
    NewsController,
    ContactController,
    HomeController,
    JobDetailController
};

require __DIR__ . '/admin.php';

Route::get('/', [HomeController::class, 'index'])->name('index');

// Trang danh sách job & chi tiết job
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/job-detail/{slug}', [JobDetailController::class, 'index'])->name('job_detail.show');

// Trang danh sách công ty & chi tiết công ty
Route::get('/employers', [EmployerController::class, 'index'])->name('employers.index');
Route::get('/employer-detail/{employer}', [EmployerController::class, 'show'])->name('employers.show');

// Trang liên hệ
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Tin tức & danh mục tin tức
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
// Route::get('/news-categories', [NewsCategoryController::class, 'index'])->name('news-categories.index');

Route::post('/apply-job', [CandidateController::class, 'store'])->name('candidate.store');

// Các route yêu cầu đăng nhập
Route::middleware('auth')->group(function () {
    // Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});

// Đăng ký, đăng nhập
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::resource('jobs', JobController::class);
// Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
//     ->name('ckfinder_connector');

// Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
//     ->name('ckfinder_browser');
