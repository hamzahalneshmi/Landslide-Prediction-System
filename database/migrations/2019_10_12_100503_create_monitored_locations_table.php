<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitoredLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitored_locations', function (Blueprint $table) {
            $table->bigIncrements('Monitored_Location_ID');
            $table->string('Location_Name');
            $table->string('Latitude');
            $table->string('Longitude');
            $table->double('Hight', 8, 2);
            $table->dateTime('Installation_Time');
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
        Schema::dropIfExists('monitored_locations');
    }
}
