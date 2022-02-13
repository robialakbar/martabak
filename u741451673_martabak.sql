-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 13 Feb 2022 pada 03.20
-- Versi server: 10.5.12-MariaDB-cll-lve
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u741451673_martabak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `jam_masuk` varchar(50) NOT NULL,
  `jam_keluar` varchar(50) NOT NULL,
  `status` enum('A','I','S','C','X') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `nip`, `tgl`, `jam_masuk`, `jam_keluar`, `status`) VALUES
(1, '196403261987101001', '2019-01-04', '07:50', '16:46', 'A'),
(3, '9967564568943644234', '2019-01-01', '', '', 'C'),
(4, '9967564568943644234', '2019-01-04', '', '', 'S');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anak`
--

CREATE TABLE `anak` (
  `id` int(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `ke` int(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `tunjangan` varchar(50) NOT NULL,
  `kawin` varchar(50) NOT NULL,
  `bekerja` varchar(50) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `putusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anak`
--

INSERT INTO `anak` (`id`, `nip`, `nama`, `tempat`, `tanggal_lahir`, `status`, `ke`, `gender`, `tunjangan`, `kawin`, `bekerja`, `sekolah`, `putusan`) VALUES
(1, '197809282002121001', 'Irzhi Mahija Putra', 'Pangkalpinang', '2005-08-01', '', 1, 'L', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(2, '197809282002121001', 'Nazela Mahira Putri', 'Pangkalpinang', '2015-01-02', 'AK', 1, 'P', 'Dapat', 'Belum', 'Tidak', 'Masih', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id` int(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `tgl` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id`, `nip`, `keterangan`, `tgl`, `foto`, `tipe`) VALUES
(3, '', '', '0000-00-00', '3__', 'file');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` bigint(11) NOT NULL,
  `id_cek` int(10) NOT NULL,
  `tgl_cuti` date NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jenis_cuti` varchar(100) NOT NULL,
  `alasan` text NOT NULL,
  `lama` int(10) NOT NULL,
  `cek` varchar(50) NOT NULL,
  `tgl_a` date NOT NULL,
  `tgl_b` date NOT NULL,
  `nip_atasan` varchar(255) NOT NULL,
  `status` enum('A','X','Y','P','T','B') NOT NULL,
  `n2` int(10) NOT NULL,
  `n1` int(10) NOT NULL,
  `n` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `id_cek`, `tgl_cuti`, `nip`, `jenis_cuti`, `alasan`, `lama`, `cek`, `tgl_a`, `tgl_b`, `nip_atasan`, `status`, `n2`, `n1`, `n`) VALUES
(20190106011, 11, '2019-01-06', '9967564568943644234', 'Cuti Sakit', 'sfrbn', 3, 'Hari', '2019-01-07', '2019-01-09', '9967564568943644234', 'A', 0, 0, 0),
(20190107001, 1, '2019-01-07', '9967564568943644234', 'Cuti Besar', 'ihweg', 2, 'Hari', '2019-01-15', '2019-01-23', '196403261987101001', 'A', 0, 0, 0),
(20190112001, 1, '2019-01-12', '9967564568943644234', 'Cuti Alasan Penting', 'sfrb', 4, 'Bulan', '2019-01-25', '2019-01-28', '196403261987101001', 'Y', 0, 0, 0),
(20190119001, 1, '2019-01-19', '9967564568943644234', 'Cuti Sakit', 'klneb', 3, 'Hari', '2019-01-21', '2019-01-22', '197403081993111002', 'B', 0, 0, 0),
(20190119002, 2, '2019-01-19', '9967564568943644234', 'Cuti Tahunan', 'kjevb', 2, 'Hari', '2019-01-22', '2019-01-24', '196403261987101001', 'B', 0, 0, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_s_ijasah`
--

CREATE TABLE `detail_s_ijasah` (
  `id_detail_s_ijasah` bigint(100) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `tingkat` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id` int(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `gaji_pokok` int(10) NOT NULL,
  `tunj_istri` int(10) NOT NULL,
  `tunj_anak` int(10) NOT NULL,
  `tunj_hselon` int(10) NOT NULL,
  `tunj_fung_umum` int(10) NOT NULL,
  `tunj_fungsional` int(10) NOT NULL,
  `tunj_khusus` int(10) NOT NULL,
  `tunj_terpencil` int(10) NOT NULL,
  `tkd` int(10) NOT NULL,
  `tunj_beras` int(10) NOT NULL,
  `tunj_pajak` int(10) NOT NULL,
  `tunj_bpjs` int(10) NOT NULL,
  `tunj_jkk` int(10) NOT NULL,
  `tunj_jkm` int(10) NOT NULL,
  `pembulatan` int(10) NOT NULL,
  `pot_pajak` int(10) NOT NULL,
  `pot_bpjs` int(10) NOT NULL,
  `pot_iwp_21` int(10) NOT NULL,
  `pot_iwp_01` int(10) NOT NULL,
  `pot_tapebum` int(10) NOT NULL,
  `pot_jkk` int(10) NOT NULL,
  `pot_jkm` int(10) NOT NULL,
  `hutang` int(10) NOT NULL,
  `bulog` int(10) NOT NULL,
  `sewa_rumah` int(10) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `gaji_bersih` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id`, `nip`, `gaji_pokok`, `tunj_istri`, `tunj_anak`, `tunj_hselon`, `tunj_fung_umum`, `tunj_fungsional`, `tunj_khusus`, `tunj_terpencil`, `tkd`, `tunj_beras`, `tunj_pajak`, `tunj_bpjs`, `tunj_jkk`, `tunj_jkm`, `pembulatan`, `pot_pajak`, `pot_bpjs`, `pot_iwp_21`, `pot_iwp_01`, `pot_tapebum`, `pot_jkk`, `pot_jkm`, `hutang`, `bulog`, `sewa_rumah`, `tgl_gaji`, `gaji_bersih`) VALUES
(4, '19700926 199703 1 007', 4200000, 56456, 565565, 1200000, 400000, 350000, 350000, 0, 0, 250000, 120000, 0, 120000, 0, 0, 40000, 75000, 0, 50000, 0, 0, 40000, 0, 70000, 400000, '2020-09-01', 6937021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `golongan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`golongan`, `keterangan`) VALUES
('GOL I A', 'SD'),
('GOL I B', 'SMP'),
('GOL II A', 'SMA'),
('GOL III A', 'Sarjana S1'),
('Golongan B', 'Pengatur Muda Tingkat I'),
('Golongan I A', 'Juru Muda'),
('Golongan I B', 'Juru Muda Tingkat I '),
('Golongan I C', 'Juru'),
('Golongan I D', 'Juru Muda Tingkat I'),
('Golongan II A', 'Pengatur Muda'),
('Golongan II B', 'Pengatur Muda Tingkat I'),
('Golongan II C', 'Pengatur'),
('Golongan II D ', 'Pengatur Tingkat I'),
('Golongan III A', 'Penata Muda'),
('Golongan III B', 'Penata Muda Tingkat I'),
('Golongan III C', 'Penata'),
('Golongan III D', 'Penata Tingkat I'),
('Golongan IV A', 'Pembina'),
('Golongan IV B ', 'Pembina Tingkat I'),
('Golongan IV C', 'Pembina Utama Muda'),
('Golongan IV D', 'Pembina Utama Madya'),
('Golongan IV E', 'Pembina Utama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `50` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('pangkat','jenis','status','jabatan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`50`, `nama`, `jenis`) VALUES
(3, 'Pegawai Negeri Sipil', 'jenis'),
(5, 'Pengatur Muda / IIa', 'pangkat'),
(6, 'Pengatur Muda Tk I / IIb', 'pangkat'),
(7, 'Aktif', 'status'),
(8, 'Non Aktif', 'status'),
(9, 'Pengatur / IIc', 'pangkat'),
(10, 'Pengatur Tk I /IId', 'pangkat'),
(11, 'Penata Muda / IIIa', 'pangkat'),
(12, 'Penata Muda Tk I / IIIb', 'pangkat'),
(13, 'Penata / IIIc', 'pangkat'),
(14, 'Penata Tk I / IIId', 'pangkat'),
(15, 'Pembina / IVa', 'pangkat'),
(16, 'Pembina Tk I / IVb', 'pangkat'),
(17, 'Pembina Utama Muda / IVc', 'pangkat'),
(18, 'Pembina Utama Madya / IVd', 'pangkat'),
(62, 'Pembina Utama/ IVE', 'pangkat'),
(63, 'Tenaga Pelayanan Umum (Pramu Bakti)', 'jabatan'),
(64, 'Tenaga Kebersihan', 'jabatan'),
(65, 'Tenaga Keamanan', 'jabatan'),
(66, 'Tenaga Supir', 'jabatan'),
(67, 'Tenaga Penanganan Bencana', 'jabatan'),
(68, 'Tenaga Juru Masak', 'jabatan'),
(69, 'Tenaga Kesehatan', 'jabatan'),
(70, 'Tenaga Penanganan Sosial', 'jabatan'),
(71, 'Kepala Dinas', 'jabatan'),
(72, 'Sekretaris Dinas', 'jabatan'),
(73, 'Kasubbag Umum', 'jabatan'),
(74, 'Kasubbag Keuangan', 'jabatan'),
(75, 'JF Penyuluh Sosial Madya', 'jabatan'),
(76, 'JF Pekerja Sosial Madya', 'jabatan'),
(77, 'JF Penggerak Swadaya Masyarakat Madya', 'jabatan'),
(78, 'JF Analisis Kepegawaian Muda', 'jabatan'),
(79, 'JF Pekerja Sosial Muda', 'jabatan'),
(80, 'JF Penyuluh Sosial Muda', 'jabatan'),
(81, 'JF Penggerak Swadaya Masyarakat Muda', 'jabatan'),
(82, 'JF Pranata Komputer Muda', 'jabatan'),
(83, 'JF Pranata Humas Muda', 'jabatan'),
(84, 'JF Pengelola Barang dan Jasa Muda', 'jabatan'),
(85, 'JF Analisis Kebijakan Pertama', 'jabatan'),
(86, 'JF Pekerja Sosial Pertama', 'jabatan'),
(87, 'JF Pekerja Sosial Pertama', 'jabatan'),
(88, 'JF Arsiparis Penyelia', 'jabatan'),
(89, 'JF Arsiparis Mahir', 'jabatan'),
(91, 'Pekerja Sosial Ahli Muda', 'jabatan'),
(92, 'Penggerak Swadaya Masyarakat Ahli Muda', 'jabatan'),
(93, 'Penyuluh Sosial Muda', 'jabatan'),
(94, 'Analis Kebencanaan Ahli Muda', 'jabatan'),
(95, 'Perencana Ahli Muda', 'jabatan'),
(96, 'JF Analis Kepegawaian Pertama', 'jabatan'),
(97, 'Penyusun Rencana Kebutuhan Sarana dan Prasarana', 'jabatan'),
(99, 'Pengelola Sarana dan Prasarana Kantor', 'jabatan'),
(100, 'Pengadministrasi Umum', 'jabatan'),
(101, 'Penata Laporan Keuangan ', 'jabatan'),
(104, 'Pengadministrasi Keuangan', 'jabatan'),
(105, 'Penyusun Rencana Kegiatan dan Anggaran', 'jabatan'),
(106, 'JF Pranata Mahir', 'jabatan'),
(107, 'Pengelola Program dan Kegiatan ', 'jabatan'),
(108, 'Pengadministrasi Perencanaan dan Program', 'jabatan'),
(109, 'Analis Pemberdayaan Masyarakat dan Kelembagaan', 'jabatan'),
(110, 'Analis Masalah Sosial', 'jabatan'),
(111, 'Pengelola Pemberdayaan Lembaga Sosial', 'jabatan'),
(112, 'Pengadministrasi Rehabilitasi Masalah Sosial', 'jabatan'),
(113, 'Analis Pelayanan Sosial ', 'jabatan'),
(114, 'Pengelola Kesejahteraan Sosial', 'jabatan'),
(115, 'Pranata Taman Makam Pahlawan', 'jabatan'),
(116, 'Analis Rehabilitasi Masalah Sosial', 'jabatan'),
(117, 'Pengelola Rehabilitasi Sosial', 'jabatan'),
(118, 'Pengadministrasi Anak Terlantar', 'jabatan'),
(120, 'Pengelola Pelayanan Rehabilitasi Sosial dan Lansia', 'jabatan'),
(121, 'Analis Mitigasi Bencana', 'jabatan'),
(122, 'Pengelola Logistik', 'jabatan'),
(123, 'Pengolah Data', 'jabatan'),
(124, 'Pengelola Perlindungan Sosial', 'jabatan'),
(125, 'Analis Desa dan Kelurahan ', 'jabatan'),
(126, 'Analis Institusi Masyarakat Pedesaan ', 'jabatan'),
(127, 'Pengelola Monitoring dan Evaluasi Penyelenggaraan Pemerintah Desa ', 'jabatan'),
(128, 'Analis Pengembangan Ekonomi Pedesaan ', 'jabatan'),
(129, 'Penyusun Rencana Peningkatan Peran serta Masyarakat', 'jabatan'),
(130, 'Pengelola Data Pemberdayaan Masyarakat dan Kelembagaan', 'jabatan'),
(131, 'Analis Pemberdayaan Masyarakat ', 'jabatan'),
(132, 'Pengelola Pemberdayaan Masyarakat', 'jabatan'),
(133, 'Pegawai Tenaga Kontrak', 'jenis'),
(135, 'Bendahara', 'jabatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jml_hari_rekap`
--

CREATE TABLE `jml_hari_rekap` (
  `id_jml` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `jml` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jml_hari_rekap`
--

INSERT INTO `jml_hari_rekap` (`id_jml`, `tgl`, `jml`) VALUES
(1, '2019-01-01', 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga`
--

CREATE TABLE `keluarga` (
  `id` int(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nik` int(50) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `tgl_nikah` date NOT NULL,
  `ke` int(10) NOT NULL,
  `penghasilan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi`
--

CREATE TABLE `mutasi` (
  `nip` varchar(50) NOT NULL,
  `kenaikan_pangkat` varchar(100) NOT NULL,
  `tmt_kenaikan` date NOT NULL,
  `kenaikan_gaji` int(10) NOT NULL,
  `tmt_gaji` date NOT NULL,
  `pensiun` varchar(50) NOT NULL,
  `tmt_pensiun` date NOT NULL,
  `ijasah` varchar(50) NOT NULL,
  `tmt_ijasah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mutasi`
--

INSERT INTO `mutasi` (`nip`, `kenaikan_pangkat`, `tmt_kenaikan`, `kenaikan_gaji`, `tmt_gaji`, `pensiun`, `tmt_pensiun`, `ijasah`, `tmt_ijasah`) VALUES
('196403261987101001', 'Penata Muda Tk I / IIIb', '2020-10-01', 65748390, '2020-11-19', '60', '2020-11-18', 'GOL I A', '2019-01-17'),
('196905081995032004', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('19700926 199703 1 007', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('197009261997031007', 'Pembina Utama Madya / IVd', '2021-10-01', 5500000, '2020-10-13', '1', '2022-06-22', 'Golongan III A', '2005-05-10'),
('197301232006041001', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('197403081993111002', 'Pengatur Muda / IIa', '2020-10-01', 543874, '2020-09-07', '60', '2019-01-01', 'GOL I A', '2019-01-03'),
('197405142007011031', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('19741204 200501 2 002', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('197412042005012002', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('197708142002121004', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('197709102007011006', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('197807132002121006', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('197809282002121001', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('197910072003121001', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('198304192010012013 ', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('198407122009031003', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('198505042009032008', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('19910113 2020121008', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('1994032232', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('19940324 201502 1 001', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('199403242015021001', 'Pengatur / IIc', '2020-10-01', 359000, '2020-11-24', '60', '2020-10-15', 'Golongan III A', '2020-12-04'),
('31890119 011352', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('31890119011352', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('43434', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('4535345345345', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('4545', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('54545', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('7648589', ' ', '0000-00-00', 0, '0000-00-00', '20', '0000-00-00', ' ', '0000-00-00'),
('9967564568943644234', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` enum('l','p') NOT NULL,
  `agama` varchar(50) NOT NULL,
  `kebangsaan` varchar(50) NOT NULL,
  `jumlah_keluarga` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `sk_terakhir` varchar(100) NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `tmt_golongan` date NOT NULL,
  `jenis_pegawai` varchar(100) NOT NULL,
  `tmt_capeg` date NOT NULL,
  `status_pegawai` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `digaji_menurut` varchar(100) NOT NULL,
  `gaji_pokok` int(10) NOT NULL,
  `besarnya_penghasilan` int(10) NOT NULL,
  `masa_kerja_golongan` varchar(50) NOT NULL,
  `masa_kerja_keseluruhan` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `rt` varchar(20) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `wa` varchar(15) NOT NULL,
  `no_taspen` varchar(255) NOT NULL,
  `no_nik` varchar(255) NOT NULL,
  `no_bpjs` varchar(255) NOT NULL,
  `no_karpeg` varchar(255) NOT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `status_pernikahan` varchar(100) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `no_bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `agama`, `kebangsaan`, `jumlah_keluarga`, `alamat`, `sk_terakhir`, `pangkat`, `tmt_golongan`, `jenis_pegawai`, `tmt_capeg`, `status_pegawai`, `jabatan`, `digaji_menurut`, `gaji_pokok`, `besarnya_penghasilan`, `masa_kerja_golongan`, `masa_kerja_keseluruhan`, `npwp`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `wa`, `no_taspen`, `no_nik`, `no_bpjs`, `no_karpeg`, `unit_kerja`, `email`, `pendidikan`, `status_pernikahan`, `nama_bank`, `no_bank`) VALUES
(1, '197809282002121001', 'Denny Efandhona', 'Sungailiat', '1978-09-28', 'l', 'Islam', 'WNI', 4, 'Jl.RE Martadinata ', 'Kenaikan Pengkat', 'Pengatur Muda / IIa', '2022-02-09', 'Pegawai Negeri Sipil', '2022-02-09', 'Aktif', 'Kasubbag Umum', 'PP No 30 Tahun 2015', 3628900, 14, '14 tahun 00 Bulan', '07.433.245.3', '01', '02', '', 'Tamansari', 'Kota Pangkal pinang', '081367351515', '545454', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `nip` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `status_gaji` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` int(1) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `instansi` text NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `bg` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `ig` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `nama`, `instansi`, `provinsi`, `kota`, `alamat`, `logo`, `bg`, `fb`, `twitter`, `ig`) VALUES
(1, 'Si - DAWAI', 'DINSOS  & PMD', 'Kepulauan Bangka Belitung', 'Kota Pangkalpinang', 'DINSOSPMD- PROV. KEP. BABEL', '', '', 'Dinas Sosial Pmd Babel', 'dinsospmdbabel', 'dinassosialpmd_babel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_absensi`
--

CREATE TABLE `rekap_absensi` (
  `id_rekap` bigint(100) NOT NULL,
  `tgl` date NOT NULL,
  `nip` varchar(50) NOT NULL,
  `i` int(10) NOT NULL,
  `s` int(10) NOT NULL,
  `c` int(10) NOT NULL,
  `tk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekap_absensi`
--

INSERT INTO `rekap_absensi` (`id_rekap`, `tgl`, `nip`, `i`, `s`, `c`, `tk`) VALUES
(2, '2019-01-01', '196403261987101001', 1, 0, 0, 0),
(3, '2019-01-01', '9967564568943644234', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sk`
--

CREATE TABLE `sk` (
  `id` int(10) NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `sk`
--

INSERT INTO `sk` (`id`, `keterangan`) VALUES
(1, 'Kenaikan Pengkat'),
(2, 'Kenaikan Gaji Berkala'),
(3, 'Satyalencana'),
(4, 'Sertifikat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s_ijasah`
--

CREATE TABLE `s_ijasah` (
  `id_s_ijasah` bigint(100) NOT NULL,
  `tgl` date NOT NULL,
  `banyaknya` int(10) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `nomor_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `s_kenaikan`
--

CREATE TABLE `s_kenaikan` (
  `id_s_kenaikan` bigint(100) NOT NULL,
  `tgl` date NOT NULL,
  `d` bigint(100) NOT NULL,
  `m` bigint(20) NOT NULL,
  `y` int(5) NOT NULL,
  `banyaknya` int(10) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `nomor_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `gender` enum('l','p') NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `nip`, `password`, `nama`, `level`, `gender`, `foto`, `status`) VALUES
('denidinsos', '198211262007012003', '$2y$05$SmtiavhBM.vJUsTfyTWX4OX4oDvpA4lvYsH7yupuo.DniV/G0SBii', 'denidinsos', 'admin', 'l', 'denidinsos_Screenshot_20220208_175326.jpg', 'Aktif'),
('dora123', '197412042005012002', '$2y$05$BoJ0GlnyXO3uShlxIa6SkuXOzBQ8RarRP2q1mG6kcj2SISo.Du1Hi', 'doraemon', 'user', 'p', '', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wa`
--

CREATE TABLE `wa` (
  `id` int(1) NOT NULL,
  `token` varchar(155) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `wa`
--

INSERT INTO `wa` (`id`, `token`) VALUES
(1, 'PKNHakeUXpqQVWYv20qCGqcmyRfxdDgk8rzkzafFshf1o7d0y3Q4DWyOwnhSSbBn');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `detail_s_ijasah`
--
ALTER TABLE `detail_s_ijasah`
  ADD PRIMARY KEY (`id_detail_s_ijasah`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`golongan`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`50`);

--
-- Indeks untuk tabel `jml_hari_rekap`
--
ALTER TABLE `jml_hari_rekap`
  ADD PRIMARY KEY (`id_jml`);

--
-- Indeks untuk tabel `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekap_absensi`
--
ALTER TABLE `rekap_absensi`
  ADD PRIMARY KEY (`id_rekap`);

--
-- Indeks untuk tabel `sk`
--
ALTER TABLE `sk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `s_ijasah`
--
ALTER TABLE `s_ijasah`
  ADD PRIMARY KEY (`id_s_ijasah`);

--
-- Indeks untuk tabel `s_kenaikan`
--
ALTER TABLE `s_kenaikan`
  ADD PRIMARY KEY (`id_s_kenaikan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `wa`
--
ALTER TABLE `wa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_s_ijasah`
--
ALTER TABLE `detail_s_ijasah`
  MODIFY `id_detail_s_ijasah` bigint(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `50` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT untuk tabel `sk`
--
ALTER TABLE `sk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
