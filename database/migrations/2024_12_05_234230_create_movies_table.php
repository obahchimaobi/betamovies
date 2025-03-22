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
        if (! Schema::hasTable('movies')) {
            Schema::create('movies', function (Blueprint $table) {
                $table->id();
                $table->string('movieId'); // Unique identifier for the movie

                // Basic movie details
                $table->string('name')->nullable();
                $table->string('formatted_name')->nullable();
                $table->longText('overview')->nullable();
                $table->longText('type')->nullable();
                $table->string('language')->nullable();
                $table->string('origin_country')->nullable();
                $table->string('country')->nullable();

                // Media-related details
                $table->string('poster_path')->nullable();
                $table->string('backdrop_path')->nullable();
                $table->string('trailer_url')->nullable();

                // Runtime and release information
                $table->string('runtime')->nullable();
                $table->string('release_date')->nullable();
                $table->string('release_year')->nullable();

                // Voting and rating details
                // $table->string('vote_average')->nullable();
                $table->string('vote_count')->nullable();
                $table->boolean('status')->nullable();
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
        Schema::dropIfExists('movies');
    }
};
