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
        Schema::create('pilot__details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pilot_id');
            $table->foreign('pilot_id')->references('id')->on('users');
            $table->string('liscense');
            $table->foreignId('hub_id');
            $table->foreign('hub_id')->references('id')->on('hubs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilot__details');
    }
};
