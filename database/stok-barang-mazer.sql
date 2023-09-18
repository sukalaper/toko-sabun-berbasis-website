-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Sep 2023 pada 21.57
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stok-barang-mazer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `qty` int(11) NOT NULL,
  `laba` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `qty`, `laba`) VALUES
(14, 127, '2023-08-07 03:02:09', 1, NULL),
(15, 128, '2023-08-07 03:10:22', 1, NULL),
(18, 130, '2023-08-07 03:17:40', 5, NULL),
(19, 139, '2023-08-20 04:56:43', 11, NULL),
(20, 140, '2023-08-20 04:57:31', 2, NULL),
(36, 142, '2023-08-20 05:48:06', 15, NULL),
(40, 145, '2023-08-20 06:10:35', 2, NULL),
(41, 146, '2023-08-20 06:39:45', 1, NULL),
(67, 159, '2023-08-26 03:23:56', 14, NULL),
(68, 162, '2023-09-16 06:19:53', 5, NULL),
(69, 163, '2023-09-16 06:22:58', 1, NULL),
(70, 164, '2023-09-16 06:25:22', 4, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`) VALUES
(1, 'sukalaper@space.com', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `qty`) VALUES
(130, 159, '2023-08-26 03:22:39', 3),
(142, 163, '2023-09-16 06:22:42', 4),
(143, 164, '2023-09-16 06:24:57', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `idbarang` int(11) NOT NULL,
  `namabarang` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `hargamodal` decimal(10,3) NOT NULL,
  `satuanberat` int(11) NOT NULL,
  `jumlahbarang` int(11) NOT NULL,
  `hargajual` decimal(10,3) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`idbarang`, `namabarang`, `hargamodal`, `satuanberat`, `jumlahbarang`, `hargajual`, `tanggal`) VALUES
(148, 'Sabun Mandi A', '1.500', 10, 100, '2.000', '2023-08-26 03:11:27'),
(150, 'Sabun Wajah A', '1.200', 5, 50, '1.800', '2023-08-03 03:15:00'),
(151, 'Sabun Wajah B', '1.300', 6, 60, '2.000', '2023-08-04 05:45:00'),
(152, 'Sabun Kesehatan A', '1.500', 8, 75, '2.500', '2023-08-05 07:20:00'),
(153, 'Sabun Kesehatan B', '1.700', 9, 90, '2.800', '2023-08-06 09:10:00'),
(154, 'Sabun Anak A', '1.000', 4, 40, '1.500', '2023-08-07 10:30:00'),
(155, 'Sabun Anak B', '1.100', 5, 50, '1.700', '2023-08-08 11:45:00'),
(156, 'Sabun Cair A', '2.000', 8, 70, '2.700', '2023-08-09 12:20:00'),
(157, 'Sabun Cair B', '2.200', 9, 85, '2.900', '2023-08-10 13:00:00'),
(160, 'Sabun Mandi B', '12.000', 3, 12, '15.000', '2023-09-15 03:58:47'),
(161, 'Sabun Mandi B', '12.000', 8, 10, '13.000', '2023-09-15 04:00:04'),
(164, 'Wipol', '12.000', 750, 10, '13.000', '2023-09-16 06:25:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indeks untuk tabel `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
