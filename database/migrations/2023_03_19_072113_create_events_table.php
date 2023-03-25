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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            // 
            $table->unsignedbigInteger('venue_id')->nullable();
            // 
            $table->boolean('is_active')->nullable()->default(true);
            $table->date('date')->nullable();
            $table->string('day_type')->nullable();
            $table->string('name')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            // 
            $table->foreign('venue_id')->references('id')->on('venues');
            // 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
