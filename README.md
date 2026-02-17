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

## Updating

When a new version of the plugin is released, follow these steps to update your application:

1.  **Update the package**:
    ```bash
    composer update adf/filament-theme
    ```

2.  **Republish the assets** (Force overwrite):
    ```bash
    php artisan vendor:publish --tag=adf-theme-assets --force
    ```

3.  **Rebuild Assets**:
    If you've imported the theme in your project's `theme.css`, ensure you rebuild your assets to pick up the changes:
    ```bash
    npm run build
    ```

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

- Favicon
- Dark mode (disabled)

## Troubleshooting

### Class "Adf\FilamentTheme\AdfFilamentThemePlugin" not found

If you encounter this error after updating, try the following steps in your **main project**:

1.  **Clear Caches**:
    ```bash
    php artisan config:clear
    ```

2.  **Dump Autoloader**:
    ```bash
    composer dump-autoload
    ```

3.  **Force Update**:
    If you are using a VCS repository, ensure you pull the latest changes:
    ```bash
    composer update adf/filament-theme
    ```

4.  **Check Imports**:
    Ensure your `AdminPanelProvider` has the correct use statement:
    ```php
    use Adf\FilamentTheme\AdfFilamentThemePlugin;
    ```
