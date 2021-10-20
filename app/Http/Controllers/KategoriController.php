<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    /* Menampilkan semua daftar kategori yang ada */
    public function showAllCategories(Request $request)
    {
        $categories = Kategori::get();
        
        if (Auth::guard('anggota')->check() || Auth::guard('petugas')->check()) {
            $user = Auth::guard('petugas')->user()->nama ?? Auth::guard('anggota')->user()->nama ?? 'Mawar';
            return view('daftarKategori', compact('categories', 'user'));
        } else {
            return redirect('login')->with('error', 'Anda belum login!');
        }
    }
}
