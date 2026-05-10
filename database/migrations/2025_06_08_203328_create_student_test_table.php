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
        Schema::create('student_test', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                  ->constrained('students') // Asume que tu tabla de estudiantes se llama 'students'
                  ->onDelete('cascade');
            $table->foreignId('test_id')
                  ->constrained('tests')
                  ->onDelete('cascade');
            $table->string('score');
            $table->timestamp('submitted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_test');
    }
};