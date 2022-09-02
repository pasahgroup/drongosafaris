<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_bodies', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('category')->unique();
          $table->string('title')->nullable();          
          $table->string('body',450)->nullable();

          $table->string('introduction',450)->nullable();
          $table->string('mission',450)->nullable();          
          $table->string('vission',450)->nullable();
          $table->string('objectives',450)->nullable();

              $table->string('address')->nullable();
              $table->string('phone')->nullable();
              $table->string('email')->nullable();
              $table->string('website')->nullable();
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
        Schema::dropIfExists('post_bodies');
    }
}
