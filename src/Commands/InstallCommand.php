<?php

namespace Alokadev\Easypack\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    protected $signature = 'easypack:install';
    protected $description = 'Install EasyPack dependencies and publish assets';

    public function handle()
    {
        $this->info('Installing Spatie Laravel Permission...');
        Artisan::call('vendor:publish', [
            '--provider' => 'Spatie\\Permission\\PermissionServiceProvider',
            '--tag' => 'permission-config',
            '--force' => true
        ]);
        Artisan::call('vendor:publish', [
            '--provider' => 'Spatie\\Permission\\PermissionServiceProvider',
            '--tag' => 'permission-migrations',
            '--force' => true
        ]);
        $this->info('Spatie Laravel Permission published.');

        $this->info('Installing Spatie Laravel Medialibrary...');
        Artisan::call('vendor:publish', [
            '--provider' => 'Spatie\MediaLibrary\MediaLibraryServiceProvider',
            '--tag' => 'medialibrary-migrations',
            '--force' => true
        ]);
        Artisan::call('vendor:publish', [
            '--provider' => 'Spatie\MediaLibrary\MediaLibraryServiceProvider',
            '--tag' => 'medialibrary-config',
            '--force' => true
        ]);
        $this->info('Spatie Laravel Medialibrary published.');

        // Instruct user to run migrations manually
        $this->info('Migration files for dependent packages have been published.');
        $this->warn('Please ensure your database is created and configured in your .env file.');
        $this->warn('After that, run `php artisan migrate` manually to create the necessary tables.');

        $this->info('EasyPack installation complete.');
    }
}
