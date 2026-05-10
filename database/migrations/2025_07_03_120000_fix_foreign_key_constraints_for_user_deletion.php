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
        // Fix conversations table - student_id foreign key
        Schema::table('conversations', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Fix conversations table - assigned_admin_id foreign key
        Schema::table('conversations', function (Blueprint $table) {
            $table->dropForeign(['assigned_admin_id']);
            $table->foreign('assigned_admin_id')->references('id')->on('users')->onDelete('set null');
        });

        // Fix conversations table - user_id foreign key (if exists)
        if (Schema::hasColumn('conversations', 'user_id')) {
            Schema::table('conversations', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            });
        }

        // Check for other tables that might reference users
        
        // Fix messages table if it has user_id
        if (Schema::hasTable('messages') && Schema::hasColumn('messages', 'user_id')) {
            Schema::table('messages', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }

        // Fix student_test table if it has user_id
        if (Schema::hasTable('student_test') && Schema::hasColumn('student_test', 'user_id')) {
            Schema::table('student_test', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Restore original foreign key constraints
        
        Schema::table('conversations', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->foreign('student_id')->references('id')->on('users');
        });

        Schema::table('conversations', function (Blueprint $table) {
            $table->dropForeign(['assigned_admin_id']);
            $table->foreign('assigned_admin_id')->references('id')->on('users');
        });

        if (Schema::hasColumn('conversations', 'user_id')) {
            Schema::table('conversations', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->foreign('user_id')->references('id')->on('users');
            });
        }

        if (Schema::hasTable('messages') && Schema::hasColumn('messages', 'user_id')) {
            Schema::table('messages', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->foreign('user_id')->references('id')->on('users');
            });
        }

        if (Schema::hasTable('student_test') && Schema::hasColumn('student_test', 'user_id')) {
            Schema::table('student_test', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->foreign('user_id')->references('id')->on('users');
            });
        }
    }
};