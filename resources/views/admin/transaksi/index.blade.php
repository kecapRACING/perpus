@extends('layouts.admin')

@section('header', 'Manajemen Transaksi')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">{{ __('Manajemen Transaksi') }}</h1>
        <a href="{{ route('transaksi.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
            Tambah Transaksi
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-4 py-3 border-b font-medium text-white-600">ID</th>
                    <th class="px-4 py-3 border-b font-medium text-white-600">Buku</th>
                    <th class="px-4 py-3 border-b font-medium text-white-600">Anggota</th>
                    <th class="px-4 py-3 border-b font-medium text-white-600">Tanggal Pinjam</th>
                    <th class="px-4 py-3 border-b font-medium text-white-600">Tanggal Kembali</th>
                    <th class="px-4 py-3 border-b font-medium text-white-600">Tanggal Pengembalian</th>
                    <th class="px-4 py-3 border-b font-medium text-white-600">Status</th>
                    <th class="px-4 py-3 border-b font-medium text-white-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $transaksi->id_transaksi }}</td>
                        <td class="px-4 py-3">{{ $transaksi->pustaka->judul_pustaka }}</td>
                        <td class="px-4 py-3">{{ $transaksi->anggota->nama_anggota }}</td>
                        <td class="px-4 py-3">{{ $transaksi->tgl_pinjam }}</td>
                        <td class="px-4 py-3">{{ $transaksi->tgl_kembali }}</td>
                        <td class="px-4 py-3">{{ $transaksi->tgl_pengembalian }}</td>
                        <td class="px-4 py-3">
                            {{ $transaksi->fp == '0' ? 'Dipinjam' : 'Selesai' }}
                        </td>
                        <td class="px-4 py-3 flex items-center space-x-2">
                            <a href="{{ route('transaksi.edit', $transaksi->id_transaksi) }}" class="text-yellow-500 hover:text-yellow-700 transition duration-300">
                                Edit
                            </a>
                            <span>|</span>
                            <form action="{{ route('transaksi.destroy', $transaksi->id_transaksi) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition duration-300">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
