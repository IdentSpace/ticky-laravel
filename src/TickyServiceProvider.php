<?php
namespace IdentSpace\Ticky;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Schema\Blueprint;
use IdentSpace\Ticky\Console\Commands\TickyMigration;
use IdentSpace\Ticky\Console\Commands\TickySeed;

class TickyServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                TickyMigration::class,
                TickySeed::class,
            ]);
        }

        Blueprint::macro('tickySync', function () {
            /** @var Blueprint $this */
            $this->timestamps();
            $this->timestamp('synced_at')->useCurrent();
            $this->softDeletes();
        });

        // TODO: ggf. bewusst weglassen
        // TODO: option user with uuid alternativ to integer
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'ticky-migrations');

        $this->publishes([
            __DIR__.'/../Config/ticky.php' => config_path('ticky.php'),
        ], 'ticky-config');

        $this->registerRoutes();
    }

    protected function registerRoutes(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(__DIR__.'/../routes/api.php');
    }
}