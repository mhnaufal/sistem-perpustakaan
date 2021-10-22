<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\DetailTransaksi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        if (Auth::guard('petugas')->check() || Auth::guard('anggota')->check()) {
            $user = Auth::guard('petugas')->user()->nama ?? Auth::guard('anggota')->user()->nama ?? 'Mawar';

            $statistic = $this->getStatistic($request);
            $totalBuku = $statistic['total_buku'];
            $totalAnggota = $statistic['total_anggota'];
            $totalPeminjaman = $statistic['total_peminjaman'];
            $totalPengembalian = $statistic['total_pengembalian'];

            $loansReturns = $this->getLoanReturn($request);

            return view('dashboard', compact('user', 'totalBuku', 'totalAnggota', 'totalPeminjaman', 'totalPengembalian', 'loansReturns'));
        } else {
            return redirect('login')->with('error', '❌ Anda belum login!');
        }
    }

    public function getStatistic(Request $request)
    {
        $countAllBooks = Buku::count();
        $countAllMembers = Anggota::count();
        $countAllLoans = Peminjaman::count();
        $countAllReturns = DetailTransaksi::count();

        return [
            'total_buku' => $countAllBooks,
            'total_anggota' => $countAllMembers,
            'total_peminjaman' => $countAllLoans,
            'total_pengembalian' => $countAllReturns,
        ];
    }

    public function getLoanReturn(Request $request)
    {
        $loansReturns = DB::table('peminjamans')->join('detail_transaksis', 'peminjamans.idtransaksi', '=', 'detail_transaksis.idtransaksi')->join('anggotas', 'peminjamans.nim', '=', 'anggotas.nim')->join('bukus', 'detail_transaksis.idbuku', '=', 'bukus.idbuku')->get();

        return $loansReturns;
    }
}
