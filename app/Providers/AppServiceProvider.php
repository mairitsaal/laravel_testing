<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('auth.register', function ($view)
        {
            $view->with('specialities', Auth::user());
        });

        view()->composer('auth.register', function ($view)
        {
            $view->with('courses', Auth::user());
        });
        view()->composer('admin.register', function ($view)
        {
            $view->with('courses', Auth::user());
        });


        //Schema::defaultStringLength(191);
    }
}
