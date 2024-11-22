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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('street');
            $table->string('name');
            $table->boolean('isMain')->default(0);
            $table->foreignId('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreignId('governate_id');
            $table->foreign('governate_id')->references('id')->on('governates');
            $table->foreignId('owner_id');
            $table->foreign('owner_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
