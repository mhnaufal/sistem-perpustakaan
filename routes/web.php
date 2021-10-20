<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
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

/* Petugas */

/* Anggota */
Route::get('/members', function () {
    return view('daftarAnggota');
})->name('view.members');

/* Buku */
Route::get('/books', [BukuController::class, 'showAllBooks'])->name('view.books');

Route::get('/add-book', [BukuController::class, 'viewCreateBook'])->name('view.add.book');
Route::post('/books', [BukuController::class, 'createBook'])->name('add.book');

Route::get('/edit-book/{id}', [BukuController::class, 'viewEditBook'])->name('view.edit.book');
Route::post('/edit-book/{id}', [BukuController::class, 'editBook'])->name('edit.book');

Route::get('/delete-book/{id}', [BukuController::class, 'viewDeleteBook'])->name('view.delete.book');
Route::post('/delete-book/{id}', [BukuController::class, 'deleteBook'])->name('delete.book');

/* Kategori */
Route::get('/categories', [KategoriController::class, 'showAllCategories'])->name('view.categories');
