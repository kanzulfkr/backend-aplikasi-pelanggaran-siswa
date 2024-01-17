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
        Schema::create('student_classes', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('class_name_id')->constrained('class_names');
            // $table->foreignId('student_id')->constrained('students')->unique();
            // $table->timestamps();

            $table->unsignedBigInteger('class_name_id');
            $table->unsignedBigInteger('student_id')->unique();
            $table->timestamps();
            $table->foreign('class_name_id')->references('id')->on('class_names')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_classes');
    }
};
