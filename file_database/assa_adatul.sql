-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2021 pada 08.15
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assa'adatul`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(65) NOT NULL,
  `level` varchar(25) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `is_active` enum('Y','N') NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `level`, `jenis_kelamin`, `username`, `email`, `alamat`, `no_telp`, `foto`, `is_active`, `password`) VALUES
(1, 'Admin Assa\'adatul', 'administrator', 'L', 'admin', 'admin@hotmail.com', 'Jakarta', '0812348654', '', 'Y', '81fccaf9f00a8441b77b18fa2c8010f4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `controller_access`
--

CREATE TABLE `controller_access` (
  `id` int(11) NOT NULL,
  `level` varchar(45) NOT NULL,
  `controller` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `controller_access`
--

INSERT INTO `controller_access` (`id`, `level`, `controller`) VALUES
(1, 'administrator', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grade_nilai`
--

CREATE TABLE `grade_nilai` (
  `grade` varchar(4) NOT NULL,
  `nilai_min` int(2) NOT NULL,
  `nilai_max` int(3) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `grade_nilai`
--

INSERT INTO `grade_nilai` (`grade`, `nilai_min`, `nilai_max`, `keterangan`) VALUES
('A', 86, 100, 'sangat baik'),
('B', 76, 85, 'baik'),
('C', 66, 75, 'cukup'),
('D', 51, 65, 'kurang'),
('E', 0, 50, 'sangat kurang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL,
  `nama_ruangan` varchar(15) NOT NULL,
  `lantai` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `nama_ruangan`, `lantai`) VALUES
(1, 'X', '003', '1'),
(2, 'XI', '004', '1'),
(5, 'XII', '005', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `NIS` int(7) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`NIS`, `id_kelas`) VALUES
(2210001, 2),
(2210002, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(45) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `bobot`) VALUES
(1, 'nilai raport', 5),
(2, 'olahraga', 3),
(3, 'agama', 3),
(5, 'Akhlak', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id_ns` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `NIS` int(7) NOT NULL,
  `nilai` double NOT NULL,
  `grade` varchar(4) NOT NULL,
  `kelas` varchar(6) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id_ns`, `id_kriteria`, `NIS`, `nilai`, `grade`, `kelas`, `tahun_ajaran`) VALUES
(32, 1, 2210001, 80, 'B', 'X', '2021/2022'),
(33, 2, 2210001, 75, 'D', 'X', '2021/2022'),
(34, 3, 2210001, 90, 'A', 'X', '2021/2022'),
(35, 5, 2210001, 100, 'A', 'X', '2021/2022'),
(36, 1, 2210002, 100, 'A', 'X', '2021/2022'),
(37, 2, 2210002, 85, 'B', 'X', '2021/2022'),
(38, 3, 2210002, 75, 'A', 'X', '2021/2022'),
(39, 5, 2210002, 90, 'A', 'X', '2021/2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `NIS` int(7) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `nama_ayah` varchar(35) NOT NULL,
  `nama_ibu` varchar(35) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `is_active` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`NIS`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `nama_ayah`, `nama_ibu`, `email`, `no_hp`, `foto`, `tahun_masuk`, `is_active`) VALUES
(2210001, 'Maulana', 'L', 'jakarta', '2002-08-01', 'islam', 'Jlan bahagia', 'Tono', 'mursinah', '', '', 'default-L.jpg', 2021, 'Y'),
(2210002, 'Yulia Aulia', 'P', 'Gorontalo', '2001-08-23', 'islam', 'Jalan MAwar no.1', 'Tanto', 'Rizka', '', '', 'default-P.jpg', 2021, 'Y');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_admin`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_admin` (
`id_admin` int(11)
,`nama_lengkap` varchar(65)
,`level` varchar(25)
,`email` varchar(128)
,`no_telp` varchar(13)
,`status_aktif` enum('Y','N')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_kelas_siswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_kelas_siswa` (
`NIS` int(7)
,`nama_lengkap` varchar(35)
,`jenis_kelamin` enum('L','P')
,`tempat_lahir` varchar(35)
,`tanggal_lahir` date
,`agama` varchar(25)
,`nama_ayah` varchar(35)
,`nama_ibu` varchar(35)
,`alamat` text
,`tahun_masuk` year(4)
,`no_hp` varchar(13)
,`email` varchar(128)
,`is_active` enum('Y','N')
,`foto` varchar(250)
,`id_kelas` int(11)
,`nama_kelas` varchar(15)
,`nama_ruangan` varchar(15)
,`lantai` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_nilai_siswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_nilai_siswa` (
`NIS` int(7)
,`id_kriteria` int(11)
,`kriteria` varchar(45)
,`bobot_kriteria` double
,`nilai` double
,`grade` varchar(4)
,`kelas` varchar(6)
,`keterangan` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_siswa_non_active`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_siswa_non_active` (
`NIS` int(7)
,`nama_lengkap` varchar(35)
,`jenis_kelamin` enum('L','P')
,`tempat_lahir` varchar(35)
,`tanggal_lahir` date
,`agama` varchar(25)
,`nama_ayah` varchar(35)
,`nama_ibu` varchar(35)
,`alamat` text
,`tahun_masuk` year(4)
,`no_hp` varchar(13)
,`email` varchar(128)
,`is_active` enum('Y','N')
,`foto` varchar(250)
,`id_kelas` int(11)
,`nama_kelas` varchar(15)
,`nama_ruangan` varchar(15)
,`lantai` varchar(4)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_admin`
--
DROP TABLE IF EXISTS `v_admin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_admin`  AS SELECT `admin`.`id_admin` AS `id_admin`, `admin`.`nama_lengkap` AS `nama_lengkap`, `admin`.`level` AS `level`, `admin`.`email` AS `email`, `admin`.`no_telp` AS `no_telp`, `admin`.`is_active` AS `status_aktif` FROM `admin` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_kelas_siswa`
--
DROP TABLE IF EXISTS `v_kelas_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kelas_siswa`  AS SELECT `siswa`.`NIS` AS `NIS`, `siswa`.`nama_lengkap` AS `nama_lengkap`, `siswa`.`jenis_kelamin` AS `jenis_kelamin`, `siswa`.`tempat_lahir` AS `tempat_lahir`, `siswa`.`tanggal_lahir` AS `tanggal_lahir`, `siswa`.`agama` AS `agama`, `siswa`.`nama_ayah` AS `nama_ayah`, `siswa`.`nama_ibu` AS `nama_ibu`, `siswa`.`alamat` AS `alamat`, `siswa`.`tahun_masuk` AS `tahun_masuk`, `siswa`.`no_hp` AS `no_hp`, `siswa`.`email` AS `email`, `siswa`.`is_active` AS `is_active`, `siswa`.`foto` AS `foto`, `kelas`.`id_kelas` AS `id_kelas`, `kelas`.`nama_kelas` AS `nama_kelas`, `kelas`.`nama_ruangan` AS `nama_ruangan`, `kelas`.`lantai` AS `lantai` FROM (`kelas` join (`siswa` join `kelas_siswa` on(`kelas_siswa`.`NIS` = `siswa`.`NIS`)) on(`kelas_siswa`.`id_kelas` = `kelas`.`id_kelas`)) WHERE `siswa`.`is_active` = 'Y' ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_nilai_siswa`
--
DROP TABLE IF EXISTS `v_nilai_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_nilai_siswa`  AS SELECT `siswa`.`NIS` AS `NIS`, `kriteria`.`id_kriteria` AS `id_kriteria`, `kriteria`.`kriteria` AS `kriteria`, `kriteria`.`bobot` AS `bobot_kriteria`, `nilai_siswa`.`nilai` AS `nilai`, `grade_nilai`.`grade` AS `grade`, `nilai_siswa`.`kelas` AS `kelas`, `grade_nilai`.`keterangan` AS `keterangan` FROM (((`nilai_siswa` join `kriteria` on(`nilai_siswa`.`id_kriteria` = `kriteria`.`id_kriteria`)) join `siswa` on(`nilai_siswa`.`NIS` = `siswa`.`NIS`)) join `grade_nilai` on(`nilai_siswa`.`grade` = `grade_nilai`.`grade`)) WHERE `siswa`.`is_active` = 'Y' ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_siswa_non_active`
--
DROP TABLE IF EXISTS `v_siswa_non_active`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_siswa_non_active`  AS SELECT `siswa`.`NIS` AS `NIS`, `siswa`.`nama_lengkap` AS `nama_lengkap`, `siswa`.`jenis_kelamin` AS `jenis_kelamin`, `siswa`.`tempat_lahir` AS `tempat_lahir`, `siswa`.`tanggal_lahir` AS `tanggal_lahir`, `siswa`.`agama` AS `agama`, `siswa`.`nama_ayah` AS `nama_ayah`, `siswa`.`nama_ibu` AS `nama_ibu`, `siswa`.`alamat` AS `alamat`, `siswa`.`tahun_masuk` AS `tahun_masuk`, `siswa`.`no_hp` AS `no_hp`, `siswa`.`email` AS `email`, `siswa`.`is_active` AS `is_active`, `siswa`.`foto` AS `foto`, `kelas`.`id_kelas` AS `id_kelas`, `kelas`.`nama_kelas` AS `nama_kelas`, `kelas`.`nama_ruangan` AS `nama_ruangan`, `kelas`.`lantai` AS `lantai` FROM (`kelas` join (`siswa` join `kelas_siswa` on(`kelas_siswa`.`NIS` = `siswa`.`NIS`)) on(`kelas_siswa`.`id_kelas` = `kelas`.`id_kelas`)) WHERE `siswa`.`is_active` = 'N' ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `controller_access`
--
ALTER TABLE `controller_access`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `grade_nilai`
--
ALTER TABLE `grade_nilai`
  ADD PRIMARY KEY (`grade`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id_ns`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `controller_access`
--
ALTER TABLE `controller_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id_ns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
