-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2018 at 09:24 AM
-- Server version: 5.7.20
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gofood_kw`
--

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id`, `nama`, `harga`, `kategori`, `gambar`) VALUES
(1, 'kopi', 3000, 'minuman', 'kopi.png'),
(2, 'mayashi', 1000, 'snack', 'mayashi.png');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `hit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `no_hp`, `email`, `password`, `api_key`, `hit`) VALUES
(1, 'adam', 'cibadak', '1234567890', 'adam@canggih.com', '', '123', 129),
(2, 'adit', 'bogor', '0987654321', 'adit@canggih.com', '', '124', 0),
(3, 'iqbal', 'pegaden', '5678904321', 'iqbal@melal.com', '', '555', 26),
(4, 'lala', 'bandung', '0823425', 'lala@laylay.com', '', '000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `latit` varchar(255) NOT NULL,
  `longit` varchar(255) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `no_hp`, `email`, `latit`, `longit`, `nama_menu`, `gambar`, `jumlah`, `total_harga`, `status`) VALUES
(1, 'udin', '085724748508', '', '123', '321', 'kopi', '', 2, 0, '0'),
(2, 'tes', '085724748585', '', '123', '312', 'mayashi', '', 2, 0, '0'),
(3, 'tos', '085724748585', '', '123', '312', 'mayashi', '', 2, 0, '0'),
(4, 'tos', '085724748585', '', '123', '312', 'mayashi', '', 2, 2000, '0'),
(5, 'tos', '085724748585', 'tes@gmail.com', '123', '312', 'mayashi', '', 2, 2000, '0'),
(6, 'tos', '085724748585', 'tes@gmail.com', '123', '312', 'mayashi', '', 2, 2000, '0'),
(7, 'tos', '085724748585', 'tes@gmail.com', '123', '312', 'mayashi', '', 2, 2000, '0'),
(8, 'tos', '085724748585', 'tes@gmail.com', '123', '312', 'mayashi', 'https://upload.wikimedia.org/wikipedia/commons/6/64/Foods_%28cropped%29.jpg', 2, 2000, '0'),
(9, 'tos', '085724748585', 'tes@gmail.com', '123', '312', 'mayashi', 'https://upload.wikimedia.org/wikipedia/commons/6/64/Foods_%28cropped%29.jpg', 2, 2000, '0'),
(10, 'tos', '085724748585', 'tes@gmail.com', '123', '312', 'mayashi', 'https://upload.wikimedia.org/wikipedia/commons/6/64/Foods_%28cropped%29.jpg', 2, 2000, '0'),
(11, 'tos', '085724748585', 'tes@gmail.com', '123', '312', 'mayashi', 'https://upload.wikimedia.org/wikipedia/commons/6/64/Foods_%28cropped%29.jpg', 2, 2000, '0'),
(12, 'tos', '085724748585', 'tes@gmail.com', '123', '312', 'mayashi', 'https://upload.wikimedia.org/wikipedia/commons/6/64/Foods_%28cropped%29.jpg', 2, 2000, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
