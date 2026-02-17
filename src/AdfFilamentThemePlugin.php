<?php

namespace Adf\FilamentTheme;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Colors\Color;

class AdfFilamentThemePlugin implements Plugin
{
    public function getId(): string
    {
        return 'adf-filament-theme';
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function register(Panel $panel): void
    {
        $panel
            ->darkMode(false)
            ->favicon('https://addisfortune.news/wp-content/themes/addis-fortune/icons/favicon.ico')
            ->brandLogo('https://addisfortune.news/wp-content/uploads/2022/03/adf_logo-large.png')
            ->brandLogoHeight('3rem')
            ->colors([
                'danger' => Color::Red,
                'gray' => Color::hex('#000000'),
                'info' => Color::Blue,
                'primary' => Color::hex('#7f0707'),
                'success' => Color::Green,
                'warning' => Color::Amber,
                'red' => Color::Red,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
