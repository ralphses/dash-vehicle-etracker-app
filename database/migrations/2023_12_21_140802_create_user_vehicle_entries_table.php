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
        Schema::create('user_vehicle_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_vehicle_id');
            $table->timestamp('time_out')->nullable();
            $table->string('status')->default('IN');
            $table->unsignedBigInteger('parking_space_id');
            $table->string('driver_name')->nullable();
            $table->timestamps();

            $table->foreign('user_vehicle_id')->references('id')->on('user_vehicles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('parking_space_id')->references('id')->on('parking_spaces')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_vehicle_entries');
    }
};
