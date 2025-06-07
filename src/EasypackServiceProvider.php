<?php
namespace Alokadev\Easypack;

use Illuminate\Support\ServiceProvider;
use Alokadev\Easypack\Commands\InstallCommand; // Add this line

class EasypackServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Only publish config if file exists
        if (file_exists(__DIR__.'/../config/easypack.php')) {
            $this->publishes([
                __DIR__.'/../config/easypack.php' => config_path('easypack.php'),
            ], 'easypack-config'); // Changed tag from 'config' to 'easypack-config'
        }

        if ($this->app->runningInConsole()) { // Add this block to register the command
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    public function register(): void
    {
        // Only merge config if file exists
        if (file_exists(__DIR__.'/../config/easypack.php')) {
            $this->mergeConfigFrom(
                __DIR__.'/../config/easypack.php', 'easypack'
            );
        }
    }
  
}
