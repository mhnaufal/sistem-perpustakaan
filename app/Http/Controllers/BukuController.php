<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    /* Menampilkan semua daftar buku yang ada */
    public function showAllBooks(Request $request)
    {
        $bukus = Buku::get();
        
        if (Auth::guard('anggota')->check() || Auth::guard('petugas')->check()) {
            $user = Auth::guard('petugas')->user()->nama ?? Auth::guard('anggota')->user()->nama ?? 'Mawar';
            return view('daftarBuku', compact('bukus', 'user'));
        } else {
            return redirect('login')->with('error', '❌ Anda belum login!');
        }
    }

    /* Menampilkan halaman pembuatan buku baru */
    public function viewCreateBook(Request $request)
    {
        if (Auth::guard('petugas')->check()) {
            $categories = Kategori::get();
            $user = Auth::guard('petugas')->user()->nama ?? 'Mawar';

            return view('tambahBuku', compact('categories', 'user'));
        } else {
            return back()->with('error', '👮 Hanya petugas yang bisa menambah buku!');
        }
    }

    /* Proses membuat buku baru */
    public function createBook(Request $request)
    {
        $isbn = $request->isbn;
        $judul = $request->judul;
        $kategori = $request->kategori;
        $pengarang = $request->pengarang;
        $penerbit = $request->penerbit;
        $kota = $request->kota;
        $editor = $request->editor;
        $gambar = $request->file_gambar;
        $jumlah = $request->stok;
        $stok = $request->stok_tersedia;

        $book = new Buku();
        $book->isbn = $isbn;
        $book->judul = $judul;
        $book->kategori = $kategori;
        $book->pengarang = $pengarang;
        $book->penerbit = $penerbit;
        $book->kota = $kota;
        $book->editor = $editor;
        $book->gambar = $gambar;
        $book->jumlah = $jumlah;
        $book->stok = $stok;


        try {
            $book->save();
            return redirect()->route('view.books')->with('success', '✔️ Data buku berhasil ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->route('view.books')->with('error', '❌ Gagal menambahkan data buku!');
        }
    }

    /* Menampilkan halaman edit buku */
    public function viewEditBook(Request $request, $id)
    {
        if (Auth::guard('petugas')->check()) {
            $categories = Kategori::get();
            $user = Auth::guard('petugas')->user()->nama ?? 'Mawar';
            $book = Buku::where('idbuku', $id)->first();

            return view('editBuku', compact('book', 'categories', 'user'));
        } else {
            return back()->with('error', '👮 Hanya petugas yang bisa mengedit buku!');
        }

    }

    /* Proses pengeditan buku */
    public function editBook(Request $request, $id)
    {
        $book = Buku::find($id);

        try {
            $book->update($request->all());
            return redirect()->route('view.books')->with('success', '✔️ Data buku berhasil diperbarui!');
        } catch (\Throwable $th) {
            return redirect()->route('view.books')->with('error', '❌ Gagal memperbarui data buku!');
        }
    }

    /* Menampilkan halaman hapus buku */
    public function viewDeleteBook(Request $request, $id)
    {
        if (Auth::guard('petugas')->check()) {
            $categories = Kategori::get();
            $user = Auth::guard('petugas')->user()->nama ?? 'Mawar';
            $book = Buku::find($id);

            return view('hapusBuku', compact('book', 'user'));
        } else {
            return back()->with('error', '👮 Hanya petugas yang bisa menghapus buku!');
        }
    }

    /* Proses menghapus buku */
    public function deleteBook(Request $request, $id)
    {
        $book = Buku::find($id);

        try {
            $book->delete();
            return redirect()->route('view.books')->with('success', '✔️ Data buku berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect()->route('view.books')->with('error', '❌ Gagal menghapus data buku!');
        }
    }
}
