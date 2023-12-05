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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->nullable();
            $table->text('information')->nullable();
            $table->unsignedInteger('phone')->nullable();
            $table->unsignedBigInteger('consulting_room_id')->nullable();
            $table->unsignedBigInteger('medical_especiality_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('status');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
