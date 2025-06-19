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
            $table->enum('surface_type', ['sqft', 'sqm'])->default('sqft');

            $table->integer('plot')->default(0);
            $table->enum('plot_type', ['acres', 'hectares', 'sqm'])->default('acres');

            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->enum('condition', ['non-furnished', 'semi-furnished', 'furnished', 'na'])->default('na');

            $table->integer('property_age_min')->default(0);
            $table->integer('property_age_max')->default(0);

            $table->unsignedTinyInteger('property_available_month')->default(0);
            $table->unsignedSmallInteger('property_available_year')->default(0);

            $table->text('description')->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete()->nullOnUpdate();

            $table->enum('status', ['draft', 'published', 'pending'])->default('draft');
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
