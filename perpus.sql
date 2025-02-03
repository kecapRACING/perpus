-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2025 pada 01.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `judul_buku`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Pemrograman Web Dasar', 'Buku ini mengajarkan dasar-dasar pemrograman web dengan HTML, CSS, dan JavaScript.', '2025-02-02 17:28:54', '2025-02-02 17:28:54'),
(2, 'Dasar-dasar Pemrograman Java', 'Buku ini adalah pengantar untuk pemrograman menggunakan bahasa Java, cocok untuk pemula.', '2025-02-02 17:28:54', '2025-02-02 17:28:54'),
(3, 'Pengenalan Python untuk Data Science', 'Belajar Python untuk analisis data, termasuk penggunaan pustaka seperti Pandas dan NumPy.', '2025-02-02 17:28:54', '2025-02-02 17:28:54'),
(4, 'Teknik Pengembangan Aplikasi Mobile', 'Buku ini membahas cara membangun aplikasi mobile untuk platform Android dan iOS.', '2025-02-02 17:28:54', '2025-02-02 17:28:54'),
(5, 'Pengantar Machine Learning', 'Buku ini mengenalkan dasar-dasar machine learning dengan menggunakan Python dan pustaka seperti Scikit-learn.', '2025-02-02 17:28:54', '2025-02-02 17:28:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '0001_01_01_000000_create_users_table', 1),
(22, '0001_01_01_000001_create_cache_table', 1),
(23, '0001_01_01_000002_create_jobs_table', 1),
(24, '2025_01_12_063050_create_library_tables', 1),
(25, '2025_01_16_035006_create_books_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pustaka_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` bigint(20) UNSIGNED NOT NULL,
  `id_jenis_anggota` bigint(20) UNSIGNED NOT NULL,
  `kode_anggota` varchar(20) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `masa_aktif` date NOT NULL,
  `fa` enum('Y','T') NOT NULL,
  `keterangan` varchar(45) NOT NULL,
  `foto` longtext NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `id_jenis_anggota`, `kode_anggota`, `nama_anggota`, `tempat`, `tgl_lahir`, `alamat`, `no_telp`, `email`, `tgl_daftar`, `masa_aktif`, `fa`, `keterangan`, `foto`, `username`, `password`) VALUES
(1, 1, 'ADM001', 'Admin Perpustakaan', 'Surabaya', '1990-01-01', 'Jl. Perpustakaan No. 1', '081234567890', 'admin@gmail.com', '2025-02-03', '2026-02-03', 'Y', 'Admin Sistem', '', 'admin', '$2y$12$aMkegR/aOyTazvuLKGdKRu9qY.xRJGmgpIWZTB1ApPit2fI.Pi9aG'),
(2, 2, '2', 'abdi', 'jombang', '2025-02-03', 'gedangan', '123456789', 'abdi@gmail.com', '2025-02-03', '2026-02-03', 'Y', 'siswa', 'public/foto/ZHfFSxlLjdrxBEW0wavAtFUpktLjHzVu4OoFqXYn.png', 'abdi', '$2y$12$2QloEBFvitOqwQ.n/K..zujrJYte/r6X7IFSUmHmjKZkEwlXY/WfC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ddc`
--

CREATE TABLE `tbl_ddc` (
  `id_ddc` bigint(20) UNSIGNED NOT NULL,
  `id_rak` bigint(20) UNSIGNED NOT NULL,
  `kode_ddc` varchar(10) NOT NULL,
  `ddc` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_ddc`
--

INSERT INTO `tbl_ddc` (`id_ddc`, `id_rak`, `kode_ddc`, `ddc`, `keterangan`) VALUES
(1, 1, '1', 'Buku', 'Buku 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_format`
--

CREATE TABLE `tbl_format` (
  `id_format` bigint(20) UNSIGNED NOT NULL,
  `kode_format` varchar(10) NOT NULL,
  `format` varchar(25) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_format`
--

INSERT INTO `tbl_format` (`id_format`, `kode_format`, `format`, `keterangan`) VALUES
(1, '1', 'Novel', 'Buku Novel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_anggota`
--

CREATE TABLE `tbl_jenis_anggota` (
  `id_jenis_anggota` bigint(20) UNSIGNED NOT NULL,
  `kode_jenis_anggota` varchar(20) NOT NULL,
  `jenis_anggota` varchar(15) NOT NULL,
  `max_pinjam` varchar(5) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_jenis_anggota`
--

INSERT INTO `tbl_jenis_anggota` (`id_jenis_anggota`, `kode_jenis_anggota`, `jenis_anggota`, `max_pinjam`, `keterangan`) VALUES
(1, 'ADM', 'Admin', '10', 'Admin Perpustakaan'),
(2, 'SIS', 'Siswa', '5', 'Anggota Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penerbit`
--

CREATE TABLE `tbl_penerbit` (
  `id_penerbit` bigint(20) UNSIGNED NOT NULL,
  `kode_penerbit` varchar(10) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `alamat_penerbit` varchar(150) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `website` varchar(50) NOT NULL,
  `kontak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_penerbit`
--

INSERT INTO `tbl_penerbit` (`id_penerbit`, `kode_penerbit`, `nama_penerbit`, `alamat_penerbit`, `no_telp`, `email`, `fax`, `website`, `kontak`) VALUES
(1, '01', 'kecap', 'gedangan', '0891146224', 'kecap@gmail.com', '012', 'https://web.whatsapp.com/', '01920229121');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengarang`
--

CREATE TABLE `tbl_pengarang` (
  `id_pengarang` bigint(20) UNSIGNED NOT NULL,
  `kode_pengarang` varchar(10) NOT NULL,
  `gelar_depan` varchar(10) DEFAULT NULL,
  `nama_pengarang` varchar(50) NOT NULL,
  `gelar_belakang` varchar(10) DEFAULT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(50) NOT NULL,
  `biografi` longtext NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_pengarang`
--

INSERT INTO `tbl_pengarang` (`id_pengarang`, `kode_pengarang`, `gelar_depan`, `nama_pengarang`, `gelar_belakang`, `no_telp`, `email`, `website`, `biografi`, `keterangan`) VALUES
(1, '10', 'spd', 'ocobot', 'ww', '0891146224', 'ocobot@gmail.com', 'https://web.whatsapp.com/', 'Pengarang terkenal', 'pengarang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perpustakaan`
--

CREATE TABLE `tbl_perpustakaan` (
  `id_perpustakaan` bigint(20) UNSIGNED NOT NULL,
  `nama_perpustakaan` varchar(100) NOT NULL,
  `nama_pustakawan` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pustaka`
--

CREATE TABLE `tbl_pustaka` (
  `id_pustaka` bigint(20) UNSIGNED NOT NULL,
  `kode_pustaka` bigint(20) UNSIGNED NOT NULL,
  `id_ddc` bigint(20) UNSIGNED NOT NULL,
  `id_format` bigint(20) UNSIGNED NOT NULL,
  `id_penerbit` bigint(20) UNSIGNED NOT NULL,
  `id_pengarang` bigint(20) UNSIGNED NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `judul_pustaka` varchar(100) NOT NULL,
  `tahun_terbit` varchar(5) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `keterangan_fisik` varchar(100) NOT NULL,
  `keterangan_tambahan` varchar(100) NOT NULL,
  `abstraksi` longtext NOT NULL,
  `gambar` longtext NOT NULL,
  `harga_buku` int(11) NOT NULL,
  `kondisi_buku` varchar(15) NOT NULL,
  `fp` enum('0','1') NOT NULL,
  `jml_pinjam` tinyint(4) NOT NULL,
  `denda_terlambat` int(11) NOT NULL,
  `denda_hilang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_pustaka`
--

INSERT INTO `tbl_pustaka` (`id_pustaka`, `kode_pustaka`, `id_ddc`, `id_format`, `id_penerbit`, `id_pengarang`, `isbn`, `judul_pustaka`, `tahun_terbit`, `keyword`, `keterangan_fisik`, `keterangan_tambahan`, `abstraksi`, `gambar`, `harga_buku`, `kondisi_buku`, `fp`, `jml_pinjam`, `denda_terlambat`, `denda_hilang`) VALUES
(1, 1, 1, 1, 1, 1, '012', 'Laskar pelangi', '2022', 'Romance', 'bagus', 'barang nya bagus', 'Novel ini bercerita tentang kehidupan 10 anak dari keluarga miskin yang bersekolah (SD dan SMP) di sebuah sekolah Muhammadiyah di Pulau Belitung yang penuh dengan keterbatasan. Mereka bersekolah dan belajar pada kelas yang sama dari kelas 1 SD sampai kelas 3 SMP, dan menyebut diri mereka sebagai Laskar Pelangi.', 'pustaka/UWmrxY6ZSj27bjqcOSsMhfi8ETY33m40X8Bqt6O4.jpg', 1000, 'bagus', '1', 3, 10000, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` bigint(20) UNSIGNED NOT NULL,
  `kode_rak` varchar(10) NOT NULL,
  `rak` varchar(25) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `kode_rak`, `rak`, `keterangan`) VALUES
(1, '1', 'A', 'Rak Novel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_pustaka` bigint(20) UNSIGNED NOT NULL,
  `id_anggota` bigint(20) UNSIGNED NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `fp` enum('0','1') NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `tbl_anggota_kode_anggota_unique` (`kode_anggota`),
  ADD UNIQUE KEY `tbl_anggota_nama_anggota_unique` (`nama_anggota`),
  ADD UNIQUE KEY `tbl_anggota_username_unique` (`username`),
  ADD KEY `tbl_anggota_id_jenis_anggota_foreign` (`id_jenis_anggota`);

--
-- Indeks untuk tabel `tbl_ddc`
--
ALTER TABLE `tbl_ddc`
  ADD PRIMARY KEY (`id_ddc`),
  ADD UNIQUE KEY `tbl_ddc_kode_ddc_unique` (`kode_ddc`),
  ADD KEY `tbl_ddc_id_rak_foreign` (`id_rak`);

--
-- Indeks untuk tabel `tbl_format`
--
ALTER TABLE `tbl_format`
  ADD PRIMARY KEY (`id_format`),
  ADD UNIQUE KEY `tbl_format_kode_format_unique` (`kode_format`);

--
-- Indeks untuk tabel `tbl_jenis_anggota`
--
ALTER TABLE `tbl_jenis_anggota`
  ADD PRIMARY KEY (`id_jenis_anggota`),
  ADD UNIQUE KEY `tbl_jenis_anggota_kode_jenis_anggota_unique` (`kode_jenis_anggota`);

--
-- Indeks untuk tabel `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  ADD PRIMARY KEY (`id_penerbit`),
  ADD UNIQUE KEY `tbl_penerbit_kode_penerbit_unique` (`kode_penerbit`),
  ADD UNIQUE KEY `tbl_penerbit_nama_penerbit_unique` (`nama_penerbit`);

--
-- Indeks untuk tabel `tbl_pengarang`
--
ALTER TABLE `tbl_pengarang`
  ADD PRIMARY KEY (`id_pengarang`),
  ADD UNIQUE KEY `tbl_pengarang_kode_pengarang_unique` (`kode_pengarang`),
  ADD UNIQUE KEY `tbl_pengarang_nama_pengarang_unique` (`nama_pengarang`);

--
-- Indeks untuk tabel `tbl_perpustakaan`
--
ALTER TABLE `tbl_perpustakaan`
  ADD PRIMARY KEY (`id_perpustakaan`),
  ADD UNIQUE KEY `tbl_perpustakaan_nama_perpustakaan_unique` (`nama_perpustakaan`),
  ADD UNIQUE KEY `tbl_perpustakaan_email_unique` (`email`);

--
-- Indeks untuk tabel `tbl_pustaka`
--
ALTER TABLE `tbl_pustaka`
  ADD PRIMARY KEY (`id_pustaka`),
  ADD KEY `tbl_pustaka_id_ddc_foreign` (`id_ddc`),
  ADD KEY `tbl_pustaka_id_format_foreign` (`id_format`),
  ADD KEY `tbl_pustaka_id_penerbit_foreign` (`id_penerbit`),
  ADD KEY `tbl_pustaka_id_pengarang_foreign` (`id_pengarang`);

--
-- Indeks untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`),
  ADD UNIQUE KEY `tbl_rak_kode_rak_unique` (`kode_rak`),
  ADD UNIQUE KEY `tbl_rak_rak_unique` (`rak`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `tbl_transaksi_id_pustaka_foreign` (`id_pustaka`),
  ADD KEY `tbl_transaksi_id_anggota_foreign` (`id_anggota`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id_anggota` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_ddc`
--
ALTER TABLE `tbl_ddc`
  MODIFY `id_ddc` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_format`
--
ALTER TABLE `tbl_format`
  MODIFY `id_format` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_anggota`
--
ALTER TABLE `tbl_jenis_anggota`
  MODIFY `id_jenis_anggota` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  MODIFY `id_penerbit` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengarang`
--
ALTER TABLE `tbl_pengarang`
  MODIFY `id_pengarang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_perpustakaan`
--
ALTER TABLE `tbl_perpustakaan`
  MODIFY `id_perpustakaan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pustaka`
--
ALTER TABLE `tbl_pustaka`
  MODIFY `id_pustaka` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD CONSTRAINT `tbl_anggota_id_jenis_anggota_foreign` FOREIGN KEY (`id_jenis_anggota`) REFERENCES `tbl_jenis_anggota` (`id_jenis_anggota`);

--
-- Ketidakleluasaan untuk tabel `tbl_ddc`
--
ALTER TABLE `tbl_ddc`
  ADD CONSTRAINT `tbl_ddc_id_rak_foreign` FOREIGN KEY (`id_rak`) REFERENCES `tbl_rak` (`id_rak`);

--
-- Ketidakleluasaan untuk tabel `tbl_pustaka`
--
ALTER TABLE `tbl_pustaka`
  ADD CONSTRAINT `tbl_pustaka_id_ddc_foreign` FOREIGN KEY (`id_ddc`) REFERENCES `tbl_ddc` (`id_ddc`),
  ADD CONSTRAINT `tbl_pustaka_id_format_foreign` FOREIGN KEY (`id_format`) REFERENCES `tbl_format` (`id_format`),
  ADD CONSTRAINT `tbl_pustaka_id_penerbit_foreign` FOREIGN KEY (`id_penerbit`) REFERENCES `tbl_penerbit` (`id_penerbit`),
  ADD CONSTRAINT `tbl_pustaka_id_pengarang_foreign` FOREIGN KEY (`id_pengarang`) REFERENCES `tbl_pengarang` (`id_pengarang`);

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_id_anggota_foreign` FOREIGN KEY (`id_anggota`) REFERENCES `tbl_anggota` (`id_anggota`),
  ADD CONSTRAINT `tbl_transaksi_id_pustaka_foreign` FOREIGN KEY (`id_pustaka`) REFERENCES `tbl_pustaka` (`id_pustaka`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
