-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2021 pada 06.36
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sip_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `do`
--

CREATE TABLE `do` (
  `id` int(11) NOT NULL,
  `no_do` varchar(12) NOT NULL,
  `outlet_id` int(1) NOT NULL,
  `status_id` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `do`
--

INSERT INTO `do` (`id`, `no_do`, `outlet_id`, `status_id`, `date_created`) VALUES
(1, 'D01-00011220', 2, 3, '2020-12-28 17:07:18'),
(2, 'D02-00021220', 3, 2, '2020-12-28 17:08:02'),
(3, 'D03-00030621', 4, 1, '2021-06-07 09:14:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `do_detail`
--

CREATE TABLE `do_detail` (
  `id` int(11) NOT NULL,
  `do_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `do_detail`
--

INSERT INTO `do_detail` (`id`, `do_id`, `product_id`, `qty`, `total_price`) VALUES
(1, 1, 8, 5, 37500),
(2, 1, 10, 2, 22000),
(3, 1, 11, 4, 44000),
(4, 2, 8, 4, 30000),
(5, 2, 11, 3, 33000),
(6, 3, 8, 6, 45000),
(7, 3, 9, 3, 18000),
(8, 3, 10, 4, 44000),
(9, 3, 11, 6, 66000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `id` int(11) NOT NULL,
  `no_faktur` varchar(12) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `status_id` int(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`id`, `no_faktur`, `outlet_id`, `status_id`, `date_created`) VALUES
(9, 'F03-00010820', 4, 3, '2020-08-20 19:40:16'),
(10, 'F02-00020821', 3, 2, '2020-08-21 19:43:51'),
(11, 'F01-00030621', 2, 2, '2021-06-07 16:05:27'),
(12, 'F03-00040621', 4, 1, '2021-06-07 16:11:19'),
(13, 'F001-0005062', 2, 1, '2021-06-07 16:47:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur_detail`
--

CREATE TABLE `faktur_detail` (
  `id` int(11) NOT NULL,
  `faktur_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faktur_detail`
--

INSERT INTO `faktur_detail` (`id`, `faktur_id`, `product_id`, `qty`, `total_price`) VALUES
(18, 9, 6, 3, 18000),
(19, 10, 2, 2, 14000),
(20, 10, 1, 2, 16000),
(21, 10, 4, 1, 5000),
(22, 10, 3, 3, 21000),
(23, 10, 5, 1, 5500),
(24, 11, 1, 5, 40000),
(25, 11, 2, 5, 35000),
(26, 11, 3, 5, 35000),
(27, 11, 4, 4, 20000),
(28, 11, 5, 2, 11000),
(29, 12, 6, 3, 18000),
(30, 12, 5, 2, 11000),
(31, 13, 1, 8, 64000),
(32, 13, 2, 10, 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlet`
--

CREATE TABLE `outlet` (
  `id` int(11) NOT NULL,
  `outlet` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `outlet`
--

INSERT INTO `outlet` (`id`, `outlet`, `address`) VALUES
(1, 'Kantor Pusat', 'Jl. Raya Pendidikan Gg. Koni No. 35 A Cinangka Sawangan Depok'),
(2, 'RSUD Kota Bogor', 'Jl. DR. Semeru No. 120 Menteng, Kec. Bogor Barat Kota Bogor, Jawa Barat 16112'),
(3, 'RS Koja', 'Jl. Deli No. 4 RT 11 RW 7 Kec. Koja Kota Jakarta Utara, DKI Jakarta 14220'),
(4, 'RSIA Buah Hati Pamulang', 'Jl. Siliwangi No. 189 Benda Baru Kec. Pamulang Kota Tangerang Selatan, Banten 15416');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product` varchar(128) NOT NULL,
  `price` int(11) NOT NULL,
  `type_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `product`, `price`, `type_id`) VALUES
(1, 'Brownies Keju/Pandan', 8000, 1),
(2, 'Brownies Coklat', 7000, 1),
(3, 'Brownies Almond', 7000, 1),
(4, 'Ciffon Coklat Slice', 5000, 1),
(5, 'Ciffon Pandan/Strawberry', 5500, 1),
(6, 'Ciffon Abon/Bananaca', 6000, 1),
(8, 'Aqua 1500 ml', 7500, 2),
(9, 'Aqua 600 ml', 6000, 2),
(10, 'Lemon Water', 11000, 2),
(11, 'Orange Water', 11000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product_type`
--

INSERT INTO `product_type` (`id`, `type`) VALUES
(1, 'faktur penjualan'),
(2, 'delivery order');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'requested'),
(2, 'approved'),
(3, 'delivered');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `image`, `password`, `role_id`, `outlet_id`, `date_created`) VALUES
(1, 'admin1', 'Siti Maftuhah', 'default.jpg', '$2y$10$YiFQmEAbOVNB/CsWSLkzmuP9zN.sEOHrD6h9T5EQcOnA5a5HSP9rO', 1, 1, '2020-08-01 14:22:56'),
(2, 'heny', 'Heny Yuliasari', 'default.jpg', '$2y$10$hfCawCLfzSDk2a3Q/vAM5e0nCrhAh.0PjFc4quOJZmI8klrSHgv42', 2, 2, '2020-08-04 14:23:11'),
(3, 'sandysuy', 'Sandi Iskandar', 'default.jpg', '$2y$10$WMI3sb7UPf7/FEFGdoXnYOO0cPsDqXljmeylBQ71dqSdCblwf59ta', 2, 3, '2020-08-04 14:23:26'),
(4, 'nuri', 'Siti Nuriyah', 'default.jpg', '$2y$10$xkL8e9y3WQ/9o9OFU07cR.a.sF9ZqjEdZLNBskHEV.GMbl7aamTMC', 2, 4, '2020-08-13 14:24:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Document'),
(2, 'Management'),
(3, 'Report');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin Penjualan'),
(2, 'Sales Promotion Girl');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`) VALUES
(1, 1, 'Faktur Penjualan', 'document', 'fas fa-fw fa-folder'),
(2, 1, 'Delivery Order', 'document/delivery', 'fas fa-fw fa-wallet'),
(3, 2, 'User Account', 'management', 'fas fa-fw fa-user-cog'),
(4, 2, 'Product', 'management/product', 'fas fa-fw fa-cookie'),
(5, 2, 'Outlet', 'management/outlet', 'fas fa-fw fa-hospital'),
(6, 3, 'Sales Report', 'report', 'fas fa-fw fa-chart-line');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `do`
--
ALTER TABLE `do`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `do_detail`
--
ALTER TABLE `do_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `do_id` (`do_id`);

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faktur_detail`
--
ALTER TABLE `faktur_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faktur_id` (`faktur_id`);

--
-- Indeks untuk tabel `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `do`
--
ALTER TABLE `do`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `do_detail`
--
ALTER TABLE `do_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `faktur`
--
ALTER TABLE `faktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `faktur_detail`
--
ALTER TABLE `faktur_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `do_detail`
--
ALTER TABLE `do_detail`
  ADD CONSTRAINT `do_detail_ibfk_1` FOREIGN KEY (`do_id`) REFERENCES `do` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `faktur_detail`
--
ALTER TABLE `faktur_detail`
  ADD CONSTRAINT `faktur_detail_ibfk_1` FOREIGN KEY (`faktur_id`) REFERENCES `faktur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
