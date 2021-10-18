<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $primaryKey = 'idtransaksi';

    public $timestamps = false;

    protected $fillable = [
        'nim',
        'tgl_pinjam',
        'total_denda',
        'idpetugas',
    ];
}
