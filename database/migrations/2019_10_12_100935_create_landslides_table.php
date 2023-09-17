<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandslidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landslides', function (Blueprint $table) {
            $table->bigIncrements('Landslide_ID');
            $table->string('Landslide_Name');
            $table->bigInteger('Monitored_Location_ID')->unsigned();
            $table->string('Landslide_Type');
            $table->longText('Description')->nullable();
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
        Schema::dropIfExists('landslides');
    }
}
