<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    AuthController,
    CandidateController,
    EmployerController,
    JobController,
    NewsController,
    ContactController,
    HomeController,
    JobDetailController
};

require __DIR__ . '/admin.php';

Route::get('/', [HomeController::class, 'index'])->name('index');

// Trang danh sách job & chi tiết job
Route::get('/viec-lam', [JobController::class, 'index'])->name('jobs.index');
Route::get('/viec-lam-tot-nhat', [JobController::class, 'best'])->name('jobs.best');
Route::get('/viec-lam-goi-y', [JobController::class, 'suggested'])->name('jobs.suggested');
Route::get('/viec-lam/{slug}', [JobDetailController::class, 'index'])->name('job_detail.show');

// Trang danh sách công ty & chi tiết công ty
Route::get('/cong-ty', [EmployerController::class, 'index'])->name('employers.index');
Route::get('/cong-ty-hang-dau', [EmployerController::class, 'top'])->name('employers.top');
Route::get('/cong-ty-de-xuat', [EmployerController::class, 'suggested'])->name('employers.suggested');
Route::get('/cong-ty/{employer}', [EmployerController::class, 'show'])->name('employers.show');

// Trang liên hệ
Route::get('/lien-he', [ContactController::class, 'index'])->name('contact.index');
Route::post('/lien-he', [ContactController::class, 'store'])->name('contact.store');

// Tin tức & danh mục tin tức
Route::get('/tin-tuc', [NewsController::class, 'index'])->name('news.index');
Route::get('/tin-tuc/{news}', [NewsController::class, 'show'])->name('news.show');
// Route::get('/news-categories', [NewsCategoryController::class, 'index'])->name('news-categories.index');

Route::post('/ung-tuyen', [CandidateController::class, 'store'])->name('candidate.store');

// Các route yêu cầu đăng nhập
Route::middleware('auth')->group(function () {
    // Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\controllers\UploadController@upload');
    // list all lfm routes here...
});

Route::group(['prefix' => 'admin/laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Đăng ký, đăng nhập
// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
