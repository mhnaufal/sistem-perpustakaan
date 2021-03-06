<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
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
})->name('homepage');

/* Autentikasi */
Route::get('/login', [AuthController::class, 'viewLogin'])->name('view.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* Dashboard */
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

/* Peminjaman */
Route::get('/loans', [PeminjamanController::class, 'showLoans'])->name('view.loans');
Route::post('/loans', [PeminjamanController::class, 'createLoan'])->name('add.loan');

/* Pengembalian */
Route::get('/returns', [PengembalianController::class, 'showReturns'])->name('view.returns');
Route::post('/returns', [PengembalianController::class, 'createReturn'])->name('add.return');

/* Anggota */
Route::get('/members', [AnggotaController::class, 'showAllmembers'])->name('view.members');

Route::get('/add-member', [AnggotaController::class, 'viewCreateMember'])->name('view.add.member');
Route::post('/members', [AnggotaController::class, 'createMember'])->name('add.member');

/* Buku */
Route::get('/books', [BukuController::class, 'showAllBooks'])->name('view.books');

Route::get('/add-book', [BukuController::class, 'viewCreateBook'])->name('view.add.book');
Route::post('/books', [BukuController::class, 'createBook'])->name('add.book');

Route::get('/edit-book/{id}', [BukuController::class, 'viewEditBook'])->name('view.edit.book');
Route::post('/edit-book/{id}', [BukuController::class, 'editBook'])->name('edit.book');

Route::get('/delete-book/{id}', [BukuController::class, 'viewDeleteBook'])->name('view.delete.book');
Route::post('/delete-book/{id}', [BukuController::class, 'deleteBook'])->name('delete.book');

Route::get('/search', [BukuController::class, 'searchBooks'])->name('search.books');

/* Kategori */
Route::get('/categories', [KategoriController::class, 'showAllCategories'])->name('view.categories');

Route::get('/add-category', [KategoriController::class, 'viewCreateCategory'])->name('view.add.category');
Route::post('/categories', [KategoriController::class, 'createCategory'])->name('add.category');

Route::get('/edit-category/{id}', [KategoriController::class, 'viewEditCategory'])->name('view.edit.category');
Route::post('/edit-category/{id}', [KategoriController::class, 'editCategory'])->name('edit.category');

Route::get('/delete-category/{id}', [KategoriController::class, 'viewDeleteCategory'])->name('view.delete.category');
Route::post('/delete-category/{id}', [KategoriController::class, 'deleteCategory'])->name('delete.category');