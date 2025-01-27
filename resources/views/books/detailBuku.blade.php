<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Font and background improvements */
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
        }

        h1,
        h2 {
            font-weight: 600;
        }

        /* Navbar Hover Efek */
        .navbar a:hover {
            color: #bbe1fa;
            transform: scale(1.05);
        }

        /* Sticky Navbar */
        .navbar.scroll {
            background-color: rgba(0, 0, 0, 0.8);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Sidebar Hover Efek */
        aside .space-y-4 a:hover {
            background-color: #3b3b3b;
            color: #00aaff;
            transition: all 0.3s ease;
        }

        /* Animasi Transisi untuk Sidebar */
        aside {
            transition: transform 0.3s ease-in-out;
        }

        /* Button Hover */
        button:hover {
            background-color: #003366;
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        /* Animasi untuk Pesan Sukses */
        .notification {
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .notification.show {
            opacity: 1;
        }

        /* Gambar Buku Responsif */
        /* Gambar Buku Responsif */
        img {
            object-fit: cover;
            /* Membuat gambar memenuhi kontainer tanpa merusak rasio aspek */
            width: 100%;
            /* Membuat gambar mengisi seluruh lebar kontainer */
            height: 100%;
            /* Membuat gambar mengisi seluruh tinggi kontainer */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }


        /* Mobile-first Design */
        @media (max-width: 768px) {
            .flex {
                flex-direction: column;
                align-items: center;
            }

            .w-1/3 {
                width: 100%;
                max-height: none;
            }

            .ml-64 {
                margin-left: 0;
            }

            .max-w-4xl {
                width: 90%;
            }

            /* Menu Burger untuk Mobile */
            #mobile-menu {
                display: none;
            }

            .lg:hidden {
                display: block;
            }
        }
    </style>
</head>

<body class="antialiased bg-gray-50 font-sans">

    <!-- Navbar Section -->
    <nav
        class="fixed top-0 left-0 w-full bg-gradient-to-r from-blue-600 to-blue-500/90 backdrop-blur text-white shadow-md z-20 transition-all navbar">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="text-3xl font-bold hover:text-blue-200 transition-colors">
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
                    <a href="{{ route('login') }}"
                        class="px-6 py-2 bg-blue-700 rounded-lg hover:bg-blue-800 transition-all">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-2 bg-green-500 rounded-lg hover:bg-green-600 transition-all">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Layout -->
    <div class="flex pt-20">
        <!-- Sidebar -->
        <aside
            class="lg:w-64 w-full fixed top-0 left-0 bg-gray-900 text-white min-h-screen shadow-lg transition-all lg:block hidden">
            <div class="px-6 py-8">
                <h2 class="text-lg font-semibold mb-6 text-gray-300">Menu Navigasi</h2>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('books.index') }}"
                            class="flex items-center gap-2 p-2 rounded-md hover:bg-gray-800 hover:text-blue-300 transition-all">
                            <span>📚</span> Daftar Buku
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('books.peminjaman') }}"
                            class="flex items-center gap-2 p-2 rounded-md hover:bg-gray-800 hover:text-blue-300 transition-all">
                            <span>📖</span> Peminjaman
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Mobile Menu Toggle -->
        <div class="lg:hidden block p-4">
            <button id="menu-toggle" class="text-white">☰ Menu</button>
            <div id="mobile-menu" class="hidden mt-4">
                <ul class="space-y-4">
                    <li><a href="{{ route('books.index') }}" class="block p-2 text-white">📚 Daftar Buku</a></li>
                    <li><a href="{{ route('books.peminjaman') }}" class="block p-2 text-white">📖 Peminjaman</a></li>
                </ul>
            </div>
        </div>

        <!-- Content Area -->
        <main class="flex-1 p-8 ml-64">
            <h2 class="text-4xl font-semibold text-gray-800 text-center mb-8">Detail Buku</h2>

            <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg card-shadow card">
                <h1 class="text-2xl font-bold mb-4 text-gray-700">Pinjam Buku</h1>

                <!-- Gambar dan Teks -->
                <div class="flex gap-8 mb-6 items-center">
                    <!-- Gambar Buku di Kiri -->
                    <div class="w-1/3">
                        <img src="{{ asset('storage/' . $pustaka->gambar) }}" alt="Gambar {{ $pustaka->judul_pustaka }}"
                            class="w-full h-full object-cover rounded-lg shadow-md">
                    </div>

                    <!-- Teks Buku di Kanan -->
                    <div class="flex-1">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $pustaka->judul_pustaka }}</h2>
                        <p class="text-gray-600"><strong>Pengarang:</strong>
                            {{ $pustaka->pengarang->nama_pengarang ?? '-' }}</p>
                        <p class="text-gray-600"><strong>Penerbit:</strong>
                            {{ $pustaka->penerbit->nama_penerbit ?? '-' }}</p>
                        <p class="text-gray-600"><strong>Tahun Terbit:</strong> {{ $pustaka->tahun_terbit }}</p>
                        <p class="text-gray-600"><strong>Kategori (DDC):</strong> {{ $pustaka->ddc->ddc ?? '-' }}</p>
                        <p class="text-gray-600"><strong>Format Buku:</strong> {{ $pustaka->format->format ?? '-' }}</p>
                        <p class="text-gray-600"><strong>ISBN:</strong> {{ $pustaka->isbn ?? 'Tidak tersedia' }}</p>
                        <p class="text-gray-600"><strong>Kondisi Buku:</strong> {{ $pustaka->kondisi_buku }}</p>
                        <p class="text-gray-600"><strong>Harga Buku:</strong>
                            Rp{{ number_format($pustaka->harga_buku, 0, ',', '.') }}</p>
                        <p class="text-gray-600"><strong>Denda Terlambat:</strong>
                            Rp{{ number_format($pustaka->denda_terlambat, 0, ',', '.') }}</p>
                        <p class="text-gray-600"><strong>Denda Hilang:</strong>
                            Rp{{ number_format($pustaka->denda_hilang, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- Form Konfirmasi Peminjaman -->
                <form action="{{ route('peminjaman.create', ['id' => $pustaka->id_pustaka]) }}" method="GET"
                    class="mt-6">
                    @csrf
                    <input type="hidden" name="pustaka_id" value="{{ $pustaka->id_pustaka }}">
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all text-lg font-semibold">
                        Buat Reservasi
                    </button>
                </form>
            </div>

            <!-- Pesan Sukses -->
            @if (session('success'))
                <div
                    class="notification p-4 mb-4 text-green-800 bg-green-200 rounded-lg animate__animated animate__fadeIn animate__delay-1s">
                    {{ session('success') }}
                </div>
            @endif

        </main>

    </div>

</body>

</html>