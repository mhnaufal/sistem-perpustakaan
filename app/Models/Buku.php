<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';
    
    protected $primaryKey = 'idbuku';

    protected $fillable = [
        'isbn',
        'judul',
        'idkategori',
        'pengarang',
        'penerbit',
        'kota_penerbit',
        'editor',
        'file_gambar',
        'tgl_insert',
        'tgl_update',
        'stok',
        'stok_tersedia',
    ];
}
