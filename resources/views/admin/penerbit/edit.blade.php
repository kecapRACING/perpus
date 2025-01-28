@extends('layouts.admin')

@section('header', 'Edit Penerbit')

@section('content')
    <form action="{{ route('penerbit.update', $penerbit->id_penerbit) }}" method="POST" class="space-y-6 bg-gradient-to-r from-blue-500 to-blue-600 p-8 rounded-lg shadow-xl">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="kode_penerbit" class="block text-white font-semibold">Kode Penerbit</label>
            <input type="text" id="kode_penerbit" name="kode_penerbit" value="{{ old('kode_penerbit', $penerbit->kode_penerbit) }}" class="mt-1 block w-full border p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        
        <div class="mb-6">
            <label for="nama_penerbit" class="block text-white font-semibold">Nama Penerbit</label>
            <input type="text" id="nama_penerbit" name="nama_penerbit" value="{{ old('nama_penerbit', $penerbit->nama_penerbit) }}" class="mt-1 block w-full border p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-6">
            <label for="alamat_penerbit" class="block text-white font-semibold">Alamat</label>
            <input type="text" id="alamat_penerbit" name="alamat_penerbit" value="{{ old('alamat_penerbit', $penerbit->alamat_penerbit) }}" class="mt-1 block w-full border p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-6">
            <label for="no_telp" class="block text-white font-semibold">No. Telp</label>
            <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp', $penerbit->no_telp) }}" class="mt-1 block w-full border p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-6">
            <label for="email" class="block text-white font-semibold">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $penerbit->email) }}" class="mt-1 block w-full border p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-6">
            <label for="fax" class="block text-white font-semibold">Fax</label>
            <input type="text" id="fax" name="fax" value="{{ old('fax', $penerbit->fax) }}" class="mt-1 block w-full border p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-6">
            <label for="website" class="block text-white font-semibold">Website</label>
            <input type="text" id="website" name="website" value="{{ old('website', $penerbit->website) }}" class="mt-1 block w-full border p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-6">
            <label for="kontak" class="block text-white font-semibold">Kontak</label>
            <input type="text" id="kontak" name="kontak" value="{{ old('kontak', $penerbit->kontak) }}" class="mt-1 block w-full border p-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-md shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
            Perbarui
        </button>
    </form>
@endsection
