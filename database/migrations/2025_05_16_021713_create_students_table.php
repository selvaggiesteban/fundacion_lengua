<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up(): void
    {
        
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('passport')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('language')->nullable();
            $table->string('center')->nullable();
            $table->string('level')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('second_language')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('partner')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('province')->nullable();
            $table->string('sex')->nullable();
            $table->string('status')->nullable()->default('inactive');
            $table->string('payment_status')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('user_level')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Revertir la migración.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
}