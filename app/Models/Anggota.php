<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggotas';

    protected $primaryKey = 'nim';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'password',
        'alamat',
        'kota',
        'email',
        'no_telp',
    ];

}
