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
        Schema::create('customers_shipments', function (Blueprint $table) {
            $table->id();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreignId('customer_id');
            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->foreignId('shipment_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers_shipments');
    }
};
