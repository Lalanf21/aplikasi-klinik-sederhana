-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2020 at 12:33 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_obat`
--

CREATE TABLE `tbl_jenis_obat` (
  `id_jenis_obat` int(11) NOT NULL,
  `jenis_obat` varchar(100) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_obat`
--

INSERT INTO `tbl_jenis_obat` (`id_jenis_obat`, `jenis_obat`, `keterangan`) VALUES
(3, 'tablet', ''),
(4, 'kapsul', ''),
(5, 'salep', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'umum'),
(2, 'Gigi'),
(3, 'uncategorized'),
(5, ' '),
(6, 'Penyakit dalam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `dosis` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_jenis_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`id_obat`, `nama_obat`, `dosis`, `harga`, `id_jenis_obat`) VALUES
(5, 'Amoxilin', '5mg', 11500, 4),
(6, 'Oskadon', '10mg', 7500, 3),
(7, 'situplasma suto', '300mg', 5000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `kd_pasien` char(12) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` enum('pria','wanita') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int(15) NOT NULL,
  `no_ktp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`kd_pasien`, `nama_pasien`, `tempat_lahir`, `tgl_lahir`, `gender`, `alamat`, `no_telp`, `no_ktp`) VALUES
('PAS0004', 'Lalan Faturahman', 'Tangerang', '1999-01-21', 'pria', 'PISANGAN', 2147483647, '76662288993883'),
('PAS0005', 'Anis', 'Jakarta', '1990-01-17', 'pria', 'desa karawaci timur', 897652370, '365487127486219');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `nik_pegawai` bigint(20) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `gender` enum('pria','wanita') NOT NULL,
  `jabatan` enum('administrasi','apoteker','dokter') NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `biaya_pemeriksaan` int(20) DEFAULT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`nik_pegawai`, `nama_pegawai`, `gender`, `jabatan`, `id_kategori`, `biaya_pemeriksaan`, `tempat_lahir`, `tgl_lahir`, `no_telp`, `alamat`) VALUES
(3637897650002, 'Dr Jaka', 'pria', 'dokter', 1, 25000, 'Bogor', '1990-08-13', '08187654567', 'kota tangerang'),
(36590987640002, 'Dr Amanda', 'wanita', 'dokter', 2, 20000, 'Tangerang', '1993-08-31', '878654327973', 'tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `no_bayar` varchar(15) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`no_bayar`, `id_resep`, `total_harga`, `total_bayar`, `kembalian`, `tgl_bayar`) VALUES
('INV0001', 3, 31500, 40000, 8500, '2019-09-28'),
('INV0002', 4, 37500, 50000, 12500, '2019-09-28'),
('INV0003', 5, 36500, 50000, 13500, '2019-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `no_pendaftaran` varchar(12) NOT NULL,
  `nik_pegawai` bigint(20) NOT NULL,
  `kd_pasien` char(12) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `keluhan` text NOT NULL,
  `status` enum('selesai','tunggu','periksa') NOT NULL,
  `no_urut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`no_pendaftaran`, `nik_pegawai`, `kd_pasien`, `tgl_daftar`, `keluhan`, `status`, `no_urut`) VALUES
('2809190001', 36590987640002, 'PAS0004', '2019-09-28', 'sakit pusing', 'selesai', 1),
('2809190002', 3637897650002, 'PAS0005', '2019-09-28', 'sakit mata', 'tunggu', 2),
('2909190001', 3637897650002, 'PAS0005', '2019-09-29', 'nyeri di ulu hati', 'selesai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekam`
--

CREATE TABLE `tbl_rekam` (
  `id_rekam` int(11) NOT NULL,
  `no_pendaftaran` varchar(12) NOT NULL,
  `tanggal` date NOT NULL,
  `diagnosa` varchar(50) NOT NULL,
  `rujukan` enum('ya','tidak') NOT NULL,
  `rumah_sakit_tujuan` varchar(50) DEFAULT 'Pasien tidak di rujuk',
  `poli_tujuan` varchar(30) DEFAULT 'pasien tidak di rujuk'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rekam`
--

INSERT INTO `tbl_rekam` (`id_rekam`, `no_pendaftaran`, `tanggal`, `diagnosa`, `rujukan`, `rumah_sakit_tujuan`, `poli_tujuan`) VALUES
(4, '2809190001', '2019-09-28', 'migrain', 'tidak', 'pasien tidak di rujuk', 'pasien tidak di rujuk'),
(5, '2809190002', '2019-09-28', 'meriang', 'ya', 'Rumah sakit harapan', 'poli penyakit dalam'),
(6, '2909190001', '2019-09-29', 'maag', 'ya', 'Rumah sakit sari asih', 'penyakit dalam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resep`
--

CREATE TABLE `tbl_resep` (
  `id_resep` int(11) NOT NULL,
  `no_pendaftaran` varchar(12) NOT NULL,
  `tanggal` date NOT NULL,
  `diagnosa` text NOT NULL,
  `nama_obat` text NOT NULL,
  `aturan_pakai` text NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resep`
--

INSERT INTO `tbl_resep` (`id_resep`, `no_pendaftaran`, `tanggal`, `diagnosa`, `nama_obat`, `aturan_pakai`, `kategori`) VALUES
(3, '2809190001', '2019-09-28', 'migrain', 'Amoxilin', '4x1', 'uncategorized'),
(4, '2809190002', '2019-09-28', 'meriang', 'situplasma suto,Oskadon', '3x1,4x1', 'uncategorized'),
(5, '2909190001', '2019-09-29', 'maag', 'Amoxilin', '3x1', 'uncategorized');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT '123456',
  `level` enum('superadmin','administrasi','dokter','apoteker') NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `level`, `kategori`, `status`) VALUES
(5, 'lalan', '123', 'dokter', 'umum', 1),
(6, 'gigi', 'gigi', 'dokter', 'gigi', 1),
(7, 'ali', '1', 'superadmin', 'uncategorized', 1),
(8, 'deden', '321', 'administrasi', 'uncategorized', 1),
(9, 'lalan', '12', 'apoteker', 'uncategorized', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jenis_obat`
--
ALTER TABLE `tbl_jenis_obat`
  ADD PRIMARY KEY (`id_jenis_obat`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `tbl_obat_ibfk_1` (`id_jenis_obat`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`kd_pasien`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`nik_pegawai`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`no_bayar`),
  ADD UNIQUE KEY `id_resep` (`id_resep`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`no_pendaftaran`),
  ADD KEY `tbl_pendaftaran_ibfk_2` (`nik_pegawai`),
  ADD KEY `tbl_pendaftaran_ibfk_3` (`kd_pasien`);

--
-- Indexes for table `tbl_rekam`
--
ALTER TABLE `tbl_rekam`
  ADD PRIMARY KEY (`id_rekam`),
  ADD KEY `no_pendaftaran` (`no_pendaftaran`);

--
-- Indexes for table `tbl_resep`
--
ALTER TABLE `tbl_resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `tbl_resep_ibfk_1` (`no_pendaftaran`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jenis_obat`
--
ALTER TABLE `tbl_jenis_obat`
  MODIFY `id_jenis_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_rekam`
--
ALTER TABLE `tbl_rekam`
  MODIFY `id_rekam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_resep`
--
ALTER TABLE `tbl_resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD CONSTRAINT `tbl_obat_ibfk_1` FOREIGN KEY (`id_jenis_obat`) REFERENCES `tbl_jenis_obat` (`id_jenis_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD CONSTRAINT `tbl_pegawai_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`);

--
-- Constraints for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `tbl_pembayaran_ibfk_2` FOREIGN KEY (`id_resep`) REFERENCES `tbl_resep` (`id_resep`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_2` FOREIGN KEY (`nik_pegawai`) REFERENCES `tbl_pegawai` (`nik_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_3` FOREIGN KEY (`kd_pasien`) REFERENCES `tbl_pasien` (`kd_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rekam`
--
ALTER TABLE `tbl_rekam`
  ADD CONSTRAINT `tbl_rekam_ibfk_1` FOREIGN KEY (`no_pendaftaran`) REFERENCES `tbl_pendaftaran` (`no_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_resep`
--
ALTER TABLE `tbl_resep`
  ADD CONSTRAINT `tbl_resep_ibfk_1` FOREIGN KEY (`no_pendaftaran`) REFERENCES `tbl_pendaftaran` (`no_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
