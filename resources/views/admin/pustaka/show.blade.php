@extends('layouts.admin')

@section('header', 'Detail Pustaka')

@section('content')
<div class="mb-6">
    <a href="{{ route('pustaka.index') }}"
        class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition duration-300 inline-flex items-center">
        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Pustaka
    </a>
</div>

<div class="bg-white p-8 rounded-xl shadow-xl max-w-6xl mx-auto">
    <div class="text-3xl font-semibold text-gray-800 mb-6 border-b pb-4">Detail Pustaka</div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
        <!-- Kode Pustaka -->
        <div class="mb-6">
            <strong class="text-lg text-gray-700">Kode Pustaka:</strong>
            <p class="text-xl text-gray-900 font-medium">{{ $pustaka->kode_pustaka }}</p>
        </div>

        <!-- Judul Pustaka -->
        <div class="mb-6">
            <strong class="text-lg text-gray-700">Judul Pustaka:</strong>
            <p class="text-xl text-gray-900 font-medium">{{ $pustaka->judul_pustaka }}</p>
        </div>

        <!-- Tahun Terbit -->
        <div class="mb-6">
            <strong class="text-lg text-gray-700">Tahun Terbit:</strong>
            <p class="text-xl text-gray-900 font-medium">{{ $pustaka->tahun_terbit }}</p>
        </div>

        <!-- Pengarang -->
        <div class="mb-6">
            <strong class="text-lg text-gray-700">Pengarang:</strong>
            <p class="text-xl text-gray-900 font-medium">{{ $pustaka->pengarang->nama_pengarang }}</p>
        </div>

        <!-- Format -->
        <div class="mb-6">
            <strong class="text-lg text-gray-700">Format:</strong>
            <p class="text-xl text-gray-900 font-medium">{{ $pustaka->format->format }}</p>
        </div>

        <!-- Harga Buku -->
        <div class="mb-6">
            <strong class="text-lg text-gray-700">Harga Buku:</strong>
            <p class="text-xl text-gray-900 font-medium">{{ number_format($pustaka->harga_buku, 0, ',', '.') }}</p>
        </div>

        <!-- Kondisi Buku -->
        <div class="mb-6">
            <strong class="text-lg text-gray-700">Kondisi Buku:</strong>
            <p class="text-xl text-gray-900 font-medium">{{ $pustaka->kondisi_buku }}</p>
        </div>

        <!-- Abstraksi -->
        <div class="mb-6">
            <strong class="text-lg text-gray-700">Abstraksi:</strong>
            <p class="text-xl text-gray-900 font-medium">{{ $pustaka->abstraksi }}</p>
        </div>

        <!-- Keyword -->
        <div class="mb-6">
            <strong class="text-lg text-gray-700">Keyword:</strong>
            <p class="text-xl text-gray-900 font-medium">{{ $pustaka->keyword }}</p>
        </div>
    </div>

    <div class="mt-8">
        <strong class="text-lg text-gray-700">Gambar:</strong>
        <div class="mt-4">
            @if($pustaka->gambar)
                <img src="{{ asset('storage/' . $pustaka->gambar) }}" alt="Gambar Pustaka"
                    class="w-48 h-48 object-cover rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
            @else
                <p class="text-gray-600">Tidak ada gambar pustaka yang tersedia.</p>
            @endif
        </div>
    </div>
</div>
@endsection
