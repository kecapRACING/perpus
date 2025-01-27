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
        
        <!-- Gambar Buku -->
        <div class="mb-6">
            <img src="{{ asset('storage/' . $pustaka->gambar) }}" alt="Gambar {{ $pustaka->judul_pustaka }}" 
                class="w-full max-h-72 object-cover rounded-lg shadow-md">
        </div>

        <h2 class="text-xl font-semibold mb-2">{{ $pustaka->judul_pustaka }}</h2>
        <p><strong>Pengarang:</strong> {{ $pustaka->pengarang->nama_pengarang ?? '-' }}</p>
        <p><strong>Penerbit:</strong> {{ $pustaka->penerbit->nama_penerbit ?? '-' }}</p>
        <p><strong>Tahun Terbit:</strong> {{ $pustaka->tahun_terbit }}</p>
        <p><strong>Kategori (DDC):</strong> {{ $pustaka->ddc->ddc ?? '-' }}</p>
        <p><strong>Format Buku:</strong> {{ $pustaka->format->nama_format ?? '-' }}</p>
        <p><strong>ISBN:</strong> {{ $pustaka->isbn ?? 'Tidak tersedia' }}</p>
        <p><strong>Kondisi Buku:</strong> {{ $pustaka->kondisi_buku }}</p>
        <p><strong>Harga Buku:</strong> Rp{{ number_format($pustaka->harga_buku, 0, ',', '.') }}</p>
        <p><strong>Denda Terlambat:</strong> Rp{{ number_format($pustaka->denda_terlambat, 0, ',', '.') }}</p>
        <p><strong>Denda Hilang:</strong> Rp{{ number_format($pustaka->denda_hilang, 0, ',', '.') }}</p>
        
        <!-- Form Konfirmasi Peminjaman -->
        <form action="{{ route('peminjaman.store') }}" method="POST" class="mt-6">
            @csrf
            <input type="hidden" name="pustaka_id" value="{{ $pustaka->id_pustaka }}">
            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Konfirmasi Peminjaman
            </button>
        </form>
    </div>
</body>

</html>
