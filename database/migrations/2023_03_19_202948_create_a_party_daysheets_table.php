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
        Schema::create('a_party_daysheets', function (Blueprint $table) {
            $table->id();
            // 
            $table->unsignedBigInteger('hotel_id_1')->nullable();
            $table->unsignedBigInteger('hotel_id_2')->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            // 
            $table->boolean('is_active')->nullable()->default(true);
            $table->text('day_type')->nullable();
            $table->text('notes')->nullable();
            // 
            $table->json('schedule')->nullable();
            //  
            $table->foreign('hotel_id_1')->references('id')->on('a_party_hotels');
            $table->foreign('hotel_id_2')->references('id')->on('a_party_hotels');
            $table->foreign('event_id')->references('id')->on('events');
            // 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_party_daysheets');
    }
};
