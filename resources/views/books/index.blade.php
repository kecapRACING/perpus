<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="antialiased bg-gray-100 font-sans">

    <!-- Navbar Section -->
    <nav class="fixed top-0 left-0 w-full bg-gradient-to-r from-blue-600 to-blue-500/90 backdrop-blur text-white shadow-md z-20 transition-all">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="text-3xl font-bold hover:text-blue-200 transition-colors">
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

    <!-- Main Layout -->
    <div class="flex pt-20">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white min-h-screen fixed top-0 left-0 shadow-lg transition-all hover:w-72">
            <div class="px-6 py-8">
                <h2 class="text-lg font-bold mb-6">Menu Navigasi</h2>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('daftar-buku') }}" class="flex items-center gap-2 p-2 rounded-md hover:bg-gray-800 hover:text-blue-300 transition-all">
                            <span>📚</span> Daftar Buku
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('peminjaman') }}" class="flex items-center gap-2 p-2 rounded-md hover:bg-gray-800 hover:text-blue-300 transition-all">
                            <span>📖</span> Peminjaman
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Content Area -->
        <main class="flex-1 p-8 ml-64">
            <h2 class="text-4xl font-semibold text-gray-800 text-center mb-8">Daftar Buku</h2>

            <!-- Pesan Sukses -->
            @if (session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-200 rounded-lg animate__animated animate__fadeIn animate__delay-1s">
                {{ session('success') }}
            </div>
            @endif

            <!-- Buku dalam Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($pustakas as $pustaka)
                <div class="bg-white shadow-2xl rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-2xl">
                    <!-- Gambar Buku -->
                    <div class="aspect-[3/4] overflow-hidden">
                        <img src="{{ $pustaka->gambar ? asset('storage/' . $pustaka->gambar) : asset('images/default-book.png') }}"
                            class="w-full h-full object-cover rounded-t-lg transition-all transform hover:scale-110" alt="Gambar {{ $pustaka->judul_pustaka }}">
                    </div>
                    <!-- Informasi Buku -->
                    <div class="p-6">
                        <h5 class="text-xl font-semibold text-gray-800 hover:text-blue-500 transition-colors">{{ $pustaka->judul_pustaka }}</h5>
                        <p class="text-gray-600 text-sm">Penulis: {{ $pustaka->penulis }}</p>
                        <p class="text-gray-600 text-sm">Tahun: {{ $pustaka->tahun }}</p>
                        <p class="text-gray-600 text-sm">Harga: Rp{{ number_format($pustaka->harga, 0, ',', '.') }}</p>
                        <p class="text-gray-600 text-sm mt-2">{{ $pustaka->abstraksi }}</p>
                        <a href="{{ route('peminjaman.create', ['id' => $pustaka->id_pustaka]) }}"
                            class="mt-4 inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            Pinjam Buku
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </main>

    </div>

</body>

</html>