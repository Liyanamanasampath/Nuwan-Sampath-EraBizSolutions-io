<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->unsignedBigInteger('doctor_id')->primary();
            $table->string('name');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('specialty_id');
            $table->unsignedBigInteger('hospital_id');
            $table->timestamps();
            $table->foreign('country_id')->references('country_id')->on('countries');
            $table->foreign('state_id')->references('state_id')->on('states');
            $table->foreign('specialty_id')->references('specialty_id')->on('specialties');
            $table->foreign('hospital_id')->references('hospital_id')->on('hospitals');
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
}
