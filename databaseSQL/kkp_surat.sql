-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2020 pada 04.10
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkp_surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departement`
--

CREATE TABLE `departement` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_departement` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `departement`
--

INSERT INTO `departement` (`id`, `nama_departement`) VALUES
(1, 'Departement TI'),
(2, 'Departement K3'),
(3, 'Departement Diklat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2020_01_08_022514_create_tbl_instansis_table', 1),
(5, '2020_01_08_022529_create_tbl_disposisis_table', 1),
(7, '2020_01_08_022557_create_tbl_surat_keluars_table', 1),
(8, '2020_01_08_022622_create_tbl_users_table', 1),
(9, '2020_01_08_022628_create_tbl_setts_table', 1),
(57, '2020_01_16_011249_asal_surat', 2),
(154, '2020_02_19_032107_create_departement', 3),
(161, '2020_02_20_024828_create_departement', 4),
(175, '2014_10_12_000000_create_users_table', 5),
(176, '2014_10_12_100000_create_password_resets_table', 5),
(177, '2019_08_19_000000_create_failed_jobs_table', 5),
(178, '2020_01_08_022547_create_tbl_surat_masuk_table', 5),
(179, '2020_02_05_033521_create_tbl_disposisi', 5),
(180, '2020_02_19_030223_create_tbl_surat_keluar', 5),
(181, '2020_02_20_025138_create_departement', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_disposisi`
--

CREATE TABLE `tbl_disposisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tujuan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_instansi`
--

CREATE TABLE `tbl_instansi` (
  `id_instansi` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sett`
--

CREATE TABLE `tbl_sett` (
  `id_sett` int(10) UNSIGNED NOT NULL,
  `surat_masuk` tinyint(4) NOT NULL,
  `surat_keluar` tinyint(4) NOT NULL,
  `referensi` tinyint(4) NOT NULL,
  `id_user` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_keluar`
--

CREATE TABLE `tbl_surat_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `id_departement` int(10) UNSIGNED NOT NULL,
  `no_surat` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `isi` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `kode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `keterangan` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tbl_surat_keluar`
--

INSERT INTO `tbl_surat_keluar` (`id`, `no_agenda`, `id_departement`, `no_surat`, `isi`, `kode`, `tgl_surat`, `keterangan`, `file`) VALUES
(1, 1, 2, '20/2020/Dep.TI', 'Surat Penting', '2220', '2020-02-20', 'Diterima', '20200220073933.jpeg'),
(3, 2, 3, '04/2020/Dep.Diklat', 'Surat Penting', '1457', '2020-03-04', 'Diterima', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_masuk`
--

CREATE TABLE `tbl_surat_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `no_surat` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_departement` int(10) UNSIGNED NOT NULL,
  `isi` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `kode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `keterangan` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tbl_surat_masuk`
--

INSERT INTO `tbl_surat_masuk` (`id`, `no_agenda`, `no_surat`, `id_departement`, `isi`, `kode`, `tgl_surat`, `tgl_diterima`, `keterangan`, `file`) VALUES
(1, 1, '20/2020/Dep.TI', 1, 'Surat Penting', '4432', '2020-02-20', '2020-02-20', 'Diterima', '20200220035138.pdf'),
(2, 2, '10/2020/Dep.K3', 2, 'Surat Penting', '3321', '2020-02-20', '2020-02-20', 'Diterima', '20200226035132.jpeg'),
(3, 3, '04/2020/Dep.K3', 2, 'Surat Penting', '2009', '2020-03-04', '2020-03-04', 'Diterima', '20200304022433.doc'),
(4, 4, '04/2020/Dep.Diklat', 3, 'Surat Penting', '1121', '2020-03-04', '2020-03-04', 'Diterima', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` enum('admin','operator','user') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `nip`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(1, '161420133', '$2y$10$0MkZ0kmZrKsO9/oV6Z0bcOxxjeYtfTXLHcRA/XZXdMCjI11ffk7S6', 'M Zikri Febrianza', '161420133', NULL, 'admin', '2020-02-19 20:49:24', '2020-02-19 20:49:24'),
(2, '161420134', '$2y$10$GY2XAAMn3gZc8OOz9Xm/guPYnPZs948u.OtTRT.waiV4KJoMm8Ply', 'R.A Iqlima Diana Sari', '161420134', NULL, 'operator', '2020-02-19 20:49:42', '2020-02-19 20:49:42'),
(4, '161420135', '$2y$10$iLyKJk8ZfAeKW/Ti0oEM4uTOal5aZZSQ48.bKHuoHfiXn3PSVoRAK', 'Dizie', '161420135', NULL, 'user', '2020-02-25 20:54:01', '2020-02-25 20:54:01'),
(5, '161420136', '$2y$10$sZpiPpTL561OF/k./nSVYe1SHGeiU.AJqGCDpaJKxz.1eI0SCgCO.', 'Jhon', '161420136', NULL, 'user', '2020-03-16 19:28:59', '2020-03-16 19:28:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tbl_disposisi`
--
ALTER TABLE `tbl_disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indeks untuk tabel `tbl_sett`
--
ALTER TABLE `tbl_sett`
  ADD PRIMARY KEY (`id_sett`);

--
-- Indeks untuk tabel `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_surat_keluar_id_departement_foreign` (`id_departement`);

--
-- Indeks untuk tabel `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_surat_masuk_id_departement_foreign` (`id_departement`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `departement`
--
ALTER TABLE `departement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT untuk tabel `tbl_disposisi`
--
ALTER TABLE `tbl_disposisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  MODIFY `id_instansi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_sett`
--
ALTER TABLE `tbl_sett`
  MODIFY `id_sett` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  ADD CONSTRAINT `tbl_surat_keluar_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  ADD CONSTRAINT `tbl_surat_masuk_id_departement_foreign` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
