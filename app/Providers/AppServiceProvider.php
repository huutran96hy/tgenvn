<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

        $theme = DB::table('config')->where('config_key', 'theme')
            ->value('config_value') ?? 'light';
        View::share('theme', $theme);
    }
}
