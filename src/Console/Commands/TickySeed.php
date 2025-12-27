<?php
namespace IdentSpace\Ticky\Console\Commands;

use Illuminate\Console\Command;
use IdentSpace\Ticky\Support\Seeders\TickySeeder;
class TickySeed extends Command
{
    protected $signature = 'ticky:seed';
    protected $description = 'Seed Ticky package data';

    public function handle(): int
    {
        $this->call('db:seed', [
            '--class' => TickySeeder::class,
        ]);

        return self::SUCCESS;
    }
}
