<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loai_Tin_Tuc extends Model
{
    protected $table = 'bs_loai_chi_tiet';
    protected $fillable = [
        'id', 'ten_loai_tin', 'alias'
    ];
   
}