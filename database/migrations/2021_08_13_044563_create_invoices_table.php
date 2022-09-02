<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->nullable();
            $table->integer('tour_id')->nullable();
            $table->decimal('unit_price')->nullable();
           $table->decimal('total_price')->nullable();           
            $table->decimal('addon_price')->nullable();
            $table->decimal('total_addon_price')->nullable();
            $table->decimal('total_cost')->nullable();

             $table->decimal('total_amount_paid')->nullable();
             $table->decimal('amount_remain')->nullable();
            $table->string('currency')->nullable();
             $table->string('payee_status')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
