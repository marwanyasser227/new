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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->string('street');
            $table->string('landmanrk');
            $table->string('address');
            $table->string('float');
            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreignId('governate_id');
            $table->foreign('governate_id')->references('id')->on('governates');
            $table->boolean('JobAddress')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
