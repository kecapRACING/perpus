<?php

namespace App\Http\Controllers;

use App\Models\Pustaka;
use App\Models\Transaksi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Ambil data peminjaman dari database
        $userId = auth()->user()->id_anggota;
        $transaksi = Transaksi::where('id_anggota', $userId)->get();
        // Kirim data ke view peminjaman.index
        // dd($transaksi);
        return view('books.peminjaman', compact('transaksi'));
    }

    public function detail($id)
    {
        // Cek apakah pustaka dengan ID tersebut ada
        $pustaka = Pustaka::find($id);

        // Jika pustaka ditemukan, lanjutkan
        if ($pustaka) {
            return view('books.detailBuku', compact('pustaka'));
        }

        // Jika pustaka tidak ditemukan
        return redirect()->route('daftar-buku')->with('error', 'Buku tidak ditemukan.');
    }


    public function show($id)
    {
        // Logic untuk menampilkan detail buku yang akan dipinjam
        $pustaka = Pustaka::findOrFail($id);
        return view('books.detailBuku', compact('pustaka'));
    }

    public function create(Request $request, $id)
    {
        // Ambil data buku berdasarkan ID
        $pustaka = Pustaka::find($id);

        // Jika buku tidak ditemukan
        if (!$pustaka) {
            return redirect()->route('books.index')->with('error', 'Buku tidak ditemukan.');
        }

        // Cek apakah stok buku lebih dari 0
        if ($pustaka->jml_pinjam <= 0) {
            return redirect()->route('books.index')->with('error', 'Buku ini sudah habis dan tidak dapat direservasi.');
        }

        // Lanjutkan ke halaman reservasi jika buku tersedia
        return view('books.createReservasi', compact('pustaka'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required',
            'id_pustaka' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam|before_or_equal:' . now()->addDays(7)->toDateString(),
            'keterangan' => 'required|max:50',
        ], [
            'tgl_kembali.after_or_equal' => 'Tanggal kembali tidak boleh lebih kecil dari tanggal pinjam.',
            'tgl_kembali.before_or_equal' => 'Tanggal kembali tidak boleh lebih dari 7 hari setelah tanggal pinjam.',
        ]);

        // Menyimpan data transaksi
        $transaksi = new Transaksi();
        $transaksi->id_pustaka = $request->input('id_pustaka');
        $transaksi->id_anggota = $request->input('id_anggota');
        $transaksi->tgl_pinjam = $request->input('tgl_pinjam');
        $transaksi->tgl_kembali = $request->input('tgl_kembali');
        $transaksi->keterangan = $request->input('keterangan');
        // $transaksi->status = 'pending';
        $transaksi->save();
        // Mengupdate jumlah pinjam pustaka
        $pustaka = Pustaka::find($request->input('id_pustaka'));

        // Pastikan jumlah pinjam lebih dari 0 sebelum dikurangi
        if ($pustaka && $pustaka->jml_pinjam > 0) {
            $pustaka->decrement('jml_pinjam');
        }
        $pustaka = Pustaka::find($request->input('id_pustaka'));

        return redirect()->route('books.peminjaman');
    }

}
