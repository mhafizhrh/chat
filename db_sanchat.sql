-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2021 pada 08.46
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sanchat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `IdMsg` int(225) NOT NULL,
  `IdRoom` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `message` text NOT NULL,
  `datetime_send` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE `room` (
  `IdRoom` int(11) NOT NULL,
  `roomName` char(40) NOT NULL,
  `memberID` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` char(35) NOT NULL,
  `tlp` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`IdMsg`);

--
-- Indeks untuk tabel `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`IdRoom`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `IdMsg` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `room`
--
ALTER TABLE `room`
  MODIFY `IdRoom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
