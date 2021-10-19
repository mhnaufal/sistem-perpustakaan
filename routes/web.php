<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Homepage */
Route::get('/', function () {
    return view('welcome');
});

/* Login */
// NOTE: ini hanya sementara karena Controlle belum dibuat
Route::get('/login', function () {
    return view('login');
})->name('login');

/* Petugas */

/* Anggota */
Route::get('/members', function () {
    return view('daftarAnggota');
});

/* Buku */
Route::get('/books', [BukuController::class, 'showAllBooks'])->name('view.books');
Route::post('/books', [BookController::class, 'createBook'])->name('add.book');

Route::get('/add-book', [BukuController::class, 'viewCreateBook'])->name('view.add.book');

Route::get('/edit-book', [BukuController::class, 'viewEditBook'])->name('view.edit.book');

/* Kategori */
Route::get('/categories', function () {
    return view('daftarKategori');
});