<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receiptdetail', function (Blueprint $table) { 
            $table->engine = "InnoDB";
            $table->Increments('id')->unsigned();       
            $table->timestamps();
            $table->integer('quantity')->nullable();
            $table->float('price')->nullable();            
            $table->integer('id_receipt')->unsigned()->nullable();
            $table->foreign('id_receipt')->references('id')->on('receipt');
            $table->integer('id_product')->unsigned()->nullable();
            $table->foreign('id_product')->references('id')->on('product');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receiptdetail');
    }
}
