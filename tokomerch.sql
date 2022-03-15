-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Feb 2020 pada 14.38
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokomerch`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(2, 'aziz', 'isaghrib28', 'Isaghrib Aziz'),
(3, 'ihsan', 'qwertyuiop', 'ap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konf` int(11) NOT NULL,
  `nama_konf` varchar(50) NOT NULL,
  `email_konf` varchar(50) NOT NULL,
  `bank` varchar(5) NOT NULL,
  `file_konf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konf`, `nama_konf`, `email_konf`, `bank`, `file_konf`) VALUES
(12, 'aziz', 'isaghribazizixc@gmail.com', 'bca', '121 (1 of 1).jpg'),
(14, 'aziz', 'isaghribazizixc@gmail.com', 'bca', 'baju1 (1 of 1).jpg'),
(20, 'Aziz', 'isaghrib@gmail.com', 'bca', '121 (1 of 1).jpg'),
(21, 'ada', 'ada', 'bca', '61.jpg'),
(123, 'aziz', 'isaghribazizixc@gmail.com', 'bca', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id_nota`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `subharga`) VALUES
(6, 0, 8, 1, 'game pes 2016', 200000),
(7, 15, 7, 1, 'nba 2k16', 100000),
(8, 16, 8, 1, 'game pes 2016', 200000),
(9, 17, 7, 1, 'nba 2k16', 100000),
(10, 18, 9, 1, 'Fx', 100000),
(11, 19, 9, 2, 'Fx', 200000),
(12, 19, 7, 1, 'nba 2k16', 100000),
(13, 20, 8, 1, 'game pes 2016', 200000),
(14, 20, 9, 1, 'Fx', 100000),
(15, 21, 9, 1, 'Fx', 100000),
(16, 22, 8, 1, 'game pes 2016', 200000),
(17, 23, 8, 2, 'game pes 2016', 400000),
(18, 23, 7, 1, 'nba 2k16', 100000),
(19, 24, 11, 1, '[Album] ONE OK ROCK EYE OF THE STORM CD', 250000),
(20, 25, 14, 1, '[Album] ONE OK ROCK Ambitions CD', 200000),
(21, 26, 11, 1, '[Album] ONE OK ROCK EYE OF THE STORM CD', 250000),
(22, 27, 10, 1, '[Bundle] EYE OF THE STORM + T-SHIRT', 400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kirim` varchar(10) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kirim`, `tarif`) VALUES
(1, 'JNE', 10000),
(2, 'TIKI', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(11, 'isaghribazizixc@gmail.com', 'qwertyuiop', 'aziz', '085211047471'),
(16, 'jojo@gmail.com', '123', 'joj', '0982'),
(17, 'johan@gmail.com', '123', 'johan', '0856');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(5) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kirim` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `catatanbel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kirim`, `tarif`, `alamat`, `catatanbel`) VALUES
(24, 11, 2, '2019-09-05', 270000, 'TIKI', 20000, 'Rumah Tuk Aba', '0'),
(25, 11, 1, '2020-02-01', 210000, 'JNE', 10000, '13730', ''),
(26, 11, 1, '2020-02-01', 260000, 'JNE', 10000, 'gg manggakdwciracasJakarta Utara13730', ''),
(27, 11, 1, '2020-02-01', 410000, 'JNE', 10000, 'gg mangga kdw ciracas Jakarta Utara 13730', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `foto_produk` text NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `stok_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(10, '[Bundle] EYE OF THE STORM + T-SHIRT', 400000, 5, 'baju1.png', 'Bundle terbaru dari ONE OK ROCK\r\n\r\n- T-shirt EYE OF THE STORM\r\n- CD EYE OF THE STORM								'),
(11, '[Album] ONE OK ROCK EYE OF THE STORM CD', 250000, 2, 'dvdmusc.png', 'ONE OK ROCK full album terbaru \"Eye of the Storm\" CD						'),
(12, '[LIVE DVD] ONE OK ROCK 2018 AMBITIONS JAPAN DOME TOUR', 800000, 25, 'dvd world tour.jpg', 'DVD terbaru spesial live tour ONE OK ROCK\r\n2018 AMBITIONS JAPAN DOME TOUR\r\n-terdiri dari 2 DVD						'),
(13, '[LIVE DVD] ONE OK ROCK  with Orchestra Japan Tour 2018', 800000, 25, 'dvd orcestra.jpg', 'DVD terbaru spesial live tour ONE OK ROCK\r\nTour with Orchestra Japan Tour 2018\r\n-terdiri dari 2 DVD					'),
(14, '[Album] ONE OK ROCK Ambitions CD', 200000, 2, 'album ambition.jpg', 'ONE OK ROCK full album \"Ambitions\" CD				');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konf`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pembelian_2` (`id_pembelian`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_ongkir` (`id_ongkir`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_ongkir`) REFERENCES `ongkir` (`id_ongkir`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
