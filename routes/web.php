<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('/admin/login');
});

Route::get('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/login', [AdminAuthController::class, 'prosesLogin']);
Route::get('/admin/logout', [AdminAuthController::class, 'logout']);

Route::get(
    '/admin/dashboard',
    [DashboardController::class, 'index']
)->middleware('auth:admin');

Route::middleware('auth:admin')->group(function () {

    // =====================
    // KATEGORI
    // =====================
    Route::get('/admin/kategori', [KategoriController::class, 'index']);
    Route::get('/admin/kategori/create', [KategoriController::class, 'create']);
    Route::post('/admin/kategori', [KategoriController::class, 'store']);
    Route::get('/admin/kategori/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/admin/kategori/{id}', [KategoriController::class, 'update']);
    Route::delete('/admin/kategori/{id}', [KategoriController::class, 'destroy']);


    // =====================
    // BARANG
    // =====================
    Route::get('/admin/barang', [BarangController::class, 'index']);
    Route::get('/admin/barang/create', [BarangController::class, 'create']);
    Route::post('/admin/barang', [BarangController::class, 'store']);
    Route::get('/admin/barang/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/admin/barang/{id}', [BarangController::class, 'update']);
    Route::delete('/admin/barang/{id}', [BarangController::class, 'destroy']);


    // =====================
    // PEMINJAMAN (AKTIF)
    // =====================
    Route::get('/admin/peminjaman', [PeminjamanController::class, 'index']);
    Route::get('/admin/peminjaman/create', [PeminjamanController::class, 'create']);
    Route::post('/admin/peminjaman', [PeminjamanController::class, 'store']);

    // 🔥 RIWAYAT (DITEMPATKAN DI ATAS {id})
    Route::get('/admin/peminjaman/riwayat', [PeminjamanController::class, 'riwayat']);

    // DETAIL & AKSI
    Route::get('/admin/peminjaman/riwayat/{id}', [PeminjamanController::class, 'detailRiwayat']);
    Route::get('/admin/peminjaman/{id}', [PeminjamanController::class, 'show']);
    Route::post('/admin/peminjaman/{id}/kembali', [PeminjamanController::class, 'kembalikan']);
    Route::delete('/admin/peminjaman/{id}', [PeminjamanController::class, 'destroy']);
});


Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');
