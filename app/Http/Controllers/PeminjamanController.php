<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\DetailTransaksi;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function showLoans(Request $request)
    {
        $books = Buku::get();
        $members = Anggota::get();

        if (Auth::guard('petugas')->check()) {
            $user = Auth::guard('petugas')->user()->nama ?? 'Mawar';
            return view('peminjaman', compact('user', 'books', 'members'));
        } else {
            return redirect('dashboard')->with('error', '👮 Hubungi petugas untuk melakukan peminjaman buku!');
        }
    }

    public function createLoan(Request $request)
    {
        $findBook = Buku::where('judul', $request->buku)->first();

        if ($findBook->stok_tersedia <= 0) {
            return redirect()->route('view.loans')->with('error', "❌ Stok buku {$request->buku} sedang kosong, silakan pinjam buku yang lain!");
        }
        
        $findAnggota = Anggota::where('nim', $request->nim)->first();

        if (!$findAnggota) {
            return redirect()->route('view.loans')->with('error', "❌ Tidak ada anggota dengan nim tersebut!");
        }

        $countLoans = DB::table('peminjamans')->join('detail_transaksis', 'peminjamans.idtransaksi', '=', 'detail_transaksis.idtransaksi')->where('tgl_kembali', null)->where('nim', $request->nim)->count();
        
        if ($countLoans >= 2) {
            return redirect()->route('view.loans')->with('error', "❌ Anggota tersebut belum mengembalikan buku, maka tidak bisa meminjam buku lagi!");
        }

        $peminjaman = new Peminjaman();
        $peminjaman->nim = $request->nim;
        $peminjaman->tgl_pinjam = Carbon::now();
        $peminjaman->total_denda = 0;
        $peminjaman->idpetugas = Auth::guard('petugas')->user()->idpetugas;

        try {
            $peminjaman->save();
        } catch(\Throwable $th) {
            return redirect()->route('view.loans')->with('error', '❌ Gagal meminjam buku!');
        }

        $detailTransaksi = new DetailTransaksi();
        $detailTransaksi->idtransaksi = $peminjaman->idtransaksi;
        $detailTransaksi->idbuku = $findBook->idbuku;
        $detailTransaksi->tgl_kembali = null;
        $detailTransaksi->denda = 0;

        try {
            $detailTransaksi->save();
            return redirect()->route('view.loans')->with('success', '✔️ Berhasil meminjam buku, selamat membaca!');
        } catch(\Throwable $th) {
            $detailTransaksi->delete();
            return redirect()->route('view.loans')->with('error', '❌ Gagal meminjam buku!');
        }
    }
}
