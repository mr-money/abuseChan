/*
SQLyog 企业版 - MySQL GUI v7.14 
MySQL - 5.5.60-MariaDB : Database - abusechan
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
  `sex` tinyint(4) unsigned DEFAULT '1',
  `subscribe_time` int(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `realname` varchar(255) DEFAULT NULL COMMENT '姓名',
  `tel` varchar(32) DEFAULT NULL,
  `city` char(32) DEFAULT NULL COMMENT '城市',
  `province` char(32) DEFAULT NULL COMMENT '省市',
  `country` char(32) DEFAULT NULL COMMENT '国家',
  `backup` varchar(255) DEFAULT NULL COMMENT '保留字段',
  `state` int(11) DEFAULT '0' COMMENT '状态',
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uptate_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `abuse_wx_user` */

insert  into `abuse_wx_user`(`id`,`openid`,`nickname`,`avatar`,`sex`,`subscribe_time`,`address`,`realname`,`tel`,`city`,`province`,`country`,`backup`,`state`,`create_at`,`uptate_at`) values (1,'1','昵称','http://thirdwx.qlogo.cn/mmopen/yTRjlqxLq89we6kVqcyQ3frotPvKYZNLrMXnRuOeYqicjZiaO9YRmBEicI1gl50bpZOPCxtZIakZVyHxquqq0iaEjbtXnvqebJL6/132',1,123123123,'上海上海','钱京','123456','上海','上海','中国','1',0,'2019-01-24 17:06:11','2019-01-24 17:06:11');
insert  into `abuse_wx_user`(`id`,`openid`,`nickname`,`avatar`,`sex`,`subscribe_time`,`address`,`realname`,`tel`,`city`,`province`,`country`,`backup`,`state`,`create_at`,`uptate_at`) values (2,'2','小香菇','http://thirdwx.qlogo.cn/mmopen/Y5zKr12DSYM0IyMdcickaFj8pvyJSDtG6wzxRjmmVnDZYvfuSnYaoa7vYp7dVkCspmPiaRib7pzvMQZqVrZQzwBS3gz2R8dyhg1/132',1,1233,'新北','啦啦啦','123123','常州','江苏','中国','222222',0,'2019-05-24 17:06:11','2019-06-24 17:06:11');
insert  into `abuse_wx_user`(`id`,`openid`,`nickname`,`avatar`,`sex`,`subscribe_time`,`address`,`realname`,`tel`,`city`,`province`,`country`,`backup`,`state`,`create_at`,`uptate_at`) values (3,'3','1',NULL,1,NULL,NULL,NULL,'4',NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `abuse_wx_user`(`id`,`openid`,`nickname`,`avatar`,`sex`,`subscribe_time`,`address`,`realname`,`tel`,`city`,`province`,`country`,`backup`,`state`,`create_at`,`uptate_at`) values (4,'4','2',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `abuse_wx_user`(`id`,`openid`,`nickname`,`avatar`,`sex`,`subscribe_time`,`address`,`realname`,`tel`,`city`,`province`,`country`,`backup`,`state`,`create_at`,`uptate_at`) values (5,'5','3',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `abuse_wx_user`(`id`,`openid`,`nickname`,`avatar`,`sex`,`subscribe_time`,`address`,`realname`,`tel`,`city`,`province`,`country`,`backup`,`state`,`create_at`,`uptate_at`) values (6,'6','4',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `abuse_wx_user`(`id`,`openid`,`nickname`,`avatar`,`sex`,`subscribe_time`,`address`,`realname`,`tel`,`city`,`province`,`country`,`backup`,`state`,`create_at`,`uptate_at`) values (7,'7',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `abuse_wx_user`(`id`,`openid`,`nickname`,`avatar`,`sex`,`subscribe_time`,`address`,`realname`,`tel`,`city`,`province`,`country`,`backup`,`state`,`create_at`,`uptate_at`) values (11,'8',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `abuse_wx_user`(`id`,`openid`,`nickname`,`avatar`,`sex`,`subscribe_time`,`address`,`realname`,`tel`,`city`,`province`,`country`,`backup`,`state`,`create_at`,`uptate_at`) values (12,'9',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `abuse_wx_user`(`id`,`openid`,`nickname`,`avatar`,`sex`,`subscribe_time`,`address`,`realname`,`tel`,`city`,`province`,`country`,`backup`,`state`,`create_at`,`uptate_at`) values (14,'11',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `abuse_wx_user`(`id`,`openid`,`nickname`,`avatar`,`sex`,`subscribe_time`,`address`,`realname`,`tel`,`city`,`province`,`country`,`backup`,`state`,`create_at`,`uptate_at`) values (15,'12',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `abuse_wx_user`(`id`,`openid`,`nickname`,`avatar`,`sex`,`subscribe_time`,`address`,`realname`,`tel`,`city`,`province`,`country`,`backup`,`state`,`create_at`,`uptate_at`) values (16,'13',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
insert  into `abuse_wx_user`(`id`,`openid`,`nickname`,`avatar`,`sex`,`subscribe_time`,`address`,`realname`,`tel`,`city`,`province`,`country`,`backup`,`state`,`create_at`,`uptate_at`) values (17,'14',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
