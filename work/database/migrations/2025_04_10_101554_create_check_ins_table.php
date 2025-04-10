<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('check_ins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->time('clock_in_time')->nullable();
            $table->time('clock_out_time')->nullable();
            $table->time('check_in_11')->nullable();
            $table->time('check_in_13')->nullable();
            $table->time('check_in_16')->nullable();
            $table->string('check_in_11_status')->default('pending'); // pending, completed, missed
            $table->string('check_in_13_status')->default('pending');
            $table->string('check_in_16_status')->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->unique(['user_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_ins');
    }
};
