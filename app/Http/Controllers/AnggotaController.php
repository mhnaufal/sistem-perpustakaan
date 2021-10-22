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
            return redirect('login')->with('error', '❌ Anda belum login!');
        }
    }

    public function viewCreateMember(Request $request)
    {
        if (Auth::guard('petugas')->check()) {
            $members = Anggota::get();
            $user = Auth::guard('petugas')->user()->nama ?? 'Mawar';

            return view('tambahAnggota', compact('members', 'user'));
        } else {
            return back()->with('error', '👮 Hanya petugas yang bisa menambah anggota!');
        }
    }

    /* Proses membuat buku baru */
    public function createMember(Request $request)
    {
        $nim = $request->nim;
        $nama = $request->nama;
        $password = $request->password;
        $alamat = $request->alamat;
        $kota = $request->kota;
        $email = $request->email;
        $no_telp = $request->no_telp;

        $member = new Anggota();
        $member->nim = $nim;
        $member->nama = $nama;
        $member->password = bcrypt($password);
        $member->alamat = $alamat;
        $member->kota = $kota;
        $member->email = $email;
        $member->no_telp = $no_telp;

        try {
            $member->save();
            return redirect()->route('view.members')->with('success', '✔️ Data anggota berhasil ditambahkan!');
        } catch (\Throwable $th) {
            dd($th);    
            return redirect()->route('view.members')->with('error', '❌ Gagal menambahkan data anggota!');
        }
    }
}
