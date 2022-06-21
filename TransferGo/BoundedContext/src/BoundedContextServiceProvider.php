<?php

declare(strict_types=1);

namespace TransferGo\BoundedContext;

use Illuminate\Support\ServiceProvider;

use function sprintf;

class BoundedContextServiceProvider extends ServiceProvider
{
    /** Context used when loading resources. */
    const CONTEXT = 'BoundedContext';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $configKey = sprintf('%s/../resources/config/%s.php', __DIR__, 'configuration-file');
        $configValue = sprintf('%s.php', self::CONTEXT);

        $this->publishes([
            $configKey => $this->app->configPath($configValue),
        ], 'config');
    }

    public function boot()
    {
        $this->registerBindings();
        $this->loadResources();
    }

    private function registerBindings(): void
    {
        // Loads default bindings.
        $aliases = include __DIR__ . '/../resources/alias/bindings.php';
        foreach ($aliases as $contract => $implementation) {
            $this->app->bind($contract, $implementation);
        }

        // Loads singleton bindings.
        // Every time the class is invoked, the same instance will be returned.
        $singletons = include __DIR__ . '/../resources/alias/singletons.php';
        foreach ($singletons as $contract => $implementation) {
            $this->app->singleton($contract, $implementation);
        }

        // Loads extension bindings.
        // Every time the class is invoked, the same instance will be returned.
        $extensions = include __DIR__ . '/../resources/alias/extensions.php';
        foreach ($extensions as $contract => $implementation) {
            $this->app->extend($contract, $implementation);
        }
    }

    /**
     * Publishes all required resources into the main application.
     *
     * @return void
     */
    private function loadResources(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../resources/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', self::CONTEXT);
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', self::CONTEXT);
        $this->loadRoutesFrom(__DIR__ . '/../resources/routes/web.php');

        if (!$this->app->runningInConsole()) {
            return;
        }

        $commands = include __DIR__ . '/../resources/config/commands.php';
        $this->commands($commands);
    }
}
