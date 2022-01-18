/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lamaran_id` bigint(20) unsigned DEFAULT NULL,
  `jalan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_lamaran_id_foreign` (`lamaran_id`),
  CONSTRAINT `addresses_lamaran_id_foreign` FOREIGN KEY (`lamaran_id`) REFERENCES `lamarans` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lamaran_id` bigint(20) unsigned DEFAULT NULL,
  `file_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_nilai_ijazah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_skck` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_sim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_surat_sehat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_lamaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `files_lamaran_id_foreign` (`lamaran_id`),
  CONSTRAINT `files_lamaran_id_foreign` FOREIGN KEY (`lamaran_id`) REFERENCES `lamarans` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian_umum_pekerjaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `persyaratan_khusus` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_tertulis` int(11) DEFAULT NULL,
  `minimum_wawancara` int(11) DEFAULT NULL,
  `minimum_praktik` int(11) DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `lamarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `job_id` bigint(20) unsigned DEFAULT NULL,
  `no_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_skck` date NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat_sehat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lamarans_user_id_foreign` (`user_id`),
  KEY `lamarans_job_id_foreign` (`job_id`),
  CONSTRAINT `lamarans_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  CONSTRAINT `lamarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) unsigned DEFAULT NULL,
  `aktifitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logs_user_id_foreign` (`admin_id`),
  CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `nilais` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lamaran_id` bigint(20) unsigned DEFAULT NULL,
  `berkas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ujian_tertulis` int(11) DEFAULT NULL,
  `wawancara` int(11) DEFAULT NULL,
  `praktik` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nilais_lamaran_id_foreign` (`lamaran_id`),
  CONSTRAINT `nilais_lamaran_id_foreign` FOREIGN KEY (`lamaran_id`) REFERENCES `lamarans` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lamaran_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `step` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `statuses_lamaran_id_foreign` (`lamaran_id`),
  KEY `statuses_user_id_foreign` (`user_id`),
  CONSTRAINT `statuses_lamaran_id_foreign` FOREIGN KEY (`lamaran_id`) REFERENCES `lamarans` (`id`),
  CONSTRAINT `statuses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `timelines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `timeline_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeline_start` date DEFAULT NULL,
  `timeline_end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `jenis_kelamin` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `addresses` (`id`, `lamaran_id`, `jalan`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `created_at`, `updated_at`) VALUES
(12, 12, '1234', '8', '123', '12345', 'harapan jaya', 'bekasi', 'jawa barat', '2022-01-16 10:08:15', '2022-01-16 10:08:15');
INSERT INTO `addresses` (`id`, `lamaran_id`, `jalan`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `created_at`, `updated_at`) VALUES
(13, 13, 'Anggrek', '8', '21', 'Bekasi Utara', 'Harapan Jaya', 'Bekasi', 'Jawa Barat', '2022-01-16 12:47:14', '2022-01-16 12:47:14');




INSERT INTO `files` (`id`, `lamaran_id`, `file_ktp`, `file_kk`, `file_foto`, `file_nilai_ijazah`, `file_npwp`, `file_skck`, `file_sim`, `file_surat_sehat`, `file_sertifikat`, `file_lamaran`, `file_cv`, `created_at`, `updated_at`) VALUES
(9, 12, '4_VCLASS TT BIG DATA M1-M14 (2).pdf', '4_VCLASS TT BIG DATA M1-M14 (2).pdf', '4_dante-paradiso.jpg', '4_VCLASS TT BIG DATA M1-M14 (2).pdf', '4_VCLASS TT BIG DATA M1-M14 (2).pdf', '4_VCLASS TT BIG DATA M1-M14 (2).pdf', NULL, '4_VCLASS TT BIG DATA M1-M14 (2).pdf', '4_VCLASS TT BIG DATA M1-M14 (2).pdf', '4_VCLASS TT BIG DATA M1-M14 (2).pdf', '4_VCLASS TT BIG DATA M1-M14 (2).pdf', '2022-01-16 10:08:15', '2022-01-16 10:08:15');
INSERT INTO `files` (`id`, `lamaran_id`, `file_ktp`, `file_kk`, `file_foto`, `file_nilai_ijazah`, `file_npwp`, `file_skck`, `file_sim`, `file_surat_sehat`, `file_sertifikat`, `file_lamaran`, `file_cv`, `created_at`, `updated_at`) VALUES
(10, 13, '5_VCLASS TT BIG DATA M1-M14 (2).pdf', '5_VCLASS TT BIG DATA M1-M14 (2).pdf', '5_dante-paradiso.jpg', '5_VCLASS TT BIG DATA M1-M14 (2).pdf', '5_VCLASS TT BIG DATA M1-M14 (2).pdf', '5_VCLASS TT BIG DATA M1-M14 (2).pdf', NULL, '5_VCLASS TT BIG DATA M1-M14 (2).pdf', '5_VCLASS TT BIG DATA M1-M14 (2).pdf', '5_VCLASS TT BIG DATA M1-M14 (2).pdf', '5_VCLASS TT BIG DATA M1-M14 (2).pdf', '2022-01-16 12:47:14', '2022-01-16 12:47:14');


INSERT INTO `jobs` (`id`, `nama_pekerjaan`, `uraian_umum_pekerjaan`, `persyaratan_khusus`, `minimum_tertulis`, `minimum_wawancara`, `minimum_praktik`, `kuota`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Petugas Kesehatan Satwa', 'Memeriksa, mendiagnosa, melakukan terapi pengobatan dan memberikan rekomendasi medis terkait kesehatan satwa/ternak dan membuat laporan medis.', 'Petugas Kesehatan Satwa diutamakan yang sudah berpengalaman dibidangnya. Ijazah terakhir minimal Dokter Hewan.', 80, NULL, NULL, 10, 'Petugas Kesehatan Satwa.png', NULL, '2022-01-08 11:57:14');
INSERT INTO `jobs` (`id`, `nama_pekerjaan`, `uraian_umum_pekerjaan`, `persyaratan_khusus`, `minimum_tertulis`, `minimum_wawancara`, `minimum_praktik`, `kuota`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'Tenaga Laboratorium', 'Menerima, melakukan pengujian, membuat laporan hasil uji sampel serta memelihara peralatan kerja.', 'Tenaga Laboratorium diutamakan yang sudah pernah bekerja di laboratorium/klinik hewan baik negeri ataupun swasta. Ijazah terakhir minimal SMA sederajat.', 80, 50, NULL, 30, 'Tenaga Laboratorium.png', NULL, '2022-01-08 11:57:21');
INSERT INTO `jobs` (`id`, `nama_pekerjaan`, `uraian_umum_pekerjaan`, `persyaratan_khusus`, `minimum_tertulis`, `minimum_wawancara`, `minimum_praktik`, `kuota`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'Tenaga Teknis Perawat Satwa', 'Menerima, memelihara dan merawat satwa/ternak serta membersihkan kandang, sarana prasarana kandang dan lingkungan sekitarnya.', 'Tenaga Teknis Perawat Satwa diutamakan yang sudah berpengalaman dibidangnya. Ijazah minimal SD sederajat.', 70, 70, 60, 5, 'Tenaga Teknis Perawat Satwa.png', NULL, '2022-01-13 11:39:57');
INSERT INTO `jobs` (`id`, `nama_pekerjaan`, `uraian_umum_pekerjaan`, `persyaratan_khusus`, `minimum_tertulis`, `minimum_wawancara`, `minimum_praktik`, `kuota`, `gambar`, `created_at`, `updated_at`) VALUES
(4, 'Petugas IPAL', 'Menerima dan mengolah limbah (kotoran hewan dan hasil ikutannya) serta membersihkan dan memelihara IPAL serta lingkungan sekitarnya.', 'Petugas IPAL diutamakan yang sudah berpengalaman dibidangnya. Ijazah minimal SD sederajat.', 90, 70, NULL, 0, 'Petugas IPAL.png', NULL, '2022-01-13 12:49:04'),
(5, 'Petugas Keurmaster', 'Memeriksa post-mortem ternak potong dan memberi tanda daging layak konsumsi.', 'Petugas Keurmaster diutamakan yang sudah berpengalaman dibidangnya. Ijazah terakhir minimal SMP sederajat.', NULL, NULL, NULL, 20, 'Petugas Keurmaster.png', NULL, '2022-01-13 12:55:52'),
(6, 'Tenaga Mekanik dan Listrik', 'Memeriksa, memelihara, memonitoring dan melakukan perbaikan terhadap sarana prasarana kantor yang berhubungan dengan mesin dan elektronik.', 'Tenaga Mekanik dan Listrik diutamakan yang sudah berpengalaman dibidangnya. Ijazah terakhir minimal SMA sederajat.', NULL, NULL, NULL, 30, 'Tenaga Mekanik dan Listrik.png', NULL, '2022-01-16 13:17:08'),
(7, 'Petugas Customer Relation', 'Memberikan pelayanan prima dan membina hubungan baik dengan konsumen, menyediakan informasi dan menjawab pertanyaan seputar produk atau jasa, membantu menyelesaikan berbagai complain konsumen, melakukan promosi dan kerjasama serta membuat inovasi untuk menarik konsumen.', 'Petugas Customer Relation diutamakan yang sudah berpengalaman dibidangnya. Ijazah terakhir minimal S1 Peternakan.', 80, 80, 80, 10, 'Petugas Customer Relation.png', NULL, NULL),
(8, 'Petugas Informasi', 'Mengelola data dan sistem informasi, melakukan update data dan informasi baik di sistem, web, serta sosial media, melakukan perawatan dan pemeliharaan sistem dan aplikasi baik software maupun hardware.', 'Petugas Informasi diutamakan yang sudah berpengalaman dibidangnya. Ijazah terakhir minimal S1 Informatika/Komputer.', NULL, NULL, NULL, 70, 'Petugas Informasi.png', NULL, '2022-01-13 12:55:28'),
(9, 'Tenaga Supir', 'Mengemudikan, memelihara dan merawat kendaraan dinas operasional.', 'Tenaga Supir diutamakan yang sudah berpengalaman dibidangnya. Ijazah terakhir minimal SMA sederajat dan memiliki SIM A dan C.', NULL, NULL, NULL, 10, 'Tenaga Supir.png', NULL, '2022-01-16 13:16:07'),
(10, 'Petugas Penerima Tamu', 'Menyapa, melayani, memberikan informasi kepada pengunjung atau pihak yang berkepentingan terkait tujuan yang diinginkan.', 'Petugas Penerima Tamu diutamakan yang sudah berpengalaman dibidangnya. Ijazah terakhir minimal SMA sederajat.', NULL, NULL, NULL, NULL, 'Petugas Penerima Tamu.png', NULL, NULL),
(11, 'Tenaga Keamanan Kantor', 'Melakukan pengawasan dan pengamanan rutin sehari-hari baik gedung, fasilitas sarana dan prasarana, maupun sarana dan lingkungan di sekitarnya.', 'Tenaga Keamanan Kantor diutamakan yang sudah berpengalaman dibidangnya. Ijazah terakhir minimal SMP sederajat dan memiliki sertifikat security.', NULL, NULL, NULL, NULL, 'Tenaga Keamanan Kantor.png', NULL, NULL),
(12, 'Tenaga Kebersihan Kantor', 'Memelihara, merawat dan menjaga kebersihan kantor, taman, jalan, saluran serta sarana lain seperti mess, aula, rumah dinas, rumah potong hewan secara terus menerus setiap hari.', 'Tenaga Kebersihan Kantor diutamakan yang sudah berpengalaman dibidangnya. Ijazah terakhir minimal SMP sederajat.', NULL, NULL, NULL, NULL, 'Tenaga Kebersihan Kantor.png', NULL, NULL);

INSERT INTO `lamarans` (`id`, `user_id`, `job_id`, `no_kk`, `pendidikan`, `npwp`, `tanggal_skck`, `bank`, `rekening`, `surat_sehat`, `status`, `created_at`, `updated_at`) VALUES
(12, 4, 7, '1234555', 'SMA/SMK/Sederajat', '112344', '2022-01-18', 'BCA', '12344', 'Rumah Sakit Pemerintah', 'Lulus', '2022-01-16 10:08:15', '2022-01-16 10:42:05');
INSERT INTO `lamarans` (`id`, `user_id`, `job_id`, `no_kk`, `pendidikan`, `npwp`, `tanggal_skck`, `bank`, `rekening`, `surat_sehat`, `status`, `created_at`, `updated_at`) VALUES
(13, 5, 3, '123445', 'SMP/Sederajat', '123', '2022-01-19', 'BCA', '12344', 'Puskesmas', 'Lulus', '2022-01-16 12:47:14', '2022-01-16 13:05:36');
INSERT INTO `lamarans` (`id`, `user_id`, `job_id`, `no_kk`, `pendidikan`, `npwp`, `tanggal_skck`, `bank`, `rekening`, `surat_sehat`, `status`, `created_at`, `updated_at`) VALUES
(14, 5, 7, '123', 'as', 'asd', '2022-01-19', 'a', 'asd', 'asd', 'asd', NULL, NULL);
INSERT INTO `lamarans` (`id`, `user_id`, `job_id`, `no_kk`, `pendidikan`, `npwp`, `tanggal_skck`, `bank`, `rekening`, `surat_sehat`, `status`, `created_at`, `updated_at`) VALUES
(15, 5, 7, '123', 'as', 'asd', '2022-01-19', 'a', 'asd', 'asd', 'asd', NULL, NULL),
(16, 5, 3, '123445', 'SMP/Sederajat', '123', '2022-01-19', 'BCA', '12344', 'Puskesmas', 'Lulus', '2022-01-16 12:47:14', '2022-01-16 13:05:36'),
(17, 4, 7, '1234555', 'SMA/SMK/Sederajat', '112344', '2022-01-18', 'BCA', '12344', 'Rumah Sakit Pemerintah', 'Lulus', '2022-01-16 10:08:15', '2022-01-16 10:42:05'),
(18, 4, 7, '1234555', 'SMA/SMK/Sederajat', '112344', '2022-01-18', 'BCA', '12344', 'Rumah Sakit Pemerintah', 'Lulus', '2022-01-16 10:08:15', '2022-01-16 10:42:05'),
(19, 5, 8, '123445', 'SMP/Sederajat', '123', '2022-01-19', 'BCA', '12344', 'Puskesmas', 'Lulus', '2022-01-16 12:47:14', '2022-01-16 13:05:36'),
(20, 5, 9, '123', 'as', 'asd', '2022-01-19', 'a', 'asd', 'asd', 'asd', NULL, NULL),
(21, 5, 10, '123', 'as', 'asd', '2022-01-19', 'a', 'asd', 'asd', 'asd', NULL, NULL),
(22, 5, 12, '123445', 'SMP/Sederajat', '123', '2022-01-19', 'BCA', '12344', 'Puskesmas', 'Lulus', '2022-01-16 12:47:14', '2022-01-16 13:05:36'),
(23, 4, 11, '1234555', 'SMA/SMK/Sederajat', '112344', '2022-01-18', 'BCA', '12344', 'Rumah Sakit Pemerintah', 'Lulus', '2022-01-16 10:08:15', '2022-01-16 10:42:05'),
(24, 4, 11, '1234555', 'SMA/SMK/Sederajat', '112344', '2022-01-18', 'BCA', '12344', 'Rumah Sakit Pemerintah', 'Lulus', '2022-01-16 10:08:15', '2022-01-16 10:42:05'),
(25, 5, 12, '123445', 'SMP/Sederajat', '123', '2022-01-19', 'BCA', '12344', 'Puskesmas', 'Lulus', '2022-01-16 12:47:14', '2022-01-16 13:05:36'),
(26, 5, 10, '123', 'as', 'asd', '2022-01-19', 'a', 'asd', 'asd', 'asd', NULL, NULL),
(27, 5, 1, '123', 'as', 'asd', '2022-01-19', 'a', 'asd', 'asd', 'asd', NULL, NULL),
(28, 4, 1, '1234555', 'SMA/SMK/Sederajat', '112344', '2022-01-18', 'BCA', '12344', 'Rumah Sakit Pemerintah', 'Lulus', '2022-01-16 10:08:15', '2022-01-16 10:42:05'),
(29, 4, 2, '1234555', 'SMA/SMK/Sederajat', '112344', '2022-01-18', 'BCA', '12344', 'Rumah Sakit Pemerintah', 'Lulus', '2022-01-16 10:08:15', '2022-01-16 10:42:05'),
(30, 5, 3, '123445', 'SMP/Sederajat', '123', '2022-01-19', 'BCA', '12344', 'Puskesmas', 'Lulus', '2022-01-16 12:47:14', '2022-01-16 13:05:36');

INSERT INTO `logs` (`id`, `admin_id`, `aktifitas`, `created_at`, `updated_at`) VALUES
(1, 4, 'Menerima berkas Peserta 4', '2022-01-16 10:18:25', '2022-01-16 10:18:25');
INSERT INTO `logs` (`id`, `admin_id`, `aktifitas`, `created_at`, `updated_at`) VALUES
(6, 4, 'Meninput nilai tes tertulis Peserta 4', '2022-01-16 10:36:07', '2022-01-16 10:36:07');
INSERT INTO `logs` (`id`, `admin_id`, `aktifitas`, `created_at`, `updated_at`) VALUES
(9, 4, 'Meninput nilai tes wawancara Peserta 4', '2022-01-16 10:37:59', '2022-01-16 10:37:59');
INSERT INTO `logs` (`id`, `admin_id`, `aktifitas`, `created_at`, `updated_at`) VALUES
(11, 4, 'Mencetak data laporan tahap 2', '2022-01-16 10:44:55', '2022-01-16 10:44:55'),
(15, 1, 'Menerima berkas Peserta-13', '2022-01-16 12:53:20', '2022-01-16 12:53:20'),
(16, 1, 'Meninput nilai tes tertulis Peserta-13', '2022-01-16 12:54:28', '2022-01-16 12:54:28'),
(18, 1, 'Meninput nilai tes wawancara Peserta-13', '2022-01-16 12:56:31', '2022-01-16 12:56:31'),
(24, 1, 'Meninput nilai tes praktik Peserta-13', '2022-01-16 13:05:36', '2022-01-16 13:05:36'),
(27, 1, 'Mengupdate jadwal Tahap 1 Seleksi Berkas - 16 Jan 2022 / 19 Jan 2022', '2022-01-16 13:13:25', '2022-01-16 13:13:25'),
(28, 1, 'Mengupdate jadwal Tahap 3 Wawancara - 18 Jan 2022 / 21 Jan 2022', '2022-01-16 13:13:51', '2022-01-16 13:13:51'),
(30, 1, 'Mengupdate jumlah kuota Tenaga Mekanik dan Listrik - 30', '2022-01-16 13:17:08', '2022-01-16 13:17:08');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(38, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(39, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(40, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(42, '2022_01_04_162902_create_timelines_table', 1),
(43, '2022_01_06_133325_create_roles_table', 1),
(44, '2022_01_06_133444_update_table_user_insert', 1),
(46, '2022_01_06_141352_create_jobs_table', 2),
(54, '2022_01_06_161008_create_lamarans_table', 3),
(55, '2022_01_06_162053_create_addresses_table', 3),
(56, '2022_01_06_162252_create_files_table', 3),
(57, '2022_01_07_145601_update_table_lamaran', 4),
(60, '2022_01_07_165507_create_nilais_table', 5),
(62, '2022_01_08_111604_update_table_job', 6),
(63, '2022_01_13_102730_update_table_user_insert_table', 7),
(64, '2022_01_13_120326_create_statuses_table', 8),
(65, '2022_01_14_173024_update_table_statuses_ket', 9),
(66, '2022_01_14_180129_update_table_nilai_insert_berkas', 10),
(67, '2022_01_14_181454_create_logs_table', 11);

INSERT INTO `nilais` (`id`, `lamaran_id`, `berkas`, `ujian_tertulis`, `wawancara`, `praktik`, `created_at`, `updated_at`, `job_id`) VALUES
(10, 12, 'Lulus', 90, 90, NULL, '2022-01-16 10:18:25', '2022-01-16 10:37:59', 7);
INSERT INTO `nilais` (`id`, `lamaran_id`, `berkas`, `ujian_tertulis`, `wawancara`, `praktik`, `created_at`, `updated_at`, `job_id`) VALUES
(16, 13, 'Lulus', 80, 80, 80, '2022-01-16 12:52:47', '2022-01-16 13:05:36', 3);
INSERT INTO `nilais` (`id`, `lamaran_id`, `berkas`, `ujian_tertulis`, `wawancara`, `praktik`, `created_at`, `updated_at`, `job_id`) VALUES
(18, 14, 'asdd', 85, NULL, NULL, NULL, NULL, 7);
INSERT INTO `nilais` (`id`, `lamaran_id`, `berkas`, `ujian_tertulis`, `wawancara`, `praktik`, `created_at`, `updated_at`, `job_id`) VALUES
(19, 27, 'asdd', 85, NULL, NULL, NULL, NULL, 7),
(20, 28, 'Lulus', 80, 80, 80, '2022-01-16 12:52:47', '2022-01-16 13:05:36', 3),
(21, 29, 'Lulus', 90, 90, NULL, '2022-01-16 10:18:25', '2022-01-16 10:37:59', 7),
(22, 30, 'Lulus', 94, 90, NULL, '2022-01-16 10:18:25', '2022-01-16 10:37:59', 7),
(23, 23, 'Lulus', 93, 90, NULL, '2022-01-16 10:18:25', '2022-01-16 10:37:59', 7),
(24, 24, 'Lulus', 82, 80, 80, '2022-01-16 12:52:47', '2022-01-16 13:05:36', 3);





INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL);
INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(2, 'user', NULL, NULL);


INSERT INTO `statuses` (`id`, `lamaran_id`, `user_id`, `step`, `ket`, `status`, `created_at`, `updated_at`) VALUES
(16, 12, 4, 'STEP 1', 'PENYORTIRAN BERKAS', 'PROSES', '2022-01-16 10:08:15', '2022-01-16 10:08:15');
INSERT INTO `statuses` (`id`, `lamaran_id`, `user_id`, `step`, `ket`, `status`, `created_at`, `updated_at`) VALUES
(21, 12, 4, 'STEP 1', 'PENYORTIRAN BERKAS', 'LULUS', '2022-01-16 10:18:25', '2022-01-16 10:18:25');
INSERT INTO `statuses` (`id`, `lamaran_id`, `user_id`, `step`, `ket`, `status`, `created_at`, `updated_at`) VALUES
(22, 12, 4, 'STEP 2', 'UJIAN TERTULIS', 'LULUS', '2022-01-16 10:32:32', '2022-01-16 10:36:07');
INSERT INTO `statuses` (`id`, `lamaran_id`, `user_id`, `step`, `ket`, `status`, `created_at`, `updated_at`) VALUES
(25, 12, 4, 'STEP 3', 'UJIAN WAWANCARA', 'LULUS', '2022-01-16 10:37:59', '2022-01-16 13:00:06'),
(26, 12, 4, 'STEP 1', 'PENYORTIRAN BERKAS', 'LULUS', '2022-01-16 10:41:18', '2022-01-16 10:41:18'),
(27, 12, 4, 'STEP 1', 'PENYORTIRAN BERKAS', 'LULUS', '2022-01-16 10:42:05', '2022-01-16 10:42:05'),
(33, 13, 5, 'STEP 1', 'PENYORTIRAN BERKAS', 'LULUS', '2022-01-16 12:52:47', '2022-01-16 12:52:47'),
(34, 13, 5, 'STEP 1', 'PENYORTIRAN BERKAS', 'LULUS', '2022-01-16 12:53:20', '2022-01-16 12:53:20'),
(35, 13, 5, 'STEP 2', 'UJIAN TERTULIS', 'LULUS', '2022-01-16 12:54:28', '2022-01-16 12:54:28'),
(37, 13, 5, 'STEP 3', 'UJIAN WAWANCARA', 'LULUS', '2022-01-16 12:56:31', '2022-01-16 13:00:06'),
(39, 13, 5, 'STEP 4', 'UJIAN PRAKTIK', 'LULUS', '2022-01-16 13:05:36', '2022-01-16 13:05:36');

INSERT INTO `timelines` (`id`, `timeline_name`, `timeline_start`, `timeline_end`, `created_at`, `updated_at`) VALUES
(1, 'Pengumuman dan Pembukaan Lamaran', '2022-01-01', '2022-01-17', NULL, '2022-01-13 12:54:22');
INSERT INTO `timelines` (`id`, `timeline_name`, `timeline_start`, `timeline_end`, `created_at`, `updated_at`) VALUES
(2, 'Tahap 1 Seleksi Berkas', '2022-01-16', '2022-01-19', NULL, '2022-01-16 13:13:17');
INSERT INTO `timelines` (`id`, `timeline_name`, `timeline_start`, `timeline_end`, `created_at`, `updated_at`) VALUES
(3, 'Tahap 2 Ujian Tertulis', '2022-02-01', '2022-02-19', NULL, '2022-01-13 12:54:43');
INSERT INTO `timelines` (`id`, `timeline_name`, `timeline_start`, `timeline_end`, `created_at`, `updated_at`) VALUES
(4, 'Tahap 3 Wawancara', '2022-01-18', '2022-01-21', NULL, '2022-01-16 13:13:51'),
(5, 'Tahap 4 Ujian Praktek (Khusus Petugas Kesehatan Satwa', NULL, NULL, NULL, NULL),
(6, 'Negoisasi dan Penutupan', NULL, NULL, NULL, NULL);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `nik`, `role_id`, `jenis_kelamin`, `tanggal_lahir`, `no_hp`, `address`, `profile_picture`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$GZGIXzPaWmqC8TFokqgKr.MCe0wYOwdI2wCFrqueYs1qMok.JE8SG', NULL, '2022-01-06 13:49:45', '2022-01-06 13:49:45', '1111', 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `nik`, `role_id`, `jenis_kelamin`, `tanggal_lahir`, `no_hp`, `address`, `profile_picture`) VALUES
(4, 'Mohammad Akmal Updated', 'akmal@gmail.com', NULL, '$2y$10$GZGIXzPaWmqC8TFokqgKr.MCe0wYOwdI2wCFrqueYs1qMok.JE8SG', NULL, '2022-01-06 13:56:02', '2022-01-16 10:08:15', '3211', 2, 'L', '2022-01-01 00:00:00', '082111768038', 'asdasd', '4_me.jpg');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `nik`, `role_id`, `jenis_kelamin`, `tanggal_lahir`, `no_hp`, `address`, `profile_picture`) VALUES
(5, 'Akmal Satwa', 'akmal@satwa.com', NULL, 'password', NULL, '2022-01-16 12:45:19', '2022-01-16 12:47:14', '3275031501660011', 2, 'L', '2021-12-01 00:00:00', '08211', NULL, NULL);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;