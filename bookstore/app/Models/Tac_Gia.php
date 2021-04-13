<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tac_Gia extends Model
{
    protected $table = 'tac_gia';
    protected $fillable = [
        'id', 'ten_tac_gia', 'ngay_sinh', 'gioi_thieu', 'created_at', 'updated_at'
    ];
   
}