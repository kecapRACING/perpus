@extends('layouts.admin')

@section('header', 'Manajemen Pengarang')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gradient bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-600">
            {{ __('Manajemen Pengarang') }}
        </h1>
        <a href="{{ route('pengarang.create') }}" class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gradient-to-r hover:from-indigo-600 hover:to-blue-600 transition duration-300">
            Tambah Pengarang Baru
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-gradient-to-r from-gray-50 via-white to-gray-50 shadow-lg rounded-lg">
        <table class="min-w-full text-sm text-left text-gray-800 font-sans border border-gray-200">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-4 py-3 border-b font-semibold">Kode Pengarang</th>
                    <th class="px-4 py-3 border-b font-semibold">Nama Pengarang</th>
                    <th class="px-4 py-3 border-b font-semibold">No Telp</th>
                    <th class="px-4 py-3 border-b font-semibold">Email</th>
                    <th class="px-4 py-3 border-b font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($pengarangs as $pengarang)
                    <tr class="border-b hover:bg-gradient-to-r from-purple-50 via-pink-50 to-purple-50 transition duration-200 ease-in-out">
                        <td class="px-4 py-3">{{ $pengarang->kode_pengarang }}</td>
                        <td class="px-4 py-3">{{ $pengarang->nama_pengarang }}</td>
                        <td class="px-4 py-3">{{ $pengarang->no_telp }}</td>
                        <td class="px-4 py-3">{{ $pengarang->email }}</td>
                        <td class="px-4 py-3 flex items-center space-x-2">
                            <a href="{{ route('pengarang.edit', $pengarang->id_pengarang) }}" class="text-yellow-500 hover:text-yellow-700 transition duration-300">
                                Edit
                            </a>
                            <span>|</span>
                            <form action="{{ route('pengarang.destroy', $pengarang->id_pengarang) }}" method="POST" class="inline-block">
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
