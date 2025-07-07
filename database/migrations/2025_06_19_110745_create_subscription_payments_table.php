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
        Schema::create('subscription_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('subscription_plan_id')->nullable()->constrained('subscription_plans')->cascadeOnUpdate()->nullOnDelete();
            $table->decimal('amount', 15, 2)->default(0);
            $table->enum('payment_status', ['pending', 'success', 'cancelled'])->default('pending');
            $table->dateTime('payment_completed')->nullable();
            $table->dateTime('subscription_end_date')->nullable();
            $table->string('txn_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_payments');
    }
};
