<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        // Register Blade components with admin namespace
        Blade::component('admin.components.ui.button', 'admin.ui.button');
        Blade::component('admin.components.ui.card', 'admin.ui.card');
        Blade::component('admin.components.ui.input', 'admin.ui.input');
        Blade::component('admin.components.ui.badge', 'admin.ui.badge');
        Blade::component('admin.components.ui.alert', 'admin.ui.alert');
        Blade::component('admin.components.ui.stat-card', 'admin.ui.stat-card');
    }
}
