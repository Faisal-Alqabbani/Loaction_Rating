<?php

namespace App\Providers;

use App\Http\ViewComposer\CategoryComposer;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        //
        view()->composer(['includes.header','includes.category_list'], CategoryComposer::class);

        Blade::if('owner', function(){
           return auth()->check() && auth()->user()->hasRole('Owner'); 
        });
    }
}
