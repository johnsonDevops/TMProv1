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
        Schema::create('a_party_hotels', function (Blueprint $table) {
            $table->id();
            // 
            $table->boolean('is_active')->default(true);
            $table->string('name');
            $table->string('addr')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('poc_name')->nullable();
            $table->string('poc_phone')->nullable();
            $table->string('url')->nullable();
            $table->text('notes')->nullable();
            // 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_party_hotels');
    }
};
