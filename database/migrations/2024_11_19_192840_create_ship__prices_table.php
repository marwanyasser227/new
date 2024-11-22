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
        Schema::create('ship__prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('governate_id');
            $table->foreign('governate_id')->references('id')->on('governates');
            $table->string('costs');
            $table->foreignId('type_id');
            $table->foreign('type_id')->references('id')->on('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ship__prices');
    }
};
