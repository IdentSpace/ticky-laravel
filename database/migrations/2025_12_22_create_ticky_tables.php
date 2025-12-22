<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use IdentSpace\Ticky\Support\Migrations\TickyMigration;

return new class extends TickyMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ticky_customers', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->uuid('organisation_id')->nullable();
            $table->string('name');

            $table->tickySync();
        });

        Schema::create('ticky_locations', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->uuid('organisation_id')->nullable();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('postcode')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->integer('icon_value')->nullable();

            $table->tickySync();
        });

        Schema::create('ticky_categories', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->uuid('organisation_id')->nullable();
            $table->string('name');
            $table->integer('color_value')->nullable();
            $table->integer('icon_value')->nullable();

            $table->tickySync();
        });

        Schema::create('ticky_projects', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('customer_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->uuid('organisation_id')->nullable();
            $table->string('internal_id')->nullable();
            $table->string('name');
            $table->integer('color_value')->nullable();

            $table->tickySync();
        });

        Schema::create('ticky_records', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->uuid('organisation_id')->nullable();
            $table->string('description')->nullable();
            $table->dateTime('start');
            $table->dateTime('end')->nullable();
            $table->bool('locked')->default(false);
            $table->integer('color_value')->nullable();

            $table->tickySync();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticky_records');
        Schema::dropIfExists('ticky_projects');
        Schema::dropIfExists('ticky_categories');
        Schema::dropIfExists('ticky_locations');
    }
};
