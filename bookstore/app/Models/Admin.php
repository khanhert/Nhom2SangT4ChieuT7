<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $fillable = [
        'id', 'ho_nguoi_dung', 'ten_nguoi_dung', 'email', 'dien_thoai', 'dia_chi', 'created_at', 'updated_at'
    ];
   
}