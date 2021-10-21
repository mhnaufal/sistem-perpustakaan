<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    
    protected $table = 'detail_transaksis';

    // protected $primaryKey = 'idtransaksi';

    public $timestamps = false;

    protected $fillable = [
        'idbuku',
        'tgl_kembali',
        'denda',
    ];
}
