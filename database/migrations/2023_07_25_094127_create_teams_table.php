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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('acronym', 50);
            $table->string('name', 150);
            $table->string('full_name')->nullable();
            $table->string('stadium')->nullable();
            $table->string('country', 10)->nullable();
            $table->json('websites')->nullable();
            $table->json('phone_numbers')->nullable();
            $table->date('membership_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
