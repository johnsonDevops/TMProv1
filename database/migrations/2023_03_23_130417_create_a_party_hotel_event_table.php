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
        Schema::create('a_party_hotel_event', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('a_party_hotel_id');
            // 
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('a_party_hotel_id')->references('id')->on('a_party_hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_party_hotel_event');
    }
};
