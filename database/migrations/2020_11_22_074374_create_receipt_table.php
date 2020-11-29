<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('id')->unsigned();
            $table->string('name');
            $table->float('total')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps(); 
            $table->integer('idsup')->unsigned()->nullable();
            $table->foreign('idsup')->references('id')->on('supplier');
            $table->integer('iduser')->unsigned()->nullable();
            $table->foreign('iduser')->references('id')->on('users');       
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipt');
    }
}
