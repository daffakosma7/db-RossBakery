-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2024 pada 09.41
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ross_bakery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Roti manis'),
(17, 'Roti Asin'),
(18, 'Minuman'),
(19, 'Pastry');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `ketersediaan_stok` enum('habis','tersedia') DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `ketersediaan_stok`) VALUES
(4, 1, 'Roti Coklat Keju', 5000, 'GDJ9sr3LTjE0JlQrXdl9.jpg', 'Nikmati perpaduan sempurna antara manisnya coklat dan gurihnya keju dalam setiap gigitan Roti Coklat Keju kami. Roti ini dibuat dari bahan-bahan berkualitas tinggi dan dipanggang dengan teknik khusus untuk menghasilkan tekstur yang lembut dan lezat. Coklatnya yang meleleh di dalam roti berpadu harmonis dengan keju yang kaya rasa, menciptakan sensasi rasa yang tak tertandingi                                                                               ', 'tersedia'),
(5, 17, 'Roti Sosis', 6000, '0n3LUhTSX5c9XjZWpwyf.jpg', 'Nikmati kelezatan sempurna dalam setiap gigitan dengan Roti Sosis kami! Dibuat dengan bahan-bahan berkualitas tinggi, roti ini merupakan perpaduan ideal antara adonan roti yang lembut dan sosis yang gurih, menciptakan pengalaman rasa yang tak terlupakan             ', 'tersedia'),
(6, 1, 'Roti coklat ', 5000, 'GNckTpRvqLRczFt1ZBoZ.jpg', '                                                                                                enak                                                                                       ', 'tersedia'),
(7, 17, 'garlic bread ', 10000, 'zWAW3P4slzQ2nMLDqmOX.jpg', '                        wadwadkowadwa                                                                  ', 'tersedia'),
(9, 17, 'Roti Smoke Beef', 8000, 'dZFhlhpLUFSm0g9GNyxV.jpg', 'Roti Smoke Beef adalah pilihan sempurna untuk Anda yang menginginkan santapan cepat, lezat, dan mengenyangkan. Dibuat dari bahan-bahan berkualitas tinggi, roti ini menghadirkan perpaduan rasa yang harmonis dan memuaskan', 'tersedia'),
(10, 19, 'Cromboloni', 25000, 'UULSfEeDdN0JLldjiCjh.jpg', 'Cromboloni adalah pastry berukuran besar yang dikenal dengan tekstur lembut dan rasa yang kaya. Produk ini dirancang untuk memberikan pengalaman menikmati roti yang luar biasa dengan isian yang melimpah dan citarasa yang memanjakan lidah', 'tersedia'),
(11, 1, 'Roti Sisir Mentega', 5000, '9iR3UXJxFONkE7M5hPaj.png', '                                                roti tradisional Indonesia yang terkenal dengan teksturnya yang lembut dan aroma mentega yang khas. Roti ini cocok dinikmati kapan saja, baik sebagai sarapan, camilan, atau teman minum teh                       ', 'tersedia'),
(14, 17, 'roti anjing ', 231313131, 'ZT894cNMuze9bg2uU7S1.jpeg', 'awdwadadwa', 'tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin ', '$2y$10$cDDse/fYbmSY7k.MG1Vsb./QLYpssl/SOvNxJr2OEjOKEtSvVoe.i');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
