@extends('layouts.admin')

@section('header', 'Manajemen Rak')

@section('content')
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-4xl font-semibold text-gray-800">
            {{ __('Manajemen Rak') }}
        </h1>
        <a href="{{ route('rak.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-300 transition duration-300">
            Tambah Rak Baru
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-500 text-white rounded-lg shadow-md">
            <span class="font-bold">Berhasil!</span> {{ session('success') }}
        </div>
    @endif

    <!-- Data Table -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Kode Rak</th>
                    <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Nama Rak</th>
                    <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Keterangan</th>
                    <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($raks as $rak)
                    <tr class="bg-white hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 text-gray-900 font-medium">{{ $rak->kode_rak }}</td>
                        <td class="px-6 py-4 text-gray-900 font-medium">{{ $rak->rak }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $rak->keterangan }}</td>
                        <td class="px-6 py-4 flex items-center space-x-4">
                            <!-- Edit Button -->
                            <a href="{{ route('rak.edit', $rak->id_rak) }}" class="text-blue-600 hover:text-blue-700 focus:ring-2 focus:ring-blue-300 transition duration-300">
                                Edit
                            </a>
                            <span>|</span>
                            <!-- Delete Button -->
                            <form action="{{ route('rak.destroy', $rak->id_rak) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus rak ini?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600 focus:ring-2 focus:ring-red-300 transition duration-300">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada data rak yang tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
