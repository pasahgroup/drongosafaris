<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();           

            $table->integer('phone')->unsigned();
            $table->string('country')->nullable();

            $table->integer('tour_id')->unsigned(); 
            $table->string('accomodation')->nullable();
            $table->integer('adults')->nullable();             
         

            $table->integer('teens')->nullable();
            $table->integer('children')->nullable();
             $table->date('days')->nullable();
             $table->date('arrival_date')->nullable();
             $table->date('travel_date')->nullable();
              $table->date('end_date')->nullable();

               $table->string('status')->nullable();
              $table->string('pin')->nullable();

             $table->string('enquiry')->nullable();
              $table->string('hear_about_us')->nullable();
              
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
        Schema::dropIfExists('enquiries');
    }
}
