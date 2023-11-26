-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2023 pada 04.55
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontrol`
--

CREATE TABLE `kontrol` (
  `id_ruangan` int(10) NOT NULL,
  `temperature` int(10) NOT NULL,
  `humidity` int(10) NOT NULL,
  `ac` tinyint(1) NOT NULL,
  `electricity` int(10) NOT NULL,
  `water` int(10) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `alarm` tinyint(1) NOT NULL,
  `livingroom` tinyint(1) NOT NULL,
  `diningroom` tinyint(1) NOT NULL,
  `kitchen` tinyint(1) NOT NULL,
  `bathroom1` tinyint(1) NOT NULL,
  `bathroom2` tinyint(1) NOT NULL,
  `bedroom1` tinyint(1) NOT NULL,
  `bedroom2` tinyint(1) NOT NULL,
  `garage` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kontrol`
--

INSERT INTO `kontrol` (`id_ruangan`, `temperature`, `humidity`, `ac`, `electricity`, `water`, `wifi`, `alarm`, `livingroom`, `diningroom`, `kitchen`, `bathroom1`, `bathroom2`, `bedroom1`, `bedroom2`, `garage`) VALUES
(1, 28, 66, 1, 450, 345, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1),
(2, 33, 66, 1, 78, 55, 1, 0, 1, 0, 0, 0, 0, 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kontrol`
--
ALTER TABLE `kontrol`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kontrol`
--
ALTER TABLE `kontrol`
  MODIFY `id_ruangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
