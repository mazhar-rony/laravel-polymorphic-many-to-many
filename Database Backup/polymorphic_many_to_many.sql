/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - polymorphic_many_to_many
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`polymorphic_many_to_many` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `polymorphic_many_to_many`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2020_07_23_022243_create_posts_table',1),
(2,'2020_07_23_022547_create_videos_table',1),
(3,'2020_07_23_022607_create_tags_table',1),
(4,'2020_07_23_023113_create_taggables_table',1);

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`title`,`body`,`created_at`,`updated_at`) values 
(4,'html','html description+javascript+php','2020-07-23 06:34:24','2020-07-24 02:38:25'),
(5,'Java','Complete Java','2020-07-24 01:32:36','2020-07-24 01:32:36'),
(6,'Javascript','front-end developement','2020-07-24 01:33:52','2020-07-24 01:33:52');

/*Table structure for table `taggables` */

DROP TABLE IF EXISTS `taggables`;

CREATE TABLE `taggables` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` bigint(20) unsigned NOT NULL,
  `taggable_id` bigint(20) unsigned NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `taggables` */

insert  into `taggables`(`id`,`tag_id`,`taggable_id`,`taggable_type`,`created_at`,`updated_at`) values 
(16,1,4,'App\\Post',NULL,NULL),
(17,4,4,'App\\Post',NULL,NULL),
(29,1,1,'App\\Video',NULL,NULL),
(30,4,1,'App\\Video',NULL,NULL),
(33,1,3,'App\\Video',NULL,NULL),
(34,2,3,'App\\Video',NULL,NULL),
(35,6,3,'App\\Video',NULL,NULL),
(36,6,5,'App\\Post',NULL,NULL),
(37,1,6,'App\\Post',NULL,NULL),
(38,2,6,'App\\Post',NULL,NULL),
(39,3,6,'App\\Post',NULL,NULL),
(40,3,4,'App\\Post',NULL,NULL),
(41,2,1,'App\\Video',NULL,NULL),
(42,3,1,'App\\Video',NULL,NULL);

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tags` */

insert  into `tags`(`id`,`name`,`description`,`created_at`,`updated_at`) values 
(1,'html','html description','2020-07-23 03:13:06','2020-07-23 03:13:06'),
(2,'css','css description','2020-07-23 03:13:38','2020-07-23 03:13:38'),
(3,'Javascript','js description','2020-07-23 03:14:11','2020-07-23 03:14:11'),
(4,'PHP','PHP description','2020-07-23 03:15:54','2020-07-23 03:15:54'),
(5,'ASP.Net','Description added','2020-07-23 03:19:35','2020-07-23 03:19:35'),
(6,'Java','Core Java','2020-07-24 01:29:40','2020-07-24 01:29:40');

/*Table structure for table `videos` */

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `videos` */

insert  into `videos`(`id`,`url`,`file_path`,`created_at`,`updated_at`) values 
(1,'url 1','path 1','2020-07-23 23:18:09','2020-07-23 23:58:13'),
(3,'url 2','path 2','2020-07-24 01:31:28','2020-07-24 01:31:28');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
