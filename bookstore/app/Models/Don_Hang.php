<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Don_hang extends Model
{
    protected $table = 'don_hang';
    protected $fillable = [
        'id', 'tong_tien', 'ngay_dat', 'id_khach_hang', 'tinh_trang', 'created_at', 'updated_at'
    ];
   
}