<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f7fb;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .button-hover:hover {
            background-color: #4F46E5;
            transform: scale(1.05);
        }

        input,
        select {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            border-radius: 10px;
        }

        input:focus,
        select:focus {
            box-shadow: 0 0 0 3px #3B82F6;
        }

        nav {
            position: sticky;
            top: 0;
            z-index: 50;
        }

        /* Custom Sidebar styling */
        .sidebar {
            transition: width 0.3s ease;
        }

        .sidebar:hover {
            width: 270px;
        }

        /* Adjust layout for smaller screens */
        @media (max-width: 768px) {
            .ml-64 {
                margin-left: 0;
            }
            .sidebar {
                width: 220px;
            }
        }
    </style>
</head>

<body>

    <nav class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-md transition-all">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="text-3xl font-semibold hover:text-blue-200 transition-colors">
                Perpustakaan Digital Sekolah
            </h1>
            <div class="space-x-4">
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="inline-block">
                        @csrf
                        <button class="px-6 py-2 bg-red-500 rounded-lg hover:bg-red-600 transition-transform transform hover:scale-105">
                            Keluar
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-700 rounded-lg hover:bg-blue-800 transition-transform transform hover:scale-105">Masuk</a>
                    <a href="{{ route('register') }}" class="px-6 py-2 bg-green-500 rounded-lg hover:bg-green-600 transition-transform transform hover:scale-105">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="flex pt-24">
        <aside class="sidebar w-64 bg-gray-900 text-white min-h-screen fixed top-0 left-0 shadow-lg">
            <div class="px-6 py-8">
                <h2 class="text-lg font-semibold mb-6 text-gray-300">Menu Navigasi</h2>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('books.index') }}" class="flex items-center gap-2 p-2 rounded-md hover:bg-gray-800 hover:text-blue-300 transition-all">
                            <span>📚</span> Daftar Buku
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('books.peminjaman') }}" class="flex items-center gap-2 p-2 rounded-md hover:bg-gray-800 hover:text-blue-300 transition-all">
                            <span>📖</span> Peminjaman
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <main class="flex-1 p-8 ml-64">
            <h2 class="text-4xl font-semibold text-gray-800 text-center mb-8">Form Peminjaman</h2>

            @if (session('success'))
                <div class="p-4 mb-4 text-green-800 bg-green-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('peminjaman.store') }}" method="POST" class="space-y-6 bg-white p-8 rounded-lg shadow-lg card">
                @csrf
                <input type="hidden" name="id_pustaka" value="{{ $pustaka->id_pustaka }}">
                <input type="hidden" id="id_anggota" name="id_anggota" value="{{ auth()->user()->id_anggota }}">

                <div>
                    <label for="pustaka" class="block text-gray-700 font-semibold">Judul Buku</label>
                    <input type="text" id="pustaka" name="pustaka" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="50" value="{{ $pustaka->judul_pustaka }}" readonly>
                </div>

                <div>
                    <label for="tgl_pinjam" class="block text-gray-700 font-semibold">Tanggal Pinjam</label>
                    <input type="date" id="tgl_pinjam" name="tgl_pinjam" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('tgl_pinjam') }}" required>
                </div>

                <div>
                    <label for="tgl_kembali" class="block text-gray-700 font-semibold">Tanggal Kembali</label>
                    <input type="date" id="tgl_kembali" name="tgl_kembali" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('tgl_kembali') }}" required>
                </div>

                <div>
                    <label for="keterangan" class="block text-gray-700 font-semibold">Keterangan</label>
                    <input type="text" id="keterangan" name="keterangan" class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="50" value="{{ old('keterangan') }}" required>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200 button-hover">
                        Buat Reservasi
                    </button>
                </div>
            </form>

        </main>
    </div>

</body>

</html>
