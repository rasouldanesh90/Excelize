<?php

namespace Rasouldanesh90\Excelize;

use Illuminate\Support\ServiceProvider;

class ExcelizeServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'rasouldanesh90');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'rasouldanesh90');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/excelize.php', 'excelize');

        // Register the service the package provides.
        $this->app->singleton('excelize', function ($app) {
            return new Excelize;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['excelize'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/excelize.php' => config_path('excelize.php'),
        ], 'excelize.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/rasouldanesh90'),
        ], 'excelize.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/rasouldanesh90'),
        ], 'excelize.assets');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/rasouldanesh90'),
        ], 'excelize.lang');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
