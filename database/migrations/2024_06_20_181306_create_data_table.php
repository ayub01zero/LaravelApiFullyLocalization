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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ku')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('description_en');
            $table->string('description_ku')->nullable();
            $table->string('description_ar')->nullable();
            $table->string('location_en');
            $table->string('location_ku')->nullable();
            $table->string('location_ar')->nullable();
            $table->string('price_en');
            $table->string('price_ku')->nullable();
            $table->string('price_ar')->nullable();
            $table->enum('state', ['active', 'inactive'])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
