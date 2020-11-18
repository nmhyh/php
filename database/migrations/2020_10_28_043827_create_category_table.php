<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // MaLoaiSP int IDENTITY(1000,1) PRIMARY KEY,
        // TenLSP nvarchar(50),
        // NgayTao datetime null,
        // TrangThai int not null
        Schema::create('category', function (Blueprint $table) {
            $table->engine = "InnoDB";
			$table->Increments('id')->unsigned();
            $table->string('name');
            $table->text('image')->nullable();
            $table->text('content')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('category');
    }
}
