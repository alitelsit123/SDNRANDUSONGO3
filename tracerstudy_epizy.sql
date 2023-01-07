-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 08:35 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nama_siswa` text NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `alpha` int(11) NOT NULL,
  `tahun` text NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nama_siswa`, `sakit`, `izin`, `alpha`, `tahun`, `semester`) VALUES
(2, 'NAYSILA CHINTYA AYUDEWI', 0, 1, 0, '2021/2022', 1),
(3, 'NAYSILA CHINTYA AYUDEWI', 0, 0, 0, '2021/2022', 2);

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
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
  `pekerjaan` varchar(100) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `agama` text DEFAULT NULL,
  `kewarganegaraan` text DEFAULT NULL,
  `anak_keberapa` int(11) DEFAULT NULL,
  `jml_saudara_kandung` int(11) DEFAULT NULL,
  `jml_saudara_tiri` int(11) DEFAULT NULL,
  `jml_saudara_angkat` int(11) DEFAULT NULL,
  `type_anak` text DEFAULT NULL,
  `bahasa` text DEFAULT NULL,
  `tinggal_dengan` text DEFAULT NULL,
  `jarak` text DEFAULT NULL,
  `golongan_darah` text DEFAULT NULL,
  `penyakit_diderita` text DEFAULT NULL,
  `kelainan_jasmani` text DEFAULT NULL,
  `tb_bb` text DEFAULT NULL,
  `tamatan_dari` text DEFAULT NULL,
  `tamatan_tanggal_no_ijazah` text DEFAULT NULL,
  `tamatan_tanggal_no_skhun` text DEFAULT NULL,
  `tamatan_lama_belajar` text DEFAULT NULL,
  `pindahan_dari` text DEFAULT NULL,
  `pindahan_alasan` text DEFAULT NULL,
  `diterima_tingkat` text DEFAULT NULL,
  `diterima_bidang` text DEFAULT NULL,
  `diterima_program` text DEFAULT NULL,
  `diterima_tanggal` text DEFAULT NULL,
  `ayah_nama` text DEFAULT NULL,
  `ayah_tanggal_lahir` text DEFAULT NULL,
  `ayah_agama` text DEFAULT NULL,
  `ayah_kewarganegaraan` text DEFAULT NULL,
  `ayah_pendidikan` text DEFAULT NULL,
  `ayah_pekerjaan` text DEFAULT NULL,
  `ayah_pengeluaran` text DEFAULT NULL,
  `ayah_alamat` text DEFAULT NULL,
  `ayah_hidup` text DEFAULT NULL,
  `ibu_nama` text DEFAULT NULL,
  `ibu_tanggal_lahir` text DEFAULT NULL,
  `ibu_agama` text DEFAULT NULL,
  `ibu_kewarganegaraan` text DEFAULT NULL,
  `ibu_pendidikan` text DEFAULT NULL,
  `ibu_pekerjaan` text DEFAULT NULL,
  `ibu_pengeluaran` text DEFAULT NULL,
  `ibu_alamat` text DEFAULT NULL,
  `ibu_hidup` text DEFAULT NULL,
  `wali_nama` text DEFAULT NULL,
  `wali_tanggal_lahir` text DEFAULT NULL,
  `wali_agama` text DEFAULT NULL,
  `wali_kewarganegaraan` text DEFAULT NULL,
  `wali_pendidikan` text DEFAULT NULL,
  `wali_pekerjaan` text DEFAULT NULL,
  `wali_pengeluaran` text DEFAULT NULL,
  `wali_alamat` text DEFAULT NULL,
  `kegemaran` text DEFAULT NULL,
  `beasiswa` text DEFAULT NULL,
  `meninggalkan_tanggal` text DEFAULT NULL,
  `meninggalkan_alasan` text DEFAULT NULL,
  `akhir_tanggal` text DEFAULT NULL,
  `akhir_ijazah` text DEFAULT NULL,
  `akhir_nomor_surat` text DEFAULT NULL,
  `akhir_nilai_ratarata` text DEFAULT NULL,
  `nisn` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `id_login`, `nama_alumni`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `tlp`, `tgl_masuk`, `tgl_lulus`, `smp`, `sma_smk`, `pekerjaan`, `foto`, `agama`, `kewarganegaraan`, `anak_keberapa`, `jml_saudara_kandung`, `jml_saudara_tiri`, `jml_saudara_angkat`, `type_anak`, `bahasa`, `tinggal_dengan`, `jarak`, `golongan_darah`, `penyakit_diderita`, `kelainan_jasmani`, `tb_bb`, `tamatan_dari`, `tamatan_tanggal_no_ijazah`, `tamatan_tanggal_no_skhun`, `tamatan_lama_belajar`, `pindahan_dari`, `pindahan_alasan`, `diterima_tingkat`, `diterima_bidang`, `diterima_program`, `diterima_tanggal`, `ayah_nama`, `ayah_tanggal_lahir`, `ayah_agama`, `ayah_kewarganegaraan`, `ayah_pendidikan`, `ayah_pekerjaan`, `ayah_pengeluaran`, `ayah_alamat`, `ayah_hidup`, `ibu_nama`, `ibu_tanggal_lahir`, `ibu_agama`, `ibu_kewarganegaraan`, `ibu_pendidikan`, `ibu_pekerjaan`, `ibu_pengeluaran`, `ibu_alamat`, `ibu_hidup`, `wali_nama`, `wali_tanggal_lahir`, `wali_agama`, `wali_kewarganegaraan`, `wali_pendidikan`, `wali_pekerjaan`, `wali_pengeluaran`, `wali_alamat`, `kegemaran`, `beasiswa`, `meninggalkan_tanggal`, `meninggalkan_alasan`, `akhir_tanggal`, `akhir_ijazah`, `akhir_nomor_surat`, `akhir_nilai_ratarata`, `nisn`) VALUES
('12048', 1, 'NAYSILA CHINTYA AYUDEWI', '2008-10-02', 'Wanita', 'JL. Durent RT06 rw 01', '', '0000-00-00', '0000-00-00', '', '', '', '', 'islam', 'Indonesia', 1, 2, 0, 0, '', '', '', '', '', '', '', '', 'SDN Gulun 1', '25 Juli 2021', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0084578500');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id_post` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `picture_post` varchar(185) NOT NULL,
  `date_post` date NOT NULL,
  `text_post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id_post`, `title`, `picture_post`, `date_post`, `text_post`) VALUES
(27, 'Lomba Juara 3', 'foto_konten_20211230205055.jpeg', '2021-12-31', '&lt;p&gt;Juara 3 lomba Puisi&lt;/p&gt;'),
(28, 'KEGIATAN OUTBOUND', 'foto_konten_20211230205303.jpeg', '2021-12-30', 'Kegiatan Outbound Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12');

-- --------------------------------------------------------

--
-- Table structure for table `kontak_kami`
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
-- Dumping data for table `kontak_kami`
--

INSERT INTO `kontak_kami` (`id_kontak`, `alamat`, `telp`, `email`, `instagram`, `youtube`) VALUES
(1, 'Ds. Randusongo, Kecamatan Gerih, Kabupaten Ngawi, Jawa Timur 63272', '+62 813-3509-1847', 'sdn.randusongo3@gmail.com', 'https://www.instagram.com/coba', 'https://www.youtube.com/c/WebProgrammingUNPAS');

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_kritiksaran` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `text_kritiksaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`id_kritiksaran`, `email`, `text_kritiksaran`) VALUES
(3, 'ujicoba@coba.com', 'akiu mau kasi kriti dan saran'),
(5, 'kritik@gmail.com', 'ini kritik dari saya');

-- --------------------------------------------------------

--
-- Table structure for table `login`
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
-- Dumping data for table `login`
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
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nilai_angka` int(11) NOT NULL,
  `nilai_predikat` text NOT NULL,
  `nilai_angka_keterampilan` int(11) NOT NULL,
  `nilai_predikat_keterampilan` text NOT NULL,
  `semester` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `tahun` text NOT NULL,
  `nama_siswa` text NOT NULL,
  `mapel` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `nilai_angka`, `nilai_predikat`, `nilai_angka_keterampilan`, `nilai_predikat_keterampilan`, `semester`, `kelas_id`, `tahun`, `nama_siswa`, `mapel`) VALUES
(9, 86, 'b', 88, 'b', 1, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Pendidikan Agama dan Budi Pekerti'),
(10, 83, 'b', 85, 'b', 1, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Pendidikan Pancasila dan Kewarganegaraan'),
(11, 86, 'b', 86, 'b', 1, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Bahasa Indonesia'),
(12, 84, 'b', 84, 'b', 1, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Matematika'),
(13, 86, 'b', 83, 'b', 1, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Ilmu Pengetahuan Alam'),
(14, 84, 'b', 83, 'b', 1, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Ilmu Pengetahuan Sosial'),
(15, 77, 'c', 82, 'c', 1, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Bahasa Inggris'),
(16, 88, 'b', 87, 'b', 1, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Seni Budaya'),
(17, 87, 'b', 85, 'b', 1, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Pendidikan Jasmani, Olahraga dan Kesehatan'),
(18, 86, 'b', 87, 'b', 1, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Prakarya'),
(19, 76, 'c', 78, 'c', 1, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Bahasa Daerah'),
(20, 87, 'b', 86, 'b', 2, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Pendidikan Agama dan Budi Pekerti'),
(21, 84, 'b', 88, 'b', 2, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Pendidikan Pancasila dan Kewarganegaraan'),
(22, 86, 'b', 87, 'b', 2, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Bahasa Indonesia'),
(23, 84, 'b', 84, 'b', 2, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Matematika'),
(24, 86, 'b', 86, 'b', 2, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Ilmu Pengetahuan Alam'),
(25, 86, 'b', 88, 'b', 2, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Ilmu Pengetahuan Sosial'),
(26, 88, 'b', 87, 'b', 2, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Bahasa Inggris'),
(27, 89, 'b', 90, 'b', 2, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Seni Budaya'),
(28, 89, 'b', 89, 'b', 2, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Pendidikan Jasmani, Olahraga dan Kesehatan'),
(29, 87, 'b', 87, 'b', 2, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Prakarya'),
(30, 89, 'b', 86, 'b', 2, 0, '2021/2022', 'NAYSILA CHINTYA AYUDEWI', 'Bahasa Daerah');

-- --------------------------------------------------------

--
-- Table structure for table `pengantar_kepsek`
--

CREATE TABLE `pengantar_kepsek` (
  `id_pengantar` int(11) NOT NULL,
  `deskripsi_pengantar` text DEFAULT NULL,
  `gambar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengantar_kepsek`
--

INSERT INTO `pengantar_kepsek` (`id_pengantar`, `deskripsi_pengantar`, `gambar`) VALUES
(1, '&lt;div&gt;Assalamu\'alaikum wr.wb.&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Puji syukur kepada Alloh SWT, Tuhan Yang Maha Esa yang telah memberikan rahmat dan anugerahNya sehingga website SDN Randusongo 3 ini dapat terbit. Salah satu tujuan dari website ini adalah untuk menjawab akan setiap kebutuhan informasi dengan memanfaatkan sarana teknologi informasi yang ada. Kami sadar sepenuhnya dalam rangka memajukan pendidikan di era berkembangnya Teknologi Informasi yang begitu pesat, sangat diperlukan berbagai sarana prasarana yang kondusif, kebutuhan berbagai informasi siswa, guru, orangtua, alumni maupun masyarakat, sehingga kami berusaha mewujudkan hal tersebut semaksimal mungkin. Semoga dengan adanya website ini dapat membantu dan bermanfaat, terutama informasi yang berhubungan dengan pendidikan, ilmu pengetahuan dan informasi seputar SDN Randusongo 3.&lt;/div&gt;&lt;div&gt;Besar harapan kami, sarana ini dapat memberi manfaat bagi semua pihak yang ada dilingkup pendidikan dan pemerhati pendidikan secara khusus bagi SDN Randusongo 3.&lt;/div&gt;&lt;div&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Akhirnya kami mengharapkan masukan dari berbagai pihak untuk website ini agar kami terus belajar dan meng-update diri, sehingga tampilan, isi dan mutu website akan terus berkembang dan lebih baik nantinya. Terima kasih atas kerjasamanya, maju terus untuk mencapai SDN Randusongo 3 yang lebih baik lagi.&lt;/div&gt;&lt;div&gt;Wassalamu\'alaikum wr.wb.&lt;/div&gt;', 'foto_kepsek_20211219023819.png');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `picture_profil` varchar(185) NOT NULL DEFAULT '',
  `desc_profil` text NOT NULL,
  `location` varchar(185) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `picture_profil`, `desc_profil`, `location`) VALUES
(1, 'foto_profil_20211223005410.jpg', '&lt;p style=&quot;text-align: justify; &quot;&gt;&lt;span style=&quot;font-family: &quot; times=&quot;&quot; new=&quot;&quot; roman&quot;,=&quot;&quot; &quot;serif&quot;;=&quot;&quot; font-size:=&quot;&quot; 16px;&quot;=&quot;&quot;&gt;SDN Randusongo 3 merupakan salah satu sekolah dasar yang sudah mendapatkan akreditasi B, yang terletak di Jl. Raya Kendal - Geneng KM 15, Dsn. Pencol, Ds. Randusongo, Kode Pos 63272.&amp;nbsp;&lt;/span&gt;&lt;span lang=&quot;EN-ID&quot; style=&quot;font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%;font-family:&quot; times=&quot;&quot; new=&quot;&quot; roman&quot;,&quot;serif&quot;;mso-fareast-font-family:=&quot;&quot; calibri;mso-fareast-theme-font:minor-latin;mso-bidi-theme-font:minor-bidi;=&quot;&quot; mso-ansi-language:en-id;mso-fareast-language:en-us;mso-bidi-language:ar-sa&quot;=&quot;&quot;&gt;SDN\r\nRandusongo 3 Ngawi didirikan pada tanggal 1 April 1982 dibawah naungan\r\nkementrian pendidikan dan kebudayaan. Surat keputusan pendirian tercantum pada\r\nINPRES NO 4 TH 1982/1983. SDN Randusongo 3 telah lama memulai aktivitas\r\npembelajaran dan telah memiliki nomor pokok sekolah nasional, namun surat keterangan\r\nijin operasionalnya baru keluar pada tanggal 15 Mei 2017. Surat ijin\r\noperasional tercantum pada surat keterangan operasional yang dikeluarkan oleh\r\npemerintah dengan nomor 420/67/404.101/2017.&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;span lang=&quot;EN-ID&quot; style=&quot;font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%;font-family:&quot; times=&quot;&quot; new=&quot;&quot; roman&quot;,&quot;serif&quot;;mso-fareast-font-family:=&quot;&quot; calibri;mso-fareast-theme-font:minor-latin;mso-bidi-theme-font:minor-bidi;=&quot;&quot; mso-ansi-language:en-id;mso-fareast-language:en-us;mso-bidi-language:ar-sa&quot;=&quot;&quot;&gt;&lt;span lang=&quot;EN-ID&quot; style=&quot;font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%;font-family:&quot; times=&quot;&quot; new=&quot;&quot; roman&quot;,&quot;serif&quot;;mso-fareast-font-family:=&quot;&quot; calibri;mso-fareast-theme-font:minor-latin;mso-bidi-theme-font:minor-bidi;=&quot;&quot; mso-ansi-language:en-id;mso-fareast-language:en-us;mso-bidi-language:ar-sa&quot;=&quot;&quot;&gt;Kurikulum\r\nyang diterapkan pada kegiatan pembelajaran di SDN Randusongo 3 sudah mengikuti\r\nalur pembelajaran yang berlaku secara umum yang telah diterapkan di sekolah\r\nlainnya yaitu kurikulum 2013. Akreditasi SDN Randusongo 3 sudah cukup baik\r\ndengan mendapatkan predikat B yang tercantum pada surat keterangan akreditasi\r\nnomor 164/BAP-S/M/SK/XI/2017.&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;span lang=&quot;EN-ID&quot; style=&quot;font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%;font-family:&quot; times=&quot;&quot; new=&quot;&quot; roman&quot;,&quot;serif&quot;;mso-fareast-font-family:=&quot;&quot; calibri;mso-fareast-theme-font:minor-latin;mso-bidi-theme-font:minor-bidi;=&quot;&quot; mso-ansi-language:en-id;mso-fareast-language:en-us;mso-bidi-language:ar-sa&quot;=&quot;&quot;&gt;&lt;span lang=&quot;EN-ID&quot; style=&quot;font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%;font-family:&quot; times=&quot;&quot; new=&quot;&quot; roman&quot;,&quot;serif&quot;;mso-fareast-font-family:=&quot;&quot; calibri;mso-fareast-theme-font:minor-latin;mso-bidi-theme-font:minor-bidi;=&quot;&quot; mso-ansi-language:en-id;mso-fareast-language:en-us;mso-bidi-language:ar-sa&quot;=&quot;&quot;&gt;Kepala\r\nsekolah SDN Randusongo 3 sekarang ini dijabat oleh Ibu Lilik Rohmawati, M.Pd.\r\nJabatan menjadi kepala sekolah SDN Randusongo 3 tersebut diberikan sejak\r\nturunnya surat keputusan di bulan Oktober 2021, sehingga sejak bulan Oktober\r\n2021 Ibu Lilik Rohmawati, M.Pd telah menjabat sebagai kepala sekolah\r\nmenggantikan Bapak Mulyono S.Pd yang sebelumnya menjabat menjadi kepala sekolah\r\ndi SDN Randusongo 3 sejak tahun 2017-2021.&lt;/span&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;', 'https://goo.gl/maps/GZ6e9Lud7pQdSM5C7');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reset_password`
--

INSERT INTO `reset_password` (`id`, `email`, `code`) VALUES
(0, 'gilaarief@gmail.com', '161ed1ecc409d3');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `tahun` varchar(199) NOT NULL,
  `prefix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id_visimisi` int(11) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visi_misi`
--

INSERT INTO `visi_misi` (`id_visimisi`, `visi`, `misi`) VALUES
(1, '&lt;p style=&quot;text-align: center; &quot;&gt;&lt;b&gt;MEWUJUDKAN INSAN TERDIDIK, TERAMPIL, DAN BERWAWASAN LINGKUNHAN BERDASARKAN IMAN &amp;amp; TAQWA&lt;/b&gt;&lt;br&gt;&lt;/p&gt;', '&lt;p&gt;&lt;b&gt;1. Melaksanakan Proses Pembelajaran yang berkualitas&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;2. Menumbuhkan Akhlaq yang mulia&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;3. Mengikuti dan menerima arus informasi global dengan berlandaskan Iman &amp;amp; Taqwa&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;4. Menerapkan budaya bersih&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;5. Menciptakan suasana lingkungan yang bersih, sehat, aman sehingga menghasilkan suasana belajar yanb kondusif&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;6. Menumbuhkan semangat kedisiplinan bagi seluruh warga sekolah&lt;/b&gt;&lt;/p&gt;');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak_kami`
--
ALTER TABLE `kontak_kami`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_kritiksaran`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengantar_kepsek`
--
ALTER TABLE `pengantar_kepsek`
  ADD PRIMARY KEY (`id_pengantar`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id_visimisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kontak_kami`
--
ALTER TABLE `kontak_kami`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_kritiksaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pengantar_kepsek`
--
ALTER TABLE `pengantar_kepsek`
  MODIFY `id_pengantar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id_visimisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
