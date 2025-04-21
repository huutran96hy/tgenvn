<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Job;

class HeaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // View composer cho header
        View::composer('*', function ($view) {
            $isHotTabActive = null;
            if (request()->routeIs('job_detail.show')) {
                $slug = request()->route('slug');
                $job = Job::where('slug', $slug)->first();
                if ($job) {
                    // Nếu is_hot là yes, "Việc làm tốt nhất" (best) sẽ được active và ngược lại.
                    $isHotTabActive = $job->is_hot === 'yes' ? 'best' : 'suggested';
                }
            }

            $view->with('isHotTabActive', $isHotTabActive);
        });
    }
}
