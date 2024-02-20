-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2022 pada 04.41
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_login` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `role` varchar(225) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_login`, `username`, `password`, `nama_pengguna`, `role`, `telepon`, `email`, `alamat`, `gambar`) VALUES
(1, 'Admin1', '202cb962ac59075b964b07152d234b70', 'M Faizal Ardiansyah', 'Admin', '081298669897', 'faizalardi@admin.com.id', 'Bojonggede, Bogor', 'avatar6.png'),
(2, 'admin2', '202cb962ac59075b964b07152d234b70', 'Rizky Amoerta Ramdhani', 'Admin', '081235673478', 'amoertaram@admin.com.id', 'Cempaka Putih, Jakarta Timur', 'avatar4.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `no_id` varchar(8) NOT NULL,
  `jenis_id` varchar(8) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(10) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `jk` enum('Laki - Laki','Perempuan') NOT NULL,
  `gambar` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `no_id`, `jenis_id`, `fname`, `tgl_lahir`, `alamat`, `no_tlp`, `pekerjaan`, `jk`, `gambar`) VALUES
(2, '20221001', 'Member', 'Michael Zakayev ', '2000-02-29', 'Green Street No . 78', '0812090223', 'Software Engineering', 'Laki - Laki', 'avatar23.png'),
(3, '20221002', 'Member', 'Nicole Dormer', '1992-02-23', 'Green Street No. 21', '0812923829', 'Multimedia', 'Perempuan', 'avatar10.jpg'),
(4, '20221003', 'Member', 'Isaac Al-Ghaevi', '1991-07-18', 'Green Street No. 30', '0890438403', 'TFLM', 'Laki - Laki', 'avatar17.png'),
(5, '20221004', 'Member', 'Aisha Nur Shabia', '1994-09-27', 'Green Garden No. 17', '0821424323', 'Accountancy', 'Perempuan', 'avatar15.jpg'),
(6, '20221005', 'Member', 'Savannah Demer', '1998-03-25', 'Groove Manger No. 2', '0858172372', 'SIJA', 'Perempuan', 'avatar12.jpg'),
(7, '20221006', 'Member', 'Emilia Silberg', '1998-04-12', 'Green Street No. 53', '0812922803', 'TFLM', 'Perempuan', 'avatar19.png'),
(8, '20221007', 'Member', 'Michael Scofield', '1978-09-08', 'Toledo No. 12', '0812233043', 'Engineering', 'Laki - Laki', 'avatar25.png'),
(9, '20221007', 'Member', 'Christian Mansana', '2001-06-07', 'Gandaria CIty No. 12', '0812902323', 'TKJ', 'Laki - Laki', 'avatar5.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `no_pustaka` varchar(8) NOT NULL,
  `no_id` varchar(8) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_tempo` date NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `no_pustaka`, `no_id`, `tgl_pinjam`, `tgl_tempo`, `status`) VALUES
(1, '20220006', '20221000', '2021-12-02', '2022-03-03', ''),
(3, '20220008', '20221001', '2022-02-12', '2022-03-01', ''),
(4, '20220007', '20221003', '2022-03-01', '2022-03-04', ''),
(5, '20220002', '20221004', '2022-03-02', '2022-03-06', ''),
(6, '20220004', '20221007', '2022-03-02', '2022-03-10', ''),
(11, '20220009', '20221005', '2022-02-23', '2022-03-06', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` int(11) NOT NULL,
  `id_pinjam` varchar(5) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_kembali`, `id_pinjam`, `tgl_kembali`, `denda`) VALUES
(1, '4', '2022-03-04', 0),
(2, '5', '2022-03-04', 0),
(5, '1', '2022-03-04', 2000),
(6, '3', '2022-03-04', 6000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblbuku`
--

CREATE TABLE `tblbuku` (
  `id_buku` int(11) NOT NULL,
  `no_pustaka` varchar(8) NOT NULL,
  `no_rak` varchar(8) NOT NULL,
  `judulBuku` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `thn_terbit` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `stok` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblbuku`
--

INSERT INTO `tblbuku` (`id_buku`, `no_pustaka`, `no_rak`, `judulBuku`, `kategori`, `author`, `penerbit`, `thn_terbit`, `tgl_masuk`, `stok`, `gambar`) VALUES
(1, '20220001', '01', 'Percy Jackson', 'Novel', 'Rick Riordan', 'Hyperion Books', '2005-07-01', '2022-02-24', '19', 'percy.jpg'),
(2, '20220002', '01', 'The Lord Of The Rings', 'Novel', 'J R. R. Tolkien', 'Allen & Unwin', '1954-07-29', '2022-03-01', '27', 'the-lord-of-the-rings.jpg'),
(3, '20220003', '01', 'The Man In The High Castle', 'Novel', 'Philip K. Dick', 'Putnam', '1962-10-28', '2022-03-02', '12', 'man2.jpg'),
(4, '20220004', '02', 'Kimetsu No Yaiba', 'Manga', 'Koyoharu Gotoge', 'Shueisha', '2016-02-15', '2020-06-09', '58', 'kny.jpg'),
(5, '20220005', '02', 'Attack On Titan', 'Manga', 'Hajime Isayama', 'Kodansha', '2009-08-09', '2022-01-03', '76', 'aot.jpg'),
(6, '20220006', '02', 'Jujutsu Kaisen', 'Manga', 'Gege Akutami', 'Shueisha', '2018-03-05', '2022-03-02', '47', 'jjs.png'),
(7, '20220007', '03', 'Alex Ferguson', 'Biography', 'Sir Alex Ferguson', 'Hodder & Stoughton', '2013-10-30', '2022-02-15', '34', 'saf.jpg'),
(9, '20220008', '04', 'PHP & Mysql Prorgram', 'Computers & Tech', 'Martin Kuschev', 'Websoon', '2011-12-20', '2021-03-02', '24', 'php.jpg'),
(10, '20220009', '05', 'Filosofi Teras', 'Philosophy & Psychology', 'Henry Manampiring', 'Kompas', '2018-11-26', '2020-10-20', '31', 'teras.png'),
(11, '20220010', '06', 'Band Of Brothers', 'History', 'Stephen E. Ambrose', 'Simon & Schuster', '1992-06-06', '2021-12-23', '11', 'bob.jpg'),
(12, '20220011', '02', 'Solo Leveling', 'Manga', 'Chugong', 'D&C Media', '2018-03-04', '2022-02-21', '23', 'solo.png'),
(13, '20220012', '07', 'Murder On The Orient Express ', 'Literature', 'Agatha Christie', 'Collins Crime Club', '1934-01-01', '2021-09-21', '18', 'murder.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD UNIQUE KEY `no_pustaka` (`no_pustaka`),
  ADD UNIQUE KEY `no_id` (`no_id`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`),
  ADD UNIQUE KEY `id_pinjam` (`id_pinjam`);

--
-- Indeks untuk tabel `tblbuku`
--
ALTER TABLE `tblbuku`
  ADD PRIMARY KEY (`id_buku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tblbuku`
--
ALTER TABLE `tblbuku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
