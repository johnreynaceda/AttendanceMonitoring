<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('department_id');
            $table->string('employee_no');
            $table->string('rfid_no');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->string('sex');
            $table->string('civil_status');
            $table->string('designation');
            $table->date('date_of_hire');
            $table->string('email');
            $table->string('contact');
            $table->string('address');
            $table->string('profile_path');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};