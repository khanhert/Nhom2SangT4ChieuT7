<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Khach_Hang extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'khach_hang';
    protected $fillable = [
        'id', 'name', 'email', 'phone', 'google_id', 'email_verified_at', 'password', 'remember_token', 
    ];
   

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}