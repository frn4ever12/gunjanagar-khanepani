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
        Schema::create('water_qualities', function (Blueprint $table) {
            $table->id();
            $table->string('parameter');
            $table->string('standard');
            $table->string('result');
            $table->string('status')->default('normal');
            $table->date('testing_date');
            $table->text('remarks_en')->nullable();
            $table->text('remarks_ne')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_qualities');
    }
};
