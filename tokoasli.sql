-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 05:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoasli`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`) VALUES
(1, 13),
(2, 21),
(3, 27),
(4, 28),
(5, 12),
(6, 29),
(7, 31),
(8, 32),
(9, 33),
(10, 43),
(11, 48),
(12, 49),
(13, 50),
(14, 51);

-- --------------------------------------------------------

--
-- Table structure for table `cartdetail`
--

CREATE TABLE `cartdetail` (
  `cart_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `metodepembayaran`
--

CREATE TABLE `metodepembayaran` (
  `id` int(11) NOT NULL,
  `nama_rekening` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metodepembayaran`
--

INSERT INTO `metodepembayaran` (`id`, `nama_rekening`, `no_rekening`, `atas_nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'BCA', '0991513310', 'PURNOMOSARI SETIO', '2022-06-05 17:16:30', '2022-07-04 12:41:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `gambar`, `nama_produk`, `deskripsi`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'telur asin.jfif', 'Telur Asin Brebes', '1 Dus Telur Asin Brebes isi 10', '43000', '2022-06-05 17:15:46', '2022-08-12 17:36:00', NULL),
(7, 'kopiko.jfif', 'Permen Kopiko', '1 bungkus permen kopiko isi 50 Butir(150gr)', '9000', '2022-06-05 18:24:12', '2022-08-09 23:19:48', NULL),
(8, 'davos.jpg', 'Permen Davos', '1 bungkus permen davos isi 10 Roll(220gr)', '15000', '2022-06-05 19:13:36', '2022-08-09 14:17:09', NULL),
(9, 'air gelas dus merk tirsa.jpg', 'Air putih gelas tirsa', '1 dus air putih gelas tirsa isi 48 cap(220ml)', '16000', '2022-07-04 16:35:09', '2022-08-08 11:10:03', NULL),
(10, 'floridina.jfif', 'Floridina', '1  botol Floridina(350ml)', '3500', '2022-07-04 17:39:04', '2022-08-09 14:17:54', NULL),
(11, 'fantamerahfix.jpg', 'Fanta Merah', '1 botol fanta merah(390ml)', '5000', '2022-07-04 17:41:02', '2022-08-21 15:33:35', NULL),
(12, 'adem sari chingku kaleng 320ml.jfif', 'Adem Sari Chingku Kaleng', '1 Kaleng Adem Sari Chingku(320ml)', '7000', '2022-07-05 18:48:01', '2022-07-05 18:48:01', NULL),
(13, 'Larutan Kaleng Cap Kaki Tiga Rasa Jambu Biji.jpg', 'Larutan Kaleng Cap Kaki Tiga', '1 Larutan Kaleng Cap Kaki Tiga Rasa Jambu Biji(320ml)', '6000', '2022-07-05 18:51:30', '2022-08-21 15:33:56', NULL),
(14, 'mizonecranberryfix.jpg', 'Mizone Cranberry', '1 Botol Mizone rasa Cranberry(500ml)', '4500', '2022-07-05 18:53:31', '2022-08-21 15:34:19', NULL),
(15, 'pocari sweat 350ml.jfif', 'Pocari Sweat ', '1 botol Pocari Sweat(350ml)', '6000', '2022-07-05 19:08:53', '2022-07-05 19:08:53', NULL),
(16, 'pocari sweat 500ml.jfif', 'Pocari Sweat ', '1 botol Pocari Sweat(500ml) ', '7000', '2022-07-05 19:11:04', '2022-07-05 19:11:04', NULL),
(17, 'teh pucuk harum 350ml.jpg', 'Teh Pucuk Harum', '1 Botol Teh Pucuk Harum(350ml)', '3500', '2022-07-06 12:25:06', '2022-07-06 12:27:19', NULL),
(18, 'le minerale 600ml.jpg', 'Le Minerale', '1 botol Le Minerale(600ml)', '3000', '2022-07-06 12:27:07', '2022-07-06 12:27:07', NULL),
(19, 'air putih botol sanqua 600ml.jpg', 'Air putih botol Sanqua', '1 Air putih botol Sanqua(600ml)', '2500', '2022-07-06 12:29:29', '2022-07-06 12:29:29', NULL),
(20, '1 dus air putih sanqua botol isi 24 600ml.jpg', 'Air putih botol Sanqua', '1 Dus Air putih botol Sanqua isi 24 botol(600ml)', '36000', '2022-07-06 12:32:13', '2022-08-09 14:21:00', NULL),
(21, 'air putih botol aqua 600ml.jpg', 'Air Putih Botol Aqua', '1 Air Putih Botol Aqua(600ml)', '3000', '2022-07-06 12:34:32', '2022-07-06 12:34:32', NULL),
(22, '1 dus air putih aqua botol isi 24 600ml.jpg', 'Air Putih Botol Aqua', '1 Dus Air Putih Botol Aqua isi 24 botol(600ml)', '50000', '2022-07-06 12:36:17', '2022-08-09 14:22:24', NULL),
(23, 'air putih botol aqua 1.5L.jpg', 'Air Putih Botol Aqua', '1 Air Putih Botol Aqua(1.5L)', '5500', '2022-07-06 12:38:23', '2022-07-06 12:38:23', NULL),
(24, '1 dus air putih aqua botol isi 12 1.5L.jpg', 'Air Putih Botol Aqua', '1 Dus Air Putih Botol Aqua  isi 12 botol(1.5L)', '55000', '2022-07-06 12:40:50', '2022-08-09 14:24:53', NULL),
(25, '1 kaleng bear brand 189ml.jpg', 'Bear Brand', '1 Kaleng Bear Brand(189ml)', '11000', '2022-07-06 12:42:54', '2022-07-06 12:42:54', NULL),
(26, '1 botol sprite rasa lemon-lime 390ml.jpg', 'Sprite Lemon-Lime', '1 botol Sprite Lemon-Lime(390ml)', '5000', '2022-07-06 12:47:30', '2022-07-06 12:47:30', NULL),
(27, 'Laktopia rasa buah.jpg', 'Laktopia rasa buah', '1 bungkus Laktopia rasa buah isi 10', '10000', '2022-07-06 15:34:14', '2022-08-09 14:25:48', NULL),
(28, 'sohun super cap lampu 500gr.jpg', 'Sohun super cap lampu', '1 Sohun super cap lampu(500gr)', '20000', '2022-07-06 15:36:46', '2022-08-08 12:23:09', NULL),
(29, 'Sohun halus cap sinar mulya 900gr.jpg', 'Sohun halus cap sinar mulya', '1 Sohun halus cap sinar mulya(900gr)', '27000', '2022-07-06 15:38:46', '2022-08-08 12:28:43', NULL),
(30, 'gula tetes.jpeg', 'Gula Tetes', 'Setengah kilo(500gr) Molases atau yang biasa disebut tetes tebu merupakan salah satu limbah produk hasil dari pengolahan gula tebu yang sudah tidak dapat dikristalkan lagi dan masih mengandung material gula dan non gula (organic). gunanya untuk orang jual', '8500', '2022-07-06 15:42:48', '2022-07-06 15:42:48', NULL),
(31, 'kecap tomat lombok(500gr).jpeg', 'Kecap tomat lombok', '1 bungkus Kecap tomat lombok(500gr)', '11500', '2022-07-06 15:45:34', '2022-07-06 15:45:34', NULL),
(32, 'kecap tomat lombok(260ml).jpg', 'Kecap tomat lombok', '1 Kecap tomat lombok(260ml)', '7000', '2022-07-06 16:08:13', '2022-08-08 12:33:28', NULL),
(33, 'Kecap tomat lombok(275ml).jpeg', 'Kecap tomat lombok', '1 Kecap tomat lombok(275ml)', '10500', '2022-07-06 16:09:50', '2022-08-08 12:49:39', NULL),
(34, 'Kecap tomat lombok(325ml).jpeg', 'Kecap tomat lombok ', '1 Kecap tomat lombok(325ml)', '11500', '2022-07-06 16:13:11', '2022-08-21 15:35:03', NULL),
(35, 'Kecap tomat lombok(625ml).jpeg', 'Kecap tomat lombok', '1 Kecap tomat lombok(625ml)', '23000', '2022-07-06 16:15:26', '2022-07-06 16:15:26', NULL),
(36, 'Kecap tomat lombok payung(625ml).jpeg', 'Kecap tomat lombok payung', '1 Kecap tomat lombok payung(625ml)', '22500', '2022-07-06 16:17:13', '2022-07-06 16:17:13', NULL),
(37, 'kecap bangao(60ml).jpg', 'Kecap bangao', '1 Kecap bangao(60ml)', '3000', '2022-07-06 16:18:33', '2022-08-08 12:54:22', NULL),
(38, 'kecap bangao(210ml).jpg', 'Kecap bangao', '1 Kecap bangao(210ml)', '12000', '2022-07-06 16:19:54', '2022-08-08 13:54:48', NULL),
(39, 'kecap sedap(63+6ml).jpg', 'Kecap sedap', '1 Kecap sedap(63+6ml)', '2000', '2022-07-06 16:21:30', '2022-08-08 13:56:47', NULL),
(40, 'kecap sedap(225ml).jpg', 'Kecap sedap', '1 Kecap sedap(225ml)', '9000', '2022-07-06 16:22:47', '2022-08-08 13:58:36', NULL),
(41, 'sambal pedas karya baru(525g).jpg', 'Sambal pedas karya baru', '1 Sambal pedas karya baru(525g)', '2000', '2022-07-06 16:24:27', '2022-08-08 14:00:57', NULL),
(42, 'plastik es mercusuar ukuran 26 X 50.jpeg', 'Plastik Es Mercusuar', '1 bungkus Plastik Es Mercusuar ukuran 26 X 50 berat(250gr) Fungsi dari Kantong Plastik PE sebagai : Kantong Plastik membungkus cairan khususnya jenis minyak dan santan. Kantong Plastik membungkus barang padat dan berat. Kantong Plastik khusus es cair atau', '10000', '2022-07-06 16:30:10', '2022-08-09 14:51:47', NULL),
(43, 'plastik putih semut ukuran 0.02 X 15 X 30.jpeg', 'Plastik Putih semut', '1 bungkus Plastik Putih semut ukuran 0.02 X 15 X 30 berat(250gr) Kantong Plastik PP (Polypropylene) adalah jenis kantong plastik bening transparan yang biasa digunakan untuk memperjelas dan memperindah tampilan suatu produk.', '9000', '2022-07-06 16:33:38', '2022-08-09 14:52:36', NULL),
(44, 'kerupuk udang(250gr).jpg', 'Kerupuk Udang Cap Padi Kapas', '1 bungkus Kerupuk Udang Cap Padi Kapas(250gr)', '15000', '2022-07-06 16:35:45', '2022-08-08 14:02:28', NULL),
(45, 'sedotan pendek cap bunga melati.jpeg', 'Sedotan pendek cap bunga melati', '1 bungkus Sedotan pendek cap bunga melati(250gr)', '8000', '2022-07-07 10:09:43', '2022-08-09 14:54:29', NULL),
(46, 'sedotan panjang cap bunga melati.jpg', 'Sedotan panjang cap bunga melati', '1 bungkus Sedotan panjang cap bunga melati(250gr)', '10000', '2022-07-07 10:15:56', '2022-08-09 14:55:08', NULL),
(47, 'Kresek kecil Okey ukuran 15 isi 50 lembar.jpg', 'Kresek kecil Okey', '1 bungkus Kresek kecil Okey ukuran 15 isi 50 lembar', '3000', '2022-07-07 10:22:45', '2022-08-08 21:09:40', NULL),
(48, 'Kresek sedang Mercusuar.jpg', 'Kresek sedang Mercusuar', '1 bungkus Kresek sedang Mercusuar(50gr)', '3500', '2022-07-07 10:24:29', '2022-08-09 14:56:43', NULL),
(49, 'Kresek besar GM(Gajah Mada).jpg', 'Kresek besar GM(Gajah Mada)', '1 bungkus Kresek besar GM(Gajah Mada)(50gr)', '3500', '2022-07-07 10:26:10', '2022-08-09 14:57:10', NULL),
(50, 'gas lpg(3kg).jpg', 'Gas LPG', '1 Gas LPG(3KG)', '20000', '2022-07-07 10:28:37', '2022-07-07 10:28:37', NULL),
(51, 'Kantong tahu ukuran besar(1kg).jpg', 'Kantong tahu ukuran besar', '1 Kantong tahu ukuran besar(1kg)', '14000', '2022-07-07 10:30:58', '2022-08-08 21:16:43', NULL),
(52, 'rokok gudang garam filter.jpg', 'Rokok Gudang Garam Filter', '1 bungkus Rokok Gudang Garam Filter isi 12 batang', '20500', '2022-07-07 10:32:54', '2022-08-09 14:40:52', NULL),
(53, 'rokok sampoerna kretek hijau.jpg', 'Rokok sampoerna kretek hijau', '1 bungkus Rokok sampoerna kretek hijau isi 12 batang', '14000', '2022-07-07 10:34:21', '2022-08-09 14:43:22', NULL),
(54, 'rokok dji sam soe.jpg', 'Rokok Dji Sam Soe', '1 bungkus Rokok dji sam soe isi 12 batang', '18500', '2022-07-07 10:35:49', '2022-08-09 14:44:37', NULL),
(55, 'rokok gudang garam surya isi 12.jpg', 'Rokok gudang garam surya isi 12 batang', '1 Bungkus Rokok gudang garam surya isi 12 batang', '20500', '2022-07-07 10:38:29', '2022-08-09 14:45:59', NULL),
(56, 'rokok gudang garam surya isi 16.jpg', 'Rokok gudang garam surya isi 16 batang', '1 bungkus Rokok gudang garam surya isi 16 batang', '27000', '2022-07-07 10:39:32', '2022-08-09 14:46:17', NULL),
(57, 'rokok signature.jpg', 'Rokok Signature', '1 bungkus Rokok Signature isi 12 batang', '18500', '2022-07-07 10:40:46', '2022-08-09 14:47:35', NULL),
(58, 'rokok djarum super isi 12 batang.jpg', 'Rokok djarum super', '1 bungkus Rokok djarum super isi 12 batang', '20000', '2022-07-07 10:42:33', '2022-07-08 21:22:15', NULL),
(59, 'rokok gudang garam merah.jpg', 'Rokok gudang garam merah', '1 bungkus Rokok gudang garam merah isi 12 batang', '13500', '2022-07-07 10:43:57', '2022-08-09 15:03:16', NULL),
(60, 'rokok tuton super.jpg', 'Rokok tuton super', '1 bungkus Rokok tuton super isi 12 batang', '14000', '2022-07-07 10:45:09', '2022-08-09 15:04:02', NULL),
(61, 'rokok gudang garam djaja.jpg', 'Rokok gudang garam djaja', '1 bungkus Rokok gudang garam djaja isi 12 batang', '12500', '2022-07-07 10:46:29', '2022-08-09 15:07:00', NULL),
(62, 'rokok djarum coklat.jpg', 'Rokok djarum coklat', '1 bungkus Rokok djarum coklat isi 12 batang', '14000', '2022-07-07 10:47:45', '2022-08-09 15:07:42', NULL),
(63, 'rokok djarum coklat extra.jpg', 'Rokok djarum coklat extra', '1 bungkus djarum coklat extra isi 12 batang', '15000', '2022-07-07 20:30:59', '2022-08-09 15:09:42', NULL),
(64, 'rokok grow kretek.jpg', 'Rokok grow kretek', '1 bungkus Rokok grow kretek isi 12 batang', '7000', '2022-07-07 20:41:25', '2022-08-09 15:10:44', NULL),
(65, 'rokok satya.jpg', 'Rokok satya', '1 bungkus Rokok satya isi 12 batang', '10000', '2022-07-07 20:42:32', '2022-08-09 15:11:38', NULL),
(66, 'rokok la bold isi 12.jpg', 'Rokok LA Bold', '1 bungkus Rokok LA Bold isi 12 batang', '18500', '2022-07-07 20:44:26', '2022-08-09 15:12:11', NULL),
(67, 'rokok sampoerna mild merah isi 16.jpg', 'Rokok sampoerna mild merah isi 16 batang', '1 bungkus Rokok sampoerna mild merah isi 16 batang', '27000', '2022-07-07 20:46:26', '2022-08-09 15:12:44', NULL),
(68, 'rokok malboro kretek isi 12.jpg', 'Rokok marlboro kretek isi 12 batang', '1 bungkus Rokok marlboro kretek isi 12 batang', '9000', '2022-07-07 20:48:05', '2022-08-09 15:13:36', NULL),
(69, 'rokok wismilak kretek isi 12.jpg', 'Rokok wismilak kretek', '1 bungkus Rokok wismilak kretek isi 12 batang', '14000', '2022-07-07 20:49:49', '2022-08-09 15:14:50', NULL),
(70, 'rokok tuton kretek.jpg', 'Rokok tuton kretek', '1 bungkus Rokok tuton kretek isi 12 batang', '6500', '2022-07-07 20:51:22', '2022-08-09 15:15:44', NULL),
(71, 'rokok mustang.jpg', 'Rokok mustang', '1 bungkus rokok mustang isi 12 batang', '9000', '2022-07-07 20:52:54', '2022-08-09 15:16:52', NULL),
(72, 'rokok rider kretek.jpg', 'Rokok rider kretek', '1 bungkus Rokok rider kretek isi 12 batang', '8000', '2022-07-07 20:54:22', '2022-08-09 15:17:22', NULL),
(73, 'rokok dji sam soe refil.jpg', 'Rokok dji sam soe refil', '1 bungkus Rokok dji sam soe refil isi 12 batang', '20000', '2022-07-07 20:56:55', '2022-08-09 15:18:22', NULL),
(74, 'rokok vip.jpg', 'Rokok V I P', '1 bungkus Rokok V I P isi 12 batang', '13500', '2022-07-07 20:58:14', '2022-08-09 15:18:59', NULL),
(75, 'rokok viper.jpg', 'Rokok viper', '1 bungkus Rokok viper isi 16 batang', '17000', '2022-07-07 20:59:45', '2022-08-09 15:20:13', NULL),
(76, 'rokok crystal merah.jpg', 'Rokok crystal merah', '1 bungkus Rokok crystal merah isi 16 batang', '18000', '2022-07-07 21:00:54', '2022-08-09 15:21:20', NULL),
(77, 'rokok ferro isi 16.jpg', 'Rokok ferro', '1 bungkus Rokok ferro isi 16 batang', '17000', '2022-07-07 21:02:41', '2022-08-09 15:21:45', NULL),
(78, 'rokok raven.jpg', 'Rokok raven', '1 bungkus Rokok raven isi 16 batang', '16500', '2022-07-07 21:04:02', '2022-08-09 15:22:32', NULL),
(79, 'rokok surya pro merah isi 16.jpg', 'Rokok surya pro merah', '1 bungkus Rokok surya pro merah isi 16 batang', '22000', '2022-07-07 21:06:38', '2022-08-09 15:27:54', NULL),
(80, 'rokok surya pro putih.jpg', 'Rokok surya pro mild putih', '1 bungkus Rokok surya pro mild putih isi 16 batang', '22000', '2022-07-07 21:17:55', '2022-08-09 15:29:08', NULL),
(81, 'rokok malboro merah isi 12.jpg', 'Rokok malboro merah', '1 bungkus Rokok malboro merah isi 12 batang', '9000', '2022-07-07 21:24:59', '2022-08-09 15:30:33', NULL),
(82, 'rokok djarum black.jpg', 'Rokok djarum black', '1 bungkus Rokok djarum black isi 16 batang', '24000', '2022-07-07 21:29:16', '2022-08-09 15:31:29', NULL),
(83, 'rokok black cappucino.jpg', 'Rokok black cappucino', '1 bungkus Rokok black cappucino isi 16 batang', '25000', '2022-07-07 21:30:19', '2022-08-09 15:34:07', NULL),
(84, 'rokok 76 madu hitam.jpg', 'Rokok 76 madu hitam', '1 bungkus Rokok 76 madu hitam isi 12 batang', '12500', '2022-07-07 21:31:24', '2022-08-09 15:35:05', NULL),
(85, 'rokok la light isi 16.jpg', 'Rokok la light', '1 bungkus Rokok la light isi 16 batang', '25500', '2022-07-07 21:32:48', '2022-08-09 15:35:44', NULL),
(86, 'rokok ares.jpg', 'Rokok ares', '1 bungkus Rokok ares isi 12 batang', '12000', '2022-07-07 21:35:44', '2022-08-09 15:36:35', NULL),
(87, 'rokok scorpion.jpg', 'Rokok scorpion', '1 bungkus Rokok scorpion isi 20 batang', '22000', '2022-07-07 21:36:54', '2022-08-09 15:37:16', NULL),
(88, 'rokok sriwedari.jpg', 'Rokok sriwedari', '1 bungkus Rokok sriwedari isi 12 batang', '12500', '2022-07-07 21:38:10', '2022-08-09 15:37:41', NULL),
(89, 'rokok la bold isi 20.jpg', 'Rokok la bold', '1 bungkus Rokok la bold isi 20 batang', '28000', '2022-07-07 21:39:18', '2022-08-09 15:38:23', NULL),
(90, 'rokok bagas.jpg', 'Rokok bagas', '1 bungkus Rokok bagas isi 12 batang', '7000', '2022-07-07 21:40:11', '2022-08-09 15:39:41', NULL),
(91, 'rokok wave.jpg', 'Rokok wave', '1 bungkus Rokok wave isi 12 batang', '16000', '2022-07-07 21:40:54', '2022-08-09 15:41:04', NULL),
(92, 'rokok cigarillos.jpg', 'Rokok cigarillos', '1 bungkus Rokok cigarillos isi 6 batang', '13000', '2022-07-07 21:42:06', '2022-08-09 15:41:55', NULL),
(93, 'tauco biasa(250gr).jpg', 'Tauco biasa(250gr)', '1 bungkus Tauco biasa(250gr)', '10000', '2022-07-07 21:44:59', '2022-08-08 21:30:48', NULL),
(94, 'tauco biasa(500gr).jpg', 'Tauco biasa(500gr)', '1 bungkus Tauco biasa(500gr)', '19500', '2022-07-07 21:47:30', '2022-08-08 21:32:02', NULL),
(95, 'tauco super(100gr).jpg', 'Tauco super(100gr)', '1 bungkus Tauco super(100gr)', '7000', '2022-07-07 21:50:34', '2022-08-08 21:33:31', NULL),
(96, 'tauco super(250gr).jpg', 'Tauco super(250gr)', '1 bungkus Tauco super(250gr)', '13500', '2022-07-07 21:51:53', '2022-08-08 21:35:30', NULL),
(97, 'garam halus merk daun(250gr).jpg', 'Garam halus daun', '1 bungkus Garam halus daun(250gr)', '2500', '2022-07-07 21:53:36', '2022-08-08 21:37:49', NULL),
(98, 'micin sasa 50 gr.jpg', 'Micin sasa(50gr)', '1 bungkus Micin sasa(50gr)', '3500', '2022-07-07 21:55:56', '2022-07-07 21:55:56', NULL),
(99, 'micin sasa 115 gr.jpg', 'Micin sasa(115gr)', '1 bungkus Micin sasa(115gr)', '5500', '2022-07-07 21:57:15', '2022-07-07 21:57:15', NULL),
(100, '1 renteng masako ayam.jpg', 'Masako ayam', '1 renteng masako ayam isi 12 sachet(9gr)', '6000', '2022-07-07 21:58:33', '2022-08-09 15:49:20', NULL),
(101, '1 renteng royiko ayam.jpg', 'Royco ayam', '1 renteng royco ayam isi 12 sachet(8g)', '6000', '2022-07-07 22:00:46', '2022-08-09 15:51:00', NULL),
(102, '1 renteng royiko sapi.jpg', 'Royco sapi', '1 renteng royco sapi isi 12 Sachet(8g)', '6000', '2022-07-07 22:02:05', '2022-08-09 15:54:47', NULL),
(103, '1 renteng merica bubuk ladaku.jpg', 'Merica bubuk ladaku', '1 renteng merica bubuk ladaku isi 12 Sachet(3g)', '12000', '2022-07-07 22:03:18', '2022-08-09 15:56:27', NULL),
(104, '1 renteng lada putih mama suka.jpg', 'Lada putih MamaSuka', '1 renteng lada putih MamaSuka isi 12 Sachet(2g)', '12000', '2022-07-07 22:04:28', '2022-08-09 15:57:36', NULL),
(105, '1 renteng ketumbar bubuk prima rasa.jpg', 'Ketumbar bubuk primarasa', '1 renteng ketumbar bubuk primrasa isi 12 Sachet(7g)', '12000', '2022-07-07 22:06:46', '2022-08-09 16:01:36', NULL),
(106, '1 renteng kunyit bubuk desaku.jpg', 'Kunyit bubuk desaku', '1 renteng kunyit bubuk desaku isi 12 bungkus(7,5g)', '12000', '2022-07-07 22:08:09', '2022-08-09 16:02:27', NULL),
(107, 'karet gelang cap kupu(500gr).jpg', 'Karet gelang cap kupu', '1 bungkus Karet gelang cap kupu(500gr)', '14000', '2022-07-07 22:13:51', '2022-07-07 22:17:48', NULL),
(108, '1 slop poci gold.jpg', 'Teh Poci gold', '1 slop teh poci gold isi 50 pcs', '30000', '2022-07-07 22:15:08', '2022-08-09 16:09:42', NULL),
(109, '1 slop 2 tang hijau.jpg', '2 Tang Hijau', '1 slop 2 Tang Hijau isi 50 pcs', '55000', '2022-07-07 22:19:32', '2022-08-09 16:10:33', NULL),
(110, '1 slop 2 tang super kuning.jpg', '2 Tang super kuning', '1 slop 2 Tang super kuning isi 50 pcs', '30000', '2022-07-07 22:21:12', '2022-08-09 16:13:11', NULL),
(111, '1 slop 2 tang biru premium.jpg', '2 Tang biru premium', '1 slop 2 Tang biru premium isi 50 pcs', '40000', '2022-07-07 22:22:33', '2022-08-09 16:14:06', NULL),
(112, '1 slop teh tong tji premium.jpg', 'Teh tong tji premium', '1 slop teh tong tji premium isi 10x50gr', '40000', '2022-07-07 22:24:56', '2022-08-09 16:15:28', NULL),
(113, '1 slop teh gopek.jpg', 'Teh gopek', '1 slop Teh gopek isi 50 pcs', '40000', '2022-07-07 22:26:00', '2022-08-09 16:16:01', NULL),
(114, 'susu putih frisian flag.jpg', 'Susu putih frisian flag', '1 renteng susu putih frisian flag isi 6 Sachet(40gr)', '9000', '2022-07-07 22:43:23', '2022-08-09 16:17:16', NULL),
(115, 'obat nyamuk cap kingkong.jpg', 'Obat nyamuk cap kingkong', '1 dus Obat nyamuk cap kingkong', '4500', '2022-07-07 22:44:23', '2022-07-07 22:44:23', NULL),
(116, '1 renteng sampo pantene.jpg', 'Shampo pantene', '1 renteng Shampo pantene isi 24 Sachet', '6000', '2022-07-07 22:46:04', '2022-08-09 16:18:55', NULL),
(117, '1 renteng shampo sunsilk.jpg', 'Shampo sunsilk', '1 renteng Shampo sunsilk isi 12 Sachet', '6000', '2022-07-07 22:48:25', '2022-08-09 16:19:58', NULL),
(118, '1 pack adem sari.jpg', 'Adem sari', '1 pack Adem sari isi 24 Sachet', '50000', '2022-07-07 22:50:56', '2022-08-09 16:33:05', NULL),
(119, 'Larutan Kaleng Cap Kaki Tiga Rasa jeruk.jpg', 'Larutan Kaleng Cap Kaki Tiga Rasa Jeruk', '1 Larutan Kaleng Cap Kaki Tiga Rasa Jeruk(320ml)', '6000', '2022-07-08 20:00:09', '2022-07-08 20:00:09', NULL),
(120, 'Larutan Kaleng Cap Kaki Tiga Rasa leci.jpg', 'Larutan Kaleng Cap Kaki Tiga Rasa Leci', '1 Larutan Kaleng Cap Kaki Tiga Rasa Leci(320ml)', '6000', '2022-07-08 20:01:17', '2022-07-08 20:01:17', NULL),
(121, 'Mizone rasa lychee lemon.jpg', 'Mizone rasa lychee lemon', '1 botol Mizone rasa lychee lemon(500ml)', '4500', '2022-07-08 20:04:13', '2022-07-08 20:04:13', NULL),
(122, 'susu coklat frisian flag.jpg', 'Susu coklat frisian flag', '1 renteng Susu coklat frisian flag isi 6 Sachet', '9000', '2022-07-08 20:08:08', '2022-08-09 16:33:55', NULL),
(123, '1 renteng tolak angin.jpg', 'Tolak Angin Cair Sido Muncul', '1 renteng Tolak Angin Cair Sido Muncul isi 12 Sachet(15ml)', '15000', '2022-07-08 20:10:48', '2022-08-09 16:34:43', NULL),
(124, 'Tolak angin cair flu Sido Muncul.jpg', 'Tolak angin cair flu Sido Muncul', '1 renteng Tolak angin cair flu Sido Muncul isi 12 Sachet(15ml)', '15000', '2022-07-08 20:12:31', '2022-08-09 16:36:17', NULL),
(125, '1 renteng nutri sari rasa orange.jpg', 'Nutri sari rasa orange', '1 renteng Nutri sari rasa orange isi 10 pcs(14g)', '20000', '2022-07-08 20:14:44', '2022-08-09 16:38:14', NULL),
(126, '1 renteng kopi white coffie.jpg', 'Kopi Luwak white coffie', '1 renteng Kopi Luwak white coffie isi 10 Sachet', '15000', '2022-07-08 20:16:45', '2022-08-09 16:39:05', NULL),
(127, '1 renteng kopi abc susu.jpg', 'Kopi abc susu', '1 renteng Kopi abc susu isi 10 Sachet', '15000', '2022-07-08 20:18:25', '2022-08-09 16:40:39', NULL),
(128, '1 renteng kopi coffeemix 3 in 1 indocafe.jpg', 'Kopi coffeemix 3 in 1 indocafe', '1 renteng Kopi coffeemix 3 in 1 indocafe isi 10 Sachet', '15000', '2022-07-08 20:19:52', '2022-08-09 16:41:34', NULL),
(129, '1 renteng kopi kapal api tanpa gula(6.5g).jpg', 'Kopi kapal api(6.5g)', '1 renteng Kopi kapal api isi 10 Sachet(6.5g)', '6000', '2022-07-08 20:22:57', '2022-08-09 16:48:52', NULL),
(130, '1 renteng kopi kapal api tanpa gula(24g).jpg', 'Kopi kapal api(24g)', '1 renteng Kopi kapal api isi 10 Sachet(24g)', '15000', '2022-07-08 20:24:39', '2022-08-09 16:49:49', NULL),
(131, '1 renteng bumbu racik indofood ikan.jpg', 'Bumbu racik indofood ikan', '1 renteng Bumbu racik indofood ikan isi 10 Sachet(20g)', '2500', '2022-07-08 20:26:58', '2022-08-09 16:52:42', NULL),
(132, '1 renteng bumbu racik indofood tempe.jpg', 'Bumbu racik indofood tempe(20g)', '1 renteng Bumbu racik indofood tempe isi 10 Sachet(20g)', '2500', '2022-07-08 20:28:56', '2022-08-09 16:54:20', NULL),
(133, 'Tisu gulung isi 10 green source.jpg', 'Tisu gulung ', '1 bungkus Tisu gulung isi 10 green source', '25000', '2022-07-08 20:40:48', '2022-08-08 21:43:04', NULL),
(134, 'sandal swallow biru.jpg', 'Sandal jepit swallow warna biru', '1 pasang sandal swallow harga ukuran 10', '10000', '2022-07-08 20:42:21', '2022-08-09 17:21:59', NULL),
(135, '1 ball tali raflia isi 12 mahkota.jpeg', 'Tali raflia mahkota', '1 ball Tali raflia isi 12 mahkota(250gr)', '78000', '2022-07-08 20:58:56', '2022-07-08 20:58:56', NULL),
(136, '1 ball tali raflia hitam semar isi 10.jpg', 'Tali raflia hitam semar', '1 ball tali raflia hitam semar isi 10', '170000', '2022-07-08 21:03:56', '2022-08-08 21:46:05', NULL),
(137, 'sirup frambozen fresh.jpg', 'Sirup Fress sirup rasa frambozen', '1 botol Sirup Fress sirup rasa frambozen(625ml)', '22000', '2022-07-08 21:07:38', '2022-08-09 17:29:18', NULL),
(138, 'sabun cuci piring mama lemon(115ml).jpg', 'Sabun cuci piring mama lemon', '1 Sabun cuci piring mama lemon(115ml)', '2000', '2022-07-08 21:10:31', '2022-07-08 21:10:31', NULL),
(139, 'sabun cuci piring mama lemon(230ml).jpg', 'Sabun cuci piring mama lemon', '1 Sabun cuci piring mama lemon(230ml)', '4000', '2022-07-08 21:11:29', '2022-07-08 21:11:29', NULL),
(140, '1 pack korek api isi 10.jpg', 'Korek api', '1 pack Korek api isi 10', '4000', '2022-07-08 21:14:58', '2022-08-08 21:48:28', NULL),
(141, 'sabun mandi lifebuoy batangan.jpg', 'Sabun mandi lifebuoy', '1 bungkus Sabun mandi lifebuoy batangan(70g)', '4000', '2022-07-08 21:20:45', '2022-07-08 21:21:03', NULL),
(142, 'sabun mandi lux(75g).jpg', 'Sabun mandi lux', '1 bungkus Sabun mandi lux batangan(75g)', '4500', '2022-07-08 22:02:21', '2022-08-08 21:50:14', NULL),
(143, 'Sabun mandi nuvo batangan(76g).jpg', 'Sabun mandi nuvo', '1 bungkus Sabun mandi nuvo batangan(76g)', '3000', '2022-07-08 22:09:43', '2022-08-08 21:53:39', NULL),
(144, 'Sabun mandi shinzui(85g).jpg', 'Sabun mandi shinzui ', '1 bungkus Sabun mandi shinzui batangan(85g)', '5000', '2022-07-08 22:16:36', '2022-08-08 21:56:44', NULL),
(145, 'Sabun mandi dettol(100g).jpg', 'Sabun mandi dettol', '1 bungkus Sabun mandi dettol batangan(100g)', '6000', '2022-07-08 22:21:48', '2022-08-08 21:59:24', NULL),
(146, 'minyak kayu putih cap lang(15ml).jpg', 'Minyak kayu putih cap lang', '1 Minyak kayu putih cap lang(15ml)', '6500', '2022-07-08 22:25:01', '2022-07-08 22:25:01', NULL),
(147, 'balsem geliga(10g).jpg', 'Balsem geliga', '1 Balsem geliga(10g)', '5500', '2022-07-08 22:33:01', '2022-07-08 22:33:01', NULL),
(148, 'balsem geliga(20g).jpg', 'Balsem geliga', '1 Balsem geliga(20g)', '9000', '2022-07-08 22:34:20', '2022-07-08 22:34:20', NULL),
(149, '1 pack tisue meja nice isi 180.jpg', 'Tisue meja nice ', '1 pack tisue meja nice isi 180', '10000', '2022-07-08 22:39:55', '2022-08-08 22:02:17', NULL),
(150, '1 bungkus sikat gigi pepsodent.jpg', 'Sikat gigi pepsodent', '1 bungkus Sikat gigi pepsodent isi 1 pcs', '4000', '2022-07-08 22:41:32', '2022-08-09 17:31:32', NULL),
(151, 'odol pepsodent(75g).jpg', 'Odol pepsodent', '1 Odol pepsodent(75g)', '5000', '2022-07-08 22:42:59', '2022-07-08 22:42:59', NULL),
(152, 'mie sedap soto.jpg', 'mie sedap rasa soto', '1 bungkus mie sedap rasa soto(75g)', '3000', '2022-07-08 22:46:47', '2022-07-08 22:46:47', NULL),
(153, 'mie sedap goreng.jpg', 'Mie sedap goreng', '1 bungkus Mie sedap goreng(90g)', '3000', '2022-07-08 22:47:41', '2022-07-08 22:47:41', NULL),
(154, 'gula pasir(1kg).jpg', 'Gula pasir', '1 bungkus Gula pasir(1kg)', '14000', '2022-07-08 22:52:37', '2022-08-08 22:13:36', NULL),
(155, 'Gula batu merak(250gram).jpg', 'Gula batu merak', '1 bungkus Gula batu merak(250gram) Gula batu adalah permen yang dibuat dari gula pasir, yang dikristalkan, melalui bantuan air yang dipanaskan hingga mencapai kondisi jenuh dan lalu menjadi dingin.', '6500', '2022-07-08 22:55:29', '2022-08-08 22:16:37', NULL),
(156, '1 ball Kertas makan hebat merah.jpg', 'Kertas nasi merk hebat merah', '1 bungkus kertas nasi hebat merah isi 250 pcs', '29000', '2022-07-08 23:24:35', '2022-08-09 17:47:23', NULL),
(157, '1 ball Kertas makan hebat orange.jpg', 'Kertas nasi merk hebat orange', '1 bungkus Kertas nasi hebat orange isi 250 pcs', '26000', '2022-07-08 23:26:15', '2022-08-09 17:48:22', NULL),
(158, '1 pack lilin super.jpg', 'Lilin super', '1 pack Lilin super isi 8 pcs', '8000', '2022-07-08 23:27:18', '2022-08-09 17:48:51', NULL),
(159, '1 pack pulpen standard AE7.jpg', 'Pulpen standard AE7', '1 pack pulpen standard AE7 isi 12 pcs', '24000', '2022-07-08 23:28:36', '2022-08-09 17:49:14', NULL),
(160, '1 Minyak goreng jujur(200ml).jpg', 'Minyak goreng jujur', '1 Minyak goreng jujur(200ml)', '6500', '2022-07-08 23:47:02', '2022-08-08 22:25:27', NULL),
(161, '1 Minyak goreng rosebrand(220ml).jpg', 'Minyak goreng rosebrand(220ml)', '1 Minyak goreng rosebrand(220ml)', '6500', '2022-07-08 23:48:28', '2022-08-08 22:26:57', NULL),
(162, 'Laktopia rasa coklat.jpg', 'Laktopia rasa coklat', '1 bungkus Laktopia rasa coklat isi 10', '10000', '2022-08-08 11:58:16', '2022-08-09 17:49:38', NULL),
(163, 'Laktopia rasa kacang ijo.jpg', 'Laktopia rasa kacang ijo', '1 bungkus Laktopia rasa Kacang Ijo isi 10', '10000', '2022-08-08 12:00:54', '2022-08-09 17:49:59', NULL),
(164, 'a.jpg', 'jsusu', 'ehrehhre', '28000', '2022-08-30 14:35:02', '2022-08-30 14:35:02', '2022-08-30 14:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `no_resi` varchar(30) DEFAULT NULL,
  `tanggal_pengiriman` datetime DEFAULT NULL,
  `metode_pembayaran_id` int(11) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `tanggal_bayar` datetime DEFAULT NULL,
  `konfirmasi_pembayaran` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal_transaksi`, `user_id`, `ppn`, `no_resi`, `tanggal_pengiriman`, `metode_pembayaran_id`, `bukti_bayar`, `tanggal_bayar`, `konfirmasi_pembayaran`) VALUES
(1, '2022-06-11 16:49:09', 13, 11, 'ff', '2022-06-25 11:27:11', 5, 'Penguins.jpg', '2022-06-25 10:23:21', '2022-06-25 11:21:21'),
(4, '2022-06-25 09:50:58', 13, 11, NULL, NULL, 0, '', NULL, NULL),
(5, '2022-06-25 11:30:23', 13, 11, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2022-07-05 10:47:35', 21, 11, '130', '2022-07-05 10:52:27', 7, '1.jpg', '2022-07-05 10:50:22', '2022-07-05 10:51:27'),
(7, '2022-07-05 11:18:53', 27, 11, '1212', '2022-07-05 11:35:35', 15, '', '2022-07-05 11:25:52', '2022-07-05 11:35:13'),
(8, '2022-07-05 11:49:44', 28, 11, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2022-07-05 11:50:26', 12, 11, '32423342', '2022-07-05 11:54:34', 7, '2.jpg', '2022-07-05 11:53:40', '2022-07-05 11:54:07'),
(10, '2022-07-05 11:58:42', 29, 11, '1', '2022-07-05 19:30:56', 7, '1.jpg', '2022-07-05 11:59:31', '2022-07-05 19:30:53'),
(11, '2022-07-05 20:06:36', 31, 11, '2323', '2022-07-05 20:34:06', 7, '1.jpg', '2022-07-05 20:24:35', '2022-07-05 20:34:04'),
(12, '2022-07-05 20:30:33', 12, 11, '1', '2022-07-05 20:32:27', 7, '1.jpg', '2022-07-05 20:32:11', '2022-07-05 20:32:25'),
(13, '2022-07-05 20:35:01', 32, 11, '244', '2022-07-05 20:36:41', 7, '2.jpg', '2022-07-05 20:35:10', '2022-07-05 20:36:39'),
(14, '2022-07-05 20:37:43', 33, 11, '3', '2022-07-05 20:38:22', 7, 'Kesaksian.jpeg', '2022-07-05 20:37:59', '2022-07-05 20:38:18'),
(15, '2022-07-05 20:44:55', 29, 11, '12', '2022-07-05 20:49:21', 7, '1.jpg', '2022-07-05 20:47:46', '2022-07-05 20:49:06'),
(16, '2022-07-12 13:31:50', 43, 11, '34', '2022-07-12 13:34:28', 7, '1.jpg', '2022-07-12 13:34:04', '2022-07-12 13:34:23'),
(17, '2022-07-12 18:41:12', 43, 11, '2424', '2022-07-12 19:14:30', 7, '2.jpg', '2022-07-12 19:10:51', '2022-07-12 19:12:52'),
(18, '2022-07-19 11:52:17', 43, 11, '7', '2022-07-19 11:54:14', 7, '2.jpg', '2022-07-19 11:52:47', '2022-07-19 11:53:51'),
(19, '2022-07-26 11:02:21', 48, 11, '677', '2022-07-26 11:04:37', 7, '2.jpg', '2022-07-26 11:03:38', '2022-07-26 11:04:00'),
(20, '2022-07-27 08:12:43', 43, 11, '900', '2022-07-27 08:21:45', 7, 'a.jpg', '2022-07-27 08:15:49', '2022-07-27 08:18:18'),
(21, '2022-08-07 16:47:40', 12, 11, '2424', '2022-08-31 15:50:28', 7, 'a.jpg', '2022-08-07 16:58:33', '2022-08-31 15:47:56'),
(22, '2022-08-10 11:50:05', 43, 11, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '2022-08-31 14:50:19', 49, 11, NULL, NULL, 7, 'Capture 12.PNG', '2022-08-31 14:54:16', NULL),
(24, '2022-09-05 16:11:14', 43, 11, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '2022-09-06 12:36:53', 50, 11, '8700004026225', '2022-09-06 13:57:28', 7, 'Foto Bukti Transfer.jpeg', '2022-09-06 12:39:11', '2022-09-06 13:50:08'),
(26, '2022-10-27 16:10:03', 51, 11, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksidetail`
--

CREATE TABLE `transaksidetail` (
  `transaksi_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksidetail`
--

INSERT INTO `transaksidetail` (`transaksi_id`, `produk_id`, `jumlah_barang`) VALUES
(1, 5, 1),
(2, 5, 3),
(3, 5, 1),
(4, 5, 1),
(5, 5, 1),
(6, 6, 1),
(6, 7, 1),
(6, 9, 1),
(7, 11, 1),
(7, 6, 1),
(8, 10, 2),
(9, 8, 1),
(10, 7, 1),
(11, 6, 1),
(12, 7, 1),
(13, 9, 1),
(14, 13, 1),
(15, 12, 1),
(16, 11, 1),
(17, 8, 1),
(18, 6, 1),
(19, 8, 2),
(20, 7, 2),
(20, 25, 1),
(20, 23, 1),
(21, 7, 1),
(21, 8, 1),
(22, 7, 1),
(23, 7, 2),
(23, 9, 1),
(24, 7, 1),
(25, 11, 1),
(26, 52, 1),
(26, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 'admin1', 'admin1@gmail.com', 'Admintokoasli12345678910', '085229174268', 'Jl. Raya Barat No.Desa, Alfalah, Tembok Banjaran, Kec. Adiwerna, Kabupaten Tegal, Jawa Tengah 52194', 'admin', '2022-05-22 17:11:12', '2022-09-05 22:18:31', NULL),
(13, 'admin2', 'admin2@gmail.com', 'Admintooasli123456789', '085742956336', 'Jl. Raya Barat No.Desa, Alfalah, Tembok Banjaran, Kec. Adiwerna, Kabupaten Tegal, Jawa Tengah 52194', 'admin', '2022-05-22 17:11:12', '2022-09-05 22:18:57', NULL),
(14, 'admin3', 'admin3@gmail.com', 'Admintokoasli1234567', '081325722671', 'Jl. Raya Barat No.Desa, Alfalah, Tembok Banjaran, Kec. Adiwerna, Kabupaten Tegal, Jawa Tengah 52194', 'admin', '2022-05-22 17:23:35', '2022-09-05 22:19:11', NULL),
(43, 'tugiman', 'tugiman@gmail.com', 'tugiman', '092382348', 'asdassad', '', '2022-07-06 11:11:52', '2022-07-06 11:11:52', NULL),
(44, 'bebassssss', 'bebass@gmail.com', 'bebas', '34534543', 'dfskdsfjjdfs', '', '2022-07-06 11:19:16', '2022-07-06 11:19:16', NULL),
(46, 'kamuuuuu', 'kamuuuu@gmail.com', 'kamu', '23523532', 'gfddffd', '', '2022-07-06 11:25:46', '2022-07-06 11:25:46', NULL),
(48, 'bebas', 'bebas@gmail.com', 'bebas', '08746464646', 'jalan hshsh', '', '2022-07-26 10:55:35', '2022-07-26 10:55:35', NULL),
(49, 'adit123', 'adit123@gmail.com', 'adit123', '93837743734', 'jasasdnassdannsda', '', '2022-08-31 13:25:45', '2022-08-31 13:25:45', NULL),
(50, 'ardi', 'ardi@gmail.com', 'ardi123', '087730007561', 'Jalan karang rejo no 2 semarang', '', '2022-09-06 10:13:16', '2022-09-06 10:13:16', NULL),
(51, 'Osan', 'osan@gmail.com', '12345', '', '', '', '2022-10-27 16:08:06', '2022-10-27 16:08:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
