-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 11:00 AM
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
-- Database: `bayview`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id_admin` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id_admin`, `Username`, `Password`) VALUES
(1, 'Lunar', 'Lunar@123'),
(2, 'Yuni', 'Yuni1234');

-- --------------------------------------------------------

--
-- Table structure for table `agen`
--

CREATE TABLE `agen` (
  `Id_agen` int(11) NOT NULL,
  `Nama_agen` varchar(50) NOT NULL,
  `Jenis_kelamin` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `Alamat_agen` varchar(50) NOT NULL,
  `No_telp_agen` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agen`
--

INSERT INTO `agen` (`Id_agen`, `Nama_agen`, `Jenis_kelamin`, `umur`, `Alamat_agen`, `No_telp_agen`, `Email`) VALUES
(1, 'Ahmad', 'Laki-Laki', 23, 'Rungkut, Surabaya', '089657423122', 'Ahmad123@gmail.com'),
(2, 'Lucky', 'Laki-Laki', 22, 'Kalirejo, Surabaya', '085634478653', 'Lucky123@gmail.com'),
(3, 'Feby', 'Perempuan', 22, 'Rungkut, Surabaya', '085653678876', 'Feby123@gmail.com'),
(4, 'Fahri', 'Laki-Laki', 25, 'Rungkut, Surabaya', '089636823122', 'Fahri123@gmail.com'),
(5, 'Dinda', 'Perempuan', 22, 'Kaliasri, Surabaya', '085432766584', 'Dinda123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `Id_penjualan` int(11) NOT NULL,
  `Id_properti` int(11) NOT NULL,
  `Id_agen` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `Jumlah_dp` int(11) NOT NULL,
  `Sisa_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`Id_penjualan`, `Id_properti`, `Id_agen`, `nama`, `nik`, `alamat`, `no_tlp`, `email`, `tgl_pesan`, `tgl_selesai`, `Jumlah_dp`, `Sisa_bayar`) VALUES
(1, 2, 3, 'Bobi', '3578764892756378', 'Jl. Rungkut no 1, Surabaya', '085383272986', 'Bobi123@gmail.com', '2022-05-11', '2022-08-20', 300000000, 500000000),
(2, 4, 2, 'Niken', '3647582649374896', 'Jl. Segaran no. 1,  Depok.', '0864728465378', 'niken123@gmail.com', '2022-03-10', '2022-09-22', 500000000, 500000000),
(3, 3, 3, 'Lola', '3647593857604957', 'Jl. Rungkut no 99, Surabaya', '089648573947', 'lola123@gmail.com', '2023-01-02', '2023-04-04', 400000000, 350000000);

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

CREATE TABLE `properti` (
  `Id_properti` int(11) NOT NULL,
  `Id_agen` int(11) NOT NULL,
  `nama_properti` varchar(50) NOT NULL,
  `tipe_properti` varchar(50) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `kamar_tidur` int(11) NOT NULL,
  `kamar_mandi` int(11) NOT NULL,
  `dapur` int(11) NOT NULL,
  `ruang_keluarga` int(11) NOT NULL,
  `balkon` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`Id_properti`, `Id_agen`, `nama_properti`, `tipe_properti`, `deskripsi`, `alamat`, `kota`, `provinsi`, `luas_bangunan`, `kamar_tidur`, `kamar_mandi`, `dapur`, `ruang_keluarga`, `balkon`, `harga`, `status`) VALUES
(1, 1, 'Tipe A1', 'Rumah', 'Pondasi : Cakar Ayam.\r\n\r\nStruktur : Beton Bertulang.\r\n\r\nPintu : Pintu Solid & Taekwood, Kusen Alumunium.\r\n\r\nLantai : Lantai Granit 60x60, Kamar Mandi Keramik 40x40/25x40.\r\n\r\nSanitari : TOTO/Setara.\r\n\r\nTaman : Rumput.\r\n\r\nAtap : Rangka Baja Ringan, Genteng beton, Genteng Metal.\r\n\r\nDinding : Bata Ringan, Plester Aci, Cat Tekstur, Bata Tempel.\r\n\r\nSumber Air PDAM.\r\n\r\nJendela Alumunium Alexandria/Setara.', 'Jl. Penjaringna no. 1,  Depok.', 'Kota Depok', 'Jawa Barat', 77, 3, 2, 2, 1, 1, 800000000, 'Available'),
(2, 2, 'Tipe A2', 'Rumah', 'Deskripsi :\r\n- Pondasi Batu Kali\r\n\r\n- Struktur Beton Bertulang\r\n\r\n- Besi 10 Ulir Full\r\n\r\n- Hebel (Bata Ringan)\r\n\r\n- Granite 60 x 60\r\n\r\n- Closet Duduk (TOTO)\r\n\r\n- Carport Rabat Beton\r\n\r\n- Kusen Alumunium Full\r\n\r\n- Toren Pinguin\r\n\r\n- Rangka Atap Baja Ringan\r\n\r\n- Genteng Beton M Class\r\n\r\n- Listrik 2200 Watt\r\n\r\n- Air Zet Pump\r\n\r\n- Pintu Meranti Oven\r\n\r\n- Pasir Rangkas No 1\r\n\r\n- Semen Gresik', 'Jl. Cileunyi no. 2, Bandung', 'Kota Bandung', 'Jawa Barat', 78, 3, 2, 1, 1, 1, 750000000, 'Available'),
(3, 3, 'Tipe A3', 'Rumah', 'Deskripsi :\r\nSTRUKTUR : - Pondasi batu kali - Footplat / cakar aya, - Sloof, kolom, balok, ring balok beton bertulang\r\n\r\nLANTAI : - Keramik lantai teras, kamar mandi 50cm x 50cm EX.Standar - Keramik lantai ruang tamu dan kamar tidur 60cm x 60cm ex.stara garuda - Lantai tangga vinyl taco\r\n\r\nDINDING : - Dinding interior & eksterior bata hebel finishing plester acid an cat - Keramik dinding kamar mandi 25cm x 40cm ex.standar - Fasad kombinasi cat dan kisi kisi di cat\r\n\r\nPINTU DAN JENDELA : - Kusen pintu dan jendela alumunium - Pintu utama engineering wood rangka kayu meranti - Pintu kamar double tripleks rangka kayu meranti - Pintu kamar mandi PVC\r\n\r\nPLAFOND : - Rangka plafond besi hollow - Penutup plafond gypsum\r\n\r\nATAP : - Rangka atap baja ringan - Penutup atap genteng flat beton\r\n\r\nCAT : - Interior dan plafond ex.Catylac - Exterior ex.Catylac (plus WEATHERSHIELD)\r\n\r\nLISTRIK : - Daya listrik 2200W\r\n\r\nSANITARI : - Floor drain ex.lokal - Closet duduk ex. American standard\r\n\r\nLAIN-LAIN : - Kedalamn sumur bor 25m', 'Jl. Rungkut no 135, Surabaya', 'Surabaya', 'Jawa Timur', 63, 2, 2, 1, 1, 1, 650000000, 'Available'),
(4, 4, 'Tipe First Class 1', 'Rumah', 'Deskripsi :\r\nDinding : Bata Ringan Finishing Plester + Aci + Cat\r\n\r\nRangka Atap : Baja Ringan\r\n\r\nAtap : Alderon/Setara\r\n\r\nPondasi : Cakar Ayam, Pasangan Batu Kali, Slof Beton\r\n\r\nInstalasi Listrik : 1.300 - 2.200 Watt\r\n\r\nInstalasi Air : Jet Pump\r\n\r\nLantai Ruangan Utama : Granite Tile 60x60 (Homogenous)', 'Jl. Pakuwon Indah no 3, Surabaya', 'Surabaya', 'Jawa Timur', 100, 4, 3, 2, 2, 2, 1000000000, 'Available'),
(5, 5, 'Tipe First Class 2', 'Rumah', 'Deskripsi :\r\nPONDASI : Batu kali, Kolom & Balok : Beton Bertulang\r\n\r\nDINDING : Interior : Pasangan Bata Ringan, diplester, di aci dan dicat\r\n\r\nLANTAI : Ruang utama & Kamar : Homogeneous Tile 60X60cm\r\n\r\nTERAS : Keramik 40X40cm Kamar mandi : Lantai Keramik 20X20cm\r\n\r\nDINDING : Keramik 20X25cm Dinding Dapur : Keramik 20X25cm\r\n\r\nPLAFOND : Rangka Hollow, Gypsum Board\r\n\r\nRANGKA ATAP : Baja Ringan; Genteng Spandek/Metal\r\n\r\nKUSEN-PINTU Pintu Utama : Solid Engineering; Pintu Kamar : Double Triplek, Kamar Mandi : PVC\r\n\r\nJARINGAN AIR BERSIH Air : Pompa Listrik; Closet : Toto/Setara\r\n\r\nLISTRIK : 2200 Watt\r\n\r\n', 'Jl. Sawangan no. 1,  Jakarta.', 'Kota Jakarta', 'Jakarta', 80, 3, 2, 1, 2, 2, 950000000, 'Available'),
(6, 1, 'Tipe First Class 3', 'Rumah', 'Spec :\r\n• LT 96 M²\r\n• LB 80 M²\r\n• KT 3\r\n• KM 2\r\n• Listrik 2.200 Watt\r\n• Jet Pump\r\n• SHM\r\n• 1 lantai\r\n• Carport 1Mobil\r\n• Hadap Selatan\r\n• Bebas Banjir', 'Jl. Rungkut no 6, Surabaya', 'Surabaya', 'Jawa Timur', 80, 3, 2, 1, 1, 1, 850000000, 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indexes for table `agen`
--
ALTER TABLE `agen`
  ADD PRIMARY KEY (`Id_agen`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`Id_penjualan`),
  ADD KEY `Id_properti` (`Id_properti`),
  ADD KEY `penjualan_ibfk_1` (`Id_agen`);

--
-- Indexes for table `properti`
--
ALTER TABLE `properti`
  ADD PRIMARY KEY (`Id_properti`),
  ADD KEY `Id_agen` (`Id_agen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agen`
--
ALTER TABLE `agen`
  MODIFY `Id_agen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `Id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `properti`
--
ALTER TABLE `properti`
  MODIFY `Id_properti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`Id_agen`) REFERENCES `agen` (`Id_agen`);

--
-- Constraints for table `properti`
--
ALTER TABLE `properti`
  ADD CONSTRAINT `properti_ibfk_1` FOREIGN KEY (`Id_agen`) REFERENCES `agen` (`Id_agen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
