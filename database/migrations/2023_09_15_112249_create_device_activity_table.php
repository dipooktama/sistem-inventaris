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
        Schema::create('device_activity', function (Blueprint $table) {
            //$table->id();
            $table->string('id')->primary();
            $table->string('device_uuid');
            $table->string('activities');
            $table->integer('minutes');
            $table->enum('time_category', ['daily', 'weekly', 'monthly', 'yearly']);
            $table->integer('total_minutes_in_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_activity');
    }
};
