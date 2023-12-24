-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql313.byetcluster.com
-- Generation Time: Dec 24, 2023 at 02:29 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33808717_dbpengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tanggal` varchar(64) NOT NULL,
  `jam` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `jk` varchar(64) NOT NULL,
  `notelp` varchar(64) NOT NULL,
  `alamat` text NOT NULL,
  `kategori` varchar(64) NOT NULL,
  `deskripsi` text NOT NULL,
  `attach` varchar(64) NOT NULL,
  `notif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tanggal`, `jam`, `nama`, `jk`, `notelp`, `alamat`, `kategori`, `deskripsi`, `attach`, `notif`) VALUES
(24, '16 March 2023', '13:04', 'Galih Sucahyo', 'Laki-laki', '08123456', 'Jl. Ikan Paus', 'Rambu Lalu Linta', 'sdsadwdsadawdasdwa', '15_seconds_of_nature.mp4', 0),
(25, '16 March 2023', '13:07', 'Ratna Ningsih', 'Perempuan', '08263232', 'Jl. Merdeka', 'Jalan', 'adwdadsadawdasd', 'avatar3.png', 0),
(26, '16 March 2023', '14:30', 'Gilang Ramadhan', 'Laki-laki', '082233366', 'Jl. Mana aja', 'Markah Jalan', 'Yaayayayyayayyyyyaayy', 'y2mate.com - Here u go  untilifoundyou originalmusic pop indie_v', 1),
(27, '03 May 2023', '09:50', 'Gilang Kurnia Ramadhan', 'Laki-laki', '085123456789', 'Jl. Ikan Paus, Kec. Banyuwangi', 'Rambu Lalu Linta', 'Rambu lalu lintas di jalan tersebut mati.', 'Sample video.mp4', 1),
(28, '03 May 2023', '09:52', 'Gilang Kurnia Ramadhan', 'Laki-laki', '085123456789', 'Jl. Ikan Paus, Kec. Banyuwangi', 'Rambu Lalu Linta', 'Rambu lalu lintas di jalan tersebut mati.', 'Sample_video.mp4', 1),
(29, '24 May 2023', '20:33', 'Ahmad Fathoni', 'Laki-laki', '0852040939292', 'Jln. Raya Cilegon', 'Alat Pemberitahu Isyarat Lalu Lintas', 'Lampu tidak mau berubah ', 'CB1D380D-EC77-410B-B393-2C896DCC5FED.jpeg', 1),
(30, '24 May 2023', '20:43', 'Ahmad wahyudi', 'Laki-laki', '082325695623', 'Jl. Raya Cilegon', 'Alat Pemberitahu Isyarat Lalu Lintas', 'Lampu lampu merah mati', 'IMG-20230524-WA0005.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `gambar` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `gambar`) VALUES
(1, 'User 1', 'admin@admin.com', 'admin', '123', 'avatar04.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
