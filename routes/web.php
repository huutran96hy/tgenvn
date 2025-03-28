<?php

use App\Http\Controllers\Api\JobController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});
Route::get('/news', function () {
    $news = collect([
        (object)[
            'id'                => 1,
            'title'             => 'Tin tức mẫu 1',
            'content'           => 'Đây là nội dung mẫu cho tin tức số 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
            'author_id'         => 1,
            'author'            => (object)['name' => 'Nguyễn Văn A'],
            'news_category_id'  => 1,
            'newsCategory'      => (object)['name' => 'Chuyên mục 1'],
            'published_date'    => Carbon::parse('2025-03-25'),
            'updated_date'      => Carbon::parse('2025-03-26'),
            'status'            => true,
        ],
        (object)[
            'id'                => 2,
            'title'             => 'Tin tức mẫu 2',
            'content'           => 'Đây là nội dung mẫu cho tin tức số 2. Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
            'author_id'         => 2,
            'author'            => (object)['name' => 'Trần Thị B'],
            'news_category_id'  => 2,
            'newsCategory'      => (object)['name' => 'Chuyên mục 2'],
            'published_date'    => Carbon::parse('2025-03-20'),
            'updated_date'      => Carbon::parse('2025-03-22'),
            'status'            => false,
        ],
        // Có thể thêm nhiều bản ghi khác
    ]);

    return view('admin.news.index', compact('news'));
});
Route::get('/news/create', function () {
    return view('admin.news.create');
});
Route::resource('jobs', JobController::class);
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');
