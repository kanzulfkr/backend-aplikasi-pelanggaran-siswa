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
        Schema::create('violations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('violations_types_id')->constrained('violations_types');
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('officer_id')->constrained('teachers');
            $table->string('catatan')->nullable();
            $table->boolean('is_validate');
            $table->boolean('is_confirm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violations');
    }
};
