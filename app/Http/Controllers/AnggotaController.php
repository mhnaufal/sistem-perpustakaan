<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    /* Menampilkan semua anggota yang terdaftar */
    public function showAllMembers(Request $request)
    {
        // $members = Anggota::get();
        $members = Http::get('https://pbp-siperpus.herokuapp.com/anggota')->collect();

        if (Auth::guard('petugas')->check()) {
            $user = Auth::guard('petugas')->user()->nama ?? 'Mawar';
            return view('daftarAnggota', compact('members', 'user'));
        } else {
            return redirect('dashboard')->with('error', '👮 Hanya petugas yang bisa mengakses menu anggota!');
        }
    }

    /* Menampilkan form tambah anggota baru */
    public function viewCreateMember(Request $request)
    {
        if (Auth::guard('petugas')->check()) {
            $members = Anggota::get();
            $user = Auth::guard('petugas')->user()->nama ?? 'Mawar';

            return view('tambahAnggota', compact('members', 'user'));
        } else {
            return back()->with('error', '👮 Hanya petugas yang bisa menambahkan anggota!');
        }
    }

    /* Proses membuat anggota baru */
    public function createMember(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required | min: 14 | numeric',
            'password' => 'required | min: 8',
            'no_telp' => 'numeric',
            'email' => 'email',
        ]);

        if ($validator->fails()) {
            return redirect()->route('view.add.member')->with('error', '❌ Silakan masukkan data dengan benar!');
        }

        $isNimAvailable = Anggota::where('nim', $request->nim)->first();
        if ($isNimAvailable) {
            return redirect()->route('view.add.member')->with('error', '❌ NIM tersebut telah terdaftar sebagai anggota!');
        }

        $isEmailAvailable = Anggota::where('email', $request->email)->first();
        if ($isEmailAvailable) {
            return redirect()->route('view.add.member')->with('error', '❌ Email tersebut telah terdaftar sebagai anggota!');
        }
        
        $isPhoneAvailable = Anggota::where('no_telp', $request->no_telp)->first();
        if ($isPhoneAvailable) {
            return redirect()->route('view.add.member')->with('error', '❌ Nomor hp tersebut telah terdaftar sebagai anggota!');
        }

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
        $member->password = Hash::make($password);
        $member->alamat = $alamat;
        $member->kota = $kota;
        $member->email = $email;
        $member->no_telp = $no_telp;

        try {
            $api = Http::withHeaders(['Content-Type' => 'application/json'])->post('https://pbp-siperpus.herokuapp.com/anggota', [
                'id' => $request->nim,
                'nama' => $request->nama,
                'password' => $request->password,
                'alamat' => $request->alamat,
                'kota' => $request->kota,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
            ]);
            $member->save();
            return redirect()->route('view.members')->with('success', '✔️ Data anggota berhasil ditambahkan!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('view.add.member')->with('error', '❌ Gagal menambahkan data anggota!');
        }
    }
}
