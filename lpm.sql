-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for lpm
CREATE DATABASE IF NOT EXISTS `lpm` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `lpm`;

-- Dumping structure for table lpm.anggotapkm
CREATE TABLE IF NOT EXISTS `anggotapkm` (
  `id` int(11) NOT NULL,
  `id_pkm` int(11) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nidn/nrp` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `instansi` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `nohp` varchar(50) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `thn_lulus` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__anggotakegiatanpkm` (`id_pkm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.buku
CREATE TABLE IF NOT EXISTS `buku` (
  `id` int(11) NOT NULL,
  `nidn` varchar(50) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `jum_halaman` varchar(50) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.dosen
CREATE TABLE IF NOT EXISTS `dosen` (
  `nidn` varchar(50) NOT NULL DEFAULT '',
  `nama` varchar(50) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `jab_fungsional` varchar(50) DEFAULT NULL,
  `golongan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nidn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table lpm.fasilitas
CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NamaLab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Lingkup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SK` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table lpm.forum_ilmiah
CREATE TABLE IF NOT EXISTS `forum_ilmiah` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `judul_forum_ilmiah` varchar(50) DEFAULT NULL,
  `tingkat` varchar(50) DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `penyelenggara` varchar(50) DEFAULT NULL,
  `tgl_dari` date DEFAULT NULL,
  `tgl_sampai` date DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.haki
CREATE TABLE IF NOT EXISTS `haki` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `no_daftar` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.ipteklain
CREATE TABLE IF NOT EXISTS `ipteklain` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `nidn` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ipteklain_dosen` (`nidn`),
  CONSTRAINT `FK_ipteklain_dosen` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.jurnal_internasional
CREATE TABLE IF NOT EXISTS `jurnal_internasional` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `nama_jurnal` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `p-issn` varchar(50) DEFAULT NULL,
  `e-issn` varchar(50) DEFAULT NULL,
  `volume` varchar(50) DEFAULT NULL,
  `nomor` varchar(50) DEFAULT NULL,
  `halaman` varchar(50) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.kegiatanpkm
CREATE TABLE IF NOT EXISTS `kegiatanpkm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `roadmap` varchar(50) DEFAULT NULL,
  `bidang` varchar(50) DEFAULT NULL,
  `jeniskegiatan` varchar(50) DEFAULT NULL,
  `skala` varchar(50) DEFAULT NULL,
  `dana` int(11) DEFAULT NULL,
  `sumberdana` varchar(50) DEFAULT NULL,
  `tahun_mulai` year(4) DEFAULT NULL,
  `tahun_akhir` year(4) DEFAULT NULL,
  `sumberiptek` varchar(50) DEFAULT NULL,
  `danapendamping` int(11) DEFAULT NULL,
  `lab` varchar(50) DEFAULT NULL,
  `kelengkapan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.kelembagaan_pengabdian
CREATE TABLE IF NOT EXISTS `kelembagaan_pengabdian` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_sk` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `no_fax` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `no_sk_resentra` varchar(50) DEFAULT NULL,
  `sk_pendirian` varchar(50) DEFAULT NULL,
  `resentra` varchar(50) DEFAULT NULL,
  `nama_ketua` varchar(50) DEFAULT NULL,
  `nidn` varchar(50) DEFAULT NULL,
  `ruang_pimpinan` varchar(50) DEFAULT NULL,
  `ruang_administrasi` varchar(50) DEFAULT NULL,
  `ruang_penyimpanan_arsip` varchar(50) DEFAULT NULL,
  `ruang_pertemuan` varchar(50) DEFAULT NULL,
  `ruang_seminar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_kelembagaan_pengabdian_dosen` (`nidn`),
  CONSTRAINT `FK_kelembagaan_pengabdian_dosen` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.luaran
CREATE TABLE IF NOT EXISTS `luaran` (
  `id` int(11) NOT NULL,
  `jurnal_internasional` int(11) DEFAULT NULL,
  `media_massa` int(11) DEFAULT NULL,
  `forum_ilmiah` int(11) DEFAULT NULL,
  `haki` int(11) DEFAULT NULL,
  `iptek_lain` int(11) DEFAULT NULL,
  `prod_terstandarisasi` int(11) DEFAULT NULL,
  `prod_tersertifikasi` int(11) DEFAULT NULL,
  `mitra_berbadan_hukum` int(11) DEFAULT NULL,
  `buku` int(11) DEFAULT NULL,
  `wiraursaha_baru_mandiri` int(11) DEFAULT NULL,
  `id_pkm` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_luaran_jurnal_internasional` (`jurnal_internasional`),
  KEY `FK_luaran_media_massa` (`media_massa`),
  KEY `FK_luaran_forum_ilmiah` (`forum_ilmiah`),
  KEY `FK_luaran_haki` (`haki`),
  KEY `FK_luaran_ipteklain` (`iptek_lain`),
  KEY `FK_luaran_prod_tesertifikasi` (`prod_tersertifikasi`),
  KEY `FK_luaran_prod_terstandarisasi` (`prod_terstandarisasi`),
  KEY `FK_luaran_mitra_berbadan_hukum` (`mitra_berbadan_hukum`),
  KEY `FK_luaran_buku` (`buku`),
  KEY `FK_luaran_wirausaha_baru_mandiri` (`wiraursaha_baru_mandiri`),
  KEY `FK_luaran_kegiatanpkm` (`id_pkm`),
  CONSTRAINT `FK_luaran_buku` FOREIGN KEY (`buku`) REFERENCES `buku` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_luaran_forum_ilmiah` FOREIGN KEY (`forum_ilmiah`) REFERENCES `forum_ilmiah` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_luaran_haki` FOREIGN KEY (`haki`) REFERENCES `haki` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_luaran_ipteklain` FOREIGN KEY (`iptek_lain`) REFERENCES `ipteklain` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_luaran_jurnal_internasional` FOREIGN KEY (`jurnal_internasional`) REFERENCES `jurnal_internasional` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_luaran_media_massa` FOREIGN KEY (`media_massa`) REFERENCES `media_massa` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_luaran_mitra_berbadan_hukum` FOREIGN KEY (`mitra_berbadan_hukum`) REFERENCES `mitra_berbadan_hukum` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_luaran_prod_terstandarisasi` FOREIGN KEY (`prod_terstandarisasi`) REFERENCES `prod_terstandarisasi` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_luaran_prod_tesertifikasi` FOREIGN KEY (`prod_tersertifikasi`) REFERENCES `prod_tesertifikasi` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_luaran_wirausaha_baru_mandiri` FOREIGN KEY (`wiraursaha_baru_mandiri`) REFERENCES `wirausaha_baru_mandiri` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.managepengabdian
CREATE TABLE IF NOT EXISTS `managepengabdian` (
  `id` int(11) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `namasop` varchar(255) DEFAULT NULL,
  `konsistensi` enum('Konsisten','Tidak Konsisten') DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.media_massa
CREATE TABLE IF NOT EXISTS `media_massa` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `nama_media` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `volume` varchar(50) DEFAULT NULL,
  `nomor` varchar(50) DEFAULT NULL,
  `hal` varchar(50) DEFAULT NULL,
  `tgl_terbit` varchar(50) DEFAULT NULL,
  `skala` varchar(50) DEFAULT NULL,
  `nidn` varchar(50) DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_media_massa_dosen` (`nidn`),
  CONSTRAINT `FK_media_massa_dosen` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table lpm.mitra
CREATE TABLE IF NOT EXISTS `mitra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jarak(km)` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.mitrapkm
CREATE TABLE IF NOT EXISTS `mitrapkm` (
  `id` int(11) NOT NULL,
  `id_pkm` int(11) DEFAULT NULL,
  `id_mitra` int(11) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `manfaat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__kegiatanpkm` (`id_pkm`),
  KEY `FK__mitrapkm` (`id_mitra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.mitraub
CREATE TABLE IF NOT EXISTS `mitraub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ub` int(11) DEFAULT NULL,
  `id_mitra` int(11) DEFAULT NULL,
  `mou` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_mitraub_unitbisnis` (`id_ub`),
  KEY `FK_mitraub_mitra` (`id_mitra`),
  CONSTRAINT `FK_mitraub_mitra` FOREIGN KEY (`id_mitra`) REFERENCES `mitra` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_mitraub_unitbisnis` FOREIGN KEY (`id_ub`) REFERENCES `unitbisnis` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.mitra_berbadan_hukum
CREATE TABLE IF NOT EXISTS `mitra_berbadan_hukum` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_badan_hukum` varchar(50) DEFAULT NULL,
  `bidang_usaha` varchar(50) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table lpm.penulis_jurnal
CREATE TABLE IF NOT EXISTS `penulis_jurnal` (
  `id` int(11) NOT NULL,
  `id_jurnal` int(11) DEFAULT NULL,
  `nidn` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__jurnal_internasional` (`id_jurnal`),
  KEY `FK_penulis_jurnal_dosen` (`nidn`),
  CONSTRAINT `FK__jurnal_internasional` FOREIGN KEY (`id_jurnal`) REFERENCES `jurnal_internasional` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_penulis_jurnal_dosen` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table lpm.pkms
CREATE TABLE IF NOT EXISTS `pkms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roadmap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dana` int(11) NOT NULL,
  `sumberdana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_mulai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_akhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumberiptek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danapendamping` int(11) NOT NULL,
  `lab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelengkapan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table lpm.prodi
CREATE TABLE IF NOT EXISTS `prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.prod_terstandarisasi
CREATE TABLE IF NOT EXISTS `prod_terstandarisasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `nidn` varchar(50) DEFAULT NULL,
  `instansi` varchar(50) DEFAULT NULL,
  `no_keputusan` varchar(50) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_prod_terstandarisasi_dosen` (`nidn`),
  CONSTRAINT `FK_prod_terstandarisasi_dosen` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.prod_tesertifikasi
CREATE TABLE IF NOT EXISTS `prod_tesertifikasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `nidn` varchar(50) DEFAULT NULL,
  `instansi` varchar(50) DEFAULT NULL,
  `no_keputusan` varchar(50) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_prod_tesertifikasi_dosen` (`nidn`),
  CONSTRAINT `FK_prod_tesertifikasi_dosen` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.standarpkm
CREATE TABLE IF NOT EXISTS `standarpkm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(50) DEFAULT NULL,
  `Nomor` int(11) DEFAULT NULL,
  `Tahun` year(4) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `Dokumen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.unitbisnis
CREATE TABLE IF NOT EXISTS `unitbisnis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `nosk` varchar(50) DEFAULT NULL,
  `SKPUB` varchar(255) DEFAULT NULL,
  `LKUB` varchar(255) DEFAULT NULL,
  `Invoice` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table lpm.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table lpm.wirausaha_baru_mandiri
CREATE TABLE IF NOT EXISTS `wirausaha_baru_mandiri` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
