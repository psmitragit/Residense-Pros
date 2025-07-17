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
        Schema::create('enquery_histories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('message')->nullable();
            $table->string('enquery_to')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('property_id')->nullable()->constrained('properties')->cascadeOnUpdate()->nullOnDelete();
            $table->enum('type', ['enquery', 'contact'])->default('enquery');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquery_histories');
    }
};
