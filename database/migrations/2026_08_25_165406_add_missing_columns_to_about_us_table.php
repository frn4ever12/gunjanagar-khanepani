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
        Schema::table('about_us', function (Blueprint $table) {
            if (!Schema::hasColumn('about_us', 'organization_intro_en')) {
                $table->text('organization_intro_en')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'organization_intro_ne')) {
                $table->text('organization_intro_ne')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'organization_structure_en')) {
                $table->text('organization_structure_en')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'organization_structure_ne')) {
                $table->text('organization_structure_ne')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'image')) {
                $table->string('image')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn(['organization_intro_en', 'organization_intro_ne', 'organization_structure_en', 'organization_structure_ne', 'image']);
        });
    }
};
