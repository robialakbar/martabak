-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2020 at 11:58 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
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
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nip`, `tgl`, `jam_masuk`, `jam_keluar`, `status`) VALUES
(1, '196403261987101001', '2019-01-04', '07:50', '16:46', 'A'),
(3, '9967564568943644234', '2019-01-01', '', '', 'C'),
(4, '9967564568943644234', '2019-01-04', '', '', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `anak`
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
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id`, `nip`, `nama`, `tempat`, `tanggal_lahir`, `status`, `ke`, `gender`, `tunjangan`, `kawin`, `bekerja`, `sekolah`, `putusan`) VALUES
(1, '197009261997031007', 'ALFATH SHIFA GHIFARA', 'Sungailiat', '1998-09-27', 'AK', 1, 'P', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(2, '197009261997031007', 'KHANSAHATIKAH KHAIRUNNISA', 'Sungailiat', '2003-03-05', 'AK', 1, 'P', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(3, '197009261997031007', 'HANIF MUHAMMAD FALAH', 'Pangkalpinang', '2011-06-17', 'AK', 1, 'L', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(4, '197412042005012002', 'NAJWA WIHDAHANI', 'Pangkalpinang', '2020-01-01', 'AK', 1, 'P', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(5, '197910072003121001', 'QHODARI TRISTAN EL FAQIH', 'Pangkalpinang', '2011-08-22', 'AK', 1, 'L', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(6, '197910072003121001', 'QANITA SHANAZ EL MAULIDA', 'Pangkalpinang', '2013-03-25', 'AK', 1, 'P', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(7, '197708142002121004', 'HUMAIRA DELFIYONA', 'Pangkalpinang', '2010-10-27', 'AK', 1, 'P', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(8, '197405142007011031', 'ARBIAN PUTRA RAMDHAN', 'Sungailiat', '2005-10-31', 'AK', 1, 'L', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(9, '197405142007011031', 'ANNISYAH MAHARANI', 'Sungailiat', '2003-05-05', 'AK', 1, 'Perempuan', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(10, '197405142007011031', 'SASKIA PUTRI MAHARANI', 'Sungailiat', '2012-01-21', 'AK', 1, 'P', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(11, '196905081995032004', 'YASMIN RAMADHANI', 'Jakarta', '2007-09-29', '', 1, 'P', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(12, '196905081995032004', 'FATIH HASYIM', 'Jakarta', '2009-06-27', 'AK', 1, 'L', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(13, '198304192010012013 ', 'MUHAMMAD AUFA SAMBARA TRESNADI', 'Pangkalpinang', '2012-03-13', 'AK', 1, 'L', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(14, '198304192010012013 ', 'KHANSA KHAIRUNNISA TRESNADI', 'Pangkalpinang', '2014-09-14', 'AK', 1, 'P', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(15, '197807132002121006', 'JOSUA LUBIS', 'Pangkalpinang', '2015-02-02', 'AK', 1, 'L', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(16, '198505042009032008', 'NAFISAH AULIA RACHMANDA', 'Pangkalpinang', '2009-11-13', 'AK', 1, 'P', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(17, '198505042009032008', 'HANIFAH FIRLII RACHMANDA', 'Pangkalpinang', '2011-03-20', 'AK', 1, 'P', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(18, '198505042009032008', 'ARGA ALFATIH RACHMANDA', 'Pangkalpinang', '2015-05-17', 'AK', 1, 'L', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(19, '197301232006041001', 'DAEMENTIVA A.S.', 'Pangkalpinang', '2006-01-25', 'AK', 1, 'P', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(20, '197709102007011006', 'AGUS ZHALFA FEBRIYAN', 'Pangkalpinang', '2005-02-03', 'AK', 1, 'L', 'Dapat', 'Belum', 'Tidak', 'Masih', ''),
(21, '197709102007011006', 'ZALYKA OLIVIA', 'Pangkalpinang', '2015-03-25', 'AK', 1, 'P', 'Dapat', 'Belum', 'Tidak', 'Masih', '');

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
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
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id`, `nip`, `keterangan`, `tgl`, `foto`, `tipe`) VALUES
(3, '', '', '0000-00-00', '3__', 'file'),
(5, '197009261997031007', 'SK', '2020-10-05', '5_197009261997031007_Materi 1 Ketentuan Umum v.3.pdf', 'file'),
(6, '197910072003121001', 'SK', '2020-10-05', '6_197910072003121001_Peraturan Presiden Nomor 16 Tahun 2018.pdf', 'file'),
(7, '197910072003121001', 'sd', '2020-10-06', '7_197910072003121001_Ringkasan Eksekutif DIKPLHD Babel 2019.pdf', 'file'),
(8, '197910072003121001', 'ijazah', '2020-10-07', '8_197910072003121001_index.pdf', 'file'),
(9, '197009261997031007', 'Ijazah', '2020-10-08', '9_197009261997031007_Data Pegawai  (SEPAKAT BERKAWAN).pdf', 'file'),
(10, '197910072003121001', 'Sertifikat', '2020-10-08', '10_197910072003121001_index_5.pdf', 'file');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
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
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `id_cek`, `tgl_cuti`, `nip`, `jenis_cuti`, `alasan`, `lama`, `cek`, `tgl_a`, `tgl_b`, `nip_atasan`, `status`, `n2`, `n1`, `n`) VALUES
(20190106011, 11, '2019-01-06', '9967564568943644234', 'Cuti Sakit', 'sfrbn', 3, 'Hari', '2019-01-07', '2019-01-09', '9967564568943644234', 'A', 0, 0, 0),
(20190107001, 1, '2019-01-07', '9967564568943644234', 'Cuti Besar', 'ihweg', 2, 'Hari', '2019-01-15', '2019-01-23', '196403261987101001', 'A', 0, 0, 0),
(20190112001, 1, '2019-01-12', '9967564568943644234', 'Cuti Alasan Penting', 'sfrb', 4, 'Bulan', '2019-01-25', '2019-01-28', '196403261987101001', 'Y', 0, 0, 0),
(20190119001, 1, '2019-01-19', '9967564568943644234', 'Cuti Sakit', 'klneb', 3, 'Hari', '2019-01-21', '2019-01-22', '197403081993111002', 'B', 0, 0, 0),
(20190119002, 2, '2019-01-19', '9967564568943644234', 'Cuti Tahunan', 'kjevb', 2, 'Hari', '2019-01-22', '2019-01-24', '196403261987101001', 'B', 0, 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `detail_s_ijasah`
--

CREATE TABLE `detail_s_ijasah` (
  `id_detail_s_ijasah` bigint(100) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `tingkat` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
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
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id`, `nip`, `gaji_pokok`, `tunj_istri`, `tunj_anak`, `tunj_hselon`, `tunj_fung_umum`, `tunj_fungsional`, `tunj_khusus`, `tunj_terpencil`, `tkd`, `tunj_beras`, `tunj_pajak`, `tunj_bpjs`, `tunj_jkk`, `tunj_jkm`, `pembulatan`, `pot_pajak`, `pot_bpjs`, `pot_iwp_21`, `pot_iwp_01`, `pot_tapebum`, `pot_jkk`, `pot_jkm`, `hutang`, `bulog`, `sewa_rumah`, `tgl_gaji`, `gaji_bersih`) VALUES
(4, '19700926 199703 1 007', 4200000, 56456, 565565, 1200000, 400000, 350000, 350000, 0, 0, 250000, 120000, 0, 120000, 0, 0, 40000, 75000, 0, 50000, 0, 0, 40000, 0, 70000, 400000, '2020-09-01', 6937021),
(5, '197009261997031007', 4295100, 245000, 185000, 1200000, 400000, 350000, 350000, 600000, 900000, 250000, 120000, 350000, 120000, 120000, 0, 40000, 75000, 100000, 50000, 80000, 80000, 40000, 50000, 70000, 400000, '2020-10-01', 8500100),
(6, '197412042005012002', 3602400, 265000, 565565, 656567, 1150000, 350000, 325000, 550000, 900000, 250000, 120000, 350000, 120000, 120000, 0, 40000, 75000, 100000, 50000, 80000, 80000, 40000, 50000, 70000, 400000, '2020-10-01', 8339532),
(7, '197910072003121001', 3350600, 265000, 450000, 900000, 400000, 350000, 350000, 600000, 900000, 250000, 120000, 350000, 120000, 120000, 0, 40000, 75000, 100000, 50000, 80000, 80000, 40000, 50000, 70000, 400000, '2020-10-01', 7540600),
(8, '197708142002121004', 3602400, 265000, 185000, 1200000, 400000, 350000, 350000, 600000, 900000, 250000, 120000, 350000, 120000, 120000, 0, 40000, 75000, 100000, 50000, 80000, 80000, 40000, 50000, 70000, 400000, '2020-10-01', 7827400),
(9, '197405142007011031', 2597800, 265000, 565565, 1200000, 400000, 350000, 350000, 600000, 900000, 250000, 120000, 350000, 120000, 120000, 0, 40000, 75000, 100000, 50000, 80000, 80000, 40000, 50000, 70000, 400000, '2020-10-01', 7203365),
(10, '196905081995032004', 2871800, 265000, 565565, 1200000, 400000, 350000, 350000, 600000, 900000, 250000, 120000, 350000, 120000, 120000, 0, 40000, 75000, 100000, 50000, 80000, 80000, 40000, 50000, 70000, 0, '2020-10-01', 7877365),
(11, '198304192010012013 ', 3149100, 265000, 565565, 1200000, 400000, 350000, 325000, 450000, 900000, 200000, 110000, 450000, 120000, 120000, 0, 40000, 55656, 100000, 50000, 80000, 80000, 40000, 50000, 70000, 350000, '2020-10-01', 7689009),
(12, '197807132002121006', 3273200, 265000, 565565, 1200000, 400000, 350000, 350000, 550000, 900000, 250000, 120000, 350000, 120000, 120000, 0, 40000, 75000, 100000, 50000, 80000, 80000, 40000, 50000, 70000, 400000, '2020-10-01', 7828765),
(13, '198505042009032008', 3021300, 265000, 185000, 656567, 400000, 350000, 350000, 550000, 900000, 250000, 120000, 350000, 120000, 120000, 0, 40000, 75000, 100000, 50000, 80000, 80000, 40000, 50000, 70000, 400000, '2020-10-01', 6652867),
(14, '197301232006041001', 3666900, 265000, 565565, 1200000, 400000, 350000, 350000, 550000, 900000, 250000, 120000, 350000, 120000, 120000, 0, 40000, 75000, 100000, 50000, 80000, 80000, 40000, 50000, 70000, 400000, '2020-10-01', 8222465),
(15, '197709102007011006', 3565000, 265000, 450000, 1200000, 1150000, 350000, 350000, 600000, 900000, 250000, 120000, 350000, 120000, 120000, 0, 40000, 75000, 100000, 50000, 80000, 80000, 40000, 50000, 70000, 350000, '2020-10-01', 8855000),
(16, '198407122009031003', 3021300, 265000, 565565, 1200000, 1150000, 350000, 350000, 600000, 900000, 250000, 120000, 350000, 120000, 120000, 0, 40000, 75000, 100000, 50000, 80000, 80000, 40000, 50000, 70000, 400000, '2020-10-01', 8376865);

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `golongan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`golongan`, `keterangan`) VALUES
('GOL I A', 'SD'),
('GOL I B', 'SMP'),
('GOL II A', 'SMA'),
('Golongan III A', 'Sarjana S1');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `50` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('pangkat','jenis','status','jabatan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`50`, `nama`, `jenis`) VALUES
(1, 'Kepala Dinas', 'jabatan'),
(2, 'sektretaris', 'jabatan'),
(3, 'Pegawai Negeri Sipil', 'jenis'),
(4, 'honorer', 'jenis'),
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
(19, 'Kepala UPTD Laboratorium Lingkungan', 'jabatan'),
(20, 'Kepala Bidang Tata Lingkungan', 'jabatan'),
(21, 'Kepala Bidang Pengendalian dan Penataan Lingkungan Hidup', 'jabatan'),
(22, 'Kepala Bidang PLHPSPKLH', 'jabatan'),
(23, 'Kasubbag Umum', 'jabatan'),
(24, 'Kasubbag Perencaan', 'jabatan'),
(25, 'Kasubbag Keuangan', 'jabatan'),
(26, 'Analis SDM Aparatur', 'jabatan'),
(27, 'Penyusun Kebutuhan Barang Inventaris', 'jabatan'),
(28, 'Pranata Komputer Pelaksana', 'jabatan'),
(29, 'Pengadministrasi Umum', 'jabatan'),
(30, 'Analis Perencanaan, Evaluasi dan Pelaporan', 'jabatan'),
(31, 'Pengelola Program dan Kegiatan', 'jabatan'),
(32, 'Bendahara', 'jabatan'),
(33, 'Pengadministrasi Keuangan', 'jabatan'),
(34, 'Pengendali Dampak Lingkungan Pertama', 'jabatan'),
(35, 'Pengendali Dampak Lingkungan Muda', 'jabatan'),
(36, 'PPLH Pertama', 'jabatan'),
(37, 'PPLH Madya', 'jabatan'),
(38, 'Kasi Perencaan Lingkungan Hidup', 'jabatan'),
(39, 'Kasi Pengendalian Pencemaran dan Kerusakan LIngkungan Hidup', 'jabatan'),
(40, 'Kasi Pemeliharaan Lingkungan Hidup dan Pengelolaan Sampah', 'jabatan'),
(41, 'Pengelola Data', 'jabatan'),
(42, 'Pengelola Lingkungan', 'jabatan'),
(43, 'Kasi Kajian dampak Lingkungan', 'jabatan'),
(44, 'Kasi Penegakan Hukum, Limbah B3, Pengaduan dan penyelesaian Sengketa Lingkungan Hidup', 'jabatan'),
(45, 'Kasi Peningkatan Kapasitas Lingkungan Hidup', 'jabatan'),
(46, 'Penelaah Dampak Lingkungan', 'jabatan'),
(47, 'Pengelola Dokumen Mengenai AMDAL', 'jabatan'),
(48, 'Pengelola Penyelesaian Hasil Pengawasan', 'jabatan'),
(49, 'Pengawas Lingkungan Hidup Pertama', 'jabatan'),
(50, 'Pengawas Lingkungan Hidup Muda', 'jabatan'),
(51, 'Pengawas Lingkungan Hidup Madya', 'jabatan'),
(52, 'Kasubbag Tata Usaha', 'jabatan'),
(53, 'Kasi Pengujian', 'jabatan'),
(54, 'Kasi Pengendalian Mutu', 'jabatan'),
(55, 'Analis Tata Usaha', 'jabatan'),
(56, 'Pengadministrasi Contoh Uji', 'jabatan'),
(57, 'Pengadministrasi Pengujian', 'jabatan'),
(58, 'Analis Laboratorium', 'jabatan'),
(59, 'Pengelola Laboratorium', 'jabatan');

-- --------------------------------------------------------

--
-- Table structure for table `jml_hari_rekap`
--

CREATE TABLE `jml_hari_rekap` (
  `id_jml` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `jml` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jml_hari_rekap`
--

INSERT INTO `jml_hari_rekap` (`id_jml`, `tgl`, `jml`) VALUES
(1, '2019-01-01', 19);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
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

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id`, `nip`, `nama`, `tempat`, `tgl_lahir`, `nik`, `pekerjaan`, `tgl_nikah`, `ke`, `penghasilan`) VALUES
(1, '197009261997031007', 'herawati.amd', 'Sungailiat', '1970-03-04', 2147483647, 'Ibu Rumah Tangga', '1997-11-06', 1, 3000000),
(2, '197412042005012002', 'SYAHRUROZI, A.Md', 'Pangkalpinang', '1972-08-18', 2147483647, 'Swasta', '2012-06-21', 1, 3000000),
(3, '197910072003121001', 'raden ayu fitria miranti', 'Pangkalpinang', '1980-08-03', 2147483647, 'PNS', '2010-01-27', 1, 2900000),
(4, '197708142002121004', 'maksi yenni darma saputri', 'Kelapa', '1970-01-01', 2147483647, 'Ibu Rumah Tangga', '2009-01-30', 1, 3000000),
(5, '197405142007011031', 'HARYANI', 'Sungailiat', '1977-09-21', 2147483647, 'PNS', '2003-03-02', 1, 3000000),
(6, '196905081995032004', 'rustam hasyim', 'Pangkalpinang', '1970-05-10', 2147483647, 'Wiraswasta', '2006-07-02', 1, 3000000),
(7, '198304192010012013 ', 'AGUNG TRESNADI, ST', 'Jakarta', '1979-06-18', 16707, 'TNI AL', '2006-06-12', 1, 8000000),
(8, '197807132002121006', 'Dewi olivia Nilapensa Siagian', 'Pangkalpinang', '1990-01-19', 2147483647, 'Guru Swasta', '2013-12-28', 1, 3000000),
(9, '198505042009032008', 'R.RACHMANDA GUNTUR GENI', 'Semarang', '1979-07-02', 19790701, 'PNS', '2007-10-26', 1, 5000000),
(10, '197301232006041001', 'NOVITA INDRANUARI', 'Pangkalpinang', '1970-01-02', 2147483647, 'PNS', '2003-12-07', 1, 6000000),
(11, '197709102007011006', 'PITI PIRAWAT', 'Belinyu', '1974-02-15', 2147483647, 'PNS', '2003-12-14', 1, 6000000);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
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
-- Dumping data for table `mutasi`
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
('197910072003121001', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('198304192010012013 ', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('198407122009031003', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('198505042009032008', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('19940324 201502 1 001', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('199403242015021001', 'Pengatur / IIc', '2020-10-01', 359000, '2020-11-24', '60', '2020-10-15', 'Golongan III A', '2020-12-04'),
('4535345345345', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00'),
('7648589', ' ', '0000-00-00', 0, '0000-00-00', '20', '0000-00-00', ' ', '0000-00-00'),
('9967564568943644234', '', '0000-00-00', 0, '0000-00-00', '', '0000-00-00', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
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
  `wa` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `gender`, `agama`, `kebangsaan`, `jumlah_keluarga`, `alamat`, `sk_terakhir`, `pangkat`, `tmt_golongan`, `jenis_pegawai`, `tmt_capeg`, `status_pegawai`, `jabatan`, `digaji_menurut`, `gaji_pokok`, `besarnya_penghasilan`, `masa_kerja_golongan`, `masa_kerja_keseluruhan`, `npwp`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `wa`) VALUES
(11, '196905081995032004', 'Pemi Sutiatirtharani, SE', 'Jakarta', '1969-05-08', 'p', 'Islam', 'WNI', 4, 'JL. SUMEDANG GG. MESJID AL HIKMAH PAM LEDENG KACANG PEDANG PANGKALPINANG RT. 02 RW. 02 KODE POS. -', 'Kenaikan Pengkat', 'Penata Tk I / IIId', '2012-10-01', 'Pegawai Negeri Sipil', '1996-05-01', 'Aktif', 'Kepala UPTD Laboratorium Lingkungan', 'PP No 30 Tahun 2015', 2871800, 0, '08 Tahun 00 Bulan', '23 Tahun 00 Bulan', '590547303061000', '02', '02', 'Kejaksaan', 'Tamansari', 'Pangkalpinang', '08129583477'),
(6, '197009261997031007', 'Eko Kurniawan, S.Sos, M.SI', 'Sungailiat', '1970-09-26', 'l', 'Islam', 'WNI', 4, 'LAN DUYUNG VI NO 192 RT. 06 RW. 01 KODE POS. 33215', 'Kenaikan Pengkat', 'Pembina Utama Muda / IVc', '2012-10-01', 'Pegawai Negeri Sipil', '1997-03-01', 'Aktif', 'Kepala Dinas', 'PP No 30 Tahun 2015', 4295100, 0, '08 Tahun 00 Bulan', '21 Tahun 08 Bulan', '34343434', '006', '001', 'Karya Makmur', 'Pemali', 'kabupaten Bangka', '081316173030'),
(15, '197301232006041001', 'Arry Imam Sulistio , SE., MM', 'Belinyu', '1973-01-23', 'l', 'Islam', 'WNI', 3, 'NANAS  RT. 07 RW. 03 KODE POS. -', 'Kenaikan Pengkat', 'Penata Tk I / IIId', '2019-10-01', 'Pegawai Negeri Sipil', '2006-04-01', 'Aktif', 'Kasubbag Perencaan', 'PP No 30 Tahun 2015', 3666900, 0, '01 Tahun 00 Bulan', '13 Tahun 06 Bulan', '14-856.050.1-304.000', '07', '03', 'Gajah Mada', 'Rangkui', 'Pangkalpinang', '081373016201'),
(10, '197405142007011031', 'Yurismansyah, ST, MM.', 'Palembang', '1974-05-14', 'l', 'Islam', 'WNI', 5, 'BATIN TIKAL GG. ENGGANO II NO.35 RT. 02 RW. - KODE POS', 'Kenaikan Gaji Berkala', 'Penata Tk I / IIId', '2017-04-01', 'Pegawai Negeri Sipil', '2007-01-01', 'Aktif', 'Kepala Bidang Tata Lingkungan', 'PP No 30 Tahun 2015', 2597800, 0, '03 Tahun 06 Bulan', '14 Tahun 11 Bulan', '	14.646.387.2.315.000', '02', '03', 'Sungailiat', 'Bangka', 'Kabuapten Bangka', '081373184720'),
(7, '197412042005012002', 'Dora Wardani, ST', 'Pangkalpinang', '1974-12-04', 'p', 'Islam', 'WNI', 2, 'M. SHALEH ZAINUDDIN RT. 03 RW. 01 KODE POS. 33118', 'Kenaikan Pengkat', 'Pembina / IVa', '2015-04-01', 'Pegawai Negeri Sipil', '2005-01-01', 'Aktif', 'sektretaris', 'PP No 30 Tahun 2015', 3602400, 0, '14 Tahun 04 Bulan', '05 Tahun 01 Bulan', '07.431.497.2-304.000', '03', '01', '33118', 'Gabek', 'Pangkalpinang', '081272895811'),
(9, '197708142002121004', 'Hutriadi , S.Si. MSc', 'Manggar', '1977-08-18', 'l', 'Islam', 'WNI', 3, 'PERUM PONDOK INDAH MELATI BLOK A7 NO.16 RT. 10 RW. 03 KODE POS. 33149', 'Kenaikan Pengkat', 'Pembina / IVa', '2017-09-28', 'Pegawai Negeri Sipil', '2002-12-01', 'Aktif', 'Kepala Bidang Pengendalian dan Penataan Lingkungan Hidup', 'PP No 30 Tahun 2015', 3602400, 0, '04 Tahun 00 Bulan', '14 Tahun 10 Bulan', '24.602.174.5-304.000', '10', '03', 'perum Pondok Indah', 'Gabek', 'Pangkalpinang', '082171857997'),
(16, '197709102007011006', 'Henry Rizal, SE., MM', 'Pangkalpinang', '1977-09-10', 'l', 'Islam', 'WNI', 4, 'KP.MELAYU 23  RT. 01 RW. 01 KODE POS. -', 'Kenaikan Pengkat', 'Penata Tk I / IIId', '2018-10-01', 'Pegawai Negeri Sipil', '2007-01-01', 'Aktif', 'Kasubbag Keuangan', 'PP No 30 Tahun 2015', 3565000, 0, '02 Tahun 00 Bulan', '12 Tahun 06 Bulan', '15.081.361.6-304.000', '01', '01', 'Bukit Merapin', 'Gerunggang', 'Pangkalpinang', '085369350717'),
(13, '197807132002121006', 'Marison Lubis, ST', 'Jebus', '1978-07-13', 'l', 'Kristen', 'WNI', 3, 'KAMPUK SAMEK SAMPUR RT. 03 RW. 01 KODE POS. 33302', 'Kenaikan Pengkat', 'Penata / IIIc', '2019-04-01', 'Pegawai Negeri Sipil', '2002-12-01', 'Aktif', 'Kasi Pemeliharaan Lingkungan Hidup dan Pengelolaan Sampah', 'PP No 30 Tahun 2015', 3273200, 0, '01 Tahun 06 Bulan', '16 Tahun 10 Bulan', '07.433.352.7-304.000', '03', '01', 'Air Itam', 'Bukit Intan', 'Pangkalpinang', '08127173540'),
(8, '197910072003121001', 'Mega Oktarian, S.SI, M.Eng', 'Toboali', '1979-10-07', 'l', 'Islam', 'WNI', 4, 'JALAN MERANTI NO.226 RT. 04 RW. 02 KODE POS. -', 'Kenaikan Gaji Berkala', 'Pembina / IVa', '2020-04-01', 'Pegawai Negeri Sipil', '2003-12-01', 'Aktif', 'Kepala Bidang PLHPSPKLH', 'PP No 30 Tahun 2015', 3350600, 0, '00 Tahun 06 Bulan', '12 Tahun 04 Bulan', '084547470304000', '04', '02', 'Gabek I', 'Gabek', 'Kota Pangkalpinang', '085267483807'),
(12, '198304192010012013 ', 'Afriza Farnevi, SH, MM', 'Muntok', '1983-04-19', 'p', 'Islam', 'WNI', 4, 'PERUMAHAN BUKIT GELASE ASRI JL. TAIB  RT. 22 RW. 08 KODE POS. -', 'Kenaikan Pengkat', 'Penata Tk I / IIId', '2018-04-01', 'Pegawai Negeri Sipil', '2010-01-01', 'Aktif', 'Kasubbag Umum', 'PP No 30 Tahun 2015', 3149100, 0, '02 Tahun 06 Bulan', '10 Tahun 06 Bulan', '15.590.544.1-315.000', '22', '08', 'Dul', 'Bukit Intan', 'Kabupaten Bangka Tengah', '082185615000'),
(17, '198407122009031003', 'HARFIYANTO, ST', 'Bangka', '1984-07-12', 'l', 'Islam', 'WNI', 4, 'JL.GEGADING NO. 58 RT. 07 RW. 02 KODE POS. 33136', 'Kenaikan Gaji Berkala', 'Penata / IIIc', '2020-10-01', 'Pegawai Negeri Sipil', '2020-10-01', 'Aktif', 'Kasi Kajian dampak Lingkungan', 'PP No 30 Tahun 2015', 3021300, 0, '02 Tahun 06 Bulan', '10 Tahun 03 Bulan', '	15.081.115.6-304.000', '07', '02', 'Melintang', 'Rangkui', 'Pangkalpinang', '082176503335'),
(14, '198505042009032008', 'Fianda Revina WidyastutiI, SKM, M.Si', 'Lampur', '1985-05-04', 'p', 'Islam', 'WNI', 5, 'MELATI GG. DAHLIA VII NO.470 RT. 03 RW. 001 KODE POS. 33123', 'Kenaikan Pengkat', 'Penata / IIIc', '2018-10-01', 'Pegawai Negeri Sipil', '2009-03-01', 'Aktif', 'Kasi Peningkatan Kapasitas Lingkungan Hidup', 'PP No 30 Tahun 2015', 3021300, 0, '02 Tahun 00 Bulan', '09 Tahun 07 Bulan', '	79.030.385.3-304.000', '003', '001', 'Bukit Merapin', 'Gerunggang', 'Pangkalpinang', '08122573163');

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `nip` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `status_gaji` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
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
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama`, `instansi`, `provinsi`, `kota`, `alamat`, `logo`, `bg`, `fb`, `twitter`, `ig`) VALUES
(1, ' (SEPAKAT BERKAWAN)', 'DLH Provinsi Kep Bangka Belitung', 'Kepulauan Bangka Belitung', 'Kota Pangkalpinang', 'Dinas Lingkungan Hidup - Jalan Air Itam Komplek Perkantoran Gubernur Kepulauan Bangka Belitung', '2_ikon_2_ikon_bg21.png', '', 'Dinas-Lingkungan-Hidup-Provinsi-Kepulauan-Bangka-Belitung-1376564909127317', 'dlhprovbabel', 'dinaslingkunganhidupbabel/');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_absensi`
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
-- Dumping data for table `rekap_absensi`
--

INSERT INTO `rekap_absensi` (`id_rekap`, `tgl`, `nip`, `i`, `s`, `c`, `tk`) VALUES
(2, '2019-01-01', '196403261987101001', 1, 0, 0, 0),
(3, '2019-01-01', '9967564568943644234', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sk`
--

CREATE TABLE `sk` (
  `id` int(10) NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sk`
--

INSERT INTO `sk` (`id`, `keterangan`) VALUES
(1, 'Kenaikan Pengkat'),
(2, 'Kenaikan Gaji Berkala');

-- --------------------------------------------------------

--
-- Table structure for table `s_ijasah`
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
-- Table structure for table `s_kenaikan`
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
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nip`, `password`, `nama`, `level`, `gender`, `foto`, `status`) VALUES
('dora', '19741204 200501 2 002', '$2y$05$G2Fh4et2yDGhSX5bupeYkuRZ/h3Cg7yvkTdbKAsJKVqwwykWdqWA6', 'Dora Wardani', 'admin', 'l', 'dora_dora.png', 'Aktif'),
('megaoktarian', '197910072003121001', '$2y$05$a0hjCAg7m9axIJzW4WgkYeTUlBeDjqWRik1sSlGbdpBiu/eYMXC7.', 'Mega Oktarian, S.SI, M.Eng', 'user', 'l', 'megaoktarian_Mega Oktarian.jpg', 'Aktif'),
('robialakbar', '199403242015021001', '$2y$05$C2q8dTcpUZWPVcUi.Fs8ue47cNpYbv.sQdaq0b5gJUUXOkrfQxH.u', 'robi al akbar', 'user', 'l', 'robialakbar_Untitled.png', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `wa`
--

CREATE TABLE `wa` (
  `id` int(1) NOT NULL,
  `token` varchar(155) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wa`
--

INSERT INTO `wa` (`id`, `token`) VALUES
(1, 'PKNHakeUXpqQVWYv20qCGqcmyRfxdDgk8rzkzafFshf1o7d0y3Q4DWyOwnhSSbBn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `detail_s_ijasah`
--
ALTER TABLE `detail_s_ijasah`
  ADD PRIMARY KEY (`id_detail_s_ijasah`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`golongan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`50`);

--
-- Indexes for table `jml_hari_rekap`
--
ALTER TABLE `jml_hari_rekap`
  ADD PRIMARY KEY (`id_jml`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekap_absensi`
--
ALTER TABLE `rekap_absensi`
  ADD PRIMARY KEY (`id_rekap`);

--
-- Indexes for table `sk`
--
ALTER TABLE `sk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_ijasah`
--
ALTER TABLE `s_ijasah`
  ADD PRIMARY KEY (`id_s_ijasah`);

--
-- Indexes for table `s_kenaikan`
--
ALTER TABLE `s_kenaikan`
  ADD PRIMARY KEY (`id_s_kenaikan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `wa`
--
ALTER TABLE `wa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_s_ijasah`
--
ALTER TABLE `detail_s_ijasah`
  MODIFY `id_detail_s_ijasah` bigint(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `50` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `sk`
--
ALTER TABLE `sk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
