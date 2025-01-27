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
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            transition: all 0.3s ease-in-out;
        }
        .navbar:hover {
            background-color: #1e3a8a;
        }
        .sidebar:hover {
            width: 280px;
        }
        .sidebar ul li a {
            transition: background-color 0.3s, transform 0.3s;
        }
        .sidebar ul li a:hover {
            background-color: #1d4ed8;
            transform: translateX(10px);
        }
        .table-hover tbody tr:hover {
            background-color: #f3f4f6;
        }
        .table-header {
            background-color: #E5E7EB;
            border-radius: 8px;
        }
        .table-cell {
            padding: 12px;
            font-size: 0.875rem;
            color: #4B5563;
        }
        .table-cell-head {
            padding: 12px;
            font-size: 1rem;
            font-weight: 600;
            color: #1F2937;
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- Navbar Section -->
    <nav class="fixed top-0 left-0 w-full bg-gradient-to-r from-blue-600 to-blue-500 shadow-md z-20 transition-all">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="text-3xl font-semibold text-white">
                Perpustakaan Digital Sekolah
            </h1>
            <div class="space-x-4">
                @auth
                <form action="{{ route('logout') }}" method="POST" class="inline-block">
                    @csrf
                    <button class="px-6 py-2 bg-red-500 rounded-lg hover:bg-red-600 transition-all">
                        Keluar
                    </button>
                </form>
                @else
                <a href="{{ route('login') }}" class="px-6 py-2 bg-blue-700 rounded-lg hover:bg-blue-800 transition-all">Masuk</a>
                <a href="{{ route('register') }}" class="px-6 py-2 bg-green-500 rounded-lg hover:bg-green-600 transition-all">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Layout -->
    <div class="flex pt-20">

        <!-- Sidebar -->
        <aside class="sidebar w-64 bg-gray-900 text-white min-h-screen fixed top-0 left-0 shadow-lg transition-all">
            <div class="px-6 py-8">
                <h2 class="text-lg font-semibold mb-6 text-blue-200">Menu Navigasi</h2>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('books.index') }}" class="flex items-center gap-2 p-3 rounded-md hover:bg-blue-700 hover:text-white transition-all">
                            <span>📚</span> Daftar Buku
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('books.peminjaman') }}" class="flex items-center gap-2 p-3 rounded-md hover:bg-blue-700 hover:text-white transition-all">
                            <span>📖</span> Peminjaman
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Content Area -->
        <main class="flex-1 p-8 ml-64">
            <h2 class="text-4xl font-semibold text-gray-800 text-center mb-8">Daftar Peminjaman</h2>

            <!-- Pesan Sukses -->
            @if (session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-200 rounded-lg shadow-lg animate__animated animate__fadeIn animate__delay-1s">
                {{ session('success') }}
            </div>
            @endif

            <table class="min-w-full table-auto bg-white rounded-lg shadow-md">
                <thead class="table-header">
                    <tr>
                        <th class="table-cell-head">No</th>
                        <th class="table-cell-head">Judul Buku</th>
                        <th class="table-cell-head">Tanggal Pinjam</th>
                        <th class="table-cell-head">Tanggal Kembali</th>
                        <th class="table-cell-head">Tanggal Pengembalian</th>
                        <th class="table-cell-head">Keterangan</th>
                        <th class="table-cell-head">Dikembalikan</th>
                    </tr>
                </thead>
                <tbody class="table-hover">
                    @foreach ($transaksi as $index => $trans)
                    <tr class="border-b">
                        <td class="table-cell">{{ $index + 1 }}</td>
                        <td class="table-cell">{{ $trans->pustaka->judul_pustaka }}</td>
                        <td class="table-cell">{{ $trans->tgl_pinjam }}</td>
                        <td class="table-cell">{{ $trans->tgl_kembali }}</td>
                        <td class="table-cell">{{ $trans->tgl_pengembalian }}</td>
                        <td class="table-cell">{{ $trans->keterangan }}</td>
                        <td class="table-cell">
                            <span class="bg-{{ $trans->fp == '0' ? 'red' : 'green' }}-500 text-white py-1 px-3 rounded-full">
                                {{ $trans->fp == '0' ? 'Belum Dikembalikan' : 'Sudah Dikembalikan' }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($transaksi->isEmpty())
            <p class="text-gray-500 mt-4 text-center">Anda belum memiliki transaksi.</p>
            @endif
        </main>

    </div>

</body>

</html>
