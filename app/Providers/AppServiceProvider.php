<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use Auth;
use Request;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //this is to fix migration error with email unique;
        Schema::defaultStringLength(191);
        
        view()->share('root', Request::root());
        
        view()->composer('*', function($view) { 
        	$view->with('auth', Auth::user()); 
        });

    }

    public function register()
    {
        //
    }
}
