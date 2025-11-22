<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
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
    public function boot()
    {
        View::composer('layout.*', function ($view) {
            if (auth()->guard('admins')->check()) {
                $view->with('guard', 'admins');
            } elseif (auth()->guard('freelancers')->check()) {
                $view->with('guard', 'freelancers');
            } elseif (auth()->guard('web')->check()) {
                $view->with('guard', 'web');
            }
        });
    }
}
