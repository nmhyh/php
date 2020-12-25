<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('id')->unsigned();
            $table->float('total')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps(); 
            $table->integer('id_customer')->unsigned()->nullable();
            $table->foreign('id_customer')->references('id')->on('customer');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
