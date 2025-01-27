<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DdcController;
use App\Http\Controllers\Admin\RakController;
use App\Http\Controllers\Admin\FormatController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\PustakaController;
use App\Http\Controllers\Admin\PenerbitController;
use App\Http\Controllers\Admin\PengarangController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\JenisAnggotaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DaftarbukuControllers;
use App\Http\Controllers\PeminjamanController;
// Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');


Route::get('/books', [BookController::class, 'index'])->name('books.index');


// Route untuk halaman pinjam buku
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('books.peminjaman');
// Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show'])->name('peminjaman.show');
// Route for Daftar Buku page
Route::get('/peminjaman/{id}', [PeminjamanController::class, 'detail'])->name('books.detail');
Route::get('/peminjaman/{id}/reservasi', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');


Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    // Routes untuk Manajemen Rak
    Route::resource('rak', RakController::class);
    Route::resource('ddc', DdcController::class);
    Route::resource('format', FormatController::class);
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('pengarang', PengarangController::class);
    Route::resource('jenis_anggota', JenisAnggotaController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::resource('pustaka', PustakaController::class);
    Route::resource('transaksi', TransaksiController::class);
});


require __DIR__.'/auth.php';
