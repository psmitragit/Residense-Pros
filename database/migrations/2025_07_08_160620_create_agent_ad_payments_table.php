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
        Schema::create('agent_ad_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->decimal('amount', 15, 2)->default(0);
            $table->enum('payment_status', ['pending', 'success', 'cancelled', 'refunded'])->default('pending');
            $table->dateTime('payment_completed')->nullable();
            $table->string('txn_id')->nullable();
            $table->decimal('rate', 15, 2)->default(0)->comment('current rate /day while purchase');
            $table->integer('total_days')->default(0);
            $table->foreignId('ad_position_id')->nullable()->constrained('ads_positions')->cascadeOnUpdate()->nullOnDelete();
            $table->decimal('refund_amount', 15, 2)->default(0);
            $table->enum('is_refunded', ['yes', 'no'])->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_ad_payments');
    }
};
