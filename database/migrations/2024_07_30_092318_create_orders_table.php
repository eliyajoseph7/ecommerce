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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderno');
            $table->foreignId('customer_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamp('order_date')->useCurrent();
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled', 'refunded'])->default('pending');
            $table->decimal('total_amount', 10, 2);
            $table->foreignId('delivery_address_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('billing_address_id')->nullable()->constrained()->nullOnDelete();
            $table->string('payment_method')->nullable();
            $table->string('note')->nullable();
            $table->string('session_id');
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
