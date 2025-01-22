@extends('layouts.admin')

@section('header', 'Manajemen DDC')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-semibold text-gray-900">{{ __('Manajemen DDC') }}</h1>
        <a href="{{ route('ddc.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition duration-300">
            Tambah DDC Baru
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 border-l-4 border-green-500 rounded-lg shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200">
        <table class="min-w-full text-sm text-left text-gray-900">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-6 py-3 border-b font-semibold">Kode DDC</th>
                    <th class="px-6 py-3 border-b font-semibold">DDC</th>
                    <th class="px-6 py-3 border-b font-semibold">Rak</th>
                    <th class="px-6 py-3 border-b font-semibold">Keterangan</th>
                    <th class="px-6 py-3 border-b font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ddcs as $ddc)
                    <tr class="border-b hover:bg-gray-50 transition duration-300">
                        <td class="px-6 py-3">{{ $ddc->kode_ddc }}</td>
                        <td class="px-6 py-3">{{ $ddc->ddc }}</td>
                        <td class="px-6 py-3">{{ $ddc->rak->rak }}</td>
                        <td class="px-6 py-3">{{ $ddc->keterangan }}</td>
                        <td class="px-6 py-3 flex items-center space-x-3">
                            <a href="{{ route('ddc.edit', $ddc->id_ddc) }}" class="text-blue-500 hover:text-blue-700 font-medium transition duration-300">
                                Edit
                            </a>
                            <span class="text-gray-400">|</span>
                            <form action="{{ route('ddc.destroy', $ddc->id_ddc) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium transition duration-300">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
