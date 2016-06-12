<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Blog\Controller\NavbarController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //视图间共享数据
        view()->share(['sSite'=>config('site'), 'sNavbars'=>NavbarController::Navbar()]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
