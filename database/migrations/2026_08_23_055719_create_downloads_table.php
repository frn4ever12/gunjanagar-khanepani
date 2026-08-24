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
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ne');
            $table->text('description_en')->nullable();
            $table->text('description_ne')->nullable();
            $table->string('category')->default('other');
            $table->string('file')->nullable();
            $table->string('file_type');
            $table->integer('file_size')->nullable();
            $table->date('publish_date');
            $table->integer('sort_order')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('downloads');
    }
};
