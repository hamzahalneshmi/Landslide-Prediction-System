<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewSensorDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_sensor_data', function (Blueprint $table) {
            $table->bigIncrements('Recored_ID');
            $table->bigInteger('Sensor_ID')->unsigned();
            $table->bigInteger('Sensor_Type_ID')->unsigned();
            $table->string('Data');
            $table->dateTime('Time');
            $table->longText('Note')->nullable();	
            $table->foreign('Sensor_ID')->references('Sensor_ID')->on('sensors');
            $table->foreign('Sensor_Type_ID')->references('Sensor_Type_ID')->on('sensed_items');

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
        Schema::dropIfExists('new_sensor_data');
    }
}
