<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitializationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initializations', function (Blueprint $table) {
            $table->bigIncrements('Initialization_ID');
            $table->bigInteger('Sensor_ID')->unsigned()->nullable();
            $table->bigInteger('Sensor_Type_ID')->unsigned();
            $table->double('High_Risk_Top', 8, 2);
            $table->double('High_Risk_Bottom', 8, 2);
            $table->double('Medium_Risk_Top', 8, 2);
            $table->double('Medium_Risk_Bottom', 8, 2);
            $table->double('Low_Risk_Top', 8, 2);
            $table->double('Low_Risk_Bottom', 8, 2);
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
        Schema::dropIfExists('initializations');
    }
}
