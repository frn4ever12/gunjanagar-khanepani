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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ne');
            $table->text('description_en')->nullable();
            $table->text('description_ne')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->text('required_documents_en')->nullable();
            $table->text('required_documents_ne')->nullable();
            $table->text('process_en')->nullable();
            $table->text('process_ne')->nullable();
            $table->decimal('fee', 10, 2)->nullable();
            $table->string('processing_time')->nullable();
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('services');
    }
};
