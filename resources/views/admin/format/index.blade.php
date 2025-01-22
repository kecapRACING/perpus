@extends('layouts.admin')

@section('header', 'Manajemen Format')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">{{ __('Manajemen Format') }}</h1>
        <a href="{{ route('format.create') }}" class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gradient-to-r hover:from-teal-600 hover:to-teal-700 transition duration-300">
            Tambah Format Baru
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-lime-100 text-lime-800 border border-lime-300 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-4 py-3 border-b font-medium">Kode Format</th>
                    <th class="px-4 py-3 border-b font-medium">Format</th>
                    <th class="px-4 py-3 border-b font-medium">Keterangan</th>
                    <th class="px-4 py-3 border-b font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($formats as $format)
                    <tr class="border-b hover:bg-purple-50">
                        <td class="px-4 py-3">{{ $format->kode_format }}</td>
                        <td class="px-4 py-3">{{ $format->format }}</td>
                        <td class="px-4 py-3">{{ $format->keterangan }}</td>
                        <td class="px-4 py-3 flex items-center space-x-2">
                            <a href="{{ route('format.edit', $format->id_format) }}" class="text-orange-500 hover:text-orange-600 transition duration-300">
                                Edit
                            </a>
                            <span>|</span>
                            <form action="{{ route('format.destroy', $format->id_format) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600 transition duration-300">
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
