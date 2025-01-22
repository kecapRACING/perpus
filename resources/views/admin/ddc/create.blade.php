@extends('layouts.admin')

@section('content')
    <h3 class="font-semibold text-2xl text-gray-800 mb-6">Tambah DDC</h3>

    <form action="{{ route('ddc.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="mb-4">
            <label for="kode_ddc" class="block text-gray-700 font-medium mb-2">Kode DDC</label>
            <input type="text" id="kode_ddc" name="kode_ddc" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
        </div>

        <div class="mb-4">
            <label for="ddc" class="block text-gray-700 font-medium mb-2">DDC</label>
            <input type="text" id="ddc" name="ddc" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
        </div>

        <div class="mb-4">
            <label for="keterangan" class="block text-gray-700 font-medium mb-2">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
        </div>

        <div class="mb-4">
            <label for="id_rak" class="block text-gray-700 font-medium mb-2">Rak</label>
            <select id="id_rak" name="id_rak" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" required>
                @foreach($raks as $rak)
                    <option value="{{ $rak->id_rak }}">{{ $rak->rak }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="w-full px-4 py-3 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-400 transition duration-300">
            Simpan
        </button>
    </form>
@endsection
