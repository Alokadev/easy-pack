# EasyPack: A Laravel 12 Extensible Package

EasyPack is a Laravel package designed to simplify the setup of commonly used Spatie packages: `spatie/laravel-permission` and `spatie/laravel-medialibrary`. It provides an Artisan command to publish their necessary assets (configurations and migrations) and guides the user through the final setup steps.

## Features

- Automatically includes `spatie/laravel-permission` and `spatie/laravel-medialibrary` as dependencies.
- Provides an `easypack:install` Artisan command to:
  - Publish configuration files for `spatie/laravel-permission` (as `config/permission.php`).
  - Publish configuration files for `spatie/laravel-medialibrary` (as `config/medialibrary.php`).
  - Publish migration files for both Spatie packages to your application's `database/migrations` directory.
  - Publish its own configuration file (if available) as `config/easypack.php`.
- Guides users to configure their database and run migrations.

## Installation

1.  Require the package via Composer in your Laravel project:

    ```bash
    composer require alokadev/easypack
    ```

2.  The package uses Laravel's auto-discovery, so the service provider will be registered automatically.

## Setup

After installing the package, run the `easypack:install` Artisan command:

```bash
php artisan easypack:install
```

This command will perform the following actions:

- **Publish Configuration Files:**
  - `spatie/laravel-permission` config will be published to `config/permission.php`.
  - `spatie/laravel-medialibrary` config will be published to `config/medialibrary.php`.
  - If `easypack` has its own publishable configuration, it will be published to `config/easypack.php`.
- **Publish Migration Files:**
  - Migrations from `spatie/laravel-permission` will be copied to your `database/migrations` folder.
  - Migrations from `spatie/laravel-medialibrary` will be copied to your `database/migrations` folder.

**Important:** After the command completes, it will remind you to:

1.  **Ensure your database is created and configured** in your project's `.env` file.
2.  **Run the migrations** to create the necessary tables for `laravel-permission` and `laravel-medialibrary`:
    ```bash
    php artisan migrate
    ```

## Configuration

- **Spatie Laravel Permission:** You can customize the behavior of `spatie/laravel-permission` by editing the `config/permission.php` file.
- **Spatie Laravel Medialibrary:** You can customize the behavior of `spatie/laravel-medialibrary` by editing the `config/medialibrary.php` file.
- **EasyPack:** If your `alokadev/easypack` package has its own configuration (e.g., `config/easypack.php` within the package), it will be published to your application's `config` directory. You can then modify it as needed.

## Usage

Once installed and configured, you can use the functionalities provided by `spatie/laravel-permission` (for managing roles and permissions) and `spatie/laravel-medialibrary` (for managing file uploads and associations) as per their respective documentation.

- [Spatie Laravel Permission Documentation](https://spatie.be/docs/laravel-permission)
- [Spatie Laravel Medialibrary Documentation](https://spatie.be/docs/laravel-medialibrary)

## License

EasyPack is open-sourced software licensed under the [MIT license](LICENSE.md).
