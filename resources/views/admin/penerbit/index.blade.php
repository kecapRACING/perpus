@extends('layouts.admin')

@section('header', 'Manajemen Penerbit')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">{{ __('Manajemen Penerbit') }}</h1>
        <a href="{{ route('penerbit.create') }}" class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gradient-to-r hover:from-indigo-600 hover:to-indigo-700 transition duration-300">
            Tambah Penerbit Baru
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-4 py-3 border-b font-medium">Kode Penerbit</th>
                    <th class="px-4 py-3 border-b font-medium">Nama Penerbit</th>
                    <th class="px-4 py-3 border-b font-medium">Alamat</th>
                    <th class="px-4 py-3 border-b font-medium">Telepon</th>
                    <th class="px-4 py-3 border-b font-medium">Email</th>
                    <th class="px-4 py-3 border-b font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penerbits as $penerbit)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $penerbit->kode_penerbit }}</td>
                        <td class="px-4 py-3">{{ $penerbit->nama_penerbit }}</td>
                        <td class="px-4 py-3">{{ $penerbit->alamat_penerbit }}</td>
                        <td class="px-4 py-3">{{ $penerbit->no_telp }}</td>
                        <td class="px-4 py-3">{{ $penerbit->email }}</td>
                        <td class="px-4 py-3 flex items-center space-x-2">
                            <a href="{{ route('penerbit.edit', $penerbit->id_penerbit) }}" class="text-yellow-500 hover:text-yellow-700 transition duration-300">
                                Edit
                            </a>
                            <span>|</span>
                            <form action="{{ route('penerbit.destroy', $penerbit->id_penerbit) }}" method="POST" class="inline-block">
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
