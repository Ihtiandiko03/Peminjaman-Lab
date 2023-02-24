-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 09:58 AM
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
(4, 1, 3),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7);

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
(37, 'Gedung Laboratorium Teknik 5', NULL, NULL, NULL, 37);

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
(00001, 1, 'Lab Prodi 1', 19, '3', 'Laboratorium Teknik 1', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 40, NULL),
(00002, 2, 'Lab Prodi 2', 19, '3', 'Laboratorium Teknik 1', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 60, NULL),
(00003, 3, 'Lab Prodi 3', 19, '3', 'Laboratorium Teknik 1', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 55, NULL),
(00004, 4, 'Lab Prodi 4', 19, '3', 'Laboratorium Teknik 1', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 45, NULL),
(00005, 5, 'Lab Komputer Dasar 1', 36, '3', 'Laboratorium Teknik 3', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 80, NULL),
(00006, 6, 'Lab Komputer Dasar 2', 36, '3', 'Laboratorium Teknik 3', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 80, NULL),
(00007, 7, 'Lab Komputer Dasar 3', 36, '2', 'Laboratorium Teknik 3', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 80, NULL),
(00008, 8, 'Lab Komputer Dasar 4', 36, '2', 'Laboratorium Teknik 3', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 80, NULL),
(00009, 9, 'Lab komputer Dasar 5', 36, '2', 'Laboratorium Teknik 3', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 80, NULL),
(00010, 10, 'Lab Komputer Dasar 6', 36, '3', 'Laboratorium Teknik 3', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 50, NULL),
(00011, 11, 'Lab Labtek 5 - 1', 37, '3', 'Laboratorium Teknik 5', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 30, NULL),
(00012, 12, 'Lab Labtek 5 - 2', 37, '3', 'Laboratorium Teknik 5', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 30, NULL),
(00013, 13, 'Lab Labtek 5 - 3', 37, '3', 'Laboratorium Teknik 5', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 30, NULL),
(00014, 14, 'Lab Labtek 5 - 4', 37, '3', 'Laboratorium Teknik 5', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 30, NULL),
(00015, 15, 'Lab Labtek 5 - 5', 37, '3', 'Laboratorium Teknik 5', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 30, NULL),
(00016, 16, 'Lab Labtek 5 - 6', 37, '3', 'Laboratorium Teknik 5', 'upt.labterpadu@itera.ac.id', 'upt.labterpadu@itera.ac.id', 30, NULL);

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
(1, 'Laboran'),
(2, 'User'),
(3, 'Menu'),
(5, 'Gedung'),
(6, 'Admin'),
(7, 'Peminjaman');

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `email_pengguna` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_peminjaman_ruang`
--

INSERT INTO `tb_peminjaman_ruang` (`id_peminjaman_ruang`, `id_laboratorium`, `nama`, `nrk`, `prodi`, `notlp`, `email`, `tanggal_penggunaan`, `id_range_waktu`, `mulai_penggunaan`, `selesai_penggunaan`, `berapa_minggu`, `nama_kegiatan`, `kapasitas`, `dokumen_pendukung`, `status`, `komentar`, `tanggal_pengajuan`, `created_at`, `email_pengguna`) VALUES
(1, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-01-30', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(2, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-02-06', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(3, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-02-13', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(4, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-02-20', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(5, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-02-27', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(6, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-03-06', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(7, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-03-13', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(8, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-03-20', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(9, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-03-27', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(10, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-04-03', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(11, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-04-10', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(12, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-04-17', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(13, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-04-24', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(14, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-05-01', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(15, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-05-08', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(16, 00001, 'Soekarno', '1610040309010001', 'Teknik Informatika', '1231513413123', 'soekarno@gmail.com', '2023-05-15', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 80, '491_Permohonan_Lab_MM_TIK.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:01:35', 'wihtiandiko@gmail.com'),
(17, 00001, 'Joko Widodo', '1610040309010002', 'Teknik Informatika', '1231513413123', 'jokowi@gmail.com', '2023-02-20', 2, NULL, NULL, NULL, 'Basis Data RD', 100, '491_Permohonan_Lab_MM_TIK1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:08:04', 'wihtiandiko@gmail.com'),
(18, 00001, 'Joko Widodo', '1610040309010002', 'Teknik Informatika', '1231513413123', 'jokowi@gmail.com', '2023-02-27', 2, NULL, NULL, NULL, 'Basis Data RD', 100, '491_Permohonan_Lab_MM_TIK1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:08:04', 'wihtiandiko@gmail.com'),
(19, 00001, 'Joko Widodo', '1610040309010002', 'Teknik Informatika', '1231513413123', 'jokowi@gmail.com', '2023-03-06', 2, NULL, NULL, NULL, 'Basis Data RD', 100, '491_Permohonan_Lab_MM_TIK1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:08:04', 'wihtiandiko@gmail.com'),
(20, 00001, 'Joko Widodo', '1610040309010002', 'Teknik Informatika', '1231513413123', 'jokowi@gmail.com', '2023-03-13', 2, NULL, NULL, NULL, 'Basis Data RD', 100, '491_Permohonan_Lab_MM_TIK1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:08:04', 'wihtiandiko@gmail.com'),
(21, 00001, 'Joko Widodo', '1610040309010002', 'Teknik Informatika', '1231513413123', 'jokowi@gmail.com', '2023-03-20', 2, NULL, NULL, NULL, 'Basis Data RD', 100, '491_Permohonan_Lab_MM_TIK1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:08:04', 'wihtiandiko@gmail.com'),
(22, 00001, 'Joko Widodo', '1610040309010002', 'Teknik Informatika', '1231513413123', 'jokowi@gmail.com', '2023-03-27', 2, NULL, NULL, NULL, 'Basis Data RD', 100, '491_Permohonan_Lab_MM_TIK1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:08:04', 'wihtiandiko@gmail.com'),
(23, 00001, 'Joko Widodo', '1610040309010002', 'Teknik Informatika', '1231513413123', 'jokowi@gmail.com', '2023-04-03', 2, NULL, NULL, NULL, 'Basis Data RD', 100, '491_Permohonan_Lab_MM_TIK1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:08:04', 'wihtiandiko@gmail.com'),
(24, 00001, 'Joko Widodo', '1610040309010002', 'Teknik Informatika', '1231513413123', 'jokowi@gmail.com', '2023-04-10', 2, NULL, NULL, NULL, 'Basis Data RD', 100, '491_Permohonan_Lab_MM_TIK1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:08:04', 'wihtiandiko@gmail.com'),
(25, 00001, 'Joko Widodo', '1610040309010002', 'Teknik Informatika', '1231513413123', 'jokowi@gmail.com', '2023-04-17', 2, NULL, NULL, NULL, 'Basis Data RD', 100, '491_Permohonan_Lab_MM_TIK1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:08:04', 'wihtiandiko@gmail.com'),
(26, 00001, 'Joko Widodo', '1610040309010002', 'Teknik Informatika', '1231513413123', 'jokowi@gmail.com', '2023-04-24', 2, NULL, NULL, NULL, 'Basis Data RD', 100, '491_Permohonan_Lab_MM_TIK1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:08:04', 'wihtiandiko@gmail.com'),
(27, 00001, 'Joko Widodo', '1610040309010002', 'Teknik Informatika', '1231513413123', 'jokowi@gmail.com', '2023-05-01', 2, NULL, NULL, NULL, 'Basis Data RD', 100, '491_Permohonan_Lab_MM_TIK1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:08:04', 'wihtiandiko@gmail.com'),
(28, 00001, 'Joko Widodo', '1610040309010002', 'Teknik Informatika', '1231513413123', 'jokowi@gmail.com', '2023-05-08', 2, NULL, NULL, NULL, 'Basis Data RD', 100, '491_Permohonan_Lab_MM_TIK1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:08:04', 'wihtiandiko@gmail.com'),
(29, 00001, 'Joko Widodo', '1610040309010002', 'Teknik Informatika', '1231513413123', 'jokowi@gmail.com', '2023-05-15', 2, NULL, NULL, NULL, 'Basis Data RD', 100, '491_Permohonan_Lab_MM_TIK1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:08:04', 'wihtiandiko@gmail.com'),
(30, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-02-07', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(31, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-02-14', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(32, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-02-21', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(33, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-02-28', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(34, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-03-07', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(35, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-03-14', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(36, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-03-21', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(37, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-03-28', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(38, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-04-04', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(39, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-04-11', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(40, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-04-18', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(41, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-04-25', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(42, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-05-02', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(43, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-05-09', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(44, 00001, 'Hendra', '1610040309010001', 'Teknik Informatika', '1231513413123', 'hendra@gmail.com', '2023-05-16', 2, NULL, NULL, NULL, 'Sistem/Teknologi Multimedia', 89, '491_Permohonan_Lab_MM_TIK2.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:16:46', 'wihtiandiko@gmail.com'),
(45, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-01-31', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(46, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-02-07', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(47, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-02-14', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(48, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-02-21', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(49, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-02-28', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(50, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-03-07', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(51, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-03-14', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(52, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-03-21', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(53, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-03-28', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(54, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-04-04', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(55, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-04-11', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(56, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-04-18', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(57, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-04-25', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(58, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-05-02', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(59, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-05-09', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(60, 00001, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-05-16', 4, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RA', 70, '929_Permohonan_Peminjaman_Lab_Multimedia_(1).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:21:27', 'wihtiandiko@gmail.com'),
(61, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-01-31', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(62, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-02-07', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(63, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-02-14', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(64, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-02-21', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(65, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-02-28', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(66, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-03-07', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(67, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-03-14', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(68, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-03-21', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(69, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-03-28', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(70, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-04-04', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(71, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-04-11', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(72, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-04-18', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(73, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-04-25', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(74, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-05-02', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(75, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-05-09', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(76, 00001, 'Aidil', '1610040309010001', 'Teknik Informatika', '1231513413123', 'aidil@gmail.com', '2023-05-16', 5, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RA', 60, '491_Permohonan_Lab_MM_TIK3.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:25:16', 'wihtiandiko@gmail.com'),
(77, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-02-08', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(78, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-02-15', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(79, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-02-22', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(80, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-03-01', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(81, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-03-08', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(82, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-03-15', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(83, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-03-22', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(84, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-03-29', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(85, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-04-05', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(86, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-04-12', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(87, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-04-19', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(88, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-04-26', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(89, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-05-03', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(90, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-05-10', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(91, 00001, 'Ucup', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ucup@gmail.com', '2023-05-17', 1, NULL, NULL, NULL, 'Kapita Selekta Informatika RA', 58, '929_Permohonan_Peminjaman_Lab_Multimedia_(1)1.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:32:17', 'wihtiandiko@gmail.com'),
(92, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-02-08', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(93, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-02-15', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(94, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-02-22', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(95, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-03-01', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(96, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-03-08', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(97, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-03-15', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(98, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-03-22', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(99, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-03-29', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(100, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-04-05', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(101, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-04-12', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(102, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-04-19', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(103, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-04-26', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(104, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-05-03', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(105, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-05-10', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(106, 00001, 'Wahyu', '1610040309010001', 'Teknik Informatika', '081278664533', 'wahyu@gmail.com', '2023-05-17', 2, NULL, NULL, NULL, 'Pengolahan Sinyal Digital', 75, '491_Permohonan_Lab_MM_TIK4.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:36:46', 'wihtiandiko@gmail.com'),
(107, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-02-01', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(108, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-02-08', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(109, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-02-15', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(110, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-02-22', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(111, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-03-01', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(112, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-03-08', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(113, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-03-15', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(114, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-03-22', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(115, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-03-29', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(116, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-04-05', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(117, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-04-12', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(118, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-04-19', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(119, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-04-26', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(120, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-05-03', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(121, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-05-10', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(122, 00001, 'Wawan', '1610040309010001', 'Teknik Informatika', '1231513413123', 'wawan@gmail.com', '2023-05-17', 4, NULL, NULL, NULL, 'Socio Informatika dan Etika Profesi RB', 65, '491_Permohonan_Lab_MM_TIK5.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:39:03', 'wihtiandiko@gmail.com'),
(123, 00001, 'Megawati', '1610040309010001', 'Teknik Informatika', '1231513413123', 'megawati@gmail.com', '2023-02-23', 1, NULL, NULL, NULL, 'Sistem Operasi RC', 45, '491_Permohonan_Lab_MM_TIK6.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:42:04', 'wihtiandiko@gmail.com'),
(124, 00001, 'Megawati', '1610040309010001', 'Teknik Informatika', '1231513413123', 'megawati@gmail.com', '2023-03-02', 1, NULL, NULL, NULL, 'Sistem Operasi RC', 45, '491_Permohonan_Lab_MM_TIK6.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:42:04', 'wihtiandiko@gmail.com'),
(125, 00001, 'Megawati', '1610040309010001', 'Teknik Informatika', '1231513413123', 'megawati@gmail.com', '2023-03-09', 1, NULL, NULL, NULL, 'Sistem Operasi RC', 45, '491_Permohonan_Lab_MM_TIK6.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:42:04', 'wihtiandiko@gmail.com'),
(126, 00001, 'Megawati', '1610040309010001', 'Teknik Informatika', '1231513413123', 'megawati@gmail.com', '2023-03-16', 1, NULL, NULL, NULL, 'Sistem Operasi RC', 45, '491_Permohonan_Lab_MM_TIK6.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:42:04', 'wihtiandiko@gmail.com'),
(127, 00001, 'Megawati', '1610040309010001', 'Teknik Informatika', '1231513413123', 'megawati@gmail.com', '2023-03-23', 1, NULL, NULL, NULL, 'Sistem Operasi RC', 45, '491_Permohonan_Lab_MM_TIK6.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:42:04', 'wihtiandiko@gmail.com'),
(128, 00001, 'Megawati', '1610040309010001', 'Teknik Informatika', '1231513413123', 'megawati@gmail.com', '2023-03-30', 1, NULL, NULL, NULL, 'Sistem Operasi RC', 45, '491_Permohonan_Lab_MM_TIK6.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:42:04', 'wihtiandiko@gmail.com'),
(129, 00001, 'Megawati', '1610040309010001', 'Teknik Informatika', '1231513413123', 'megawati@gmail.com', '2023-04-06', 1, NULL, NULL, NULL, 'Sistem Operasi RC', 45, '491_Permohonan_Lab_MM_TIK6.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:42:04', 'wihtiandiko@gmail.com'),
(130, 00001, 'Megawati', '1610040309010001', 'Teknik Informatika', '1231513413123', 'megawati@gmail.com', '2023-04-13', 1, NULL, NULL, NULL, 'Sistem Operasi RC', 45, '491_Permohonan_Lab_MM_TIK6.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:42:04', 'wihtiandiko@gmail.com'),
(131, 00001, 'Megawati', '1610040309010001', 'Teknik Informatika', '1231513413123', 'megawati@gmail.com', '2023-04-20', 1, NULL, NULL, NULL, 'Sistem Operasi RC', 45, '491_Permohonan_Lab_MM_TIK6.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:42:04', 'wihtiandiko@gmail.com'),
(132, 00001, 'Megawati', '1610040309010001', 'Teknik Informatika', '1231513413123', 'megawati@gmail.com', '2023-04-27', 1, NULL, NULL, NULL, 'Sistem Operasi RC', 45, '491_Permohonan_Lab_MM_TIK6.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:42:04', 'wihtiandiko@gmail.com'),
(133, 00001, 'Megawati', '1610040309010001', 'Teknik Informatika', '1231513413123', 'megawati@gmail.com', '2023-05-04', 1, NULL, NULL, NULL, 'Sistem Operasi RC', 45, '491_Permohonan_Lab_MM_TIK6.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:42:04', 'wihtiandiko@gmail.com'),
(134, 00001, 'Megawati', '1610040309010001', 'Teknik Informatika', '1231513413123', 'megawati@gmail.com', '2023-05-11', 1, NULL, NULL, NULL, 'Sistem Operasi RC', 45, '491_Permohonan_Lab_MM_TIK6.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:42:04', 'wihtiandiko@gmail.com'),
(135, 00001, 'Megawati', '1610040309010001', 'Teknik Informatika', '1231513413123', 'megawati@gmail.com', '2023-05-18', 1, NULL, NULL, NULL, 'Sistem Operasi RC', 45, '491_Permohonan_Lab_MM_TIK6.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:42:04', 'wihtiandiko@gmail.com'),
(136, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-02-03', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(137, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-02-10', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(138, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-02-17', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(139, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-02-24', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(140, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-03-03', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(141, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-03-10', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(142, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-03-17', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(143, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-03-24', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(144, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-03-31', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(145, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-04-07', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(146, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-04-14', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(147, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-04-21', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(148, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-04-28', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(149, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-05-05', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(150, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-05-12', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(151, 00001, 'Susilo', '1610040309010001', 'Teknik Informatika', '1231513413123', 'susilo@gmail.com', '2023-05-19', 5, NULL, NULL, NULL, 'Kapita Selekta Informatika RB', 76, '491_Permohonan_Lab_MM_TIK7.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 03:44:05', 'wihtiandiko@gmail.com'),
(152, 00002, 'Agus', '1610040309010001', 'Sains Data', '1231513413123', 'agus@gmail.com', '2023-02-20', 1, NULL, NULL, NULL, 'Basis Data RC', 54, '491_Permohonan_Lab_MM_TIK8.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:01:24', 'wihtiandiko@gmail.com'),
(153, 00002, 'Agus', '1610040309010001', 'Sains Data', '1231513413123', 'agus@gmail.com', '2023-02-27', 1, NULL, NULL, NULL, 'Basis Data RC', 54, '491_Permohonan_Lab_MM_TIK8.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:01:24', 'wihtiandiko@gmail.com'),
(154, 00002, 'Agus', '1610040309010001', 'Sains Data', '1231513413123', 'agus@gmail.com', '2023-03-06', 1, NULL, NULL, NULL, 'Basis Data RC', 54, '491_Permohonan_Lab_MM_TIK8.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:01:24', 'wihtiandiko@gmail.com'),
(155, 00002, 'Agus', '1610040309010001', 'Sains Data', '1231513413123', 'agus@gmail.com', '2023-03-13', 1, NULL, NULL, NULL, 'Basis Data RC', 54, '491_Permohonan_Lab_MM_TIK8.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:01:24', 'wihtiandiko@gmail.com'),
(156, 00002, 'Agus', '1610040309010001', 'Sains Data', '1231513413123', 'agus@gmail.com', '2023-03-20', 1, NULL, NULL, NULL, 'Basis Data RC', 54, '491_Permohonan_Lab_MM_TIK8.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:01:24', 'wihtiandiko@gmail.com'),
(157, 00002, 'Agus', '1610040309010001', 'Sains Data', '1231513413123', 'agus@gmail.com', '2023-03-27', 1, NULL, NULL, NULL, 'Basis Data RC', 54, '491_Permohonan_Lab_MM_TIK8.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:01:24', 'wihtiandiko@gmail.com'),
(158, 00002, 'Agus', '1610040309010001', 'Sains Data', '1231513413123', 'agus@gmail.com', '2023-04-03', 1, NULL, NULL, NULL, 'Basis Data RC', 54, '491_Permohonan_Lab_MM_TIK8.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:01:24', 'wihtiandiko@gmail.com'),
(159, 00002, 'Agus', '1610040309010001', 'Sains Data', '1231513413123', 'agus@gmail.com', '2023-04-10', 1, NULL, NULL, NULL, 'Basis Data RC', 54, '491_Permohonan_Lab_MM_TIK8.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:01:24', 'wihtiandiko@gmail.com'),
(160, 00002, 'Agus', '1610040309010001', 'Sains Data', '1231513413123', 'agus@gmail.com', '2023-04-17', 1, NULL, NULL, NULL, 'Basis Data RC', 54, '491_Permohonan_Lab_MM_TIK8.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:01:24', 'wihtiandiko@gmail.com'),
(161, 00002, 'Agus', '1610040309010001', 'Sains Data', '1231513413123', 'agus@gmail.com', '2023-04-24', 1, NULL, NULL, NULL, 'Basis Data RC', 54, '491_Permohonan_Lab_MM_TIK8.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:01:24', 'wihtiandiko@gmail.com'),
(162, 00002, 'Agus', '1610040309010001', 'Sains Data', '1231513413123', 'agus@gmail.com', '2023-05-01', 1, NULL, NULL, NULL, 'Basis Data RC', 54, '491_Permohonan_Lab_MM_TIK8.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:01:24', 'wihtiandiko@gmail.com'),
(163, 00002, 'Agus', '1610040309010001', 'Sains Data', '1231513413123', 'agus@gmail.com', '2023-05-08', 1, NULL, NULL, NULL, 'Basis Data RC', 54, '491_Permohonan_Lab_MM_TIK8.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:01:24', 'wihtiandiko@gmail.com'),
(164, 00002, 'Agus', '1610040309010001', 'Sains Data', '1231513413123', 'agus@gmail.com', '2023-05-15', 1, NULL, NULL, NULL, 'Basis Data RC', 54, '491_Permohonan_Lab_MM_TIK8.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:01:24', 'wihtiandiko@gmail.com'),
(165, 00002, 'Anggi', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'anggi@gmail.com', '2023-01-30', 2, NULL, NULL, NULL, 'Metode Numerik & Komputasi Proses RC', 56, 'Kelola_Peminjaman_(3).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:04:12', 'wihtiandiko@gmail.com'),
(166, 00002, 'Anggi', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'anggi@gmail.com', '2023-02-06', 2, NULL, NULL, NULL, 'Metode Numerik & Komputasi Proses RC', 56, 'Kelola_Peminjaman_(3).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:04:12', 'wihtiandiko@gmail.com'),
(167, 00002, 'Anggi', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'anggi@gmail.com', '2023-02-13', 2, NULL, NULL, NULL, 'Metode Numerik & Komputasi Proses RC', 56, 'Kelola_Peminjaman_(3).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:04:12', 'wihtiandiko@gmail.com'),
(168, 00002, 'Anggi', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'anggi@gmail.com', '2023-02-20', 2, NULL, NULL, NULL, 'Metode Numerik & Komputasi Proses RC', 56, 'Kelola_Peminjaman_(3).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:04:12', 'wihtiandiko@gmail.com'),
(169, 00002, 'Anggi', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'anggi@gmail.com', '2023-02-27', 2, NULL, NULL, NULL, 'Metode Numerik & Komputasi Proses RC', 56, 'Kelola_Peminjaman_(3).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:04:12', 'wihtiandiko@gmail.com'),
(170, 00002, 'Anggi', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'anggi@gmail.com', '2023-03-06', 2, NULL, NULL, NULL, 'Metode Numerik & Komputasi Proses RC', 56, 'Kelola_Peminjaman_(3).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:04:12', 'wihtiandiko@gmail.com'),
(171, 00002, 'Anggi', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'anggi@gmail.com', '2023-03-13', 2, NULL, NULL, NULL, 'Metode Numerik & Komputasi Proses RC', 56, 'Kelola_Peminjaman_(3).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:04:12', 'wihtiandiko@gmail.com');
INSERT INTO `tb_peminjaman_ruang` (`id_peminjaman_ruang`, `id_laboratorium`, `nama`, `nrk`, `prodi`, `notlp`, `email`, `tanggal_penggunaan`, `id_range_waktu`, `mulai_penggunaan`, `selesai_penggunaan`, `berapa_minggu`, `nama_kegiatan`, `kapasitas`, `dokumen_pendukung`, `status`, `komentar`, `tanggal_pengajuan`, `created_at`, `email_pengguna`) VALUES
(172, 00002, 'Anggi', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'anggi@gmail.com', '2023-03-27', 2, NULL, NULL, NULL, 'Metode Numerik & Komputasi Proses RC', 56, 'Kelola_Peminjaman_(3).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:04:12', 'wihtiandiko@gmail.com'),
(173, 00002, 'Anggi', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'anggi@gmail.com', '2023-04-03', 2, NULL, NULL, NULL, 'Metode Numerik & Komputasi Proses RC', 56, 'Kelola_Peminjaman_(3).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:04:12', 'wihtiandiko@gmail.com'),
(174, 00002, 'Anggi', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'anggi@gmail.com', '2023-04-10', 2, NULL, NULL, NULL, 'Metode Numerik & Komputasi Proses RC', 56, 'Kelola_Peminjaman_(3).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:04:12', 'wihtiandiko@gmail.com'),
(175, 00002, 'Anggi', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'anggi@gmail.com', '2023-04-17', 2, NULL, NULL, NULL, 'Metode Numerik & Komputasi Proses RC', 56, 'Kelola_Peminjaman_(3).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:04:12', 'wihtiandiko@gmail.com'),
(176, 00002, 'Anggi', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'anggi@gmail.com', '2023-04-24', 2, NULL, NULL, NULL, 'Metode Numerik & Komputasi Proses RC', 56, 'Kelola_Peminjaman_(3).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:04:12', 'wihtiandiko@gmail.com'),
(177, 00002, 'Anggi', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'anggi@gmail.com', '2023-05-01', 2, NULL, NULL, NULL, 'Metode Numerik & Komputasi Proses RC', 56, 'Kelola_Peminjaman_(3).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:04:12', 'wihtiandiko@gmail.com'),
(178, 00002, 'Anggi', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'anggi@gmail.com', '2023-05-08', 2, NULL, NULL, NULL, 'Metode Numerik & Komputasi Proses RC', 56, 'Kelola_Peminjaman_(3).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:04:12', 'wihtiandiko@gmail.com'),
(179, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-02-06', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(180, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-02-13', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(181, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-02-20', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(182, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-02-27', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(183, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-03-06', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(184, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-03-13', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(185, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-03-20', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(186, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-03-27', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(187, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-04-03', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(188, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-04-10', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(189, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-04-17', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(190, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-04-24', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(191, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-05-01', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(192, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-05-08', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(193, 00002, 'Siti', '1610040309010002', 'Teknik Telekomunikasi', '1231513413123', 'siti@gmail.com', '2023-05-15', 4, NULL, NULL, NULL, 'Dinamika Teknik RA', 76, 'Kelola_Peminjaman_(4).pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:05:22', 'wihtiandiko@gmail.com'),
(194, 00003, 'Mawardi', '1610040309010001', 'Teknik Material', '1231513413123', 'mawardi@gmail.com', '2023-02-20', 1, NULL, NULL, NULL, 'Simulasi dan Pemodelan Material B', 76, '491_Permohonan_Lab_MM_TIK71.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:30:00', 'wihtiandiko@gmail.com'),
(195, 00003, 'Mawardi', '1610040309010001', 'Teknik Material', '1231513413123', 'mawardi@gmail.com', '2023-02-27', 1, NULL, NULL, NULL, 'Simulasi dan Pemodelan Material B', 76, '491_Permohonan_Lab_MM_TIK71.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:30:00', 'wihtiandiko@gmail.com'),
(196, 00003, 'Mawardi', '1610040309010001', 'Teknik Material', '1231513413123', 'mawardi@gmail.com', '2023-03-06', 1, NULL, NULL, NULL, 'Simulasi dan Pemodelan Material B', 76, '491_Permohonan_Lab_MM_TIK71.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:30:00', 'wihtiandiko@gmail.com'),
(197, 00003, 'Mawardi', '1610040309010001', 'Teknik Material', '1231513413123', 'mawardi@gmail.com', '2023-04-03', 1, NULL, NULL, NULL, 'Simulasi dan Pemodelan Material B', 76, '491_Permohonan_Lab_MM_TIK71.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:30:00', 'wihtiandiko@gmail.com'),
(198, 00003, 'Mawardi', '1610040309010001', 'Teknik Material', '1231513413123', 'mawardi@gmail.com', '2023-04-10', 1, NULL, NULL, NULL, 'Simulasi dan Pemodelan Material B', 76, '491_Permohonan_Lab_MM_TIK71.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:30:00', 'wihtiandiko@gmail.com'),
(199, 00003, 'Mawardi', '1610040309010001', 'Teknik Material', '1231513413123', 'mawardi@gmail.com', '2023-04-17', 1, NULL, NULL, NULL, 'Simulasi dan Pemodelan Material B', 76, '491_Permohonan_Lab_MM_TIK71.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:30:00', 'wihtiandiko@gmail.com'),
(200, 00003, 'Mawardi', '1610040309010001', 'Teknik Material', '1231513413123', 'mawardi@gmail.com', '2023-04-24', 1, NULL, NULL, NULL, 'Simulasi dan Pemodelan Material B', 76, '491_Permohonan_Lab_MM_TIK71.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:30:00', 'wihtiandiko@gmail.com'),
(201, 00003, 'Soehardi', '1610040309010001', 'Teknik Material', '1231513413123', 'soehardi@gmail.com', '2023-02-20', 4, NULL, NULL, NULL, 'Simulasi dan Pemodelan Material A', 67, '491_Permohonan_Lab_MM_TIK72.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:31:31', 'wihtiandiko@gmail.com'),
(202, 00003, 'Soehardi', '1610040309010001', 'Teknik Material', '1231513413123', 'soehardi@gmail.com', '2023-02-27', 4, NULL, NULL, NULL, 'Simulasi dan Pemodelan Material A', 67, '491_Permohonan_Lab_MM_TIK72.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:31:31', 'wihtiandiko@gmail.com'),
(203, 00003, 'Soehardi', '1610040309010001', 'Teknik Material', '1231513413123', 'soehardi@gmail.com', '2023-03-06', 4, NULL, NULL, NULL, 'Simulasi dan Pemodelan Material A', 67, '491_Permohonan_Lab_MM_TIK72.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:31:31', 'wihtiandiko@gmail.com'),
(204, 00003, 'Soehardi', '1610040309010001', 'Teknik Material', '1231513413123', 'soehardi@gmail.com', '2023-04-03', 4, NULL, NULL, NULL, 'Simulasi dan Pemodelan Material A', 67, '491_Permohonan_Lab_MM_TIK72.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:31:31', 'wihtiandiko@gmail.com'),
(205, 00003, 'Soehardi', '1610040309010001', 'Teknik Material', '1231513413123', 'soehardi@gmail.com', '2023-04-10', 4, NULL, NULL, NULL, 'Simulasi dan Pemodelan Material A', 67, '491_Permohonan_Lab_MM_TIK72.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:31:31', 'wihtiandiko@gmail.com'),
(206, 00003, 'Soehardi', '1610040309010001', 'Teknik Material', '1231513413123', 'soehardi@gmail.com', '2023-04-17', 4, NULL, NULL, NULL, 'Simulasi dan Pemodelan Material A', 67, '491_Permohonan_Lab_MM_TIK72.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:31:31', 'wihtiandiko@gmail.com'),
(207, 00003, 'Soehardi', '1610040309010001', 'Teknik Material', '1231513413123', 'soehardi@gmail.com', '2023-04-24', 4, NULL, NULL, NULL, 'Simulasi dan Pemodelan Material A', 67, '491_Permohonan_Lab_MM_TIK72.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:31:31', 'wihtiandiko@gmail.com'),
(208, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-01-30', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(209, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-02-06', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(210, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-02-13', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(211, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-02-20', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(212, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-02-27', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(213, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-03-06', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(214, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-03-13', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(215, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-03-20', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(216, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-03-27', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(217, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-04-03', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(218, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-04-10', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(219, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-04-17', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(220, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-04-24', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(221, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-05-01', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(222, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-05-08', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(223, 00004, 'Habib', '1610040309010001', 'Teknik Informatika', '1231513413123', 'habib@gmail.com', '2023-05-15', 1, NULL, NULL, NULL, 'Pengembangan Aplikasi Mobile RA', 45, '491_Permohonan_Lab_MM_TIK73.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:38:31', 'wihtiandiko@gmail.com'),
(224, 00004, 'Adam', '1610040309010002', 'Teknik Informatika', '1231513413123', 'adam@gmail.com', '2023-02-20', 2, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RD', 79, '491_Permohonan_Lab_MM_TIK74.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:39:58', 'wihtiandiko@gmail.com'),
(225, 00004, 'Adam', '1610040309010002', 'Teknik Informatika', '1231513413123', 'adam@gmail.com', '2023-02-27', 2, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RD', 79, '491_Permohonan_Lab_MM_TIK74.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:39:58', 'wihtiandiko@gmail.com'),
(226, 00004, 'Adam', '1610040309010002', 'Teknik Informatika', '1231513413123', 'adam@gmail.com', '2023-03-06', 2, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RD', 79, '491_Permohonan_Lab_MM_TIK74.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:39:58', 'wihtiandiko@gmail.com'),
(227, 00004, 'Adam', '1610040309010002', 'Teknik Informatika', '1231513413123', 'adam@gmail.com', '2023-03-13', 2, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RD', 79, '491_Permohonan_Lab_MM_TIK74.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:39:58', 'wihtiandiko@gmail.com'),
(228, 00004, 'Adam', '1610040309010002', 'Teknik Informatika', '1231513413123', 'adam@gmail.com', '2023-03-20', 2, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RD', 79, '491_Permohonan_Lab_MM_TIK74.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:39:58', 'wihtiandiko@gmail.com'),
(229, 00004, 'Adam', '1610040309010002', 'Teknik Informatika', '1231513413123', 'adam@gmail.com', '2023-03-27', 2, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RD', 79, '491_Permohonan_Lab_MM_TIK74.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:39:58', 'wihtiandiko@gmail.com'),
(230, 00004, 'Adam', '1610040309010002', 'Teknik Informatika', '1231513413123', 'adam@gmail.com', '2023-04-03', 2, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RD', 79, '491_Permohonan_Lab_MM_TIK74.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:39:58', 'wihtiandiko@gmail.com'),
(231, 00004, 'Adam', '1610040309010002', 'Teknik Informatika', '1231513413123', 'adam@gmail.com', '2023-04-10', 2, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RD', 79, '491_Permohonan_Lab_MM_TIK74.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:39:58', 'wihtiandiko@gmail.com'),
(232, 00004, 'Adam', '1610040309010002', 'Teknik Informatika', '1231513413123', 'adam@gmail.com', '2023-04-17', 2, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RD', 79, '491_Permohonan_Lab_MM_TIK74.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:39:58', 'wihtiandiko@gmail.com'),
(233, 00004, 'Adam', '1610040309010002', 'Teknik Informatika', '1231513413123', 'adam@gmail.com', '2023-04-24', 2, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RD', 79, '491_Permohonan_Lab_MM_TIK74.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:39:58', 'wihtiandiko@gmail.com'),
(234, 00004, 'Adam', '1610040309010002', 'Teknik Informatika', '1231513413123', 'adam@gmail.com', '2023-05-01', 2, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RD', 79, '491_Permohonan_Lab_MM_TIK74.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:39:58', 'wihtiandiko@gmail.com'),
(235, 00004, 'Adam', '1610040309010002', 'Teknik Informatika', '1231513413123', 'adam@gmail.com', '2023-05-08', 2, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RD', 79, '491_Permohonan_Lab_MM_TIK74.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:39:58', 'wihtiandiko@gmail.com'),
(236, 00004, 'Adam', '1610040309010002', 'Teknik Informatika', '1231513413123', 'adam@gmail.com', '2023-05-15', 2, NULL, NULL, NULL, 'Pemrograman Berorientasi Objek RD', 79, '491_Permohonan_Lab_MM_TIK74.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:39:58', 'wihtiandiko@gmail.com'),
(237, 00004, 'Idris', '1610040309010001', 'Teknik Geofisika', '1231513413123', 'idris@gmail.com', '2023-02-13', 4, NULL, NULL, NULL, 'Penginderaan Jarak Jauh', 78, '491_Permohonan_Lab_MM_TIK75.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:43:28', 'wihtiandiko@gmail.com'),
(238, 00004, 'Idris', '1610040309010001', 'Teknik Geofisika', '1231513413123', 'idris@gmail.com', '2023-02-20', 4, NULL, NULL, NULL, 'Penginderaan Jarak Jauh', 78, '491_Permohonan_Lab_MM_TIK75.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:43:28', 'wihtiandiko@gmail.com'),
(239, 00004, 'Idris', '1610040309010001', 'Teknik Geofisika', '1231513413123', 'idris@gmail.com', '2023-02-27', 4, NULL, NULL, NULL, 'Penginderaan Jarak Jauh', 78, '491_Permohonan_Lab_MM_TIK75.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:43:28', 'wihtiandiko@gmail.com'),
(240, 00004, 'Idris', '1610040309010001', 'Teknik Geofisika', '1231513413123', 'idris@gmail.com', '2023-03-06', 4, NULL, NULL, NULL, 'Penginderaan Jarak Jauh', 78, '491_Permohonan_Lab_MM_TIK75.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:43:28', 'wihtiandiko@gmail.com'),
(241, 00004, 'Idris', '1610040309010001', 'Teknik Geofisika', '1231513413123', 'idris@gmail.com', '2023-03-13', 4, NULL, NULL, NULL, 'Penginderaan Jarak Jauh', 78, '491_Permohonan_Lab_MM_TIK75.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:43:28', 'wihtiandiko@gmail.com'),
(242, 00004, 'Idris', '1610040309010001', 'Teknik Geofisika', '1231513413123', 'idris@gmail.com', '2023-03-20', 4, NULL, NULL, NULL, 'Penginderaan Jarak Jauh', 78, '491_Permohonan_Lab_MM_TIK75.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:43:28', 'wihtiandiko@gmail.com'),
(243, 00004, 'Idris', '1610040309010001', 'Teknik Geofisika', '1231513413123', 'idris@gmail.com', '2023-03-27', 4, NULL, NULL, NULL, 'Penginderaan Jarak Jauh', 78, '491_Permohonan_Lab_MM_TIK75.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:43:28', 'wihtiandiko@gmail.com'),
(244, 00004, 'Idris', '1610040309010001', 'Teknik Geofisika', '1231513413123', 'idris@gmail.com', '2023-04-03', 4, NULL, NULL, NULL, 'Penginderaan Jarak Jauh', 78, '491_Permohonan_Lab_MM_TIK75.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:43:28', 'wihtiandiko@gmail.com'),
(245, 00004, 'Idris', '1610040309010001', 'Teknik Geofisika', '1231513413123', 'idris@gmail.com', '2023-04-10', 4, NULL, NULL, NULL, 'Penginderaan Jarak Jauh', 78, '491_Permohonan_Lab_MM_TIK75.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:43:28', 'wihtiandiko@gmail.com'),
(246, 00004, 'Idris', '1610040309010001', 'Teknik Geofisika', '1231513413123', 'idris@gmail.com', '2023-04-17', 4, NULL, NULL, NULL, 'Penginderaan Jarak Jauh', 78, '491_Permohonan_Lab_MM_TIK75.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:43:28', 'wihtiandiko@gmail.com'),
(247, 00004, 'Idris', '1610040309010001', 'Teknik Geofisika', '1231513413123', 'idris@gmail.com', '2023-04-24', 4, NULL, NULL, NULL, 'Penginderaan Jarak Jauh', 78, '491_Permohonan_Lab_MM_TIK75.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:43:28', 'wihtiandiko@gmail.com'),
(248, 00004, 'Idris', '1610040309010001', 'Teknik Geofisika', '1231513413123', 'idris@gmail.com', '2023-05-01', 4, NULL, NULL, NULL, 'Penginderaan Jarak Jauh', 78, '491_Permohonan_Lab_MM_TIK75.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:43:28', 'wihtiandiko@gmail.com'),
(249, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-01-30', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(250, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-02-06', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(251, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-02-13', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(252, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-02-20', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(253, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-02-27', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(254, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-03-06', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(255, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-03-13', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(256, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-03-20', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(257, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-03-27', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(258, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-04-03', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(259, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-04-10', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(260, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-04-17', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(261, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-04-24', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(262, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-05-01', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(263, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-05-08', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(264, 00005, 'Nuh', '1610040309010001', 'TPB', '1231513413123', 'nuh@gmail.com', '2023-05-15', 1, NULL, NULL, NULL, 'PKS 43', 77, '491_Permohonan_Lab_MM_TIK76.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:52:58', 'wihtiandiko@gmail.com'),
(265, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-01-30', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(266, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-02-06', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(267, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-02-13', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(268, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-02-20', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(269, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-02-27', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(270, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-03-06', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(271, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-03-13', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(272, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-03-20', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(273, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-03-27', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(274, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-04-03', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(275, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-04-10', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(276, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-04-17', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(277, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-04-24', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(278, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-05-01', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(279, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-05-08', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(280, 00005, 'Hud', '1610040309010001', 'TPB', '1231513413123', 'hud@gmail.com', '2023-05-15', 2, NULL, NULL, NULL, 'PKS 40', 66, '491_Permohonan_Lab_MM_TIK77.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:54:12', 'wihtiandiko@gmail.com'),
(281, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-01-30', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(282, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-02-06', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(283, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-02-13', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(284, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-02-20', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(285, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-02-27', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(286, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-03-06', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(287, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-03-13', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(288, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-03-20', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(289, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-03-27', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(290, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-04-03', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(291, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-04-10', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(292, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-04-17', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(293, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-04-24', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(294, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-05-01', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(295, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-05-08', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(296, 00005, 'Saleh', '1610040309010001', 'TPB', '081278664533', 'saleh@gmail.com', '2023-05-15', 4, NULL, NULL, NULL, 'TPB 30', 78, '491_Permohonan_Lab_MM_TIK78.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 07:55:17', 'wihtiandiko@gmail.com'),
(297, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-01-30', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(298, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-02-06', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(299, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-02-13', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(300, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-02-20', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(301, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-02-27', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(302, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-03-06', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(303, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-03-13', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(304, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-03-20', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(305, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-03-27', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(306, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-04-03', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(307, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-04-10', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(308, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-04-17', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(309, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-04-24', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(310, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-05-01', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(311, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-05-08', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(312, 00006, 'Ibrahim', '1610040309010001', 'Teknik Informatika', '1231513413123', 'ibrahim@gmail.com', '2023-05-15', 1, NULL, NULL, NULL, 'Sistem Tertanam RA', 56, '491_Permohonan_Lab_MM_TIK79.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:05:33', 'wihtiandiko@gmail.com'),
(313, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-01-30', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(314, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-02-06', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(315, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-02-13', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(316, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-02-20', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(317, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-02-27', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(318, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-03-06', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(319, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-03-13', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(320, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-03-20', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(321, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-03-27', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(322, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-04-03', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(323, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-04-10', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(324, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-04-17', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(325, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-04-24', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(326, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-05-01', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(327, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-05-08', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(328, 00006, 'Luth', '1610040309010001', 'TPB', '1231513413123', 'luth@gmail.com', '2023-05-15', 2, NULL, NULL, NULL, 'PKS 41', 34, '491_Permohonan_Lab_MM_TIK710.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:11:47', 'wihtiandiko@gmail.com'),
(329, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-01-30', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(330, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-02-06', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(331, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-02-13', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(332, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-02-20', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(333, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-02-27', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(334, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-03-06', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(335, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-03-13', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(336, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-03-20', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(337, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-03-27', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(338, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-04-03', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(339, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-04-10', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(340, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-04-17', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(341, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-04-24', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(342, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-05-01', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(343, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-05-08', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(344, 00006, 'Ismail', '1610040309010001', 'TPB', '1231513413123', 'ismail@gmail.com', '2023-05-15', 4, NULL, NULL, NULL, 'PKS 31', 55, '491_Permohonan_Lab_MM_TIK711.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:14:58', 'wihtiandiko@gmail.com'),
(345, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-01-30', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(346, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-02-06', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(347, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-02-13', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(348, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-02-20', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(349, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-02-27', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(350, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-03-06', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(351, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-03-13', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(352, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-03-20', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(353, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-03-27', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(354, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-04-03', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(355, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-04-10', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(356, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-04-17', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com');
INSERT INTO `tb_peminjaman_ruang` (`id_peminjaman_ruang`, `id_laboratorium`, `nama`, `nrk`, `prodi`, `notlp`, `email`, `tanggal_penggunaan`, `id_range_waktu`, `mulai_penggunaan`, `selesai_penggunaan`, `berapa_minggu`, `nama_kegiatan`, `kapasitas`, `dokumen_pendukung`, `status`, `komentar`, `tanggal_pengajuan`, `created_at`, `email_pengguna`) VALUES
(357, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-04-24', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(358, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-05-01', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(359, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-05-08', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(360, 00007, 'Ishaq', '1610040309010001', 'TPB', '1231513413123', 'ishaq@gmail.com', '2023-05-15', 2, NULL, NULL, NULL, 'PKS 42', 54, 'Dashboard_Laboran.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:43:35', 'wihtiandiko@gmail.com'),
(361, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-01-30', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(362, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-02-06', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(363, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-02-13', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(364, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-02-20', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(365, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-02-27', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(366, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-03-06', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(367, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-03-13', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(368, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-03-20', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(369, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-03-27', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(370, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-04-03', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(371, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-04-10', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(372, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-04-17', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(373, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-04-24', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(374, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-05-01', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(375, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-05-08', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(376, 00007, 'Yaqub', '1610040309010001', 'TPB', '1231513413123', 'yaqub@gmail.com', '2023-05-15', 4, NULL, NULL, NULL, 'PKS 32', 67, '491_Permohonan_Lab_MM_TIK712.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:45:11', 'wihtiandiko@gmail.com'),
(377, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-01-30', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(378, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-02-06', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(379, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-02-13', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(380, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-02-20', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(381, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-02-27', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(382, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-03-06', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(383, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-03-13', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(384, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-03-20', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(385, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-03-27', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(386, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-04-03', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(387, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-04-10', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(388, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-04-17', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(389, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-04-24', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(390, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-05-01', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(391, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-05-08', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com'),
(392, 00007, 'Yusuf', '1610040309010001', 'Teknik Telekomunikasi', '1231513413123', 'yusuf@gmail.com', '2023-05-15', 5, NULL, NULL, NULL, 'Dinamika Teknik RA', 67, '491_Permohonan_Lab_MM_TIK713.pdf', 'done', '', '0000-00-00 00:00:00', '2023-02-24 08:47:35', 'wihtiandiko@gmail.com');

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
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `email`, `password`, `nama`, `nrk`, `prodi`, `notlpn`, `image`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'wihtiandiko@gmail.com', '$2y$10$6BEfRSHt7gWTJIz.Rli0iOz6TYcP4L99WkCDE.FiREsxTEXAquXxa', 'Ihtiandiko Wicaksono', '', '', '', 'default.PNG', 1, 1, 1675649713),
(2, 'hapis@gmail.com', '$2y$10$L1bD3ZQl3u2L3OZCPWvr.e3aZE3gSntLXNxV6KScO/qK2GsCo4GSy', 'Hapis GG', '', '', '', 'default.PNG', 2, 1, 1675650686);

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
(5, '15:00-17:00', '15:00:00', '17:00:00');

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
(8, 2, 'Peminjaman Ruangan', 'user/peminjaman', 'fa fa-fw fa-calendar', 1),
(9, 1, 'Kelola Peminjaman Ruangan', 'peminjaman/kelola', 'fa fa-fw fa-calendar', 1),
(10, 1, 'Range Waktu', 'peminjaman/rangewaktu', 'fa fa-fw fa-hourglass-start', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `id_laboratorium` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_peminjaman_ruang`
--
ALTER TABLE `tb_peminjaman_ruang`
  MODIFY `id_peminjaman_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

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
  MODIFY `id_range_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
