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
        Schema::create('reviews', function (Blueprint $table) {
            $table->integer('review_id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('artisan_id');
            $table->float('rating');
            $table->text('review_text');
            $table->date('date_reviewed');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('artisan_id')->references('artisan_id')->on('artisans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
