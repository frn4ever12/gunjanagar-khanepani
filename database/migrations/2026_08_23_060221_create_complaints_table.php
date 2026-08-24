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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number')->unique();
            $table->string('full_name');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->integer('ward')->nullable();
            $table->string('address');
            $table->string('category');
            $table->string('subject');
            $table->text('description');
            $table->string('attachment')->nullable();
            $table->enum('status', ['submitted', 'under_review', 'assigned', 'in_progress', 'resolved', 'closed'])->default('submitted');
            $table->text('admin_remarks')->nullable();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
