<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('addon_name')->nullable();
            $table->integer('days')->unsigned();
            $table->decimal('price')->unsigned();
            $table->decimal('srsprice')->unsigned();
            $table->string('currency')->nullable();
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('style')->nullable();
            $table->string('overview',990)->nullable();
            $table->string('addon_highlight',990)->nullable();
            $table->string('physical_rating')->nullable();
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
        Schema::dropIfExists('addons');
    }
}
