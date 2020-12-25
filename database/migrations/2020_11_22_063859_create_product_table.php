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
            $table->string('material')->nullable();             // Chất liệu
            $table->string('strap_material')->nullable();       // Chất liệu dây đeo
            $table->string('patterns')->nullable();             // Hoa văn
            $table->integer('locktype')->nullable();            // Kiểu khóa
            $table->integer('quantity')->nullable();            // Số lượng
            $table->string('number_compartments')->nullable();  // số ngăn
            $table->string('dimensions')->nullable();           // Kích thước
            $table->string('color')->nullable();                // Màu 
            $table->integer('discount')->nullable();            
            $table->text('content')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->integer('idcat')->unsigned()->nullable();
            $table->foreign('idcat')->references('id')->on('category');
            $table->integer('idbra')->unsigned()->nullable();
            $table->foreign('idbra')->references('id')->on('brand');
            $table->integer('idsize')->unsigned()->nullable();
            $table->foreign('idsize')->references('id')->on('size');
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
