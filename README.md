# ADF Custom Filament Theme

This theme provides a reusable Filament theme for ADF projects, including primary colors, branding, and custom sidebar/button styles.

## Installation

1.  **Add the package to your `composer.json`**:
    Add the GitHub repository to your `repositories` section:
    ```json
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/girmafeyissa/adf-filament-theme"
        }
    ]
    ```
    Then run:
    ```bash
    composer require adf/filament-theme
    ```


2.  **Publish the Assets**:
    ```bash
    php artisan vendor:publish --tag=adf-theme-assets
    ```
    This will copy the `theme.css` to `resources/css/vendor/adf-theme/theme.css`.

## Usage

### 1. Register the Plugin
In your `PanelProvider` (e.g., `AdminPanelProvider.php`), register the `AdfFilamentThemePlugin`:

```php
use Adf\FilamentTheme\AdfFilamentThemePlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->plugin(AdfFilamentThemePlugin::make());
}
```

### 2. Configure Tailwind & Vite
In your project's main `theme.css` (the one used by Filament), import the package's CSS:

```css
@import "tailwindcss";
@import "../../vendor/filament/filament/resources/css/theme.css";

/* Import the ADF theme overrides */
@import "./vendor/adf-theme/theme.css";

@source "../../app/Filament/**/*";
@source "../../resources/views/filament/**/*";
```

Ensure your `PanelProvider` points to your main `theme.css` via `viteTheme()`.

## Customization
The `AdfFilamentThemePlugin` automatically configures:
- Primary colors (#7f0707)
- Branding logos and height
- Favicon
- Dark mode (disabled)
