-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 10:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_access_menu`
--

CREATE TABLE `tb_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_access_menu`
--

INSERT INTO `tb_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gedung`
--

CREATE TABLE `tb_gedung` (
  `id_gedung` int(11) NOT NULL,
  `nama_gedung` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `ref_id_gedung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_gedung`
--

INSERT INTO `tb_gedung` (`id_gedung`, `nama_gedung`, `deskripsi`, `created_time`, `updated_time`, `ref_id_gedung`) VALUES
(19, 'Gedung Laboratorium Teknik 1', NULL, NULL, NULL, 19),
(36, 'Gedung Laboratorium Teknik 3', NULL, NULL, NULL, 36),
(44, 'Gedung Laboratorium Teknik 5', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan_lab`
--

CREATE TABLE `tb_kegiatan_lab` (
  `id_kegiatan_lab` int(5) UNSIGNED ZEROFILL NOT NULL,
  `id_laboratorium` int(5) UNSIGNED ZEROFILL NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_laboran_lab`
--

CREATE TABLE `tb_laboran_lab` (
  `id_laboran_lab` int(5) UNSIGNED ZEROFILL NOT NULL,
  `id_laboratorium` int(5) UNSIGNED ZEROFILL NOT NULL,
  `id_pegawai` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_laboran_lab`
--

INSERT INTO `tb_laboran_lab` (`id_laboran_lab`, `id_laboratorium`, `id_pegawai`) VALUES
(00006, 00001, 'PEG0003'),
(00008, 00001, 'PEG0003'),
(00012, 00001, 'PEG0003'),
(00035, 00015, 'PEG0366'),
(00039, 00027, 'PEG0339'),
(00040, 00028, 'PEG0339'),
(00041, 00029, 'PEG0339'),
(00042, 00009, 'PEG0310'),
(00043, 00010, 'PEG0058'),
(00044, 00031, 'PEG0739'),
(00045, 00032, 'PEG0210'),
(00046, 00001, 'PEG1027'),
(00047, 00002, 'PEG1021'),
(00048, 00003, 'PEG0073'),
(00049, 00003, 'PEG0514'),
(00050, 00003, 'PEG1022'),
(00051, 00020, 'PEG1036'),
(00052, 00020, 'PEG1042'),
(00053, 00026, 'PEG1029'),
(00054, 00035, 'PEG0271'),
(00055, 00035, 'PEG0528'),
(00060, 00004, 'PEG0339'),
(00061, 00004, 'PEG0737');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laboratorium`
--

CREATE TABLE `tb_laboratorium` (
  `id_laboratorium` int(5) UNSIGNED ZEROFILL NOT NULL,
  `kode_ruang` int(11) NOT NULL,
  `nama_lab` varchar(100) NOT NULL,
  `id_gedung` int(11) DEFAULT NULL,
  `lantai` varchar(128) NOT NULL,
  `lokasi` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `kontak` text NOT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `kelola_peminjaman` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_laboratorium`
--

INSERT INTO `tb_laboratorium` (`id_laboratorium`, `kode_ruang`, `nama_lab`, `id_gedung`, `lantai`, `lokasi`, `email`, `kontak`, `kapasitas`, `kelola_peminjaman`) VALUES
(00001, 1, 'Lab Komputer Dasar 1', 36, '3', '', 'upt.labterpadu@itera.ac.id', '082377102513', 80, NULL),
(00003, 2, 'Lab Komputer Dasar 2', 36, '3', '', 'upt.labterpadu@itera.ac.id', '082377102513', 90, NULL),
(00004, 3, 'Lab Komputer Dasar 3', 36, '2', '', 'upt.labterpadu@itera.ac.id', '082377102513', 90, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman_ruang`
--

CREATE TABLE `tb_peminjaman_ruang` (
  `id_peminjaman_ruang` int(11) NOT NULL,
  `id_laboratorium` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nrk` varchar(50) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `notlp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tanggal_penggunaan` date DEFAULT NULL,
  `id_range_waktu` int(11) NOT NULL,
  `mulai_penggunaan` time DEFAULT NULL COMMENT 'tidak digunakan',
  `selesai_penggunaan` time DEFAULT NULL COMMENT 'tidak digunakan',
  `berapa_minggu` int(11) DEFAULT NULL COMMENT 'tidak digunakan',
  `nama_kegiatan` varchar(128) DEFAULT NULL,
  `kapasitas` int(11) NOT NULL,
  `dokumen_pendukung` varchar(255) DEFAULT NULL,
  `status` enum('request','reject','proses','done') DEFAULT NULL,
  `komentar` text,
  `tanggal_pengajuan` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_peminjaman_ruang`
--

INSERT INTO `tb_peminjaman_ruang` (`id_peminjaman_ruang`, `id_laboratorium`, `nama`, `nrk`, `prodi`, `notlp`, `email`, `tanggal_penggunaan`, `id_range_waktu`, `mulai_penggunaan`, `selesai_penggunaan`, `berapa_minggu`, `nama_kegiatan`, `kapasitas`, `dokumen_pendukung`, `status`, `komentar`, `tanggal_pengajuan`, `created_at`) VALUES
(46, NULL, 'Ihtiandiko Wicaksono', '1610040309010001', 'Teknik Informatika', '082377102513', 'wihtiandiko@gmail.com', '2023-02-17', 1, NULL, NULL, NULL, 'Kelas Kuliah', 80, 'dokumen2.pdf', 'request', NULL, '0000-00-00 00:00:00', '2023-02-09 06:34:55'),
(45, 00001, 'Ihtiandiko Wicaksono', '1610040309010001', 'Teknik Informatika', '082377102513', 'wihtiandiko@gmail.com', '2023-02-10', 1, NULL, NULL, NULL, 'Kelas Kuliah', 80, 'dokumen2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-09 06:34:55'),
(42, 00001, 'Ihtiandiko Wicaksono', '16100400213', 'Teknik Informatika', '081278664533', 'wihtiandiko@gmail.com', '2023-02-09', 5, NULL, NULL, NULL, 'Alpro', 80, 'dokumen.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-09 03:52:01'),
(44, 00001, 'Soeharto', '1610040309010001', 'Teknik Pariwisata', '1231513413123', 'wihtiandiko@gmail.com', '2023-02-10', 4, NULL, NULL, NULL, 'Pariwisata', 80, '31933-75676598376-1-PB.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-09 04:11:06'),
(43, 00001, 'Soekarno', '1610040309010001', 'Teknik Biosistem', '1231513413123', 'wihtiandiko@gmail.com', '2023-02-10', 1, NULL, NULL, NULL, 'Gambar Teknik', 80, 'dokumen1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-09 04:10:29'),
(41, 00001, 'Ihtiandiko Wicaksono', '16100400213', 'Teknik Informatika', '081278664533', 'wihtiandiko@gmail.com', '2023-02-09', 2, NULL, NULL, NULL, 'Stigma', 80, 'dokumen.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-09 03:52:01'),
(40, 00001, 'Ihtiandiko Wicaksono', '16100400213', 'Teknik Informatika', '081278664533', 'wihtiandiko@gmail.com', '2023-02-09', 1, NULL, NULL, NULL, 'PWL', 80, 'dokumen.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-09 03:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nrk` varchar(50) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `notlpn` varchar(50) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `id_peminjaman_ruangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `email`, `password`, `nama`, `nrk`, `prodi`, `notlpn`, `image`, `role_id`, `is_active`, `date_created`, `id_peminjaman_ruangan`) VALUES
(1, 'wihtiandiko@gmail.com', '$2y$10$6BEfRSHt7gWTJIz.Rli0iOz6TYcP4L99WkCDE.FiREsxTEXAquXxa', 'Ihtiandiko Wicaksono', '', '', '', 'default.PNG', 1, 1, 1675649713, 0),
(2, 'hapis@gmail.com', '$2y$10$L1bD3ZQl3u2L3OZCPWvr.e3aZE3gSntLXNxV6KScO/qK2GsCo4GSy', 'Hapis GG', '', '', '', 'default.PNG', 2, 1, 1675650686, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi_lab`
--

CREATE TABLE `tb_prodi_lab` (
  `id_prodi_lab` int(5) UNSIGNED ZEROFILL NOT NULL,
  `id_laboratorium` int(5) UNSIGNED ZEROFILL NOT NULL,
  `kd_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_range_waktu`
--

CREATE TABLE `tb_range_waktu` (
  `id_range_waktu` int(11) NOT NULL,
  `range_waktu` varchar(128) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_range_waktu`
--

INSERT INTO `tb_range_waktu` (`id_range_waktu`, `range_waktu`, `jam_mulai`, `jam_selesai`) VALUES
(1, '07:00-09:00', '07:00:00', '09:00:00'),
(2, '09:00-11:00', '09:00:00', '11:00:00'),
(3, '11:00-13:00', '11:00:00', '13:00:00'),
(4, '13:00-15:00', '13:00:00', '15:00:00'),
(6, '15:00-17:00', '15:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role_pengguna`
--

CREATE TABLE `tb_role_pengguna` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role_pengguna`
--

INSERT INTO `tb_role_pengguna` (`id`, `role`) VALUES
(1, 'Administration'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_menu`
--

CREATE TABLE `tb_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sub_menu`
--

INSERT INTO `tb_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Gedung', 'gedung', 'fa fa-fw fa-building', 1),
(7, 1, 'Laboratorium', 'gedung/lab', 'fa fa-fw fa-university', 1),
(8, 2, 'Peminjaman Ruangan', 'peminjaman', 'fa fa-fw fa-calendar', 1),
(9, 1, 'Kelola Peminjaman Ruangan', 'peminjaman/kelola', 'fa fa-fw fa-calendar', 1),
(10, 1, 'Range Waktu', 'peminjaman/rangewaktu', 'fa fa-fw fa-clock-o', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_access_menu`
--
ALTER TABLE `tb_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  ADD PRIMARY KEY (`id_gedung`) USING BTREE;

--
-- Indexes for table `tb_kegiatan_lab`
--
ALTER TABLE `tb_kegiatan_lab`
  ADD PRIMARY KEY (`id_kegiatan_lab`) USING BTREE,
  ADD KEY `id_laboratorium` (`id_laboratorium`) USING BTREE;

--
-- Indexes for table `tb_laboran_lab`
--
ALTER TABLE `tb_laboran_lab`
  ADD PRIMARY KEY (`id_laboran_lab`) USING BTREE,
  ADD KEY `id_laboratorium` (`id_laboratorium`) USING BTREE;

--
-- Indexes for table `tb_laboratorium`
--
ALTER TABLE `tb_laboratorium`
  ADD PRIMARY KEY (`id_laboratorium`) USING BTREE;

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_peminjaman_ruang`
--
ALTER TABLE `tb_peminjaman_ruang`
  ADD PRIMARY KEY (`id_peminjaman_ruang`) USING BTREE;

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_prodi_lab`
--
ALTER TABLE `tb_prodi_lab`
  ADD PRIMARY KEY (`id_prodi_lab`) USING BTREE,
  ADD KEY `id_laboratorium` (`id_laboratorium`) USING BTREE;

--
-- Indexes for table `tb_range_waktu`
--
ALTER TABLE `tb_range_waktu`
  ADD PRIMARY KEY (`id_range_waktu`);

--
-- Indexes for table `tb_role_pengguna`
--
ALTER TABLE `tb_role_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sub_menu`
--
ALTER TABLE `tb_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_access_menu`
--
ALTER TABLE `tb_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_kegiatan_lab`
--
ALTER TABLE `tb_kegiatan_lab`
  MODIFY `id_kegiatan_lab` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_laboran_lab`
--
ALTER TABLE `tb_laboran_lab`
  MODIFY `id_laboran_lab` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tb_laboratorium`
--
ALTER TABLE `tb_laboratorium`
  MODIFY `id_laboratorium` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_peminjaman_ruang`
--
ALTER TABLE `tb_peminjaman_ruang`
  MODIFY `id_peminjaman_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_prodi_lab`
--
ALTER TABLE `tb_prodi_lab`
  MODIFY `id_prodi_lab` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_range_waktu`
--
ALTER TABLE `tb_range_waktu`
  MODIFY `id_range_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_role_pengguna`
--
ALTER TABLE `tb_role_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_sub_menu`
--
ALTER TABLE `tb_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
