/*
SQLyog 企业版 - MySQL GUI v7.14 
MySQL - 5.5.53 : Database - abusechan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`abusechan` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `abusechan`;

/*Table structure for table `abuse_admin_user` */

DROP TABLE IF EXISTS `abuse_admin_user`;

CREATE TABLE `abuse_admin_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '昵称',
  `telphone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '电话',
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `realname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '真实姓名',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '头像',
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '记住我token',
  `backup` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '保留字段',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_telphone_unique` (`telphone`)
) ENGINE=MyISAM AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `abuse_admin_user` */

insert  into `abuse_admin_user`(`id`,`nickname`,`telphone`,`password`,`realname`,`avatar`,`remember_token`,`backup`,`created_at`,`updated_at`) values (1000,'admin','18651984625','96E79218965EB72C92A549DD5A330112','钱京',NULL,NULL,NULL,'2019-01-26 11:18:36','2019-01-26 11:18:36');

/*Table structure for table `abuse_wx_user` */

DROP TABLE IF EXISTS `abuse_wx_user`;

CREATE TABLE `abuse_wx_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `sex` tinyint(4) unsigned DEFAULT NULL,
  `subscribe_time` int(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `realname` varchar(255) DEFAULT NULL COMMENT '姓名',
  `tel` varchar(32) DEFAULT NULL,
  `city` char(32) DEFAULT NULL COMMENT '城市',
  `province` char(32) DEFAULT NULL COMMENT '省市',
  `country` char(32) DEFAULT NULL COMMENT '国家',
  `is_subscribe` tinyint(4) DEFAULT '1',
  `createTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uptateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `abuse_wx_user` */

insert  into `abuse_wx_user`(`id`,`openid`,`nickname`,`avatar`,`sex`,`subscribe_time`,`address`,`realname`,`tel`,`city`,`province`,`country`,`is_subscribe`,`createTime`,`uptateTime`) values (1,'1','昵称','123123123',1,123123123,'上海上海','钱京','123456','上海','上海','中国',1,'2019-01-24 17:06:11','2019-01-24 17:06:11');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
