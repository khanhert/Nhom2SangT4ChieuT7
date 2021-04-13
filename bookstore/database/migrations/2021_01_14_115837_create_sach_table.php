<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sach', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_sach',255);
            $table->string('ten_url',200);
            $table->integer('id_tac_gia');
            $table->text('gioi_thieu');
            $table->integer('id_loai_sach');
            $table->integer('id_nha_xuat_ban');
            $table->string('ngay_xuat_ban',50);
            $table->tinyInteger('trang_thai');
            $table->string('hinh',255);
            $table->double('don_gia');
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
        Schema::dropIfExists('sach');
    }
}
