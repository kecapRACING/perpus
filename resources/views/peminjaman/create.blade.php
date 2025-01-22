<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Pinjam Buku</h1>
        <h2 class="text-xl font-semibold mb-2">{{ $pustaka->judul_pustaka }}</h2>
        <p class="text-gray-700 mb-2">Penulis: {{ $pustaka->penulis }}</p>
        <p class="text-gray-700 mb-4">Tahun: {{ $pustaka->tahun }}</p>
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <input type="hidden" name="pustaka_id" value="{{ $pustaka->id_pustaka }}">
            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Konfirmasi Peminjaman
            </button>
        </form>
    </div>
</body>

</html>