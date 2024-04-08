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
        Schema::create('aquaria', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fish_id');
            $table->foreign('fish_id')
                    ->references('id')
                    ->on('fish')
                    ->onDelete('cascade');

            $table->float('temperature');
            $table->float('ph_min');
            $table->float('ph_max');
            $table->float('gh_min');
            $table->float('gh_max');
            $table->integer('capacity');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aquaria');
    }
};
