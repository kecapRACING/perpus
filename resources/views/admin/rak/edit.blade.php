@extends('layouts.admin')

@section('header', 'Edit Rak')

@section('content')
    <div class="max-w-4xl mx-auto bg-gradient-to-r from-blue-600 to-blue-800 shadow-lg rounded-lg p-8">
        <h2 class="text-3xl font-extrabold text-white mb-8">
            Edit Rak
        </h2>
        <form action="{{ route('rak.update', $rak->id_rak) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Kode Rak -->
            <div>
                <label for="kode_rak" class="block text-sm font-semibold text-white">Kode Rak</label>
                <input 
                    type="text" 
                    name="kode_rak" 
                    id="kode_rak" 
                    class="mt-2 w-full p-3 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('kode_rak', $rak->kode_rak) }}" 
                    placeholder="Masukkan kode rak"
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
                    value="{{ old('rak', $rak->rak) }}" 
                    placeholder="Masukkan nama rak"
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
                >{{ old('keterangan', $rak->keterangan) }}</textarea>
            </div>
            
            <!-- Tombol Update -->
            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 py-3 rounded-lg shadow-md hover:from-teal-600 hover:to-teal-700 focus:ring-2 focus:ring-teal-300 focus:ring-opacity-50"
                >
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
