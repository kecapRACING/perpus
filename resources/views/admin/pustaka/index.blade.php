@extends('layouts.admin')

@section('header', 'Manajemen Pustaka')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">{{ __('Manajemen Pustaka') }}</h1>
    <a href="{{ route('pustaka.create') }}"
        class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
        Tambah Pustaka Baru
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto bg-white shadow-md rounded-lg">
    <table class="min-w-full text-sm text-left text-gray-700">
        <thead class="bg-blue-500 text-white">
            <tr>
                <th class="px-4 py-3 border-b font-medium text-white-600">Gambar</th>
                <th class="px-4 py-3 border-b font-medium text-white-600">Kode Pustaka</th>
                <th class="px-4 py-3 border-b font-medium text-white-600">Judul</th>
                <th class="px-4 py-3 border-b font-medium text-white-600">ISBN</th>
                <th class="px-4 py-3 border-b font-medium text-white-600">Tahun Terbit</th>
                <th class="px-4 py-3 border-b font-medium text-white-600">Kondisi</th>
                <th class="px-4 py-3 border-b font-medium text-white-600">Harga</th>
                <th class="px-4 py-3 border-b font-medium text-white-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pustakas as $pustaka)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">
                        @if($pustaka->gambar)
                            <img src="{{ asset('storage/' . $pustaka->gambar) }}"
                                class="mb-4 w-full h-48 object-cover rounded-lg" alt="Gambar {{ $pustaka->judul_pustaka }}">
                        @else
                            <img src="{{ asset('images/b1.jpg') }}" class="mb-4 w-full h-48 object-cover rounded-lg"
                                alt="Gambar Default">
                        @endif

                    </td>
                    <td class="px-4 py-3">{{ $pustaka->kode_pustaka }}</td>
                    <td class="px-4 py-3">{{ $pustaka->judul_pustaka }}</td>
                    <td class="px-4 py-3">{{ $pustaka->isbn }}</td>
                    <td class="px-4 py-3">{{ $pustaka->tahun_terbit }}</td>
                    <td class="px-4 py-3">{{ $pustaka->kondisi_buku }}</td>
                    <td class="px-4 py-3">{{ number_format($pustaka->harga_buku, 0, ',', '.') }}</td>
                    <td class="px-4 py-3 flex items-center space-x-2">
                        <a href="{{ route('pustaka.edit', $pustaka->id_pustaka) }}"
                            class="text-yellow-500 hover:text-yellow-700 transition duration-300">
                            Edit
                        </a>
                        <span>|</span>
                        <a href="{{ route('pustaka.show', $pustaka->id_pustaka) }}"
                            class="text-blue-500 hover:text-blue-700 transition duration-300">
                            Lihat
                        </a>
                        <span>|</span>
                        <form action="{{ route('pustaka.destroy', $pustaka->id_pustaka) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 transition duration-300">
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