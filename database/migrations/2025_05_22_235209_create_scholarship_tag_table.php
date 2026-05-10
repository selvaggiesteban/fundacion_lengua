<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scholarship_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('scholarship_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('scholarship_id')->references('id')->on('scholarships')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->primary(['scholarship_id', 'tag_id']);
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('scholarship_tag');
    }
};