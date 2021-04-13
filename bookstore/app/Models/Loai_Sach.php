<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loai_Sach extends Model
{
    protected $table = 'loai_sach';
    protected $fillable = [
        'id', 'ten_loai_sach', 'id_loai_cha', 'sap_xep', 'trang_thai','created_at',
        'updated_at'
    ];
   
}