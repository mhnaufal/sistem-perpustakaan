<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function viewLogin(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required | email',
            'password' => 'required | min:8'
        ]);

        if ($validator->fails()) {
            return redirect('login')->with('error', 'Gunakan email yang valid dan panjang password minimal 8 karakter!');
        }

        if (Auth::guard('anggota')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('view.books');
        }
        elseif (Auth::guard('petugas')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // return redirect()->intended('books');
            return redirect()->route('view.books');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('success', 'Logout berhasil');
    }
}
