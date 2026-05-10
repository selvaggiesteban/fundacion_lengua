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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_transaction_id')->nullable()->after('payment_method');
            $table->string('payment_status')->default('pending')->after('payment_transaction_id');
            $table->json('payment_response_data')->nullable()->after('payment_status');
            $table->string('redsys_order_id')->nullable()->after('payment_response_data');
            
            $table->index(['payment_status']);
            $table->index(['payment_transaction_id']);
            $table->index(['redsys_order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex(['payment_status']);
            $table->dropIndex(['payment_transaction_id']);
            $table->dropIndex(['redsys_order_id']);
            
            $table->dropColumn(['payment_transaction_id', 'payment_status', 'payment_response_data', 'redsys_order_id']);
        });
    }
};
