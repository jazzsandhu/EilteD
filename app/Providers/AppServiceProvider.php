<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Iluminate\Support\Facades\Schema;

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
        //define the string lemgth other wise migration can throw error that strign lenght is undefined
        //Schema::defaultStringLength(191);
    }
}
