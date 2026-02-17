<?php

namespace Adf\FilamentTheme;

use Illuminate\Support\ServiceProvider;

class AdfFilamentThemeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/css/theme.css' => resource_path('css/vendor/adf-theme/theme.css'),
            ], 'adf-theme-assets');
        }
    }

    public function register(): void
    {
        //
    }
}
