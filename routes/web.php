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

Route::get('/', function () {
    return view('Frontend.home');
})->name('home');

Route::get('/about', function () {
    return view('Frontend.about');
})->name('about');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/about/greeting', function () {
    return view('frontend.about');
})->name('about.greeting');

Route::get('/about/organization', function () {
    return view('frontend.about');
})->name('about.organization');

Route::get('/about/technology', function () {
    return view('frontend.about');
})->name('about.technology');

Route::get('/about/directions', function () {
    return view('frontend.about');
})->name('about.directions');

Route::get('/products', function () {
    return view('Frontend.products');
})->name('products');

Route::get('/process', function () {
    return view('Frontend.process');
})->name('process');

Route::get('/quote', function () {
    return view('Frontend.quote');
})->name('quote');

Route::get('/technology', function () {
    return view('Frontend.technology');
})->name('technology');

Route::get('/support', function () {
    return view('Frontend.support');
})->name('support');

Route::get('/products/precision', function () {
    return view('products');
})->name('products.precision');

Route::get('/products/general', function () {
    return view('products');
})->name('products.general');

Route::get('/products/custom', function () {
    return view('products');
})->name('products.custom');

Route::get('/products/air-bearing', function () {
    return view('products');
})->name('products.air-bearing');

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
