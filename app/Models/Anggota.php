<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Anggota extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'anggotas';

    protected $primaryKey = 'nim';

    public $timestamps = false;

    protected $fillable = [
        'nim',
        'nama',
        'password',
        'alamat',
        'kota',
        'email',
        'no_telp',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
