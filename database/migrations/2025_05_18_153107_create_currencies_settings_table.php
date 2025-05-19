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
        Schema::create('currencies_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('currency_id')->references('id')->on('currencies')->cascadeOnDelete();
            $table->boolean('is_load')->default(true);
            $table->boolean('is_show')->default(true);
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies_settings');
    }
};
