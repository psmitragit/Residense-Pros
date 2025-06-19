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
        Schema::create('agent_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('subscription_plan_id')->nullable()->constrained('subscription_plans')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('subscription_end_date')->nullable();
            $table->date('subscription_start')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_subscriptions');
    }
};
