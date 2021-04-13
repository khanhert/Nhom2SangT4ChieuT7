<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_don_hang',255);
            $table->double('tong_tien');
            $table->dateTime('ngay_dat');
            $table->string('id_nguoi_dung',255);
            $table->string('ho_ten_nguoi_nhan',255);
            $table->string('email_nguoi_nhan',255);
            $table->string('so_dien_thoai_nguoi_nhan',255);
            $table->tinyInteger('trang_thai');
            $table->string('dia_chi_nguoi_nhan',255);
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
        Schema::dropIfExists('don_hang');
    }
}
