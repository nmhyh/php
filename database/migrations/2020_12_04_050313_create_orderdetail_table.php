<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetail', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('id')->unsigned();       
            $table->timestamps();
            $table->integer('quantity')->nullable(); 
            $table->integer('status')->default(1);          
            $table->integer('id_order')->unsigned()->nullable();
            $table->foreign('id_order')->references('id')->on('order');
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
        Schema::dropIfExists('orderdetail');
    }
}
