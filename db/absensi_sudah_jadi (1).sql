-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2022 pada 05.41
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_sudah_jadi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id_absen` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id_absen`, `id_siswa`, `keterangan`, `tanggal`) VALUES
(42, 26, 'Alfa', '2022-11-28'),
(43, 8, 'Sakit', '2022-11-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nama`, `email`, `alamat`, `no_telp`) VALUES
(8, 'Adi Putra', 'putra@gmail.com', 'Grand venexia', '0812100621213'),
(9, 'Adi saputra', 'adisaput@gmail.com', 'Griya bukit jaya', '0812100062727'),
(10, 'Agam ', 'agam@gmail.com', 'Gandoang', '0812100063535'),
(11, 'Albert', 'albert@gmail.com', 'Jonggol', '081210062929'),
(12, 'Alendra', 'alendra@gmail.com', 'Harvest', '0812100053939'),
(13, 'Alvin', 'alvin@gmail.com', 'Cibubur', '0812100083183'),
(14, 'Amelia', 'amelia@gmail.com', 'Mampir', '08219191914433'),
(15, 'Andini', 'andini@gmail.com', 'Pasir angin', '087151361711333'),
(16, 'angger', 'anger1@gmail.com', 'Grand kahuripan', '0831828282144'),
(18, 'Aufa', 'aufa111@gmail.com', 'Griya Bukit Jaya', '0812100062321'),
(19, 'Bryant', 'hitamthe@gmail.com', 'Puri Harmoni', '0812100063333'),
(20, 'Daffa', 'davaa@gmail.com', 'Kota Wisata', '0812100062222'),
(23, 'Dstuty', 'tuti99@gmail.com', 'Grand Kahuripan', '0812100232727'),
(24, 'Dimas', 'masboy6@gmail.com', 'Grand Kahuripan', '0812100064444'),
(25, 'Doni', 'donichan@gmail.com', 'Puri Cileungsi', '0812100072727'),
(26, 'Fardan', 'Fardangans@gmail.com', 'Mekarsari', '08121000611111'),
(27, 'Farid', 'rideee@gmail.com', 'Grand Venezia', '08121000611222'),
(28, 'Fauzan', 'zan99@gmail.com', 'Grand Semesta', '081210006666'),
(29, 'Fina', 'nana@gmail.com', 'Pasir Angin', '081210008888'),
(30, 'Firenze', 'higasantes@gmail.com', 'Grand Venezia', '0812144463535'),
(31, 'Haikal', 'kalaazzz@gmail.com', 'Grand Kahuripan', '081210009999'),
(32, 'Hersa', 'sasa@gmail.com', 'Mekarsari Permai', '0812100636363'),
(33, 'Jonathan', 'Nathan19@gmail.com', 'Grand Nusa Indah', '081210006555'),
(34, 'Leny', 'nur1@gmail.com', 'Permata Cibubur', '0812100062444'),
(35, 'Meida', 'ida3@gmail.com', 'Harvest City', '081210065555'),
(36, 'Mirza', 'vanila@gmail.com', 'Harvest City', '081210066666'),
(37, 'M suratman', 'maman@gmail.com', 'Grand Lezy', '0812100048484'),
(38, 'M Fathan', 'tatan@gmail.com', 'Citra Indah', '0812100062244'),
(39, 'M Refansa', 'fan66@gmail.com', 'Refan@gmail.com', '0812100066699'),
(40, 'Oni', 'onichan@gmail.com', 'Kota Wisata', '0812100022333'),
(41, 'Raflie', 'fifie@gmail.com', 'Citra Indah', '0812100076767'),
(42, 'Raihan', 'ehanwew@gmail.com', 'Cileungsi Indah', '081210033333'),
(43, 'Raju', 'jujubombom@gmail.com', 'Klapanunggal', '083428274724'),
(44, 'Rakhmawati', 'waiti@gmail.com', 'Pangkalan 9', '081210002288'),
(45, 'Fathan', 'fathan@gmail.com', 'Citra Indah', '08476437643');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD CONSTRAINT `tbl_absensi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
