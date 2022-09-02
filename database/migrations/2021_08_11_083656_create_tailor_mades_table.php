<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTailorMadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tailor_mades', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('email')->nullable();
             $table->integer('phone')->nullable();
            $table->date('arrival_date')->date();
           $table->integer('days')->nullable();
            $table->integer('adults')->nullable();           
            $table->integer('teens')->nullable();
            $table->integer('children')->nullable();
            
            $table->string('destination')->nullable();
            $table->string('tour_type')->nullable();
            $table->string('accommodation')->nullable();

          $table->decimal('min_budget')->nullable();
         $table->decimal('max_budget')->nullable();
        $table->decimal('calculated_cost')->nullable();
        $table->decimal('total_amount_paid')->nullable();
        $table->decimal('amount_remain')->nullable();
        $table->string('currency')->nullable();
        $table->string('physical_rating')->nullable();

               $table->integer('pin')->unsigned();
               $table->string('status')->nullable();
               $table->string('payee_status')->nullable();
                 $table->string('attachment')->nullable();
            $table->date('end_date')->date();
             $table->string('other_information')->nullable();
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
        Schema::dropIfExists('tailor_mades');
    }
}
