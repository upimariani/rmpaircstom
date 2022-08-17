-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2022 pada 14.31
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
-- Struktur dari tabel `detail_invoicebb`
--

CREATE TABLE `detail_invoicebb` (
  `id_detail_invoice` int(11) NOT NULL,
  `id_invoice` varchar(30) NOT NULL,
  `qty_bb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(30) NOT NULL,
  `gambar_sablon` text NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_bb`
--

CREATE TABLE `invoice_bb` (
  `id_invoice` varchar(30) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_invoice` varchar(15) NOT NULL,
  `total_invoice` varchar(15) NOT NULL,
  `status_pesan` int(11) NOT NULL,
  `bukti_bayar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_produk` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sablon`
--

CREATE TABLE `sablon` (
  `id_sablon` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `jenis_sablon` varchar(125) NOT NULL,
  `harga` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_size` varchar(125) NOT NULL,
  `price_supp` varchar(15) NOT NULL,
  `stok_supp` int(11) NOT NULL,
  `stok_gudang` int(11) NOT NULL,
  `price_gudang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tinta_sablon`
--

CREATE TABLE `tinta_sablon` (
  `id_tinta` int(11) NOT NULL,
  `id_sablon` int(11) NOT NULL,
  `nama_merk` varchar(125) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `stok_supp` int(11) NOT NULL,
  `stok_gudang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_cust`
--

CREATE TABLE `transaksi_cust` (
  `id_transaksi` varchar(30) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `tgl_order` varchar(15) NOT NULL,
  `status_order` int(11) NOT NULL,
  `total_order` varchar(15) NOT NULL,
  `bukti_payment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_invoicebb`
--
ALTER TABLE `detail_invoicebb`
  ADD PRIMARY KEY (`id_detail_invoice`);

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
-- Indeks untuk tabel `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tinta_sablon`
--
ALTER TABLE `tinta_sablon`
  ADD PRIMARY KEY (`id_tinta`);

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
-- AUTO_INCREMENT untuk tabel `detail_invoicebb`
--
ALTER TABLE `detail_invoicebb`
  MODIFY `id_detail_invoice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sablon`
--
ALTER TABLE `sablon`
  MODIFY `id_sablon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tinta_sablon`
--
ALTER TABLE `tinta_sablon`
  MODIFY `id_tinta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
