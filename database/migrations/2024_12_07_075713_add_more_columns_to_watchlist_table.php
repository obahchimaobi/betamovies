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
        Schema::table('my_lists', function (Blueprint $table) {
            //
            $table->string('download_url')->nullable();
            $table->string('formatted_name')->nullable()->after('movie_name');
            $table->string('poster_path')->nullable()->after('genres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('watchlist', function (Blueprint $table) {
            //
        });
    }
};
