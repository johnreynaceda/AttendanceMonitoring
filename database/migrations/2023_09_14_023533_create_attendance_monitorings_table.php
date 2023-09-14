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
        Schema::create('attendance_monitorings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->string('time_in')->nullable();
            $table->string('time_out')->nullable();
            $table->string('morning_status')->nullable();
            $table->string('afternoon_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_monitorings');
    }
};