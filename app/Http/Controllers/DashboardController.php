<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Peminjaman;


class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();
        $totalKategori = Kategori::count();
        $persewaanAktif = Peminjaman::where('status', 'disewa')->count();
        $riwayat = Peminjaman::where('status', 'kembali')->count();

        $persewaanTerbaru = Peminjaman::with('details.barang')
            ->where('status', 'disewa')
            ->latest()
            ->limit(5)
            ->get();


        return view('admin.dashboard', [
        'totalBarang'     => Barang::count(),
        'totalKategori'   => \App\Models\Kategori::count(),
        'persewaanAktif'  => \App\Models\Peminjaman::where('status','dipinjam')->count(),

        // ambil 3 barang terbaru
        'barangs' => Barang::latest()->take(3)->get(),
        'barangs' => \App\Models\Barang::latest()->get(),
    ]);
    }
}
