-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Nov 2019 pada 07.44
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
-- Database: `perusahaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE `form` (
  `form_id` int(5) NOT NULL,
  `nama_lengkap` varchar(40) DEFAULT NULL,
  `nama_panggilan` varchar(40) DEFAULT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kewarganegaraan` text DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `lowongan` varchar(25) DEFAULT NULL,
  `ktp` varchar(45) DEFAULT NULL,
  `pas_foto` varchar(49) DEFAULT NULL,
  `transkrip` varchar(51) DEFAULT NULL,
  `ijazah` varchar(48) DEFAULT NULL,
  `acc_form` tinyint(1) DEFAULT NULL,
  `acc_wawancara` tinyint(1) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form`
--

INSERT INTO `form` (`form_id`, `nama_lengkap`, `nama_panggilan`, `ttl`, `alamat`, `kewarganegaraan`, `no_hp`, `lowongan`, `ktp`, `pas_foto`, `transkrip`, `ijazah`, `acc_form`, `acc_wawancara`, `user_id`) VALUES
(1, 'Muhammad Abdul Ghani', 'Ghani', 'Sleman, 2 Agustus 1999', 'Yogyakarta', 'Indonesia', '085643705846', 'Web Developer', 'img/KTP/c4ca4238a0b923820dcc509a6f75849bK.png', 'img/PasFoto/c4ca4238a0b923820dcc509a6f75849bP.png', 'img/Transkrip/c4ca4238a0b923820dcc509a6f75849bT.png', 'img/Ijazah/c4ca4238a0b923820dcc509a6f75849bI.png', 1, 1, 1),
(2, 'Williaaaaaaaaaan', 'wil', 'Sleman, 2 Agustus 1999', 'Yogyakarta', 'Indonesia', '085643705846', 'IT Support', 'img/KTP/eccbc87e4b5ce2fe28308fd9f2a7baf3K.png', 'img/PasFoto/eccbc87e4b5ce2fe28308fd9f2a7baf3P.png', 'img/Transkrip/eccbc87e4b5ce2fe28308fd9f2a7baf3T.png', 'img/Ijazah/eccbc87e4b5ce2fe28308fd9f2a7baf3I.png', 1, 1, 3),
(3, 'sqwd', 'eq', 'Sleman, 2 Agustus 1999', 'Yogyakarta', 'Indonesia', '085643705846', 'UI/UX Designer', 'img/KTP/a87ff679a2f3e71d9181a67b7542122cK.png', 'img/PasFoto/a87ff679a2f3e71d9181a67b7542122cP.png', 'img/Transkrip/a87ff679a2f3e71d9181a67b7542122cT.png', 'img/Ijazah/a87ff679a2f3e71d9181a67b7542122cI.png', 1, 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` char(1) NOT NULL,
  `role_details` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `role_details`) VALUES
('1', 'HRD'),
('2', 'Admin'),
('3', 'Karyawan'),
('4', 'Pelamar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `role_id` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `username`, `role_id`) VALUES
(1, 'ghani28muhammad@gmail.com', '12345', 'ghani', '3'),
(2, 'a@gmail.com', '12345', 'Ghani', '2'),
(3, 'willian@gmail.com', '12345', 'willian', '3'),
(4, 'b@gmail.com', '12345', 'b', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wawancara`
--

CREATE TABLE `wawancara` (
  `wawancara_id` int(5) NOT NULL,
  `lokasi` text DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wawancara`
--

INSERT INTO `wawancara` (`wawancara_id`, `lokasi`, `waktu`, `user_id`) VALUES
(3, 'Ruang Seminar Informatika UPN Veteran Yogyakarta Kampus 2', '08:00:00', 1),
(4, 'Ruang Seminar Informatika UPN Veteran Yogyakarta Kampus 2', '08:00:00', 3),
(5, 'Ruang Seminar Informatika UPN Veteran Yogyakarta Kampus 2', '08:00:00', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `wawancara`
--
ALTER TABLE `wawancara`
  ADD PRIMARY KEY (`wawancara_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `form`
--
ALTER TABLE `form`
  MODIFY `form_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `wawancara`
--
ALTER TABLE `wawancara`
  MODIFY `wawancara_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wawancara`
--
ALTER TABLE `wawancara`
  ADD CONSTRAINT `wawancara_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
