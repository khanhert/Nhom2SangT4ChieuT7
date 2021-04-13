<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nguoi_Dung extends Model
{
    protected $table = 'bs_nguoi_dung';
    protected $fillable = [
        'id', 'tai_khoan', 'mat_khau', 'id_loai_user', 'id_phan_quyen', 'ho_ten', 'email', 'ngay_sinh', 'dia_chi', 'diem_tich_luy', 'ngay_dang_ky', 'thoi_gian_dang_nhap', 'active_code', 'avatar', 'so_lan_reset', 'dien_thoai'
    ];
   
}