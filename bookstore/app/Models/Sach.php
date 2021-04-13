<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    protected $table = 'sach';
    protected $fillable = [
        'id', 
        'ten_sach',
        'ten_url' ,
        'id_tac_gia',
        'gioi_thieu', 
        'id_loai_sach', 
        'id_nha_xuat_ban',
        'ngay_xuat_ban',
        'trang_thai', 
        'hinh', 
        'don_gia', 
        'created_at',
        'updated_at'
        
        
    ];
   
}
