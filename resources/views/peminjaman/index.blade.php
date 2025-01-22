<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased bg-gray-100 font-sans">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-md z-20">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="text-3xl font-bold">Perpustakaan Digital Sekolah</h1>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex pt-20">
        <main class="flex-1 p-8 ml-64">
            <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">Peminjaman Buku</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Daftar peminjaman buku -->
                @foreach ($peminjamen as $peminjaman)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h5 class="text-lg font-semibold text-gray-800">{{ $peminjaman->judul_pustaka }}</h5>
                        <p class="text-gray-600">Tanggal Peminjaman: {{ $peminjaman->tanggal_peminjaman }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>

</body>

</html>