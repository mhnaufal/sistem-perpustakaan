<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        if (Auth::guard('petugas')->check()) {
            $user = Auth::guard('petugas')->user()->nama ?? Auth::guard('anggota')->user()->nama ?? 'Mawar';

            $statistic = $this->getStatistic($request);
            $totalBuku = $statistic['total_buku'];
            $totalAnggota = $statistic['total_anggota'];

            return view('dashboard', compact('user', 'totalBuku', 'totalAnggota'));
        } else {
            return redirect('login')->with('error', 'Anda belum login!');
        }
    }

    public function getStatistic(Request $request)
    {
        $countAllBooks = Buku::count();
        $countAllMembers = Anggota::count();

        return [
            'total_buku' => $countAllBooks,
            'total_anggota' => $countAllMembers,
        ];
    }
}
