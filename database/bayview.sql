-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2023 at 10:06 PM
-- Server version: 8.0.24
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bayview`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL COMMENT 'Primary key',
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Username untuk masuk ke admin panel',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Password untuk masuk ke admin panel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$yCwL1Nw8aDFSsnOqQq3aCOCh5itm50MK.84rKg1MgNBLB.Dl4ez6u'),
(6, 'kevin', '$2y$10$FfiaJ3DIsfsU9htkbBhBbO9szUw3x7DJAMnrBGRSnzK8PS39XRuvS');

-- --------------------------------------------------------

--
-- Table structure for table `agen`
--

CREATE TABLE `agen` (
  `id_agent` int NOT NULL COMMENT 'Primary key',
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nama agen',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Email agen',
  `umur` int NOT NULL COMMENT 'Umur agen',
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Jenis kelamin',
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'alamat agen',
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nomor telepon agen',
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Foto agen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `agen`
--

INSERT INTO `agen` (`id_agent`, `nama`, `email`, `umur`, `jenis_kelamin`, `alamat`, `no_telp`, `gambar`) VALUES
(4, 'Daren Salim', 'darensalim@gmail.com', 25, 'Perempuan', 'Jl. Sekar Putih, Surabaya, Jawa Timur', '083174908398', '0.01490300 1685865665.jpg'),
(6, 'Josep Martin', 'josepmartin@gmail.com', 23, 'Laki-laki', 'Jl. Mawar Merah No.10 Surabaya, Jawa Timur', '083174908398', '0.70359700 1685612778.jpg'),
(7, 'Gabriella Ganiveive', 'gabrelaganvei@gmail.com', 24, 'Perempuan', 'Jl. Tanah Merah No.05 Sidoarjo, Jawa Timur', '083174908398', '0.33681800 1685614529.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_properti`
--

CREATE TABLE `gambar_properti` (
  `id_gambar_properti` int NOT NULL COMMENT 'Primary key',
  `id_properti` int NOT NULL COMMENT 'Foreign key ke tabel properti',
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Gambar properti'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `gambar_properti`
--

INSERT INTO `gambar_properti` (`id_gambar_properti`, `id_properti`, `gambar`) VALUES
(6, 2, '0.34068000 1685834707.jpg'),
(7, 2, '0.35311100 1685834707.jpg'),
(9, 2, '0.37937200 1685834707.jpg'),
(14, 4, '0.59744400 1685837063.jpg'),
(16, 5, '0.28426700 1685837404.jpg'),
(17, 4, '0.21564100 1685837443.jpg'),
(18, 5, '0.53719900 1685837466.jpg'),
(19, 4, '0.95267300 1685837495.jpg'),
(20, 4, '0.95889200 1685837495.jpg'),
(21, 5, '0.16812500 1685837520.jpg'),
(22, 5, '0.17512900 1685837520.jpg'),
(24, 6, '0.00799400 1686086052.jpg'),
(25, 6, '0.01308300 1686086052.jpg'),
(26, 6, '0.02014200 1686086052.jpg'),
(27, 6, '0.02705700 1686086052.jpg'),
(28, 6, '0.03526700 1686086052.jpg'),
(29, 6, '0.04211000 1686086052.jpg'),
(30, 7, '0.54492500 1686086703.jpg'),
(31, 7, '0.55649000 1686086703.jpg'),
(32, 7, '0.56797800 1686086703.jpg'),
(33, 7, '0.57952700 1686086703.jpg'),
(34, 7, '0.59008100 1686086703.jpg'),
(35, 7, '0.60032800 1686086703.jpg'),
(36, 8, '0.15357100 1686086975.jpg'),
(37, 8, '0.15790600 1686086975.jpg'),
(38, 8, '0.16416700 1686086975.jpg'),
(39, 8, '0.17044800 1686086975.jpg'),
(40, 8, '0.17521800 1686086975.jpg'),
(41, 8, '0.18086500 1686086975.jpg'),
(42, 9, '0.14590600 1686087463.jpg'),
(43, 9, '0.15348300 1686087463.jpg'),
(44, 9, '0.16225200 1686087463.jpg'),
(45, 9, '0.17052800 1686087463.jpg'),
(46, 9, '0.17757300 1686087463.jpg'),
(47, 9, '0.18666500 1686087463.jpg'),
(48, 9, '0.19308900 1686087463.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int NOT NULL COMMENT 'Primary key ',
  `id_properti` int NOT NULL COMMENT 'Foreign key untuk data properti yang dibeli',
  `id_agen` int NOT NULL COMMENT 'Foreign key untuk data agen yang menangani',
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nama pembeli',
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'NIK pembeli',
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Alamat pembeli',
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nomor telepon pembeli',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Email pembeli',
  `tgl_pesan` date NOT NULL COMMENT 'Tanggal pemesanan properti',
  `tgl_selesai` date NOT NULL COMMENT 'Tanggal selesai (Jika rumah yang dipesan dalam pembangunan)',
  `jumlah_dp` int NOT NULL COMMENT 'Jumlah pembayaran dimuka',
  `sisa_bayar` int DEFAULT NULL COMMENT 'Jumlah sisa uang yang harus dibayar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_properti`, `id_agen`, `nama`, `nik`, `alamat`, `no_telp`, `email`, `tgl_pesan`, `tgl_selesai`, `jumlah_dp`, `sisa_bayar`) VALUES
(5, 2, 4, 'Kevin Iansyah', '3516092002030001', 'RT. 003 RW. 003 Dsn. Jani, Ds. Segunung, Kec. Dlanggu, Kab. Mojokerto', '085815787906', 'keviniansyah04@gmail.com', '2023-06-01', '2023-06-01', 1000000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

CREATE TABLE `properti` (
  `id_properti` int NOT NULL COMMENT 'Primary key',
  `id_agen` int NOT NULL COMMENT 'Foreign key agen yang menangani penjualan properti',
  `nama_properti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nama properti',
  `tipe_properti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Tipe properti (rumah, apartemen, rumah ruko, villa)',
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Deskripsi yang menggambarkan ringkasan property',
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Alamat properti',
  `kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Kota properti',
  `provinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Provinsi properti',
  `luas_bangunan` int NOT NULL COMMENT 'Luas bangunan properti',
  `kamar_tidur` int NOT NULL COMMENT 'Jumlah kamar tidur',
  `kamar_mandi` int NOT NULL COMMENT 'Jumlah kamar mandi',
  `dapur` int NOT NULL COMMENT 'Jumlah dapur',
  `ruang_keluarga` int NOT NULL COMMENT 'Jumlah ruang keluarga',
  `balkon` int NOT NULL COMMENT 'Jumlah balkon',
  `harga` int NOT NULL COMMENT 'Harga jual properti',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Status jual properti (avaible/sold out)',
  `gambar_1` blob COMMENT 'Gambar properti',
  `gambar_2` blob COMMENT 'Gambar properti',
  `gambar_3` blob COMMENT 'Gambar properti'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`id_properti`, `id_agen`, `nama_properti`, `tipe_properti`, `deskripsi`, `alamat`, `kota`, `provinsi`, `luas_bangunan`, `kamar_tidur`, `kamar_mandi`, `dapur`, `ruang_keluarga`, `balkon`, `harga`, `status`, `gambar_1`, `gambar_2`, `gambar_3`) VALUES
(2, 4, 'Tipe A01', 'Minimalis', 'Rumah yang tersedia ini memiliki luas 225m2 yang terdiri dari 4 kamar tidur, 2 kamar mandi, 2 balkon, 1 dapur, dan 1 ruang keluarga. Dengan luas yang cukup besar, rumah ini memberikan ruang yang nyaman bagi keluarga untuk beraktivitas dan beristirahat. Setiap kamar tidur telah dilengkapi dengan kenyamanan yang diinginkan, sedangkan kamar mandi yang tersedia memudahkan keluarga untuk berbagi fasilitas dengan mudah. Terdapat 2 balkon yang dapat dimanfaatkan untuk bersantai atau menikmati pemandangan sekitar rumah. Dapur yang luas dan dilengkapi dengan peralatan yang lengkap akan memudahkan Anda dalam menyiapkan hidangan untuk keluarga. Sementara ruang keluarga yang lapang dan nyaman akan menjadi tempat berkumpul bersama keluarga untuk menonton televisi atau bercengkerama.', 'Jl. Untung Suropati No.11', 'Surabaya', 'Jawa Timur', 225, 4, 2, 1, 1, 2, 1000000000, 'Avaible', NULL, NULL, NULL),
(4, 6, 'Tipe A02', 'Minimalis', 'Rumah modern ini adalah sebuah karya arsitektur yang memadukan keindahan, kenyamanan, dan kepraktisan dalam satu desain yang memukau. Dengan bentuk yang minimalis namun elegan, rumah ini memiliki tampilan luar yang terbuat dari kombinasi material berkualitas tinggi seperti beton, kaca, dan kayu. Ruang dalamnya sangat terang dan lapang, dengan langit-langit tinggi yang memberikan kesan luas. Desain interior yang bersih dan simpel, dengan furnitur modern yang dipilih dengan cermat, menciptakan suasana yang menyenangkan dan nyaman bagi penghuninya. Tidak hanya itu, rumah ini juga dilengkapi dengan teknologi canggih, seperti sistem pengaturan suhu otomatis dan pengoperasian pintu dan jendela secara otomatis. Taman yang indah dan teratur menghiasi halaman depan rumah ini, memberikan suasana segar dan damai. Rumah modern ini benar-benar menjadi tempat ideal untuk hidup dengan gaya hidup kontemporer yang elegan dan fungsional.', 'Jl. Mawar Merah No.10', 'Surabaya', 'Jawa Timur', 225, 4, 2, 1, 1, 3, 2000000000, 'Available', NULL, NULL, NULL),
(5, 7, 'Tipe A03', 'Minimalis', 'Rumah modern ini adalah sebuah karya arsitektur yang memadukan keindahan, kenyamanan, dan kepraktisan dalam satu desain yang memukau. Dengan bentuk yang minimalis namun elegan, rumah ini memiliki tampilan luar yang terbuat dari kombinasi material berkualitas tinggi seperti beton, kaca, dan kayu. Ruang dalamnya sangat terang dan lapang, dengan langit-langit tinggi yang memberikan kesan luas. Desain interior yang bersih dan simpel, dengan furnitur modern yang dipilih dengan cermat, menciptakan suasana yang menyenangkan dan nyaman bagi penghuninya. Tidak hanya itu, rumah ini juga dilengkapi dengan teknologi canggih, seperti sistem pengaturan suhu otomatis dan pengoperasian pintu dan jendela secara otomatis. Taman yang indah dan teratur menghiasi halaman depan rumah ini, memberikan suasana segar dan damai. Rumah modern ini benar-benar menjadi tempat ideal untuk hidup dengan gaya hidup kontemporer yang elegan dan fungsional.', 'Jl. Jaya Kusuma No.7', 'Surabaya', 'Jawa Timur', 325, 4, 2, 1, 1, 4, 2000000000, 'Available', NULL, NULL, NULL),
(6, 7, 'Tipe A04', 'Modern', 'Rumah modern ini adalah sebuah karya arsitektur yang memadukan keindahan, kenyamanan, dan kepraktisan dalam satu desain yang memukau. Dengan bentuk yang minimalis namun elegan, rumah ini memiliki tampilan luar yang terbuat dari kombinasi material berkualitas tinggi seperti beton, kaca, dan kayu. Ruang dalamnya sangat terang dan lapang, dengan langit-langit tinggi yang memberikan kesan luas. Desain interior yang bersih dan simpel, dengan furnitur modern yang dipilih dengan cermat, menciptakan suasana yang menyenangkan dan nyaman bagi penghuninya. Tidak hanya itu, rumah ini juga dilengkapi dengan teknologi canggih, seperti sistem pengaturan suhu otomatis dan pengoperasian pintu dan jendela secara otomatis. Taman yang indah dan teratur menghiasi halaman depan rumah ini, memberikan suasana segar dan damai. Rumah modern ini benar-benar menjadi tempat ideal untuk hidup dengan gaya hidup kontemporer yang elegan dan fungsional.', 'Jl. Habibie No 11', 'Surabaya', 'Jawa Timur', 250, 3, 2, 1, 1, 2, 1500000000, 'Available', NULL, NULL, NULL),
(7, 6, 'Tipe A05', 'Minimalis', 'Rumah modern ini adalah sebuah karya arsitektur yang memadukan keindahan, kenyamanan, dan kepraktisan dalam satu desain yang memukau. Dengan bentuk yang minimalis namun elegan, rumah ini memiliki tampilan luar yang terbuat dari kombinasi material berkualitas tinggi seperti beton, kaca, dan kayu. Ruang dalamnya sangat terang dan lapang, dengan langit-langit tinggi yang memberikan kesan luas. Desain interior yang bersih dan simpel, dengan furnitur modern yang dipilih dengan cermat, menciptakan suasana yang menyenangkan dan nyaman bagi penghuninya. Tidak hanya itu, rumah ini juga dilengkapi dengan teknologi canggih, seperti sistem pengaturan suhu otomatis dan pengoperasian pintu dan jendela secara otomatis. Taman yang indah dan teratur menghiasi halaman depan rumah ini, memberikan suasana segar dan damai. Rumah modern ini benar-benar menjadi tempat ideal untuk hidup dengan gaya hidup kontemporer yang elegan dan fungsional.', 'Jl. Habibie No 13', 'Surabaya', 'Jawa Timur', 250, 3, 2, 1, 1, 2, 1600000000, 'Available', NULL, NULL, NULL),
(8, 7, 'Tipe A06', 'Modern', 'Rumah modern ini adalah sebuah karya arsitektur yang memadukan keindahan, kenyamanan, dan kepraktisan dalam satu desain yang memukau. Dengan bentuk yang minimalis namun elegan, rumah ini memiliki tampilan luar yang terbuat dari kombinasi material berkualitas tinggi seperti beton, kaca, dan kayu. Ruang dalamnya sangat terang dan lapang, dengan langit-langit tinggi yang memberikan kesan luas. Desain interior yang bersih dan simpel, dengan furnitur modern yang dipilih dengan cermat, menciptakan suasana yang menyenangkan dan nyaman bagi penghuninya. Tidak hanya itu, rumah ini juga dilengkapi dengan teknologi canggih, seperti sistem pengaturan suhu otomatis dan pengoperasian pintu dan jendela secara otomatis. Taman yang indah dan teratur menghiasi halaman depan rumah ini, memberikan suasana segar dan damai. Rumah modern ini benar-benar menjadi tempat ideal untuk hidup dengan gaya hidup kontemporer yang elegan dan fungsional.', 'Jl. Habibie No 12', 'Surabaya', 'Jawa Timur', 280, 4, 2, 1, 1, 2, 1800000000, 'Available', NULL, NULL, NULL),
(9, 4, 'Tipe A07', 'Modern', 'Rumah modern ini adalah sebuah karya arsitektur yang memadukan keindahan, kenyamanan, dan kepraktisan dalam satu desain yang memukau. Dengan bentuk yang minimalis namun elegan, rumah ini memiliki tampilan luar yang terbuat dari kombinasi material berkualitas tinggi seperti beton, kaca, dan kayu. Ruang dalamnya sangat terang dan lapang, dengan langit-langit tinggi yang memberikan kesan luas. Desain interior yang bersih dan simpel, dengan furnitur modern yang dipilih dengan cermat, menciptakan suasana yang menyenangkan dan nyaman bagi penghuninya. Tidak hanya itu, rumah ini juga dilengkapi dengan teknologi canggih, seperti sistem pengaturan suhu otomatis dan pengoperasian pintu dan jendela secara otomatis. Taman yang indah dan teratur menghiasi halaman depan rumah ini, memberikan suasana segar dan damai. Rumah modern ini benar-benar menjadi tempat ideal untuk hidup dengan gaya hidup kontemporer yang elegan dan fungsional.', 'Jl. Sekar No. 11', 'Surabaya', 'Jawa Timur', 280, 4, 2, 1, 1, 3, 1900000000, 'Available', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`) USING BTREE;

--
-- Indexes for table `agen`
--
ALTER TABLE `agen`
  ADD PRIMARY KEY (`id_agent`) USING BTREE;

--
-- Indexes for table `gambar_properti`
--
ALTER TABLE `gambar_properti`
  ADD PRIMARY KEY (`id_gambar_properti`) USING BTREE,
  ADD KEY `fk_to_properti` (`id_properti`) USING BTREE;

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`) USING BTREE,
  ADD KEY `fk_penjualan_to_agen` (`id_agen`) USING BTREE,
  ADD KEY `fk_penjualan_to_properti` (`id_properti`) USING BTREE;

--
-- Indexes for table `properti`
--
ALTER TABLE `properti`
  ADD PRIMARY KEY (`id_properti`) USING BTREE,
  ADD KEY `fk_to_agen` (`id_agen`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `agen`
--
ALTER TABLE `agen`
  MODIFY `id_agent` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gambar_properti`
--
ALTER TABLE `gambar_properti`
  MODIFY `id_gambar_properti` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key', AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key ', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `properti`
--
ALTER TABLE `properti`
  MODIFY `id_properti` int NOT NULL AUTO_INCREMENT COMMENT 'Primary key', AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar_properti`
--
ALTER TABLE `gambar_properti`
  ADD CONSTRAINT `fk_to_properti` FOREIGN KEY (`id_properti`) REFERENCES `properti` (`id_properti`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_penjualan_to_agen` FOREIGN KEY (`id_agen`) REFERENCES `agen` (`id_agent`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_penjualan_to_properti` FOREIGN KEY (`id_properti`) REFERENCES `properti` (`id_properti`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `properti`
--
ALTER TABLE `properti`
  ADD CONSTRAINT `fk_to_agen` FOREIGN KEY (`id_agen`) REFERENCES `agen` (`id_agent`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
