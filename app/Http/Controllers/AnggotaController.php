<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    public function showAllMembers(Request $request)
    {
        $members = Anggota::get();

        if (Auth::guard('petugas')->check()) {
            $user = Auth::guard('petugas')->user()->nama ?? 'Mawar';
            return view('daftarAnggota', compact('members', 'user'));
        } else {
            return redirect('login')->with('error', 'Anda belum login!');
        }
    }
}
