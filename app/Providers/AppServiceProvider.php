<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Blog\Controller\NavbarController;
use Illuminate\Support\Facades\Auth;

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
        //dd(auth()->user());
        //if(Auth::check()){
            
        //}
        
        /**
         * $sSite
         * this var contains the information typed into site.
         *
         * @var [type]
         */
        $sSite = config('site');
        
        /**
         * $sNavbars
         * this var contains the information typed into navbar.
         *
         * @var [type]
         */
        $sNavbars = NavbarController::Navbar();
        
        view()->share(['sSite'=>$sSite, 'sNavbars'=>$sNavbars]);
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
