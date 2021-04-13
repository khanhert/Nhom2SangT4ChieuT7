<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ct_Don_Hang extends Model
{
    protected $table = 'chi_tiet_don_hang';
    protected $fillable = [
        'id', 'id_don_hang', 'id_sach', 'so_luong', 'don_gia', 'thanh_tien','created_at',
        'updated_at'
    ];
   
}