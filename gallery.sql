-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 02:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_namalengkap` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_namalengkap`, `admin_username`, `admin_password`, `admin_email`) VALUES
(1, 'AMIR', 'admin', '123', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `namaalbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggaldibuat` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `tanggaldibuat`, `userid`) VALUES
(8, 'Album', 'masa dulu', '2024-01-11', 1),
(10, 'SMK', 'masa masa smk', '2024-01-19', 1),
(12, 'kenangan', 'waktu dulu', '2024-01-21', 2),
(17, 'bagus', 'banget', '2024-01-29', 2),
(18, 'keluarga', 'foto bersama keluarga', '2024-01-29', 2),
(19, 'foto bersama keluarga besar', 'foto dulu', '2024-01-29', 2),
(20, 'sekolah', 'smk', '2024-01-29', 25),
(21, 'Album', 'Deskripsi', '2024-01-30', 28),
(22, 'Kantor', 'foto lagi di kantor', '2024-01-30', 29);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactid` int(11) NOT NULL,
  `isicontact` text NOT NULL,
  `tanggalcontact` date NOT NULL,
  `userid` int(11) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactid`, `isicontact`, `tanggalcontact`, `userid`, `namalengkap`, `email`) VALUES
(8, 'dd', '2024-01-26', 1, 'amirullah', 'amirullah'),
(9, 'kak tolong perbaiki bugnya', '2024-01-26', 1, 'amirullah', 'amirrr@gmail.com'),
(10, 'sss', '2024-01-26', 1, 'amirullah', 'amirrr@gmail.com'),
(11, 'ss', '2024-01-26', 1, 'amirullah', 'amirrr@gmail.com'),
(13, 's', '2024-01-26', 1, 'amirullah', 'amirrr@gmail.com'),
(14, 'sss', '2024-01-26', 1, 'amirullah', 'amirrr@gmail.com'),
(15, 'sss', '2024-01-26', 1, 'amirullah', 'amirrr@gmail.com'),
(16, 'wkwkwkkwww', '2024-01-26', 1, 'amirullah', 'amirrr@gmail.com'),
(17, 'sss', '2024-01-26', 1, 'amirullah', 'amirrr@gmail.com'),
(18, 'www', '2024-01-26', 1, 'amirullah', 'amirrr@gmail.com'),
(19, 's', '2024-01-26', 1, 'amirullah', 'amirrr@gmail.com'),
(20, 'ssssssss', '2024-01-26', 1, 'amirullah', 'amirrr@gmail.com'),
(21, 'ss', '2024-01-26', 1, 'amirullah', 'amirrr@gmail.com'),
(23, 'min , ada bug dilike foto', '2024-01-27', 24, 'Afdal Fahriza', 'as2@gmail.com'),
(24, 'amir', '2024-01-30', 29, 'malik', 'malik@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggalunggah` date NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `albumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `albumid`, `userid`) VALUES
(54, 'h', 'hhj', '2024-01-28', '1980431569_asd1.png', 8, 1),
(55, 'e', 'ww', '2024-01-29', '1733762554_asd2.png', 12, 2),
(56, 'pemandangan', 'bgus', '2024-01-29', '2139866360_asd6.png', 12, 2),
(57, 'amir', 'ekdneke', '2024-01-29', '1426596055_asd6.png', 20, 25),
(59, 'ww', 'ww', '2024-01-29', '299221589_asd5.png', 8, 1),
(60, 'amir', 'amir', '2024-01-30', '2096893833_WhatsApp Image 2022-03-16 at 10.19.10.jpeg', 22, 29);

-- --------------------------------------------------------

--
-- Table structure for table `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(53, 54, 1, 'bagus', '2024-01-29'),
(54, 54, 1, 'bagus banget', '2024-01-29'),
(55, 54, 1, 'baguss', '2024-01-30'),
(56, 55, 29, 'bagus ini fotonya', '2024-01-30'),
(57, 55, 2, 'p', '2024-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(54, 56, 2, '2024-01-29'),
(55, 54, 1, '2024-01-29'),
(56, 55, 1, '2024-01-29'),
(57, 57, 1, '2024-01-29'),
(59, 59, 1, '2024-01-29'),
(60, 55, 6, '2024-01-30'),
(61, 54, 6, '2024-01-30'),
(62, 59, 6, '2024-01-30'),
(63, 57, 6, '2024-01-30'),
(64, 56, 6, '2024-01-30'),
(65, 59, 2, '2024-01-30'),
(68, 57, 2, '2024-01-30'),
(69, 56, 27, '2024-01-30'),
(70, 57, 27, '2024-01-30'),
(71, 59, 27, '2024-01-30'),
(72, 55, 27, '2024-01-30'),
(73, 59, 28, '2024-01-30'),
(74, 57, 28, '2024-01-30'),
(77, 56, 28, '2024-01-30'),
(78, 54, 28, '0000-00-00'),
(79, 54, 29, '2024-01-30'),
(80, 60, 29, '2024-01-30'),
(81, 54, 2, '2024-02-11'),
(82, 55, 2, '2024-02-11'),
(83, 60, 2, '2024-02-11'),
(84, 54, 31, '2024-02-11'),
(85, 55, 31, '2024-02-11'),
(86, 56, 31, '2024-02-11'),
(87, 60, 31, '2024-02-11'),
(88, 57, 31, '2024-02-11'),
(89, 59, 31, '2024-02-11'),
(90, 59, 32, '2024-02-11'),
(91, 60, 32, '2024-02-11'),
(92, 57, 32, '2024-02-11'),
(93, 56, 32, '2024-02-11'),
(94, 55, 32, '2024-02-11'),
(95, 54, 32, '2024-02-11'),
(96, 55, 34, '2024-02-12'),
(97, 56, 34, '2024-02-12'),
(98, 60, 34, '2024-02-12'),
(99, 59, 34, '2024-02-12'),
(100, 54, 34, '2024-02-12'),
(101, 57, 34, '2024-02-12'),
(102, 57, 29, '2024-02-12'),
(103, 59, 29, '2024-02-12'),
(104, 56, 29, '2024-02-12'),
(105, 55, 29, '2024-02-12'),
(106, 60, 6, '2024-02-12'),
(107, 54, 36, '2024-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `saranid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isisaran` varchar(255) NOT NULL,
  `tanggalsaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`saranid`, `userid`, `isisaran`, `tanggalsaran`) VALUES
(4, 2, 'tolong perbaiki bagian likenya min', '2024-01-29'),
(5, 29, 'websitenya ada yang ngebug dibagian home', '2024-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_tambah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `namalengkap`, `alamat`, `tanggal_tambah`) VALUES
(1, 'amirullah', '123', 'amirrr@gmail.com', 'amirullah', 'punteut', '0000-00-00'),
(2, 'al', '123', 'as442@gmail.com', 'amirullah', 'Paya Punteut', '0000-00-00'),
(3, 'amir', 'amir', 'as2@gmail.com', 'amir', 'Paya Punteut', '0000-00-00'),
(4, 'bgrian', '123', 'a@gmail.com', 'Bang Rian', 'gerugok', '0000-00-00'),
(5, 'amir', '321', 'amirullah.lsm99@gmail.com', 'amirrrrr', 'Punteut', '0000-00-00'),
(6, 'afdal', '123', 'as2@gmail.com', 'arul', 'Aceh', '0000-00-00'),
(17, '123', '123', 'as2@gmail.com', 'amirrrrr', 'Punteut', '0000-00-00'),
(21, 'a', 'a', 'a@gmail.com', 'ww', 'ww', '2024-01-24'),
(22, 'amir123', '12', 'as442@gmail.com', 'amir', 'Mns Blng kandang ', '2024-01-24'),
(23, 'ss', 'ss', 'amir@gmail.com', 'amir', 'Panggoi', '2024-01-25'),
(24, 'afdal', '12345', 'as2@gmail.com', 'Afdal Fahriza', 'Dekat Sekolah', '2024-01-27'),
(25, 'dall', '123', 'a@gmail.com', 'dall aja', 'dekat sekolah', '2024-01-29'),
(26, 'ss', 'ss', 'as2@gmail.com', 'ss', 'ss', '2024-01-30'),
(27, 'ss', '123', 'amir@gmail.com', 'amir', 'Panggoi', '2024-01-30'),
(28, 'alterjun', '123', 'as2@gmail.com', 'Bang Rian', 'Mns Blng kandang ', '2024-01-30'),
(29, 'malik', '123', 'malik@gmail.com', 'malik', 'Panggoi', '2024-01-30'),
(30, 'al', 'lll', 'amir@gmail.com', '..', 'pp', '2024-01-30'),
(31, 'z', 'z', 'zim@gmail.com', 'z', 'z', '2024-02-11'),
(32, 'y', 'y', 'as442@gmail.com', 'y', 'y', '2024-02-11'),
(33, 'a', 'a', 'amir@gmail.com', 'a', 'a', '2024-02-12'),
(34, 'w', 'w', 'amir@gmail.com', 'w', 'w', '2024-02-12'),
(35, 'o', '0', 'as2@gmail.com', '0', 'o', '2024-02-12'),
(36, 'r', 'r', 'amir@gmail.com', 'r', 'r', '2024-02-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `albumid` (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`saranid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `saranid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `user` (`userid`);

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`albumid`) REFERENCES `album` (`albumid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
