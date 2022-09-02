<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_guides', function (Blueprint $table) {
            $table->bigIncrements('id');                     
             $table->string('first_name')->nullable();
              $table->string('last_name')->nullable();
               $table->string('phone')->nullable();
                $table->string('email')->nullable();
               $table->string('birth')->nullable();
              $table->string('nationality')->nullable();
               $table->string('photo')->nullable();
               $table->string('cv')->nullable();
            
                 $table->string('language')->nullable();
                  $table->string('other_language')->nullable();
              
                 $table->string('pin')->nullable();
                  $table->string('status')->nullable();
                 
                   $table->string('driving_license',250)->nullable();
                   $table->string('education_level',250)->nullable();
                    $table->string('professional',250)->nullable();
                   $table->string('work_experience',250)->nullable();

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
        Schema::dropIfExists('tour_guides');
    }
}
