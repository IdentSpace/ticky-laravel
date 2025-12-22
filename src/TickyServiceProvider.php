<?php
namespace IdentSpace\Ticky;

use Illuminate\Support\ServiceProvider;
class TickyServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // TODO: ggf. bewusst weglassen
        // $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'ticky-migrations');

        $this->publishes([
            __DIR__.'/../Config/ticky.php' => config_path('ticky.php'),
        ], 'ticky-config');
    }
}