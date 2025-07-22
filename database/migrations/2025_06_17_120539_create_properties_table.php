<?php

use App\Models\Country;
use App\Models\Propety;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('residence_type')->nullable();
            $table->enum('property_type', ['rent', 'buy'])->nullable();
            $table->decimal('price', 15, 2)->default(0)->comment('Actual price given by the agent');
            $table->enum('price_type', ['day', 'month', 'year'])->default('month');
            $table->decimal('price_per_month', 15, 2)->default(0)->comment('Calculated approx monthly price');
            $table->decimal('price_per_day', 15, 2)->default(0)->comment('Calculated approx daily price');
            $table->decimal('price_per_year', 15, 2)->default(0)->comment('Calculated approx yearly price');
            $table->text('address')->nullable();

            $table->foreignId('country_id')->nullable()->constrained('countries')->nullOnDelete()->nullOnUpdate();

            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();

            $table->integer('surface')->default(0);
            $table->enum('surface_type', ['sqft', 'sqm', 'sqyard'])->default('sqft');

            $table->integer('plot')->default(0);
            $table->enum('plot_type', ['acre', 'sqyard'])->default('acre');

            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->enum('condition', ['non-furnished', 'semi-furnished', 'furnished', 'na'])->default('na');

            $table->integer('property_age_min')->nullable();
            $table->integer('property_age_max')->nullable();

            $table->unsignedTinyInteger('property_available_month')->nullable();
            $table->unsignedSmallInteger('property_available_year')->nullable();

            $table->text('description')->nullable();

            $table->string('lat')->nullable();
            $table->string('lng')->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->nullOnUpdate();

            $table->enum('status', ['draft', 'published', 'pending', 'blocked'])->default('draft');
            $table->tinyInteger('archive')->default(0)->comment('0 - not archive, 1 - archive');

            $table->dateTime('submitted_at')->nullable()->comment(' When a user publishes a property, its value will be set to the current date and time. This value will then be used to calculate how many properties have been listed under their current subscription.');
            $table->dateTime('published_at')->nullable();
            $table->dateTime('blocked_at')->nullable();
            $table->timestamps();
        });

        Schema::create('property_nearby_places', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->nullable()->constrained('properties')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->integer('distance')->default(0);
            $table->enum('distance_type', ['km', 'm'])->default('km');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propeties');
        Schema::dropIfExists('propety_nearby_places');
    }
};
