<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AuthController,
    DashboardController,
    UserController,
    JobController,
    NewsController,
    ConfigController,
    JobCategoryController,
    EmployerController,
    NewsCategoryController,
    ApplicationController,
    CandidateController,
    SkillController,
    ContactController,
    CompanyPositionController,
    ProcessCategoryController,
    ProcessController,
    ProductsController,
    ProductsCategoryController
};
use App\Http\Middleware\AdminAccess;
use App\Http\Middleware\RedirectIfAdmin;

Route::middleware(RedirectIfAdmin::class)->get('/admin', function () {
    return null;
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    // Cần đăng nhập admin hoặc content manager
    Route::middleware([AdminAccess::class])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::resource('users', UserController::class);
        Route::resource('jobs', JobController::class);
        Route::post('/jobs/{job}/update-status', [JobController::class, 'updateStatus'])->name('jobs.update-status');
        Route::post('/jobs/bulk-update', [JobController::class, 'bulkUpdate'])->name('jobs.bulkUpdate');
        Route::post('/jobs/bulk-delete', [JobController::class, 'bulkDelete'])->name('jobs.bulkDelete');

        Route::resource('job-categories', JobCategoryController::class);
        Route::resource('employers', EmployerController::class);
        Route::resource('news', NewsController::class);
        Route::post('/news/{news}/update-status', [NewsController::class, 'updateStatus'])->name('news.update-status');

        Route::resource('news-categories', NewsCategoryController::class);
        Route::resource('applications', ApplicationController::class);
        Route::post('/applications/{application}/update-status', [ApplicationController::class, 'updateStatus'])->name('applications.update-status');

        Route::resource('candidates', CandidateController::class);
        Route::resource('skills', SkillController::class);
        Route::resource('contacts', ContactController::class)->only(['index', 'destroy','show']);
        Route::resource('configs', ConfigController::class);
        Route::delete('/delete-banner', [ConfigController::class, 'deleteBanner'])->name('configs.deleteBanner');
        Route::resource('company-position', CompanyPositionController::class);

        Route::resource('products', ProductsController::class);
        Route::resource('products-categories', ProductsCategoryController::class);
        Route::resource('process-categories', ProcessCategoryController::class);
        Route::resource('processes', ProcessController::class);
    });
});
