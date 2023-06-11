-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Apr 2023 pada 00.16
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rmpaircstom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bb` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_bb` varchar(125) NOT NULL,
  `keterangan` varchar(125) NOT NULL,
  `harga_bb` varchar(20) NOT NULL,
  `stok_bb` int(11) NOT NULL,
  `size` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bb`, `id_supplier`, `nama_bb`, `keterangan`, `harga_bb`, `stok_bb`, `size`) VALUES
(1, 1, 'Baju Polos Merah', 'Baju Cotton warna merah', '30000', 37, 'XL'),
(2, 1, 'Kaos Biru Polos', 'Cotton Premium', '45000', 100, 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_invoicebb`
--

CREATE TABLE `detail_invoicebb` (
  `id_detail_invoice` int(11) NOT NULL,
  `id_bb` int(11) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `qty_bb` int(11) NOT NULL,
  `sisa_bb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_invoicebb`
--

INSERT INTO `detail_invoicebb` (`id_detail_invoice`, `id_bb`, `id_invoice`, `qty_bb`, `sisa_bb`) VALUES
(1, 1, '1', 30, 0),
(2, 1, '5', 10, 10),
(3, 1, '6', 20, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_invoicesb`
--

CREATE TABLE `detail_invoicesb` (
  `id_detail_sb` int(11) NOT NULL,
  `id_sablon` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `qty_sablon` int(11) NOT NULL,
  `sisa_sablon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_invoicesb`
--

INSERT INTO `detail_invoicesb` (`id_detail_sb`, `id_sablon`, `id_invoice`, `qty_sablon`, `sisa_sablon`) VALUES
(1, 1, 3, 2, 1),
(2, 1, 4, 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `gambar_sablon` text NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_produk`, `gambar_sablon`, `qty`) VALUES
(1, 1, 1, '0', 4),
(2, 1, 2, '0', 1),
(3, 2, 1, '0', 1),
(4, 2, 3, '0', 1),
(5, 3, 1, '0', 2),
(6, 3, 3, '0', 1),
(7, 4, 2, '0', 1),
(8, 5, 2, '0', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_bb`
--

CREATE TABLE `invoice_bb` (
  `id_invoice` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_invoice` varchar(15) NOT NULL,
  `total_invoice` varchar(15) NOT NULL,
  `status_pesan` int(11) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `type_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice_bb`
--

INSERT INTO `invoice_bb` (`id_invoice`, `id_supplier`, `id_user`, `tgl_invoice`, `total_invoice`, `status_pesan`, `bukti_bayar`, `type_transaksi`) VALUES
(1, 1, 2, '2022-12-26', '900000', 2, '0', 1),
(3, 1, 2, '2022-12-26', '24000', 2, '0', 2),
(4, 1, 2, '2022-12-26', '36000', 2, '0', 2),
(5, 1, 2, '2023-01-03', '300000', 2, '31084499740-bukti_transfer2.jpg', 1),
(6, 1, 2, '2023-01-04', '600000', 0, '0', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nama_konsumen` varchar(125) NOT NULL,
  `alamat_konsumen` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `nama_konsumen`, `alamat_konsumen`, `no_hp`, `username`, `password`) VALUES
(1, 'coba', 'kuningan', '089876545654', 'coba', 'coba123'),
(2, 'coba2', 'kuningan jabar', '089876567654', 'coba1234', 'coba1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `size` varchar(5) NOT NULL,
  `price_gudang` varchar(15) NOT NULL DEFAULT '0',
  `stok_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi`, `gambar`, `size`, `price_gudang`, `stok_gudang`) VALUES
(1, 'Blue Street', '<p>Kaos Terdiri dari bahan <span style=\"background-color: rgb(255, 255, 0);\">katton 100 %</span> asli</p>', '2021_Hip_Hop_Streetwear_Harajuku_T_Shirt_Girl_Japanese_Kanji1.jpg', 'XL', '70000', 10),
(2, 'Street Blue White', '<p>Kaos terbuat dari <span style=\"background-color: rgb(255, 255, 0);\"><font color=\"#c67ba5\">100% catton</font></span></p>', 'Camiseta_de_manga_corta_de_color_combinado___SHEIN….jpg', 'XL', '60000', 5),
(3, 'Red Evil', 'Red Evil Cotton Premium', 'Monero___XMR_OSB_T-Shirt_Premium_-_Red___3XL.png', 'L', '75000', 28),
(6, 'Street Anime edit', '<p>Kaos Bahan Premium 100% Caton</p>', 'Screenshot_2022-06-27_121156.png', 'XL', '55000', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sablon`
--

CREATE TABLE `sablon` (
  `id_sablon` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `jenis_sablon` varchar(125) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sablon`
--

INSERT INTO `sablon` (`id_sablon`, `id_supplier`, `jenis_sablon`, `harga`, `warna`, `stok`) VALUES
(1, 1, 'TMt', '12000', 'merah', 7),
(3, 1, 'Tmt', '25000', 'Biru', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(125) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `nama_toko` varchar(125) NOT NULL,
  `no_hp_supplier` varchar(15) NOT NULL,
  `username_supp` varchar(125) NOT NULL,
  `pass_supp` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `nama_toko`, `no_hp_supplier`, `username_supp`, `pass_supp`) VALUES
(1, 'Ahmad', 'Gunungkeling, Kuningan Jawa Barat', 'Berkah Jaya', '0875698745633', 'supplier', 'supplier');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_cust`
--

CREATE TABLE `transaksi_cust` (
  `id_transaksi` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `tgl_order` varchar(15) NOT NULL,
  `status_order` int(11) NOT NULL,
  `total_order` varchar(15) NOT NULL,
  `bukti_payment` text NOT NULL,
  `type_transaksi` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_cust`
--

INSERT INTO `transaksi_cust` (`id_transaksi`, `id_konsumen`, `tgl_order`, `status_order`, `total_order`, `bukti_payment`, `type_transaksi`) VALUES
(1, 2, '2022-11-14', 2, '340000', 'Screenshot_2022-06-27_120612.png', 1),
(2, 1, '2022-11-27', 1, '145000', 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 1),
(3, 0, '2022-12-13', 2, '215000', '1', 2),
(4, 0, '2022-12-13', 2, '60000', '1', 2),
(5, 1, '2023-01-04', 1, '60000', '31084499740-bukti_transfer1.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `alamat_user` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_hp_user` varchar(15) NOT NULL,
  `tipe_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat_user`, `username`, `password`, `no_hp_user`, `tipe_user`) VALUES
(1, 'Admin', 'Kuningan, Jawa Barat', 'admin', 'admin', '089876765676', 1),
(2, 'Gudang', 'Gunungkeling, Kuningan Jawa Barat', 'gudang', 'gudang', '089876567546', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bb`);

--
-- Indeks untuk tabel `detail_invoicebb`
--
ALTER TABLE `detail_invoicebb`
  ADD PRIMARY KEY (`id_detail_invoice`);

--
-- Indeks untuk tabel `detail_invoicesb`
--
ALTER TABLE `detail_invoicesb`
  ADD PRIMARY KEY (`id_detail_sb`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `invoice_bb`
--
ALTER TABLE `invoice_bb`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `sablon`
--
ALTER TABLE `sablon`
  ADD PRIMARY KEY (`id_sablon`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `transaksi_cust`
--
ALTER TABLE `transaksi_cust`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_invoicebb`
--
ALTER TABLE `detail_invoicebb`
  MODIFY `id_detail_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `detail_invoicesb`
--
ALTER TABLE `detail_invoicesb`
  MODIFY `id_detail_sb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `invoice_bb`
--
ALTER TABLE `invoice_bb`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sablon`
--
ALTER TABLE `sablon`
  MODIFY `id_sablon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi_cust`
--
ALTER TABLE `transaksi_cust`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
