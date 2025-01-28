@extends('layouts.admin')

@section('header', 'Tambah Penerbit Baru')

@section('content')
    <form action="{{ route('penerbit.store') }}" method="POST" class="space-y-6 bg-gradient-to-r from-blue-500 to-blue-600 p-8 rounded-lg shadow-xl">
        @csrf

        <div class="mb-6">
            <label for="kode_penerbit" class="block text-white font-semibold">Kode Penerbit</label>
            <input type="text" id="kode_penerbit" name="kode_penerbit" value="{{ old('kode_penerbit') }}" class="mt-1 block w-full border border-gray-300 p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            @error('kode_penerbit')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="nama_penerbit" class="block text-white font-semibold">Nama Penerbit</label>
            <input type="text" id="nama_penerbit" name="nama_penerbit" value="{{ old('nama_penerbit') }}" class="mt-1 block w-full border border-gray-300 p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            @error('nama_penerbit')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="alamat_penerbit" class="block text-white font-semibold">Alamat</label>
            <input type="text" id="alamat_penerbit" name="alamat_penerbit" value="{{ old('alamat_penerbit') }}" class="mt-1 block w-full border border-gray-300 p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            @error('alamat_penerbit')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="no_telp" class="block text-white font-semibold">No. Telp</label>
            <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" class="mt-1 block w-full border border-gray-300 p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            @error('no_telp')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="block text-white font-semibold">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full border border-gray-300 p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label for="fax" class="block text-white font-semibold">Fax</label>
            <input type="text" id="fax" name="fax" value="{{ old('fax') }}" class="mt-1 block w-full border border-gray-300 p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-6">
            <label for="website" class="block text-white font-semibold">Website</label>
            <input type="text" id="website" name="website" value="{{ old('website') }}" class="mt-1 block w-full border border-gray-300 p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-6">
            <label for="kontak" class="block text-white font-semibold">Kontak</label>
            <input type="text" id="kontak" name="kontak" value="{{ old('kontak') }}" class="mt-1 block w-full border border-gray-300 p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit" class="w-full bg-blue-700 text-white px-6 py-3 rounded-md shadow-lg hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
            Simpan
        </button>
    </form>
@endsection
