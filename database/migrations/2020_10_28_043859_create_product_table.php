<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // MaSanPham int IDENTITY(1000,1) PRIMARY KEY,
        // TenSP nvarchar(50) not null,
        // MaLSP int not null,
        // KichThuoc nvarchar(30) not null,
        // ChatLieu nvarchar(30) not null,
        // ChatLieuDayDeo nvarchar(30) not null,
        // KieuKhoa nvarchar(30) not null,
        // SoNgan nvarchar(30) not null,
        // KichCo nvarchar(30) not null,
        // Mau nvarchar(30) not null,
        // DonGia Money not null,
        // HinhAnh nvarchar(50),
        // NgayTao datetime null,
        // TrangThai int not null
        Schema::create('product', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->Increments('id')->unsigned();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->float('price')->nullable();
            $table->string('material')->nullable();
            $table->string('strap_material')->nullable();
            $table->integer('locktype')->nullable();
            $table->string('number_compartments')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('color')->nullable();
            $table->integer('size')->nullable();
            $table->integer('discount')->nullable();
            $table->text('content')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->integer('idcat')->unsigned()->nullable();
            $table->foreign('idcat')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
