<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /* Menampilkan semua daftar buku yang ada */
    public function showAllBooks(Request $request)
    {
        $bukus = Buku::get();
        $user = $request->name ?? "Mawar";
        return view('daftarBuku', compact('bukus', 'user'));
    }

    /* Menampilkan halaman pembuatan buku baru */
    public function viewCreateBook(Request $request)
    {
        $categories = Kategori::get();
        $user = $request->name ?? "Mawar";
        return view('tambahBuku', compact('categories', 'user'));
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
            return redirect()->route('view.books')->with('success', 'Data buku berhasil ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->route('view.books')->with('error', 'Gagal menambahkan data buku!');
        }
    }

    public function viewEditBook(Request $request, $id)
    {
        $categories = Kategori::get();
        $user = $request->name ?? "Mawar";
        $book = Buku::where('idbuku', $id)->first();

        return view('editBuku', compact('book', 'categories', 'user'));
    }

    public function editBook(Request $request, $id)
    {
        $book = Buku::find($id);

        try {
            $book->update($request->all());
            return redirect()->route('view.books')->with('success', 'Data buku berhasil diperbarui!');
        } catch (\Throwable $th) {
            return redirect()->route('view.books')->with('error', 'Gagal memperbarui data buku!');
        }
    }
}
