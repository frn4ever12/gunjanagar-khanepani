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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ne');
            $table->text('description_en');
            $table->text('description_ne');
            $table->text('history_en')->nullable();
            $table->text('history_ne')->nullable();
            $table->text('mission_en')->nullable();
            $table->text('mission_ne')->nullable();
            $table->text('vision_en')->nullable();
            $table->text('vision_ne')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
