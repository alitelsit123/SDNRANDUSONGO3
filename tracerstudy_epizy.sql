-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2022 pada 10.26
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracerstudy_epizy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` char(100) NOT NULL,
  `id_login` int(11) DEFAULT NULL,
  `nama_alumni` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` char(10) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tlp` varchar(20) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_lulus` date DEFAULT NULL,
  `smp` varchar(100) DEFAULT NULL,
  `sma_smk` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `id_login`, `nama_alumni`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `tlp`, `tgl_masuk`, `tgl_lulus`, `smp`, `sma_smk`, `pekerjaan`) VALUES
('0012341', 7, 'coba', '2022-01-18', 'Pria', 'cob', '01892312', '2022-01-18', '2022-01-18', 'coba', 'coba', 'coba'),
('A001', 2, 'Wiwik handayani', '1990-11-20', 'Wanita', 'Dsn.pencol 1 rt:04 rw:03 ds.randusongo kec.gerih kab.ngawi', '082230861477', '1998-06-01', '2004-06-01', 'Smpn 1 karas', '_', 'pengusaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_post`
--

CREATE TABLE `blog_post` (
  `id_post` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `picture_post` varchar(185) NOT NULL,
  `date_post` date NOT NULL,
  `text_post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `blog_post`
--

INSERT INTO `blog_post` (`id_post`, `title`, `picture_post`, `date_post`, `text_post`) VALUES
(27, 'Lomba Juara 3', 'foto_konten_20211230205055.jpeg', '2021-12-31', '&lt;p&gt;Juara 3 lomba Puisi&lt;/p&gt;'),
(28, 'KEGIATAN OUTBOUND', 'foto_konten_20211230205303.jpeg', '2021-12-30', 'Kegiatan Outbound Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_kami`
--

CREATE TABLE `kontak_kami` (
  `id_kontak` int(11) NOT NULL,
  `alamat` varchar(125) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `instagram` varchar(55) DEFAULT NULL,
  `youtube` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak_kami`
--

INSERT INTO `kontak_kami` (`id_kontak`, `alamat`, `telp`, `email`, `instagram`, `youtube`) VALUES
(1, 'Ds. Randusongo, Kecamatan Gerih, Kabupaten Ngawi, Jawa Timur 63272', '+62 813-3509-1847', 'sdn.randusongo3@gmail.com', 'https://www.instagram.com/coba', 'https://www.youtube.com/c/WebProgrammingUNPAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_kritiksaran` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `text_kritiksaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kritik_saran`
--

INSERT INTO `kritik_saran` (`id_kritiksaran`, `email`, `text_kritiksaran`) VALUES
(3, 'ujicoba@coba.com', 'akiu mau kasi kriti dan saran'),
(5, 'kritik@gmail.com', 'ini kritik dari saya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` char(10) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` enum('admin','alumni') DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `aktif` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `email`, `username`, `password`, `type`, `token`, `aktif`) VALUES
(1, '', 'viyak', 'viyak13', 'admin', '', '1'),
(2, '', 'wiwik', 'alumni2004', 'alumni', '', '1'),
(3, '', 'aaaa', 'aaaaaa', 'alumni', '', '1'),
(8, 'cobalagi@coba.com', 'cobalagi', 'cobalagi', 'alumni', '', '1'),
(9, 'rief', 'rief', '123456', 'alumni', '', '1'),
(10, 'rief', 'rief', '123456', 'alumni', '', '1'),
(11, 'rief', 'rief', '123456', 'alumni', '', '1'),
(12, 'rief', 'rief', '123456', 'alumni', '', '1'),
(13, 'rief', 'rief', '', 'alumni', '', '1'),
(39, 'rief@gmail.com', 'aku', 'admin123', 'alumni', 'b116239ff30f34060582a757d860d6911531e6a8c321f53cdb99612ee2653e6b', '0'),
(40, 'coba@gmail.com', 'cobadong', 'admin123', 'alumni', '1ceefeafff001caad896ed1862f5c166523f6155bcf24d7a9dc3b34e2bd8a51c', '1'),
(50, 'oktaviaprismatura@gmail.com', 'via', '123', 'alumni', '8ccead3f1a702385159ca5e9aff8fdeff49107a3be328d3ffcdb7915c5e1fbd0', '0'),
(51, 'gilaarief@gmail.com', 'rief', '123', 'alumni', '12c6cd725613a3785652304d3f5077d637c60ed89f15ecbdc5015a08344ca79c', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengantar_kepsek`
--

CREATE TABLE `pengantar_kepsek` (
  `id_pengantar` int(11) NOT NULL,
  `deskripsi_pengantar` text DEFAULT NULL,
  `gambar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengantar_kepsek`
--

INSERT INTO `pengantar_kepsek` (`id_pengantar`, `deskripsi_pengantar`, `gambar`) VALUES
(1, '&lt;div&gt;Assalamu\'alaikum wr.wb.&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Puji syukur kepada Alloh SWT, Tuhan Yang Maha Esa yang telah memberikan rahmat dan anugerahNya sehingga website SDN Randusongo 3 ini dapat terbit. Salah satu tujuan dari website ini adalah untuk menjawab akan setiap kebutuhan informasi dengan memanfaatkan sarana teknologi informasi yang ada. Kami sadar sepenuhnya dalam rangka memajukan pendidikan di era berkembangnya Teknologi Informasi yang begitu pesat, sangat diperlukan berbagai sarana prasarana yang kondusif, kebutuhan berbagai informasi siswa, guru, orangtua, alumni maupun masyarakat, sehingga kami berusaha mewujudkan hal tersebut semaksimal mungkin. Semoga dengan adanya website ini dapat membantu dan bermanfaat, terutama informasi yang berhubungan dengan pendidikan, ilmu pengetahuan dan informasi seputar SDN Randusongo 3.&lt;/div&gt;&lt;div&gt;Besar harapan kami, sarana ini dapat memberi manfaat bagi semua pihak yang ada dilingkup pendidikan dan pemerhati pendidikan secara khusus bagi SDN Randusongo 3.&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Akhirnya kami mengharapkan masukan dari berbagai pihak untuk website ini agar kami terus belajar dan meng-update diri, sehingga tampilan, isi dan mutu website akan terus berkembang dan lebih baik nantinya. Terima kasih atas kerjasamanya, maju terus untuk mencapai SDN Randusongo 3 yang lebih baik lagi.&lt;/div&gt;&lt;div&gt;Wassalamu\'alaikum wr.wb.&lt;/div&gt;', 'foto_kepsek_20211219023819.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `picture_profil` varchar(185) NOT NULL DEFAULT '',
  `desc_profil` text NOT NULL,
  `location` varchar(185) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `picture_profil`, `desc_profil`, `location`) VALUES
(1, 'foto_profil_20211223005410.jpg', '&lt;p style=&quot;text-align: justify; &quot;&gt;&lt;span style=&quot;font-family: &quot; times=&quot;&quot; new=&quot;&quot; roman&quot;,=&quot;&quot; &quot;serif&quot;;=&quot;&quot; font-size:=&quot;&quot; 16px;&quot;=&quot;&quot;&gt;SDN Randusongo 3 merupakan salah satu sekolah dasar yang sudah mendapatkan akreditasi B, yang terletak di Jl. Raya Kendal - Geneng KM 15, Dsn. Pencol, Ds. Randusongo, Kode Pos 63272.&amp;nbsp;&lt;/span&gt;&lt;span lang=&quot;EN-ID&quot; style=&quot;font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%;font-family:&quot; times=&quot;&quot; new=&quot;&quot; roman&quot;,&quot;serif&quot;;mso-fareast-font-family:=&quot;&quot; calibri;mso-fareast-theme-font:minor-latin;mso-bidi-theme-font:minor-bidi;=&quot;&quot; mso-ansi-language:en-id;mso-fareast-language:en-us;mso-bidi-language:ar-sa&quot;=&quot;&quot;&gt;SDN\r\nRandusongo 3 Ngawi didirikan pada tanggal 1 April 1982 dibawah naungan\r\nkementrian pendidikan dan kebudayaan. Surat keputusan pendirian tercantum pada\r\nINPRES NO 4 TH 1982/1983. SDN Randusongo 3 telah lama memulai aktivitas\r\npembelajaran dan telah memiliki nomor pokok sekolah nasional, namun surat keterangan\r\nijin operasionalnya baru keluar pada tanggal 15 Mei 2017. Surat ijin\r\noperasional tercantum pada surat keterangan operasional yang dikeluarkan oleh\r\npemerintah dengan nomor 420/67/404.101/2017.&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;span lang=&quot;EN-ID&quot; style=&quot;font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%;font-family:&quot; times=&quot;&quot; new=&quot;&quot; roman&quot;,&quot;serif&quot;;mso-fareast-font-family:=&quot;&quot; calibri;mso-fareast-theme-font:minor-latin;mso-bidi-theme-font:minor-bidi;=&quot;&quot; mso-ansi-language:en-id;mso-fareast-language:en-us;mso-bidi-language:ar-sa&quot;=&quot;&quot;&gt;&lt;span lang=&quot;EN-ID&quot; style=&quot;font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%;font-family:&quot; times=&quot;&quot; new=&quot;&quot; roman&quot;,&quot;serif&quot;;mso-fareast-font-family:=&quot;&quot; calibri;mso-fareast-theme-font:minor-latin;mso-bidi-theme-font:minor-bidi;=&quot;&quot; mso-ansi-language:en-id;mso-fareast-language:en-us;mso-bidi-language:ar-sa&quot;=&quot;&quot;&gt;Kurikulum\r\nyang diterapkan pada kegiatan pembelajaran di SDN Randusongo 3 sudah mengikuti\r\nalur pembelajaran yang berlaku secara umum yang telah diterapkan di sekolah\r\nlainnya yaitu kurikulum 2013. Akreditasi SDN Randusongo 3 sudah cukup baik\r\ndengan mendapatkan predikat B yang tercantum pada surat keterangan akreditasi\r\nnomor 164/BAP-S/M/SK/XI/2017.&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;span lang=&quot;EN-ID&quot; style=&quot;font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%;font-family:&quot; times=&quot;&quot; new=&quot;&quot; roman&quot;,&quot;serif&quot;;mso-fareast-font-family:=&quot;&quot; calibri;mso-fareast-theme-font:minor-latin;mso-bidi-theme-font:minor-bidi;=&quot;&quot; mso-ansi-language:en-id;mso-fareast-language:en-us;mso-bidi-language:ar-sa&quot;=&quot;&quot;&gt;&lt;span lang=&quot;EN-ID&quot; style=&quot;font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%;font-family:&quot; times=&quot;&quot; new=&quot;&quot; roman&quot;,&quot;serif&quot;;mso-fareast-font-family:=&quot;&quot; calibri;mso-fareast-theme-font:minor-latin;mso-bidi-theme-font:minor-bidi;=&quot;&quot; mso-ansi-language:en-id;mso-fareast-language:en-us;mso-bidi-language:ar-sa&quot;=&quot;&quot;&gt;Kepala\r\nsekolah SDN Randusongo 3 sekarang ini dijabat oleh Ibu Lilik Rohmawati, M.Pd.\r\nJabatan menjadi kepala sekolah SDN Randusongo 3 tersebut diberikan sejak\r\nturunnya surat keputusan di bulan Oktober 2021, sehingga sejak bulan Oktober\r\n2021 Ibu Lilik Rohmawati, M.Pd telah menjabat sebagai kepala sekolah\r\nmenggantikan Bapak Mulyono S.Pd yang sebelumnya menjabat menjadi kepala sekolah\r\ndi SDN Randusongo 3 sejak tahun 2017-2021.&lt;/span&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;', 'https://goo.gl/maps/GZ6e9Lud7pQdSM5C7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reset_password`
--

INSERT INTO `reset_password` (`id`, `email`, `code`) VALUES
(0, 'gilaarief@gmail.com', '161ed1ecc409d3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id_visimisi` int(11) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `visi_misi`
--

INSERT INTO `visi_misi` (`id_visimisi`, `visi`, `misi`) VALUES
(1, '&lt;p style=&quot;text-align: center; &quot;&gt;&lt;b&gt;MEWUJUDKAN INSAN TERDIDIK, TERAMPIL, DAN BERWAWASAN LINGKUNHAN BERDASARKAN IMAN &amp;amp; TAQWA&lt;/b&gt;&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;&lt;b&gt;1. Melaksanakan Proses Pembelajaran yang berkualitas&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;2. Menumbuhkan Akhlaq yang mulia&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;3. Mengikuti dan menerima arus informasi global dengan berlandaskan Iman &amp;amp; Taqwa&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;4. Menerapkan budaya bersih&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;5. Menciptakan suasana lingkungan yang bersih, sehat, aman sehingga menghasilkan suasana belajar yanb kondusif&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;6. Menumbuhkan semangat kedisiplinan bagi seluruh warga sekolah&lt;/b&gt;&lt;/p&gt;');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indeks untuk tabel `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indeks untuk tabel `kontak_kami`
--
ALTER TABLE `kontak_kami`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_kritiksaran`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `pengantar_kepsek`
--
ALTER TABLE `pengantar_kepsek`
  ADD PRIMARY KEY (`id_pengantar`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id_visimisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `kontak_kami`
--
ALTER TABLE `kontak_kami`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_kritiksaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `pengantar_kepsek`
--
ALTER TABLE `pengantar_kepsek`
  MODIFY `id_pengantar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id_visimisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
