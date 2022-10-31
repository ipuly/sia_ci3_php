-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Okt 2022 pada 02.23
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi`
--

CREATE TABLE `evaluasi` (
  `id_evaluasi` int(11) NOT NULL,
  `id_krs` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `komentar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `id_matakuliah` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `tahun_ajaran` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id_krs`, `id_matakuliah`, `id_mahasiswa`, `tahun_ajaran`) VALUES
(1, 1, 2, '2022/2023'),
(2, 2, 2, '2022/2023'),
(3, 1, 17, '2022/2023'),
(4, 3, 2, '2022/2023'),
(5, 4, 2, '2022/2023'),
(6, 7, 2, '2022/2023'),
(7, 2, 17, '2022/2023'),
(8, 3, 17, '2022/2023'),
(9, 4, 17, '2022/2023'),
(10, 7, 17, '2022/2023'),
(11, 1, 22, '2022/2023'),
(12, 2, 22, '2022/2023'),
(13, 3, 22, '2022/2023'),
(14, 4, 22, '2022/2023'),
(15, 7, 22, '2022/2023'),
(16, 1, 23, '2022/2023'),
(17, 2, 23, '2022/2023'),
(18, 3, 23, '2022/2023'),
(19, 4, 23, '2022/2023'),
(20, 7, 23, '2022/2023'),
(21, 1, 24, '2022/2023'),
(22, 2, 24, '2022/2023'),
(23, 3, 24, '2022/2023'),
(24, 4, 24, '2022/2023'),
(25, 7, 24, '2022/2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id_kurikulum` int(11) NOT NULL,
  `nama_kurikulum` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kurikulum`
--

INSERT INTO `kurikulum` (`id_kurikulum`, `nama_kurikulum`) VALUES
(1, 'Coding Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matakuliah` int(11) NOT NULL,
  `id_kurikulum` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `kode_matakuliah` varchar(25) NOT NULL,
  `nama_matakuliah` varchar(50) NOT NULL,
  `semester` enum('0','1') NOT NULL COMMENT '0 = Ganjil, 1 = Genap',
  `jumlah_sks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id_matakuliah`, `id_kurikulum`, `id_dosen`, `kode_matakuliah`, `nama_matakuliah`, `semester`, `jumlah_sks`) VALUES
(1, 1, 3, 'MK001', 'Pemrograman Dasar', '1', 3),
(2, 1, 4, 'MK002', 'Infrastructure', '1', 2),
(3, 1, 19, 'MK003', 'Website', '1', 2),
(4, 1, 25, 'MK004', 'Monitoring System', '1', 3),
(7, 1, 26, 'MK005', 'Data Analysis', '1', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_krs` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `grade` enum('A','B','C','D','E') NOT NULL COMMENT 'A = 80-100, B = 70-79, C = 60 - 69, D = 50 - 59, E = <50',
  `poin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_krs`, `nilai`, `grade`, `poin`) VALUES
(4, 1, 100, 'A', 4),
(5, 3, 75, 'B', 3),
(6, 11, 60, 'C', 2),
(7, 16, 90, 'A', 4),
(8, 21, 65, 'C', 2),
(9, 2, 70, 'B', 3),
(10, 7, 80, 'A', 4),
(11, 12, 65, 'C', 2),
(12, 17, 70, 'B', 3),
(13, 22, 90, 'A', 4),
(14, 4, 75, 'B', 3),
(15, 8, 90, 'A', 4),
(17, 13, 90, 'A', 4),
(18, 18, 60, 'C', 2),
(19, 23, 85, 'A', 4),
(20, 5, 75, 'B', 3),
(21, 9, 70, 'B', 3),
(22, 14, 65, 'C', 2),
(23, 19, 90, 'A', 4),
(24, 24, 80, 'A', 4),
(25, 6, 80, 'A', 4),
(26, 10, 65, 'C', 2),
(27, 15, 70, 'B', 3),
(28, 20, 80, 'A', 4),
(29, 25, 85, 'A', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `nomor_identitas` varchar(25) DEFAULT NULL,
  `level` enum('0','1','2') NOT NULL COMMENT '0 = Admin, 1 = Mahasiswa, 2 = Dosen',
  `status` enum('0','1') NOT NULL COMMENT '0 = Aktif, 1 = Non Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `alamat`, `no_hp`, `nomor_identitas`, `level`, `status`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin@gmail.com', 'admin', 'admin', 'admin', '0', '0'),
(2, 'M001', 'M001', 'Alfi Dwi Octavian', 'alfi.dwi@gmail.com', 'Tangerang', '087567543134', 'M001', '1', '0'),
(3, 'D001', 'D001', 'Pak Ridwan', 'pakridwan@gmail.com', 'Tangerang', '081234567890', 'D001', '2', '0'),
(4, 'D002', 'D002', 'Pak Agung', 'pakagung@gmail.com', 'Tangerang', '087123456789', 'D002', '2', '0'),
(17, 'M002', 'M002', 'Hidayat Noerwahid', 'hidayat.gt@gmail.com', 'Tangerang', '081234432767', 'M002', '1', '0'),
(19, 'D003', 'D003', 'Pak Kurniawan', 'pakkurniawan@gmail.com', 'Tangerang', '089123456765', 'D003', '2', '0'),
(22, 'M003', 'M003', 'Ibnu Saifullah', 'ibnu.stnc@gmail.com', 'Lampung', '085658754331', 'M003', '1', '0'),
(23, 'M004', 'M004', 'Mochammad Iqbal Rizqulloh', 'iqbal.bks@gmail.com', 'Bekasi', '089768452451', 'M004', '1', '0'),
(24, 'M005', 'M005', 'Muhammad Syaifullah Fajri', 'ipulyipuly@gmail.com', 'Magelang', '085799160744', 'M005', '1', '0'),
(25, 'D004', 'D004', 'Pak Yusuf', 'pakyusuf@gmail.com', 'Tangerang', '085678123543', 'D004', '2', '0'),
(26, 'D005', 'D005', 'Pak Herman', 'pakherman@gmail.com', 'Tangerang', '081456432765', 'D005', '2', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`id_evaluasi`),
  ADD KEY `evaluasi_ibfk_1` (`id_krs`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_matakuliah` (`id_matakuliah`);

--
-- Indeks untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`),
  ADD KEY `id_kurikulum` (`id_kurikulum`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_krs` (`id_krs`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id_evaluasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id_kurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD CONSTRAINT `evaluasi_ibfk_1` FOREIGN KEY (`id_krs`) REFERENCES `krs` (`id_krs`);

--
-- Ketidakleluasaan untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `krs_ibfk_3` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id_matakuliah`);

--
-- Ketidakleluasaan untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`id_kurikulum`) REFERENCES `kurikulum` (`id_kurikulum`),
  ADD CONSTRAINT `matakuliah_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_krs`) REFERENCES `krs` (`id_krs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
