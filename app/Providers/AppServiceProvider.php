<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
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
//       View::share(['categories'=>Category::all()]);

       View::composer('*',function ($view){
            $view->with(['categories'=>Category::all()]);
       });
       View::composer('website.includes.header',function ($view){
            $view->with(['categorieslimit'=>Category::all()->take(3)]);
        });
    }
}
