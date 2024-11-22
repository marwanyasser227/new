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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            // $table->foreignId('bussines_id');
            // $table->foreign('bussines_id')->references('id')->on('businesses');
            // $table->foreignId('hub_id');
            // $table->foreignId('pilot_id');
            // $table->foreign('pilot_id')->references('id')->on('users');
            // $table->foreign('hub_id')->references('id')->on('hubs');
            $table->integer('status')->default(0)->comment('0 => pending , 1 => processing , 2 => outForDeliver , 3 => completed , 4 => refund  ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
