<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Cart;

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
            Paginator::useBootstrap();
             View::composer('home.header', function($view) {
            $userid = auth()->id() ?? 0;
            $count = Cart::where('user_id', $userid)->count();
            $view->with('count', $count);
        });
    }
  
   

        }
