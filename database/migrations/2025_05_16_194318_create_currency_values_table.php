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
        Schema::create('currency_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('currency_day_id')->references('id')->on('currency_days')->cascadeOnDelete();
            $table->foreignId('currency_id')->references('id')->on('currencies')->cascadeOnDelete();
            $table->unsignedInteger('nominal');
            $table->decimal('value', 15, 6);
            $table->decimal('vunit_rate', 15, 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_values');
    }
};
