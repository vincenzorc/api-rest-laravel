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
        Schema::create('diet_fish', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diet_id');
            $table->foreign('diet_id')
                ->references('id')
                ->on('diets')
                ->cascadeOnDelete();
            
            $table->unsignedBigInteger('fish_id');
            $table->foreign('fish_id')
                ->references('id')
                ->on('fish')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diet_fish');
    }
};
