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
        Schema::create('artisan_services', function (Blueprint $table) {
            $table->unsignedInteger('artisan_id');
            $table->unsignedInteger('service_id');

            $table->primary(['artisan_id', 'service_id']);

            $table->foreign('artisan_id')->references('artisan_id')->on('artisans');
            $table->foreign('service_id')->references('service_id')->on('services');

            // Add any additional columns or constraints as needed

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artisan_services');
    }
};
