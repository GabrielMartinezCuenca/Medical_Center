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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->date('born_date')->nullable();
            $table->double('weight')->nullable();
            $table->double('height')->nullable();
            $table->string('gender')->nullable();
            $table->double('IMC')->nullable();
            $table->double('temperature')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->string('avenue')->nullable();
            $table->unsignedInteger('number')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->text('information')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
