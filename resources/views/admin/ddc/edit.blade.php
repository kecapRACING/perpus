@extends('layouts.admin')

@section('content')
    <div class="bg-gradient-to-r from-green-400 to-blue-500 min-h-screen flex items-center justify-center py-12">
        <div class="bg-white p-8 rounded-lg shadow-xl max-w-3xl w-full">
            <h3 class="font-semibold text-2xl text-gray-800 mb-6">Edit DDC</h3>

            <form action="{{ route('ddc.update', $ddc->id_ddc) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="kode_ddc" class="block text-lg font-medium text-gray-800">Kode DDC</label>
                    <input type="text" id="kode_ddc" name="kode_ddc" class="w-full px-4 py-3 border-2 border-green-500 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600" value="{{ $ddc->kode_ddc }}" required>
                </div>

                <div class="mb-6">
                    <label for="ddc" class="block text-lg font-medium text-gray-800">DDC</label>
                    <input type="text" id="ddc" name="ddc" class="w-full px-4 py-3 border-2 border-green-500 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600" value="{{ $ddc->ddc }}" required>
                </div>

                <div class="mb-6">
                    <label for="keterangan" class="block text-lg font-medium text-gray-800">Keterangan</label>
                    <input type="text" id="keterangan" name="keterangan" class="w-full px-4 py-3 border-2 border-green-500 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600" value="{{ $ddc->keterangan }}">
                </div>

                <div class="mb-6">
                    <label for="id_rak" class="block text-lg font-medium text-gray-800">Rak</label>
                    <select id="id_rak" name="id_rak" class="w-full px-4 py-3 border-2 border-green-500 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600" required>
                        @foreach($raks as $rak)
                            <option value="{{ $rak->id_rak }}" {{ $rak->id_rak == $ddc->id_rak ? 'selected' : '' }}>{{ $rak->rak }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full px-4 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-md hover:bg-gradient-to-r hover:from-green-600 hover:to-green-700 focus:outline-none transition duration-300">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
