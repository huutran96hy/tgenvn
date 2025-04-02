<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\News;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate::define('manage-users', function (User $user) {
        //     return $user->role === 'admin';
        // });

        // Gate::define('manage-quizzes', function (User $user) {
        //     return $user->role === 'admin';
        // });

        View::composer('Frontend.layouts.footer', function ($view) {
            $view->with('latestNews', News::latest()->limit(3)->get());
        });
    }
}
