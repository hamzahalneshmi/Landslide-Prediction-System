<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensed_items', function (Blueprint $table) {
            $table->bigIncrements('Sensor_Type_ID');
            $table->bigInteger('Sensor_ID')->unsigned();
            $table->string('Sensor_Type_Name');
            $table->double('Max_Value', 8, 2);
            $table->double('Min_Value', 8, 2);
            $table->string('Value_Measurement_Unit');
            $table->string('Warning_Value');
            $table->foreign('Sensor_ID')->references('Sensor_ID')->on('sensors');
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
        Schema::dropIfExists('sensed_items');
    }
}
