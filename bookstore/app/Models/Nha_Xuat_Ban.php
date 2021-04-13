<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nha_Xuat_Ban extends Model
{
    protected $table = 'nha_xuat_ban';
    protected $fillable = [
        'id', 'ten_nha_xuat_ban', 'dia_chi', 'dien_thoai', 'email'
    ];
   
}