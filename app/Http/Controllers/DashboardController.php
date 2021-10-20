<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = Auth::guard('petugas')->user()->nama ?? Auth::guard('anggota')->user()->nama ?? 'Mawar';
        
        return view('dashboard', compact('user'));
    }
}
