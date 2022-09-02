<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuickLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quick_links', function (Blueprint $table) {
             $table->bigIncrements('id');
              $table->string('page_type')->nullable();
            $table->string('quick_title')->unique();
            $table->string('quick_description',1000)->nullable();
            $table->string('url')->nullable();
            $table->string('slider',4)->default('No');
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('quick_links');
    }
}
