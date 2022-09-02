<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tour_name')->unique();
            $table->integer('days')->unsigned();
            $table->decimal('cost')->unsigned();
            $table->decimal('price')->unsigned();
            $table->string('currency')->nullable();
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('style')->nullable();
             $table->string('main',24)->default('Program');
            $table->string('tour_code')->nullable();
            $table->string('tour_circuit')->nullable();
            $table->string('overview',990)->nullable();
            $table->string('tour_highlight',990)->nullable();
            $table->string('physical_rating')->nullable();
            $table->string('popular_experience')->nullable();
            $table->string('seo')->nullable();
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
        Schema::dropIfExists('programs');
    }
}
