-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2019 at 09:57 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id_about`, `isi`) VALUES
(1, '<p><strong>Boyolali Futsal</strong></p>\r\n\r\n<p>Alamat &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Jl. Kemuning boyolali</p>\r\n\r\n<p>Kode Pos &nbsp; &nbsp; &nbsp; : 45571</p>\r\n\r\n<p>Fax/Telp. &nbsp; &nbsp; &nbsp; &nbsp;: 081874687243</p>\r\n'),
(2, '<ul>\r\n	<li>Dilarang membuang puntung rokok yang masih menyala di sembarang tempat</li>\r\n	<li>Dilarang bermain api dan membawa bahan kimia yang membahayakan</li>\r\n	<li>Dilarang membawa minuman keras dan obat-obatan terlarang ke dalam kompleks</li>\r\n	<li>Dilarang mencoret dinding dan merusak fasilitas olah raga&nbsp;</li>\r\n	<li>Dilarang membawa senjata tajam atau senjata api kecuali yang bertugas khusus</li>\r\n	<li>Dilarang berbuat tindakan amoral (judi, asusila dan pornografi lainnya)</li>\r\n	<li>Dilarang membuang sampah atau sisa makanan di sembarang tempat</li>\r\n	<li>Seluruh pengunjung tetap bertanggung jawab terhadap bawaan barang pribadi kecuali dititipkan secara sah dan disertai surat tanda terima</li>\r\n	<li>Kehilangan barang berharga atau barang lainnya yang tidak dititipkan secara sah kepada pengelola yang bertugas di luar tanggung jawab kami</li>\r\n	<li>Untuk menghindari risiko kehilangan barang-barang berharga seperti uang dan perhiasan, sebaiknya tidak dititipkan dan disimpan/diamankan secara pribadi oleh pengunjung sendiri</li>\r\n	<li>Kenyamanan dan keamanan bersama selalu menjadi perhatian kami, namun sebaliknya koordinasi, laporan dan kritik atas segala keterbatasan dan kekurangan pelayanan kami menjadi harapan guna perbaikan selanjutnya.</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_member` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `no_booking` varchar(8) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nama_klub` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  `tgl_booking` date NOT NULL,
  `jam` varchar(100) NOT NULL,
  `harga` char(10) NOT NULL,
  `dp` char(10) NOT NULL,
  `sisa` char(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_lapangan`, `id_admin`, `id_member`, `id_jadwal`, `no_booking`, `nama`, `nama_klub`, `alamat`, `no_telpon`, `tgl_booking`, `jam`, `harga`, `dp`, `sisa`, `status`) VALUES
(10, 2, 0, 32, 3, 'P1906001', 'Anwar Hanif Yosha', 'AnwarFC', 'Jl.Randu Seribu', '082349212312', '2019-06-13', '09.00-10.00', '80000', '48000', '32000', '1'),
(11, 2, 0, 32, 4, 'P1906002', 'Anwar Hanif Yosha', 'AnwarFC', 'Jl.Randu Seribu', '082349212312', '2019-06-13', '10.00-11.00', '80000', '48000', '32000', '1'),
(12, 2, 0, 32, 6, 'P1906003', 'Anwar Hanif Yosha', 'AnwarFC', 'Jl.Randu Seribu', '082349212312', '2019-06-13', '12.00-13.00', '80000', '0', '80000', '0'),
(13, 2, 0, 32, 1, 'P1906004', 'Anwar Hanif Yosha', 'AnwarFC', 'Jl.Randu Seribu', '082349212312', '2019-06-14', '08.00-09.00', '80000', '48000', '32000', '1'),
(14, 2, 0, 32, 3, 'P1906005', 'Anwar Hanif Yosha', 'AnwarFC', 'Jl.Randu Seribu', '082349212312', '2019-06-14', '09.00-10.00', '80000', '0', '80000', '0'),
(15, 2, 0, 33, 7, 'P1906005', 'Anwar Hanif Yosha', 'yozanFC', 'Jl.Randu Seribu', '082349212312', '2019-06-14', '09.00-10.00', '80000', '0', '80000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(11) NOT NULL,
  `waktu` varchar(40) NOT NULL,
  `harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `waktu`, `harga`) VALUES
(1, 'siang', '80000'),
(2, 'malam', '120000');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id` int(2) NOT NULL,
  `nama_hari` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id`, `nama_hari`) VALUES
(1, 'senin'),
(2, 'selasa'),
(3, 'rabu'),
(4, 'kamis'),
(5, 'jumat'),
(6, 'sabtu'),
(7, 'minggu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `jam` time NOT NULL,
  `id_harga` int(11) NOT NULL,
  `jams` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jam`, `id_harga`, `jams`) VALUES
(1, '08:00:00', 1, '08.00-09.00'),
(3, '09:00:00', 1, '09.00-10.00'),
(4, '10:00:00', 1, '10.00-11.00'),
(5, '11:00:00', 1, '11.00-12.00'),
(6, '12:00:00', 1, '12.00-13.00'),
(7, '13:00:00', 1, '13.00-14.00'),
(8, '14:00:00', 1, '14.00-15.00'),
(9, '15:00:00', 1, '15.00-16.00'),
(10, '16:00:00', 1, '16.00-17.00'),
(11, '18:00:00', 2, '18.00-19.00'),
(12, '19:00:00', 2, '19.00-20.00'),
(13, '20:00:00', 2, '20.00-21.00'),
(14, '21:00:00', 2, '21.00-22.00'),
(15, '22:00:00', 2, '22.00-23.00'),
(16, '23:00:00', 2, '23.00-24.00');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_booking`
--

CREATE TABLE `keranjang_booking` (
  `id_keranjang_booking` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nama_lapangan` varchar(64) NOT NULL,
  `tgl_booking` date NOT NULL,
  `jam` varchar(100) NOT NULL,
  `harga` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang_booking`
--

INSERT INTO `keranjang_booking` (`id_keranjang_booking`, `id_lapangan`, `id_member`, `id_jadwal`, `nama_lapangan`, `tgl_booking`, `jam`, `harga`) VALUES
(5, 2, 32, 6, 'lapangan 2', '2019-06-14', '12.00-13.00', '80000'),
(6, 2, 33, 5, 'lapangan 2', '2019-06-14', '11.00-12.00', '80000');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id_lapangan`, `nama`, `gambar`) VALUES
(1, 'lapangan 1', 'lapangan1.jpg'),
(2, 'lapangan 2', 'lapangan2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nama_club` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `username`, `password`, `nama`, `nama_club`, `email`, `tgl_lahir`, `no_telp`, `alamat`, `foto`, `date_created`) VALUES
(32, 'anwar', '$2y$10$0WIIettl3HTx.ov5OqPoQ.6cMKVlwT.OwJjKJnKClsyiVq2i6Bsmi', 'Anwar Hanif Yosha', 'AnwarFC', 'anwarhanifyosha@gmail.ajah', '2019-06-09', '082349212312', 'Jl.Randu Seribu', 'default.png', 1560069554),
(33, 'yozan', '$2y$10$RhwiUZOastB19tba0nBnrORiJyi6WJyu6w2Y.yRCmHfJ69pvmBoOG', 'Yozan', 'YozanFC', 'yoazan@ajah.com', '2019-06-11', '08829319232', 'Jl. pangandaran2', 'default.png', 1560179117),
(34, 'dimas', '$2y$10$cqtSPB9Eg0BLcxpmyBWJCOIWIrl72gq1ORZHZ99.mpUkOz0A.UEuq', 'anwar', 'dimasfc', 'dimas@yahoo.com', '2019-06-13', '08192381921', 'jl.pasir putih', 'default.png', 1560324198);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `namafutsal` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `kodepos` varchar(5) NOT NULL,
  `fax` char(20) NOT NULL,
  `no_hp` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `namafutsal`, `alamat`, `kodepos`, `fax`, `no_hp`) VALUES
(1, 'Boyolali Futsal', 'boyolali', '45571', '09828937823', '07238472389');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `keranjang_booking`
--
ALTER TABLE `keranjang_booking`
  ADD PRIMARY KEY (`id_keranjang_booking`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `keranjang_booking`
--
ALTER TABLE `keranjang_booking`
  MODIFY `id_keranjang_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
