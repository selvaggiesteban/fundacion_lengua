<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accomodation_student', function (Blueprint $table) {
            $table->unsignedBigInteger('accomodation_id');
            $table->unsignedBigInteger('student_id');
            $table->foreign('accomodation_id')->references('id')->on('accomodations')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->primary(['accomodation_id', 'student_id']);
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('accomodation_student');
    }
};