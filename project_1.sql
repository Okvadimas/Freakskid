-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Agu 2020 pada 18.24
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sumber` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `tipe`, `barang`, `jumlah`, `sumber`, `tujuan`, `waktu`) VALUES
(30, 'Pemasukan Barang', 'Switch Managable 10 Port', 300, 'Mikrotik Indonesia', 'PT. Propan Raya', 'August 30, 2020 - 10:33 AM'),
(31, 'Pengeluaran Barang', 'Router TP  LINK ', 32, 'PT. Propan Raya', 'PT. TeleNet', 'August 30, 2020 - 10:51 AM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomer` varchar(15) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `gambar`, `fullname`, `email`, `nomer`, `pesan`) VALUES
(6, 'dimas_okva5458', '$2y$10$cR5KCnWDxmlEa8KENjZoH.fH228S2/tk116I2ToR3Jwulm2pQrE22', 'default.jpeg', 'Dimas Okva Solichin', 'dimasokva@gmail.com', '085875502569', 'Hiduplah untuk hari yang lebih baik.'),
(7, 'dimas', '$2y$10$nxSVuVNgQXXfI/ZD2F65t.ZTtGfPLS/EBj5nk9HD.R3qSiVlQuhry', 'default.jpeg', 'Dimas Okva', 'okvadimas@gmail.com', '088211234125', 'For Greater Good!'),
(10, 'solichin', '$2y$10$S7tm5sBxMMuLi2urm1zd9uP3RkhBppzmqE3VvTQfF69E/c/6W9dFu', 'default.jpeg', 'aaaaaaa', 'solichin@gmail.com', 'aaaaa', 'aaaaaaaaaaaaaaaaaaaaaaa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
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
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
