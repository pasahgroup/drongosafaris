<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourcostsummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourcostsummaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program')->nullable();
            $table->string('season')->nullable();
            $table->string('status')->nullable();            

            $table->integer('twopax')->unsigned();
            $table->integer('threepax')->unsigned();
            $table->integer('fourpax')->unsigned();
            $table->integer('fivepax')->unsigned();
            $table->integer('sixpax')->unsigned();
             $table->integer('srs')->unsigned();
            $table->string('currency')->nullable();
                       
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('tourcostsummaries');
    }
}
