<?php
namespace IdentSpace\Ticky\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;


class TickyMigration extends Command
{
    protected $signature = 'ticky:migrate
        {--rollback : Rollback Ticky migrations}';

    protected $description = 'Manage Ticky migration';

    public function handle(): int
    {
        $path = 'vendor/identspace/ticky-laravel/database/migrations';

        if($this->option('rollback')){
            return $this->rollback($path);
        }

        return $this->migrate($path);
    }

    protected function migrate(string $path): int
    {
        Artisan::call('migrate', [
            '--step' => 1,
            '--path' => $path
        ]);
        $this->info(Artisan::output());
        return self::SUCCESS;
    }
    protected function rollback(string $path): int
    {
        Artisan::call('migrate:rollback', [
            '--step' => 1,
            '--path' => $path
        ]);
        $this->info(Artisan::output());
        return self::SUCCESS;
    }
}