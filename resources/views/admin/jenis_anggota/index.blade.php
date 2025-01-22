@extends('layouts.admin')

@section('header', 'Manajemen Jenis Anggota')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">{{ __('Manajemen Jenis Anggota') }}</h1>
        <a href="{{ route('jenis_anggota.create') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
            Tambah Jenis Anggota Baru
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
                    <th class="px-4 py-3 border-b font-medium text-white-600">Kode Jenis Anggota</th>
                    <th class="px-4 py-3 border-b font-medium text-white-600">Jenis Anggota</th>
                    <th class="px-4 py-3 border-b font-medium text-white-600">Max Pinjam</th>
                    <th class="px-4 py-3 border-b font-medium text-white-600">Keterangan</th>
                    <th class="px-4 py-3 border-b font-medium text-white-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenisAnggotas as $jenisAnggota)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $jenisAnggota->kode_jenis_anggota }}</td>
                        <td class="px-4 py-3">{{ $jenisAnggota->jenis_anggota }}</td>
                        <td class="px-4 py-3">{{ $jenisAnggota->max_pinjam }}</td>
                        <td class="px-4 py-3">{{ $jenisAnggota->keterangan }}</td>
                        <td class="px-4 py-3 flex items-center space-x-2">
                            <a href="{{ route('jenis_anggota.edit', $jenisAnggota->id_jenis_anggota) }}" class="text-yellow-500 hover:text-yellow-700 transition duration-300">
                                Edit
                            </a>
                            <span>|</span>
                            <form action="{{ route('jenis_anggota.destroy', $jenisAnggota->id_jenis_anggota) }}" method="POST" class="inline-block">
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
