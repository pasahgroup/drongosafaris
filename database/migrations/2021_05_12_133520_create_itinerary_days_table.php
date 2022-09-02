<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItineraryDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerary_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('itinerary_id')->unsigned();
            $table->integer('day')->unsigned();
            $table->string('itinerary_title')->nullable();

            $table->string('distance')->nullable();
            $table->string('transport')->nullable();
            $table->string('meal')->nullable();
            
            $table->string('itinerary_description',340)->nullable();
            $table->integer('destination_id')->unsigned();
            $table->integer('accommodation_id')->unsigned();
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
        Schema::dropIfExists('itinerary_days');
    }
}
