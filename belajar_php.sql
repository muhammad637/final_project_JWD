-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2022 pada 16.04
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar_php`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `email`, `jurusan`, `gambar`) VALUES
(1, 2147483647, 'Muhammad Farid Mustakim', 'muhammadfaridmustakim@gmail.com', 'TI', '638b640ca805f.jpg'),
(7, 123456789, 'Rudi', 'Rudi@gmail.com', 'Teknik Mesin', '63489b87abe31.png'),
(9, 12630250, 'Bapak FITRIADI', 'fitriadi@gmail.com', 'Teknik Informatika', '6349049af2f1f.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
(1, 'mustakim', 'mustakim@gmail.com', '$2y$10$jmfGcIvZbssqRnTMKLzTAeDIuiaP0gRccLUtE8aW3sh2pC/K4lHJC'),
(2, 'takim', 'takim@gmail.co.id', '$2y$10$jwfoqOQOK.waBxATHyBmA.nXltVMXTv5l6/BU3sED1I/HgZ8p9op2'),
(3, 'farid', 'farid@gmail.com', '$2y$10$jFttuXP6kh1gDtuiuWj6qu0Psw8WdnFnHyqanYROOVxpsx4PwtHRq'),
(4, 'takim10', 'takim@gmail.com', '$2y$10$dn/Sw2TCsvE39SDqk.XHH.i78OD0P094ovWNCalxfMgvGOOFW560W'),
(5, 'fitriadi', 'fitriadi@example.com', '$2y$10$taQOnb2bp6Zgz/AWFpyvmuO7ZAqmeYx4AGbECLDBVu4TYSqcjkBKe');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
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
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
