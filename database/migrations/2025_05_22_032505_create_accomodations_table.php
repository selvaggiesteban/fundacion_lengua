<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accomodations', function (Blueprint $table) {
            $table->id();
            $table->string('section'); 
            $table->string('name');
            $table->string('tax_id')->comment('CIF/NIF del alojamiento');
            $table->string('address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('phone_1');
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('contact1_name');
            $table->string('contact1_position');
            $table->string('contact1_email');
            $table->string('contact2_name')->nullable();
            $table->string('contact2_position')->nullable();
            $table->string('contact2_email')->nullable();
            $table->text('extra_info_1')->nullable();
            $table->text('extra_info_2')->nullable();
            $table->text('other_data')->nullable();
            $table->text('observations')->nullable();
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('accomodations');
    }
};