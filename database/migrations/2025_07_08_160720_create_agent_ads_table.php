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
        Schema::create('agent_ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('agent_ads')->cascadeOnUpdate()->nullOnDelete()->comment('This will help to create when user want to renew the same ad');
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status', ['pending_approval', 'pending_payment', 'active'])->default('pending_approval');
            $table->dateTime('applied_on')->nullable();
            $table->dateTime('approved_on')->nullable();
            $table->foreignId('ad_position_id')->nullable()->constrained('ads_positions')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('transaction_id')->nullable()->constrained('agent_ad_payments')->cascadeOnUpdate()->nullOnDelete();
            $table->string('ad_file_path')->nullable();
            $table->string('ad_url')->nullable();
            $table->integer('total_days')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_ads');
    }
};
