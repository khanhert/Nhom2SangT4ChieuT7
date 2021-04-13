<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loai_Nguoi_Dung extends Model
{
    protected $table = 'loai_nguoi_dung';
    protected $fillable = [
        'id', 'ten_loai_nguoi_dung'
    ];
   
}