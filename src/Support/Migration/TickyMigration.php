<?php
namespace IdentSpace\Ticky\Support\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

abstract class TickyMigration extends Migration
{
    protected function tickySync(Blueprint $table): void
    {
        $table->timestamps();
        $table->timestamp('synced_at')->useCurrent();
        $table->softDeletes();
    }
}