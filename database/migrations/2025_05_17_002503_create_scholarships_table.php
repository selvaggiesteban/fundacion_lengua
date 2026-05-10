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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('section');
            $table->text('summary');
            $table->string('image_path')->nullable();
            $table->date('application_start_date');
            $table->date('application_end_date');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_email');
            $table->string('discount_code')->unique()->nullable(); // Nuevo campo discount_code
            $table->text('foundation_notes')->nullable();
            $table->json('discount_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->dropColumn('discount_code'); // Eliminar el campo si se revierte la migración
        });
        Schema::dropIfExists('scholarships');
    }
};