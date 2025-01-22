@extends('layouts.admin')

@section('header', 'Tambah Rak Baru')

@section('content')
    <div class="max-w-4xl mx-auto bg-gradient-to-r from-blue-500 to-blue-700 shadow-lg rounded-lg p-8">
        <h2 class="text-3xl font-extrabold text-white mb-8">
            Tambah Rak Baru
        </h2>
        <form action="{{ route('rak.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Kode Rak -->
            <div>
                <label for="kode_rak" class="block text-sm font-semibold text-white">Kode Rak</label>
                <input 
                    type="text" 
                    name="kode_rak" 
                    id="kode_rak" 
                    class="mt-2 w-full p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan kode rak"
                    value="{{ old('kode_rak') }}" 
                    required
                >
            </div>
            
            <!-- Nama Rak -->
            <div>
                <label for="rak" class="block text-sm font-semibold text-white">Nama Rak</label>
                <input 
                    type="text" 
                    name="rak" 
                    id="rak" 
                    class="mt-2 w-full p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nama rak"
                    value="{{ old('rak') }}" 
                    required
                >
            </div>
            
            <!-- Keterangan -->
            <div>
                <label for="keterangan" class="block text-sm font-semibold text-white">Keterangan</label>
                <textarea 
                    name="keterangan" 
                    id="keterangan" 
                    rows="4"
                    class="mt-2 w-full p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan keterangan rak (opsional)"
                >{{ old('keterangan') }}</textarea>
            </div>
            
            <!-- Tombol Simpan -->
            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg shadow-md hover:from-blue-700 hover:to-blue-800 focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50"
                >
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
    