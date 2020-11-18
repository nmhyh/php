<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // MaNhanVien int IDENTITY(100,1) PRIMARY KEY,
        // TenNV nvarchar(50) not null,
        // NgaySinh datetime not null,
        // GioiTinh nvarchar(10) not null,
        // SDT varchar(20) not null,
        // Email nvarchar(30) not null,
        // HinhAnh nvarchar(50),
        // ChucVu nvarchar(30) not null,
        // NgayThem datetime not null,
        // Pass nvarchar(20) not null,
        // TrangThai int not null,
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dateofbirth')->nullable();
            $table->string('sex')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->integer('position')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'status' => '1'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
