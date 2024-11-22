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
        Schema::create('ship__details', function (Blueprint $table) {
            $table->id();
            $table->string('size');
            $table->string('details');
            $table->integer('numberOfShipment');
            $table->string('cost');
            $table->boolean('letClientOpenit');
            $table->foreignId('shipment_id');
            $table->foreign('shipment_id')->references('id')->on('shipments');
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
        Schema::dropIfExists('ship__details');
    }
};
