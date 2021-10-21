<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    /* Menampilkan semua daftar kategori yang ada */
    public function showAllCategories(Request $request)
    {
        $categories = Kategori::get();
        
        if (Auth::guard('anggota')->check() || Auth::guard('petugas')->check()) {
            $user = Auth::guard('petugas')->user()->nama ?? Auth::guard('anggota')->user()->nama ?? 'Mawar';
            return view('daftarKategori', compact('categories', 'user'));
        } else {
            return redirect('login')->with('error', '❌ Anda belum login!');
        }
    }

    /* Menampilkan halaman tambah kategori */
    public function viewCreateCategory(Request $request)
    {
        if (Auth::guard('petugas')->check()) {
            $categories = Kategori::get();
            $user = Auth::guard('petugas')->user()->nama ?? 'Mawar';

            return view('tambahKategori', compact('categories', 'user'));
        } else {
            return back()->with('error', '👮 Hanya petugas yang bisa menambah kategori!');
        }
    }

    /* Proses membuat kategori baru */
    public function createCategory(Request $request)
    {
        $nama = $request->kategori;

        $category = new Kategori();
        $category->nama = $nama;

        try {
            $category->save();
            return redirect()->route('view.categories')->with('success', '✔️ Kategori berhasil ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->route('view.categories')->with('error', '❌ Gagal menambahkan kategori!');
        }
    }

    /* Menampilkan halaman edit kategori */
    public function viewEditCategory(Request $request, $id)
    {
        if (Auth::guard('petugas')->check()) {
            $user = Auth::guard('petugas')->user()->nama ?? 'Mawar';
            $category = Kategori::where('idkategori', $id)->first();

            return view('editKategori', compact('category', 'user'));
        } else {
            return back()->with('error', '👮 Hanya petugas yang bisa mengedit kategori!');
        }

    }

    /* Proses pengeditan kategori */
    public function editCategory(Request $request, $id)
    {
        $category = Kategori::where('idkategori', $id);

        try {
            $category->update(['nama' => $request->kategori]);
            return redirect()->route('view.categories')->with('success', '✔️ Kategori berhasil diperbarui!');
        } catch (\Throwable $th) {
            return redirect()->route('view.categories')->with('error', '❌ Gagal memperbarui kategori!');
        }
    }

    /* Menampilkan halaman hapus kategori */
    public function viewDeleteCategory(Request $request, $id)
    {
        if (Auth::guard('petugas')->check()) {
            $categories = Kategori::get();
            $user = Auth::guard('petugas')->user()->nama ?? 'Mawar';

            $category = Kategori::find($id);

            return view('hapusKategori', compact('category', 'user'));
        } else {
            return back()->with('error', '👮 Hanya petugas yang bisa menghapus kategori!');
        }
    }

    /* Proses menghapus kategori */
    public function deleteCategory(Request $request, $id)
    {
        $category = Kategori::find($id);

        try {
            $category->delete();
            return redirect()->route('view.categories')->with('success', '✔️ Kategori berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect()->route('view.categories')->with('error', '❌ Gagal menghapus kategori!');
        }
    }
}
