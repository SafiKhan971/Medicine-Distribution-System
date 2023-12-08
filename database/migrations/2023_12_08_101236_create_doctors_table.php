<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('nationality')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('medical_license_picture')->nullable();
            $table->string('medical_license_no')->nullable();
            $table->string('specialization')->nullable();
            $table->integer('experience')->nullable();
            $table->string('board_certifications')->nullable();
            $table->string('clinic_name')->nullable();
            $table->string('clinic_email')->nullable();
            $table->string('clinic_phone')->nullable();
            $table->string('clinic_address')->nullable();
            $table->string('days_week')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
