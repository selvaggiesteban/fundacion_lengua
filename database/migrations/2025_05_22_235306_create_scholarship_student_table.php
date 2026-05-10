<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scholarship_student', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scholarship_id');
            $table->unsignedBigInteger('student_id');
            $table->date('application_date')->nullable();
            $table->string('status')->default('pendiente');
            $table->date('awarded_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->foreign('scholarship_id')->references('id')->on('scholarships')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->unique(['scholarship_id', 'student_id'], 'scholarship_student_unique');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('scholarship_student');
    }
};