<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        if (Auth::guard('petugas')->check()) {
            $user = Auth::guard('petugas')->user()->nama ?? Auth::guard('anggota')->user()->nama ?? 'Mawar';
            return view('dashboard', compact('user'));
        } else {
            return redirect('login')->with('error', 'Anda belum login!');
        }
        
    }
}
