@extends('layouts.admin')

@section('header', 'Edit Pengarang')

@section('content')
    <form action="{{ route('pengarang.update', $pengarang->id_pengarang) }}" method="POST" class="space-y-6 bg-gradient-to-r from-blue-500 to-blue-600 p-8 rounded-lg shadow-xl">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="kode_pengarang" class="block text-white">Kode Pengarang</label>
            <input type="text" id="kode_pengarang" name="kode_pengarang" value="{{ old('kode_pengarang', $pengarang->kode_pengarang) }}" class="mt-1 block w-full border p-2 rounded" required>
            @error('kode_pengarang')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nama_pengarang" class="block text-white">Nama Pengarang</label>
            <input type="text" id="nama_pengarang" name="nama_pengarang" value="{{ old('nama_pengarang', $pengarang->nama_pengarang) }}" class="mt-1 block w-full border p-2 rounded" required>
            @error('nama_pengarang')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="gelar_depan" class="block text-white">Gelar Depan</label>
            <input type="text" id="gelar_depan" name="gelar_depan" value="{{ old('gelar_depan', $pengarang->gelar_depan) }}" class="mt-1 block w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="gelar_belakang" class="block text-white">Gelar Belakang</label>
            <input type="text" id="gelar_belakang" name="gelar_belakang" value="{{ old('gelar_belakang', $pengarang->gelar_belakang) }}" class="mt-1 block w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="no_telp" class="block text-white">No. Telp</label>
            <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp', $pengarang->no_telp) }}" class="mt-1 block w-full border p-2 rounded" required>
            @error('no_telp')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-white">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $pengarang->email) }}" class="mt-1 block w-full border p-2 rounded" required>
            @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="website" class="block text-white">Website</label>
            <input type="text" id="website" name="website" value="{{ old('website', $pengarang->website) }}" class="mt-1 block w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label for="biografi" class="block text-white">Biografi</label>
            <textarea id="biografi" name="biografi" rows="4" class="mt-1 block w-full border p-2 rounded">{{ old('biografi', $pengarang->biografi) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="keterangan" class="block text-white">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan', $pengarang->keterangan) }}" class="mt-1 block w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded">Simpan Perubahan</button>
    </form>
@endsection
