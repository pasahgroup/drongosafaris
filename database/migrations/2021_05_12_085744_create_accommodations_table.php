<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('accommodation_name')->nullable();
            $table->integer('price')->unsigned();
            $table->string('currency')->nullable();
            $table->string('category')->nullable();
            $table->integer('national_standard')->default(0);
             $table->string('type')->nullable();
            $table->string('accommodation_descriptions')->nullable();
             $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('url')->nullable();
             $table->string('seo')->nullable();
            $table->integer('location_id')->unsigned();
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
        Schema::dropIfExists('accommodations');
    }
}
