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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('phone')->nullable(); 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //Users: 1.- Admin, 2.- Doctors, 3.- Employees, 4.- Patients
            $table->unsignedBigInteger('type_user')->default(4);
            $table->unsignedBigInteger('role_id')->default(3);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
