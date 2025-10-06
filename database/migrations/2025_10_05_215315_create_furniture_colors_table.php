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
        Schema::create('furniture_colors', function (Blueprint $table) {
            $table->foreignId('color_id')->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->foreignId('furniture_id')->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('furniture_colors');
    }
};
