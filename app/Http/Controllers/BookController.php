<?php

namespace App\Http\Controllers;

use App\Models\Pustaka;
use App\Models\Peminjaman;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{public function index()
    {
        // Dapatkan ID user yang sedang login
        $userId = Auth::id();
    
        // Ambil ID pustaka yang sudah dipinjam oleh user
        $transaksis = Transaksi::where("id_anggota", $userId)->pluck('id_pustaka');
    
        // Dapatkan buku yang belum dipinjam oleh user dan memiliki jumlah pinjam lebih dari 0
        $pustakas = Pustaka::whereNotIn('id_pustaka', $transaksis)
                            ->where('jml_pinjam', '>', 0)
                            ->get();
    
        // Return view dengan data buku
        return view('books.index', compact('pustakas', 'transaksis'));
    }
    


}