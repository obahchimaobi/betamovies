<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('seasons')) {
            Schema::create('seasons', function (Blueprint $table) {
                $table->id();
                $table->string('movieId')->nullable();
                $table->string('name')->nullable();
                $table->string('formatted_name')->nullable();
                $table->string('type')->nullable();
                $table->longText('overview')->nullable();
                $table->string('origin_country')->nullable();
                $table->string('country')->nullable();
                $table->string('season_number')->nullable();
                $table->string('episode_number')->nullable();
                $table->string('episode_title')->nullable();
                $table->string('air_date')->nullable();
                $table->string('poster_path')->nullable();
                $table->string('status')->nullable();
                $table->string('download_url')->nullable();
                $table->timestamp('approved_at')->nullable();
                $table->timestamp('deleted_at')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seasons');
    }
};
