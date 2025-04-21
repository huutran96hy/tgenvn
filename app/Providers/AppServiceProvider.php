<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\News;
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
        // Gate: Chỉ admin được quản lý users
        Gate::define('manage-users', function (User $user) {
            return $user->role === 'admin';
        });

        // View composer cho footer
        View::composer('Frontend.layouts.footer', function ($view) {
            $view->with('latestNews', News::latest()->limit(3)->get());
        });

        $this->app->register(HeaderServiceProvider::class);
    }
}
