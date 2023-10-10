<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
//  Create with php artisan make:provider EsiServiceProvider
//  After That you should add this in app.php
class EsiServiceProvider extends ServiceProvider
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
    public function boot(Router $router): void
    {
        $router->bind('user',function ($name){
            return User::where('name',$name)->first();
        });
    }
}
