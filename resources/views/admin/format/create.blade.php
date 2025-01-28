@extends('layouts.admin')

@section('header', 'Tambah Format Baru')

@section('content')
    <div class="bg-gradient-to-r from-blue-400 to-blue-600 min-h-screen flex items-center justify-center py-12">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Format Baru</h3>
            
            <form action="{{ route('format.store') }}" method="POST">
                @csrf
                
                <div class="mb-6">
                    <label for="kode_format" class="block text-lg font-medium text-gray-700">Kode Format</label>
                    <input type="text" id="kode_format" name="kode_format" class="w-full px-4 py-3 border-2 border-blue-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300" required>
                </div>

                <div class="mb-6">
                    <label for="format" class="block text-lg font-medium text-gray-700">Format</label>
                    <input type="text" id="format" name="format" class="w-full px-4 py-3 border-2 border-blue-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300" required>
                </div>

                <div class="mb-6">
                    <label for="keterangan" class="block text-lg font-medium text-gray-700">Keterangan</label>
                    <input type="text" id="keterangan" name="keterangan" class="w-full px-4 py-3 border-2 border-blue-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full px-4 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-md hover:bg-gradient-to-r hover:from-blue-600 hover:to-blue-700 transition duration-300">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
