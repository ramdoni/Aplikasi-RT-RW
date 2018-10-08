<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path('helper.php');
        
        require_once app_path('Helper/GeneralFunction.php');

        require_once app_path('Helper/MootaHelper.php');
    }
}
