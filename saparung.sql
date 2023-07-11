-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2023 at 08:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saparung`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_penduduk`
--

CREATE TABLE `data_penduduk` (
  `id_data` int NOT NULL,
  `nik` varchar(16) COLLATE utf16_unicode_ci NOT NULL,
  `nama` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `jk` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `tempat_lhr` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `tgl_lhr` date NOT NULL,
  `agama` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `pendidikan` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `status` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `pekerjaan` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `ortu` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `data_penduduk`
--

INSERT INTO `data_penduduk` (`id_data`, `nik`, `nama`, `jk`, `tempat_lhr`, `tgl_lhr`, `agama`, `pendidikan`, `alamat`, `status`, `pekerjaan`, `ortu`, `user_id`) VALUES
(5, '3206352809020003', 'Noor Mohamad Alfaz', 'Laki - Laki', 'Tasikmalaya', '2003-04-15', 'Islam', 'SMA', 'Kp Parung, Desa Parung, Kecamatan Cibalong, Kabupaten Tasikmalaya', 'Belum Menikah', 'Mahasiswa', 'Opon', 9),
(10, '1234567891234567', 'Maya Cahyano', 'Perempuan', 'Cilebut', '2022-12-22', 'Islam', 'SD', 'Aku anak kuat', 'Belum Menikah', 'uhdsuwig', 'aewgweb', 9);

-- --------------------------------------------------------

--
-- Table structure for table `domisili`
--

CREATE TABLE `domisili` (
  `id_domisili` int NOT NULL,
  `tanggal` date NOT NULL,
  `kode` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `nomor` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `data_id` int NOT NULL,
  `keperluan` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `qr` varchar(255) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `domisili`
--

INSERT INTO `domisili` (`id_domisili`, `tanggal`, `kode`, `nomor`, `data_id`, `keperluan`, `qr`) VALUES
(85, '2022-12-31', '001', '145.12/001/PR-06/XII/2022', 5, 'Ekpansi Bisnis', 'assets/img/qr/domisili/20221231001.png'),
(86, '2023-01-01', '001', '145.12/001/PR-06/I/2023', 10, 'Bantet Lovers', 'assets/img/qr/domisili/20230101001.png'),
(87, '2023-01-03', '002', '145.12/002/PR-06/I/2023', 5, 'Melamar h', 'assets/img/qr/domisili/20230103002.png');

-- --------------------------------------------------------

--
-- Table structure for table `kematian`
--

CREATE TABLE `kematian` (
  `id_kematian` int NOT NULL,
  `tanggal` date NOT NULL,
  `kode` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `nomor` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `data_id` int NOT NULL,
  `tgl_mati` date NOT NULL,
  `sebab` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `jam_mati` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `meninggal_di` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `jam_kubur` varchar(12) COLLATE utf16_unicode_ci NOT NULL,
  `dikuburkan_di` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `qr` varchar(255) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `kematian`
--

INSERT INTO `kematian` (`id_kematian`, `tanggal`, `kode`, `nomor`, `data_id`, `tgl_mati`, `sebab`, `jam_mati`, `meninggal_di`, `jam_kubur`, `dikuburkan_di`, `qr`) VALUES
(20, '2023-01-03', '001', '145.04/001/PR-06/I/2023', 5, '2023-01-03', 'Mati', '09', 'sdfdw', '12', 'asfdfgfg', 'assets/img/qr/kematian/20230103001.png'),
(21, '2023-01-07', '002', '145.04/002/PR-06/I/2023', 10, '2023-01-28', 'Mati', '09', 'afsdf', '12', 'svgsg', 'assets/img/qr/kematian/20230107002.png'),
(22, '2023-01-07', '003', '145.04/003/PR-06/I/2023', 5, '2023-01-28', 'Mati', '09', 'vsf', 'sdgr', 'sdgsg', 'assets/img/qr/kematian/20230107003.png');

-- --------------------------------------------------------

--
-- Table structure for table `kepolisian`
--

CREATE TABLE `kepolisian` (
  `id_kepolisian` int NOT NULL,
  `tanggal` date NOT NULL,
  `kode` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `nomor` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `data_id` int NOT NULL,
  `keperluan` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `qr` varchar(255) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `kepolisian`
--

INSERT INTO `kepolisian` (`id_kepolisian`, `tanggal`, `kode`, `nomor`, `data_id`, `keperluan`, `qr`) VALUES
(50, '2022-12-20', '001', '145.07/001/PR-06/XII/2022', 5, 'Perkembangan Perusahaan', 'assets/img/qr/kepolisian/20221220001.png'),
(54, '2022-12-31', '002', '145.07/002/PR-06/XII/2022', 10, 'Menjual Tanah', 'assets/img/qr/kepolisian/20221231002.png'),
(57, '2023-01-03', '001', '145.07/001/PR-06/I/2023', 10, 'Perkembangan Perusahaan', 'assets/img/qr/kepolisian/20230103001.png'),
(58, '2023-01-03', '002', '145.07/002/PR-06/I/2023', 5, 'Ekpansi Bisnis', 'assets/img/qr/kepolisian/20230103002.png'),
(59, '2023-01-04', '003', '145.07/003/PR-06/I/2023', 5, 'Perkembangan Perusahaan', 'assets/img/qr/kepolisian/20230104003.png');

-- --------------------------------------------------------

--
-- Table structure for table `keramaian`
--

CREATE TABLE `keramaian` (
  `id_keramaian` int NOT NULL,
  `tanggal` date NOT NULL,
  `kode` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `nomor` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `data_id` int NOT NULL,
  `jenis_kegiatan` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `acara` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `tgl_acara` date NOT NULL,
  `jam` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `tempat` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `qr` varchar(255) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `keramaian`
--

INSERT INTO `keramaian` (`id_keramaian`, `tanggal`, `kode`, `nomor`, `data_id`, `jenis_kegiatan`, `acara`, `tgl_acara`, `jam`, `tempat`, `qr`) VALUES
(10, '2023-01-03', '001', '145.20/001/PR-06/I/2023', 5, 'Jalan Santai', 'Perpisahan KKN Unsil', '2023-01-28', '09.00 Wib S/d Selesai', 'Kantor Desa Parung', 'assets/img/qr/keramaian/20230103001.png'),
(11, '2023-01-03', '002', '145.20/002/PR-06/I/2023', 5, 'Jalan Santai', 'Perpisahan KKN Unsil', '2023-01-28', '09.00 Wib S/d Selesai', 'Kantor Desa Parung', 'assets/img/qr/keramaian/20230103002.png');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_sm` int NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `isi_surat` text COLLATE utf16_unicode_ci NOT NULL,
  `tujuan` varchar(128) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_sm`, `tgl_terima`, `tgl_surat`, `no_surat`, `isi_surat`, `tujuan`) VALUES
(27, '2022-12-20', '2022-12-20', 'mdyud', 'jijhi', 'kbjb'),
(28, '2023-01-01', '2023-01-07', '122/111/111/11', 'jhjiohioh', 'ggufufu'),
(29, '2023-01-03', '2023-01-07', 'q', 'dsvf', 'svss');

-- --------------------------------------------------------

--
-- Table structure for table `taksiran_tanah`
--

CREATE TABLE `taksiran_tanah` (
  `id_tt` int NOT NULL,
  `tanggal` date NOT NULL,
  `kode` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `nomor` varchar(128) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `data_id` int NOT NULL,
  `nop` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `kelas` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `luas` int NOT NULL,
  `harga` int NOT NULL,
  `utara` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `timur` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `selatan` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `barat` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `keperluan` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `qr` varchar(255) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `taksiran_tanah`
--

INSERT INTO `taksiran_tanah` (`id_tt`, `tanggal`, `kode`, `nomor`, `data_id`, `nop`, `kelas`, `luas`, `harga`, `utara`, `timur`, `selatan`, `barat`, `keperluan`, `qr`) VALUES
(15, '2023-01-03', '001', '145.05/001/PR-06/I/2023', 5, '123242345132d', '12432415', 100, 10000000, 'jalan', 'asgeaw', 'sawah', 'sungai', 'calon presiden', 'assets/img/qr/taksirantanah/20230103001.png');

-- --------------------------------------------------------

--
-- Table structure for table `usaha`
--

CREATE TABLE `usaha` (
  `id_usaha` int NOT NULL,
  `tanggal` date NOT NULL,
  `kode` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `nomor` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `data_id` int NOT NULL,
  `jenis_usaha` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `alamat_usaha` text COLLATE utf16_unicode_ci NOT NULL,
  `keperluan` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `qr` varchar(255) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `usaha`
--

INSERT INTO `usaha` (`id_usaha`, `tanggal`, `kode`, `nomor`, `data_id`, `jenis_usaha`, `alamat_usaha`, `keperluan`, `qr`) VALUES
(16, '2022-12-28', '001', '145.06/001/PR-06/XII/2022', 5, 'Transportas', 'fhlhflkadhfgli', 'khglkfdhglaekg', 'assets/img/qr/usaha/20221228001.png'),
(17, '2023-01-03', '001', '145.06/001/PR-06/I/2023', 10, 'Transportasy', 'sfsd', 'Menjual Tanah', 'assets/img/qr/usaha/20230103001.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `name` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf16_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `is_active` int NOT NULL,
  `date_created` int NOT NULL,
  `jabatan` varchar(128) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `jabatan`) VALUES
(9, 'Aldi Jaya Mulyana', 'aldikakabow28@gmail.com', 'Picture13.jpg', '$2y$10$NbmeMljxqxYkO0LpEqqnzOjJ7PH5wBeDbFJ.y3ZjDtlX2lZpdPZD2', 1, 1, 1665241651, 'Operator Desa is'),
(35, 'Aldi Jaya Mulyana', 'aldijaya280902@gmail.com', 'Screenshot_(128).png', '$2y$10$Hn09PbuI5RFI5M8vcfFbSekDKWabTped1zeVTiB91c9iX3odF6bwm', 2, 1, 1672718238, 'Sekretaris Desa');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_am` int NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_am`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(6, 1, 3),
(12, 1, 4),
(13, 1, 5),
(14, 1, 6),
(17, 1, 7),
(19, 2, 4),
(21, 9, 2),
(22, 9, 3),
(23, 9, 4),
(24, 9, 5),
(26, 10, 4),
(40, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int NOT NULL,
  `menu` varchar(128) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
(1, 'Admin'),
(2, 'Surat'),
(3, 'Data'),
(4, 'User'),
(5, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int NOT NULL,
  `role` varchar(128) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'Staff Desa');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_submenu` int NOT NULL,
  `menu_id` int NOT NULL,
  `title` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `icon` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `is_active` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_submenu`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 4, 'Profil', 'user', 'fas fa-fw fa-user', 1),
(4, 5, 'Manajemen Menu', 'menu', 'fas fa-fw fa-folder', 1),
(5, 5, 'Manajemen Submenu', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fa fa-fw fa-user-tie', 1),
(9, 2, 'Lain-lain', 'surat/lainlain', 'fa fa-fw fa-circle-info', 0),
(10, 2, 'SKTM', 'surat/sktm', 'fa fa-fw fa-person', 0),
(11, 2, 'Pinjaman Bank', 'surat/pinjamanbank', 'fa fa-fw fa-building-columns', 0),
(12, 2, 'Kematian', 'surat/kematian', 'fa fa-fw fa-triangle-exclamation', 1),
(13, 2, 'Taksiran Tanah', 'surat/taksirantanah', 'fa fa-fw fa-mountain', 1),
(14, 2, 'Usaha', 'surat/usaha', 'fa fa-fw fa-briefcase', 1),
(15, 2, 'Catatan Kepolisian', 'surat/kepolisian', 'fa fa-fw fa-square-pen', 1),
(16, 2, 'Tanah &amp; Salinan', 'surat/tanahsalinan', 'fa fa-fw fa-volcano', 0),
(17, 2, 'Proposal Keagamaan', 'surat/proposalagama', 'fa fa-fw fa-mosque', 0),
(18, 2, 'Pindah Datang', 'surat/pindahdatang', 'fa fa-fw fa-person-walking', 0),
(19, 2, 'Kartu Keluarga', 'surat/kk', 'fa fa-fw fa-house', 0),
(20, 2, 'Domisili', 'surat/domisili', 'fa fa-fw fa-location', 1),
(21, 2, 'Kuasa', 'surat/kuasa', 'fa fa-fw fa-scale-balanced', 0),
(22, 2, 'Kunjungan Goa', 'surat/goa', 'fa fa-fw fa-caret-up', 0),
(23, 2, 'Legalisir', 'surat/legalisir', 'fa fa-fw fa-gavel', 0),
(24, 2, 'Kelahiran &amp; Akta', 'surat/kelahiran', 'fa fa-fw fa-baby', 0),
(25, 2, 'NTCR', 'surat/ntcr', 'fa fa-fw fa-ring', 0),
(26, 2, 'Proposal', 'surat/proposal', 'fa fa-fw fa-file', 0),
(27, 2, 'Proposal Kelompok', 'surat/proposalkelompok', 'fa fa-fw fa-people-group', 0),
(28, 2, 'Keramaian', 'surat/keramaian', 'fa fa-fw fa-group-arrows-rotate', 1),
(29, 2, 'Surat Masuk', 'surat/suratmasuk', 'fa fa-fw fa-envelope', 1),
(32, 3, 'Data Penduduk', 'data', 'fa fa-fw fa-book', 1),
(34, 1, 'Staff Desa', 'admin/staff', 'fa fa-fw fa-briefcase', 1),
(35, 2, 'Surat Keluar', 'surat/suratkeluar', 'fa fa-fw fa-envelope-open', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int NOT NULL,
  `email` varchar(128) COLLATE utf16_unicode_ci NOT NULL,
  `token` varchar(129) COLLATE utf16_unicode_ci NOT NULL,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id_token`, `email`, `token`, `date_created`) VALUES
(21, 'aldijaya28092@gmail.com', '0Bzy8yd00ly+x9ffaQv+gDHC5NoP8LvRt7JDyBn9oFw=', 1668667901),
(31, 'Maulana Wildan', 'jPwyrmtDdwePxYEIC10mRvkz27blr/VUks9IF0Nn1As=', 1669388839),
(32, 'Aldi Jaya Mulyana', '6P7bLYfQBw7Kknh374yD/3960Ka8hLla+ezXjMY4pg4=', 1669389098),
(33, 'Stuf Thrift', '5hdcd2AjH5gk0Cff6qhpxctKKEXaGeL0JlCrtxk1aII=', 1669389226),
(34, 'Aldi Jaya Mulyana', '7junDCoECtWT3dnVyD8BXbHplzXot64uTj3UnW0HJF4=', 1670156975),
(35, 'fgs', '/JjP/eTJbEgbOMGrUkXtnCwbmq5efEM3XnWq6rs9tl4=', 1670157010),
(36, 'Aldi Jaya Mulyana', 'pitg+RYbggnT2HCunsg9UWSZ6zCK8WZbPOtpKeP4Gq8=', 1670157062),
(38, 'Aldi Jaya Mulyana', 'xFPwAitlewmxklAl9dGToAiXK+J0HrqOqu2fiQ+bosY=', 1670292889),
(50, 'Naufal Muhammad Yajid', 'kmdw4gk1iuVF2katkPEtnRS/c1r1CkSrz8PPbU1Xwdo=', 1671852567),
(51, '12210838@bsi.ac.id', '6oTTf02Lc/ftBONh9NlI8kEW++FyJCsombGfDVD3hKM=', 1671861207),
(52, '12210838@bsi.ac.id', 'H4LA2XARV/obmmKmPQL+6xjaDBaopawcztQzPkcSk6w=', 1671877310),
(54, 'Aldi Jaya Mulyana', 'TsyLh3Qb5sL5JXuYCBeQDNpDgzFRJGwBiB041c42ibA=', 1672714398),
(55, 'Aldi Jaya Mulyana', '60xyqfdLXrQgF78h0CZlEimqpIJ5Nbd8Ftyp62PjCwg=', 1672718238),
(57, 'Aldikakabow28@gmail.com', 'EHvZmiKzFA+T0iTCVRcKAIqNp8qPITyfBgV+qFnQiCA=', 1675597415),
(58, 'aldijaya280902@gmail.com', 'zArHNJ72G7vxMckNw7FcTxdYWrVebLhONzxmdM8MKWQ=', 1677741936),
(59, 'aldijaya280902@gmail.com', 'HV70424jiPApCFd7z4SLBHfyYXoccX1QMKJ6u0OliwU=', 1680940551);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`id_domisili`),
  ADD KEY `data_id_domisili` (`data_id`);

--
-- Indexes for table `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`id_kematian`),
  ADD KEY `data_id_kematian` (`data_id`);

--
-- Indexes for table `kepolisian`
--
ALTER TABLE `kepolisian`
  ADD PRIMARY KEY (`id_kepolisian`),
  ADD KEY `data_id_kepolisian` (`data_id`);

--
-- Indexes for table `keramaian`
--
ALTER TABLE `keramaian`
  ADD PRIMARY KEY (`id_keramaian`),
  ADD KEY `data_id_keramaian` (`data_id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_sm`);

--
-- Indexes for table `taksiran_tanah`
--
ALTER TABLE `taksiran_tanah`
  ADD PRIMARY KEY (`id_tt`),
  ADD KEY `data_id_tt` (`data_id`);

--
-- Indexes for table `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id_usaha`),
  ADD KEY `data_id_usaha` (`data_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id_user` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_am`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_submenu`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  MODIFY `id_data` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `domisili`
--
ALTER TABLE `domisili`
  MODIFY `id_domisili` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `kematian`
--
ALTER TABLE `kematian`
  MODIFY `id_kematian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kepolisian`
--
ALTER TABLE `kepolisian`
  MODIFY `id_kepolisian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `keramaian`
--
ALTER TABLE `keramaian`
  MODIFY `id_keramaian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_sm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `taksiran_tanah`
--
ALTER TABLE `taksiran_tanah`
  MODIFY `id_tt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_usaha` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_am` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_submenu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `domisili`
--
ALTER TABLE `domisili`
  ADD CONSTRAINT `data_id_domisili` FOREIGN KEY (`data_id`) REFERENCES `data_penduduk` (`id_data`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `kematian`
--
ALTER TABLE `kematian`
  ADD CONSTRAINT `data_id_kematian` FOREIGN KEY (`data_id`) REFERENCES `data_penduduk` (`id_data`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kepolisian`
--
ALTER TABLE `kepolisian`
  ADD CONSTRAINT `data_id_kepolisian` FOREIGN KEY (`data_id`) REFERENCES `data_penduduk` (`id_data`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keramaian`
--
ALTER TABLE `keramaian`
  ADD CONSTRAINT `data_id_keramaian` FOREIGN KEY (`data_id`) REFERENCES `data_penduduk` (`id_data`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `taksiran_tanah`
--
ALTER TABLE `taksiran_tanah`
  ADD CONSTRAINT `data_id_tt` FOREIGN KEY (`data_id`) REFERENCES `data_penduduk` (`id_data`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usaha`
--
ALTER TABLE `usaha`
  ADD CONSTRAINT `data_id_usaha` FOREIGN KEY (`data_id`) REFERENCES `data_penduduk` (`id_data`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role_id_user` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `menu_id` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
