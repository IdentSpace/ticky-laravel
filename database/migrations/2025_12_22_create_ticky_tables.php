<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // TODO: DEV
        Schema::create('ticky_audit', function (Blueprint $table) {
            $table->id();
            $table->string('table_name');
            $table->string('action');
            $table->string('row_id');
            $table->longText('row_data')->nullable();
            $table->timestamps();
        });

        // TODO: DEV
        Schema::create('ticky_customers', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->uuid('organisation_id')->nullable();
            $table->string('name');
            $table->longText('note')->nullable();
            $table->tickySync();
        });

        // TODO: DEV
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
            $table->longText('note')->nullable();

            $table->tickySync();
        });

        // TODO: DEV
        Schema::create('ticky_categories', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->uuid('organisation_id')->nullable();
            $table->string('name');
            $table->integer('color_value')->nullable();
            $table->integer('icon_value')->nullable();
            $table->longText('note')->nullable();

            $table->tickySync();
        });

        // TODO: DEV
        Schema::create('ticky_projects', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('customer_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->uuid('organisation_id')->nullable();
            $table->string('internal_id')->nullable();
            $table->string('name');
            $table->longText('note')->nullable();
            $table->integer('color_value')->nullable();

            $table->tickySync();
        });

        Schema::create('ticky_records', function (Blueprint $table) {
            $table->uuid('uuid')->primary();

            $table->unsignedBigInteger('user_id')->index();

            $table->uuid('organisation_id')->nullable();
            $table->uuid('category_id')->nullable();

            $table->foreignId('category_id')->nullable()->constrained('ticky_categories');
            $table->foreignId('project_id')->nullable()->constrained('ticky_projects');
            $table->foreignId('location_id')->nullable()->constrained('ticky_locations');

            $table->string('description')->nullable();
            $table->dateTime('start');
            $table->dateTime('end')->nullable();
            $table->boolean('locked')->default(false);
            $table->integer('color_value')->nullable();

            $table->tickySync();

            // TODO: auto update
            // TODO: on delete, audit entry
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
        Schema::dropIfExists('ticky_customers');
        Schema::dropIfExists('ticky_audit');
    }
};
