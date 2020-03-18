-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Mar 2020 pada 15.55
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hakcipta_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` varchar(15) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `role_id` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `token`, `role_id`, `created_at`, `updated_at`) VALUES
('ADM000000000001', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'd93591bdf7860e1e4ee2fca799911215', 1, '2020-03-18 13:42:00', NULL),
('ADM000000000002', 'staff', 'staff', '1253208465b1efa876f982d8a9e73eef', 'bee3d07327a21d8e7f02e10ba4b35c15', 2, '2020-03-18 13:44:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_cipta`
--

CREATE TABLE `hak_cipta` (
  `id` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_jenis` varchar(15) NOT NULL,
  `judul` varchar(120) NOT NULL,
  `uraian` tinytext NOT NULL,
  `nama_pencipta` varchar(60) NOT NULL,
  `kewarganegaraan` varchar(75) NOT NULL,
  `alamat_pencipta` tinytext NOT NULL,
  `npwp` varchar(40) DEFAULT NULL,
  `ktp` varchar(40) DEFAULT NULL,
  `npwp_prs` varchar(40) DEFAULT NULL,
  `akta_prs` varchar(40) DEFAULT NULL,
  `surat_kuasa` varchar(40) DEFAULT NULL,
  `surat_pernyataan` varchar(40) DEFAULT NULL,
  `surat_hak_pengalihan` varchar(40) DEFAULT NULL,
  `file_ciptaan` varchar(40) DEFAULT NULL,
  `status_trs` varchar(30) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `approved_by` datetime DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hak_cipta`
--

INSERT INTO `hak_cipta` (`id`, `id_user`, `id_jenis`, `judul`, `uraian`, `nama_pencipta`, `kewarganegaraan`, `alamat_pencipta`, `npwp`, `ktp`, `npwp_prs`, `akta_prs`, `surat_kuasa`, `surat_pernyataan`, `surat_hak_pengalihan`, `file_ciptaan`, `status_trs`, `created_at`, `updated_at`, `approved_by`, `approved_at`) VALUES
('HCT000000000001', 'USR000000000001', 'KRY000000000003', 'Photo Exjac', 'Photo Exjac adalah sebuah teknik fotografi yang memanfaatkan benda mikro sebagai objek', 'Exjac de Jong', 'Indonesia', 'Jl. Cempaka Putih nomor 77 Kaliurang, Jawa Tengah', '4a2fd424a308596cefdf835e9cb8ea39.jpg', 'fef97e8f8b64ac97f1b7a57d4a52b18b.pdf', '21eceb7d1414fe784fa182ffa0e88488.jpg', NULL, NULL, NULL, NULL, NULL, 'DALAM PROSES', '2020-03-13 17:06:28', '2020-03-18 21:29:10', NULL, NULL),
('HCT000000000002', 'USR000000000001', 'KRY000000000002', 'PeTakon (Percetakan Online)', 'PeTakon adalah aplikasi yang dapet membantu anda untuk melakukan transaksi percetakan secara online dan tanpa susah payah uwuuu', 'Isaac Newton', 'Indonesia', 'Jl. Himawari, no 12 selatan masjid, Glenmor, Banyuwangi', '1.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DALAM PROSES', '2020-03-16 07:14:24', '2020-03-18 21:31:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_karya`
--

CREATE TABLE `jenis_karya` (
  `id` varchar(15) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `keterangan` tinytext NOT NULL,
  `contoh_file` tinytext NOT NULL,
  `format_file` tinytext NOT NULL,
  `created_by` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_karya`
--

INSERT INTO `jenis_karya` (`id`, `nama`, `keterangan`, `contoh_file`, `format_file`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('KRY000000000001', 'Buku', 'Buku adalah kumpulan kertas atau bahan lainnya yang dijilid menjadi satu pada salah satu ujungnya dan berisi tulisan, gambar, atau tempelan.', 'Cover Buku, Daftar Isi dan Daftar Pustaka (referensi)', 'pdf, zip', NULL, NULL, '0000-00-00 00:00:00', '2020-03-18 16:48:27'),
('KRY000000000002', 'Program Komputer', 'Program komputer atau sering kali disingkat sebagai program adalah serangkaian instruksi yang ditulis untuk melakukan suatu fungsi spesifik pada komputer.', 'Cover, Program dan Manual Book Penggunaan Program', 'pdf/zip', '0000-00-00 00:00:00', '2020-03-11 14:20:15', '0000-00-00 00:00:00', '2020-03-18 16:58:59'),
('KRY000000000003', 'Fotografi', 'Fotografi (dari bahasa Inggris: photography, yang berasal dari kata Yunani yaitu \"photos\": cahaya dan \"grafo\": melukis/menulis) adalah proses melukis/menulis dengan menggunakan media cahaya.', 'Foto/Gambar', 'jpg/pdf', '0000-00-00 00:00:00', '2020-03-18 17:03:23', NULL, NULL),
('KRY000000000004', 'Lagu atau musik dengan atau tanpa teks', 'Lagu merupakan gubahan seni nada atau suara dalam urutan, kombinasi, dan hubungan temporal (biasanya diiringi dengan alat musik) untuk menghasilkan gubahan musik yang mempunyai kesatuan dan kesinambungan (mengandung irama). ', 'Rekaman/Partitur(notasi angka/notasi balok)', 'zip/pdf', '0000-00-00 00:00:00', '2020-03-18 17:05:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(15) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(75) NOT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `alamat` tinytext,
  `avatar` varchar(40) DEFAULT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `phone`, `jk`, `alamat`, `avatar`, `username`, `password`, `token`, `status`, `created_at`, `updated_at`, `email_verified_at`) VALUES
('USR000000000001', 'Primasdika Yunia Putra', 'dickayunia1@gmail.com', '083847008485', 'LAKI LAKI', 'Jl. Maesan - Bondowoso', 'no_profil.jpg', 'prmsdk', 'cfbd0bd15c81301cbabe30143fd80b1a', 'f18224a1adfb7b3dbff668c9b655a35a', 0, '2020-03-13 06:19:34', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hak_cipta`
--
ALTER TABLE `hak_cipta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_JENIS` (`id_jenis`),
  ADD KEY `FK_USER` (`id_user`);

--
-- Indeks untuk tabel `jenis_karya`
--
ALTER TABLE `jenis_karya`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hak_cipta`
--
ALTER TABLE `hak_cipta`
  ADD CONSTRAINT `FK_JENIS` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_karya` (`id`),
  ADD CONSTRAINT `FK_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
