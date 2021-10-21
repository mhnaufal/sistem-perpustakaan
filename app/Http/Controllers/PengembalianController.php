<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    public function showReturns(Request $request)
    {
        if (Auth::guard('petugas')->check()) {
            $loanedBooks = DB::table('peminjamans')->join('detail_transaksis', 'peminjamans.idtransaksi', '=', 'detail_transaksis.idtransaksi')->join('anggotas', 'peminjamans.nim', '=', 'anggotas.nim')->join('bukus', 'detail_transaksis.idbuku', '=', 'bukus.idbuku')->get();

            $user = Auth::guard('petugas')->user()->nama ?? 'Mawar';

            return view('pengembalian', compact('loanedBooks', 'user'));
        } elseif (Auth::guard('anggota')->check()) {
            $currentAnggota = Auth::guard('anggota')->user();

            $loanedBooks = DB::table('peminjamans')->join('detail_transaksis', 'peminjamans.idtransaksi', '=', 'detail_transaksis.idtransaksi')->join('anggotas', 'peminjamans.nim', '=', 'anggotas.nim')->join('bukus', 'detail_transaksis.idbuku', '=', 'bukus.idbuku')->where('peminjamans.nim', $currentAnggota->nim)->get();

            $user = Auth::guard('anggota')->user()->nama ?? 'Mawar';

            return view('pengembalian', compact('loanedBooks', 'user'));
        } else {
            return redirect('dashboard')->with('error', '❌ Tidak diperbolehkan mengakses halaman ini!');
        }
    }

    public function createReturn(Request $request)
    {
        if (!Auth::guard('anggota')->check()) {
            return redirect()->route('view.returns')->with('error', '🙍‍♀️ Hanya anggota yang bisa melakukan pengembalian buku!');
        }

        $currentAnggota = Auth::guard('anggota')->user();

        $loanedBooks = Peminjaman::join('detail_transaksis', 'peminjamans.idtransaksi', '=', 'detail_transaksis.idtransaksi')->join('anggotas', 'peminjamans.nim', '=', 'anggotas.nim')->join('bukus', 'detail_transaksis.idbuku', '=', 'bukus.idbuku')->where('peminjamans.nim', $currentAnggota->nim)->where('detail_transaksis.idtransaksi', $request->idtransaksi)->first();

        if ($loanedBooks->tgl_kembali != null) {
            return redirect()->route('view.returns')->with('error', 'Buku sudah dikembalikan!');
        }

        $tgl_pinjam = Carbon::parse($loanedBooks->tgl_pinjam);
        $tgl_kembali = Carbon::now();
        $dateDifference = $tgl_pinjam->diffInDays($tgl_kembali);

        $denda = 0;
        if ($dateDifference > 14) {
            $denda = ($dateDifference - 14) * 1000;
        }

        $findPeminjaman = Peminjaman::where('idtransaksi', $request->idtransaksi)->first();
        $findPeminjaman->total_denda = $denda;

        try {
            DetailTransaksi::where('idtransaksi', $request->idtransaksi)->update(array('denda' => $denda, 'tgl_kembali' => $tgl_kembali));
            $findPeminjaman->update();
            return redirect()->route('view.returns')->with('success', '✔️ Berhasil mengembalikan buku!');
        } catch (\Throwable $th) {
            return redirect()->route('view.returns')->with('error', '❌ Gagal mengembalikan buku!');
        }
    }
}
