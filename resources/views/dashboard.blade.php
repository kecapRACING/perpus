@extends('layouts.admin')

@section('header', 'Dashboard Admin')

@section('content')
    <div class="max-w-7xl mx-auto bg-gradient-to-br from-gray-100 via-white to-gray-50 p-10 rounded-xl shadow-2xl">
        <div class="text-center mb-12">
            <h3 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-purple-500">
                Selamat Datang, Admin Perpustakaan!
            </h3>
            <p class="text-lg text-gray-500 mt-3">
                Kelola koleksi buku, data anggota, dan transaksi perpustakaan Anda dengan mudah di sini.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Statistik Total Buku -->
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                <div class="flex items-center space-x-4">
                    <div class="bg-indigo-100 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 2h12c1.1 0 1.99.9 1.99 2L20 20c0 1.1-.89 2-1.99 2H5.99C4.89 22 4 21.1 4 20V4c0-1.1.89-2 1.99-2zM8 6h8v12H8z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-600">Total Buku</h4>
                        <p class="text-3xl font-bold text-indigo-600">{{ $totalBuku }}</p>
                    </div>
                </div>
            </div>

            <!-- Statistik Anggota Terdaftar -->
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                <div class="flex items-center space-x-4">
                    <div class="bg-green-100 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-1a8 8 0 10-16 0v1h5" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 12a4 4 0 100-8 4 4 0 000 8z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-600">Anggota Terdaftar</h4>
                        <p class="text-3xl font-bold text-green-600">{{ $totalAnggota }}</p>
                    </div>
                </div>
            </div>

            <!-- Statistik Transaksi Terakhir -->
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105">
                <div class="flex items-center space-x-4">
                    <div class="bg-yellow-100 p-4 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v5a2 2 0 002 2h2a2 2 0 002-2v-5" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h18M12 2L12 12" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-600">Transaksi Terakhir</h4>
                        <p class="text-3xl font-bold text-yellow-600">{{ $totalTransaksi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
