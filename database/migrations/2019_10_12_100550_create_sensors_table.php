<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->bigIncrements('Sensor_ID');
            $table->string('Sensor_Name');
            $table->bigInteger('Monitored_Location_ID')->unsigned();
            $table->string('Latitude');
            $table->string('Longitude');
            $table->dateTime('Installation_Time');
            $table->foreign('Monitored_Location_ID')->references('Monitored_Location_ID')->on('monitored_locations');
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
        Schema::dropIfExists('sensors');
    }
}
