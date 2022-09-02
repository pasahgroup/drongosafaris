<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeparturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departures', function (Blueprint $table) {            
            $table->bigIncrements('id');
            $table->integer('tour_id')->nullable();
             $table->integer('depart_id')->nullable();
             $table->string('group_tour_category')->nullable();
            $table->decimal('price')->default(0.00);
             $table->decimal('srs')->default(0.00);
            $table->integer('seats')->default(0);
            $table->integer('booked')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('departures');
    }
}
