<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationInclusivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodation_inclusives', function (Blueprint $table) {
           $table->bigIncrements('id');                     
             $table->integer('inclusive_id')->nullable();
               $table->integer('tour_id')->nullable();
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
        Schema::dropIfExists('accommodation_inclusives');
    }
}
