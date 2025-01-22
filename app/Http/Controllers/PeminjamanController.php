<?php

namespace App\Http\Controllers;

use App\Models\Pustaka;
use Illuminate\Http\Request;
use App\Models\Peminjaman; 
class PeminjamanController extends Controller
{
    public function index()
    {
        // Ambil data peminjaman dari database
        $peminjamen = Peminjaman::all();
        // Kirim data ke view peminjaman.index
        return view('peminjaman.index', compact('peminjamen'));
    }

    public function create($id)
    {
        // Cek apakah pustaka dengan ID tersebut ada
        $pustaka = Pustaka::find($id);

        // Jika pustaka ditemukan, lanjutkan
        if ($pustaka) {
            return view('peminjaman.create', compact('pustaka'));
        }

        // Jika pustaka tidak ditemukan
        return redirect()->route('daftar-buku')->with('error', 'Buku tidak ditemukan.');
    }


    public function show($id)
    {
        // Logic untuk menampilkan detail buku yang akan dipinjam
        $pustaka = Pustaka::findOrFail($id);
        return view('peminjaman.show', compact('pustaka'));
    }

    public function store(Request $request)
    {
        // Logic untuk memproses peminjaman buku
        // Simpan data peminjaman ke database
        session()->flash('success', 'Buku berhasil dipinjam!');
        return redirect()->route('daftar-buku');
    }
}
