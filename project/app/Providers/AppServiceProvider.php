<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\AdminButtonPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('view-admin-button', function ($user) {
            return $user->id === 1;
        });
    }
}
