<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Pustaka;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalBuku = Pustaka::count(); // Menghitung jumlah buku
        $totalAnggota = Anggota::count(); // Menghitung jumlah anggota
        $totalTransaksi = Transaksi::count(); // Menghitung jumlah transaksi

        // dd($totalBuku);

        return view('dashboard', compact('totalBuku', 'totalAnggota', 'totalTransaksi'));
    }

}