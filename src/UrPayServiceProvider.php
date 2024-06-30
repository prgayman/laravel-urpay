<?php

namespace Prgayman\UrPay;

use Illuminate\Support\ServiceProvider;
use Prgayman\UrPay\Contracts\UrPayInterface;

class UrPayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        # Publishes config file with group (laravel-urpay-config)
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('urpay.php')], 'laravel-urpay-config');

        # Bind UrPay
        $this->app->bind(UrPayInterface::class, UrPay::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        # Merge config from config file
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'urpay');
    }
}
