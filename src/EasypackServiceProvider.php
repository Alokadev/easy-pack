<?php
namespace Alokadev\Easypack;

use Illuminate\Support\ServiceProvider;

class EasypackServiceProvider extends ServiceProvider
{
    public function boot(): void
{
    // Only publish config if file exists
    if (file_exists(__DIR__.'/../config/easypack.php')) {
        $this->publishes([
            __DIR__.'/../config/easypack.php' => config_path('easypack.php'),
        ], 'config');
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
