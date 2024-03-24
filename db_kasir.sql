/*
SQLyog Trial v13.1.8 (64 bit)
MySQL - 10.4.32-MariaDB : Database - db_kasir
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_kasir` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `db_kasir`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2019_12_14_000001_create_personal_access_tokens_table',1),
(3,'2024_01_26_153224_barang',1),
(4,'2024_01_26_153302_jenis_barang',1),
(5,'2024_01_26_153409_transaksi',1),
(6,'2024_01_26_153450_detail_transaksi',1),
(7,'2024_01_26_155024_diskon',1);

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `tbl_barang` */

DROP TABLE IF EXISTS `tbl_barang`;

CREATE TABLE `tbl_barang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_jenis` int(11) NOT NULL,
  `namabarang` varchar(255) DEFAULT NULL,
  `harga` bigint(20) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_barang` */

insert  into `tbl_barang`(`id`,`id_jenis`,`namabarang`,`harga`,`stok`,`created_at`,`updated_at`) values 
(2,1,'Cakra Kembar',10000,34,'2024-03-12 02:53:47','2024-03-12 02:56:22');

/*Table structure for table `tbl_detail_transaksi` */

DROP TABLE IF EXISTS `tbl_detail_transaksi`;

CREATE TABLE `tbl_detail_transaksi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(255) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_detail_transaksi` */

/*Table structure for table `tbl_diskon` */

DROP TABLE IF EXISTS `tbl_diskon`;

CREATE TABLE `tbl_diskon` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `total_belanja` varchar(255) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_diskon` */

insert  into `tbl_diskon`(`id`,`total_belanja`,`diskon`,`created_at`,`updated_at`) values 
(1,'100000',10,NULL,'2024-03-16 00:26:20');

/*Table structure for table `tbl_jenis_barang` */

DROP TABLE IF EXISTS `tbl_jenis_barang`;

CREATE TABLE `tbl_jenis_barang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_jenis_barang` */

insert  into `tbl_jenis_barang`(`id`,`nama_jenis`,`created_at`,`updated_at`) values 
(1,'Makanan','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(2,'Minuman','2024-03-11 23:30:54','2024-03-11 23:30:54');

/*Table structure for table `tbl_transaksi` */

DROP TABLE IF EXISTS `tbl_transaksi`;

CREATE TABLE `tbl_transaksi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(255) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `kembalian` bigint(20) DEFAULT NULL,
  `uang_pembeli` bigint(20) DEFAULT NULL,
  `total_bayar` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tbl_transaksi` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','kasir') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`role`,`created_at`,`updated_at`) values 
(1,'admin','admin@gmail.com','admin','admin',NULL,NULL),
(4,'kasir','kasir@gmail.com','$2y$12$X7Rfy1hMTdSNKvzZ7xz4AuMsR0EfBeB52vu7iK7ymEn3/15TDrB9a','kasir','2024-03-16 04:10:52','2024-03-16 04:10:52');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
