-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Mar 2022 pada 12.43
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fadly`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `kodefasilitas` bigint(200) NOT NULL,
  `namafasilitas` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `harga` bigint(200) NOT NULL,
  `deskripsi` text COLLATE latin1_general_ci NOT NULL,
  `photo` varchar(200) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `kodefasilitas`, `namafasilitas`, `harga`, `deskripsi`, `photo`) VALUES
(96, 1, 'Hotel 1', 10000, 'Murah Berkualitas', 'hotel (2).jpg'),
(12, 2, 'Hotel 2', 20000, 'dijamin nyaman', 'hotel (1).jpg'),
(4, 3, 'Hotel 3', 30000, 'nyaman dan tentram', 'hotel (3).jpg'),
(5, 4, 'Hotel 4', 50000, 'disukai para suhu', 'hotel (5).jpg'),
(1801, 5, 'Hotel 5', 100000, 'Tempat Favorit', 'hotel (4).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `namalengkap` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `noktp` text COLLATE latin1_general_ci NOT NULL,
  `kodefasilitas` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `namafasilitas` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `pesan` varchar(300) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `namalengkap`, `noktp`, `kodefasilitas`, `namafasilitas`, `email`, `telepon`, `pesan`) VALUES
(1, 'Fadl Idrus', '7309608812828', '01', 'hotel 1', 'fadliidrus9180@gmail.com', '082399547123', 'semoga aman'),
(12, 'M.Fadli Idrus', '9872817', '19', 'Tempat Makan VIP', 'cvbn', '082399547123', 'tesmulu'),
(11, 'M.Fadli Idrus', '9786', '231', 'Kolam Renang', 'cvbn', '2345678', 'coba'),
(10, 'tes', '9786', '19', 'Kolam Renang', 'sdhrdfs', '0082636', 'tes'),
(13, 'Fadli', '7309299823478', '12', 'Hotel 3', 'fadliidrus9180@gmail.com', '082399547123', 'murah yah gaes yah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(200) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'fadli', '$2y$10$E/T2TAw9BLc3ux0clCc2Ke48ucj.QVREGuBCSwk10k7zf59InT6ny'),
(4, '1', '$2y$10$CDplgdzEEdG5ym.9pU4O5ufhE7nTudooEmni.q1w.dqq82avzNQZa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`kodefasilitas`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `kodefasilitas` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
