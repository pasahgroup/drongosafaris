<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_bodies', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('title')->nullable();
           $table->string('blog_category')->nullable();
            $table->string('blog_body')->nullable();
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
        Schema::dropIfExists('blog_bodies');
    }
}
