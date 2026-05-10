<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rate_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('rate_id');
            $table->unsignedBigInteger('tag_id');

            $table->foreign('rate_id')->references('id')->on('rates')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            $table->primary(['rate_id', 'tag_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rate_tag');
    }
};