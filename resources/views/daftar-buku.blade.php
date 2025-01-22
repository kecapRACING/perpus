<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased bg-gray-100">

    <!-- Navbar Section -->
    <nav class="fixed top-0 left-0 w-full bg-gradient-to-r from-gray-800 to-gray-600 text-white shadow-md z-10">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="text-3xl font-extrabold">Perpustakaan Digital Sekolah</h1>
            <div class="space-x-4">
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="inline-block">
                        @csrf
                        <button
                            class="px-6 py-2 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 transition-colors">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition-colors">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition-colors">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Layout with Sidebar -->
    <div class="flex pt-16">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white min-h-screen px-4 py-6 fixed top-0 left-0">
            <h2 class="text-xl font-semibold mb-6">Menu</h2>
            <ul>
                <li class="mb-4">
                    <a href="{{ route('daftar-buku') }}" class="hover:text-gray-400">Daftar Buku</a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('peminjaman') }}" class="hover:text-gray-400">Peminjaman</a>
                </li>

            </ul>
        </div>

        <!-- Content Area -->
        <div class="flex-1 p-8 ml-64">
            <!-- Daftar Buku Section -->
            <!-- Daftar Buku Section -->
            <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">Daftar Buku</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($books as $book)
                    <div class="card bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $book->judul_buku }}</h3>
                        <p class="text-gray-600 mt-2">{{ $book->deskripsi }}</p>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

</body>

</html>