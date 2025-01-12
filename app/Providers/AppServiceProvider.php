<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; // Import Route facade
use App\Http\Middleware\RoleMiddleware; // Import RoleMiddleware

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // You can register other services here if needed
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Manually bind the "role" middleware alias
        Route::aliasMiddleware('role', RoleMiddleware::class);
    }
}
