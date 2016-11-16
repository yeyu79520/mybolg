/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-11-17 01:04:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '对应分类id',
  `cid` tinyint(4) DEFAULT NULL,
  `content` text,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `attribute` tinyint(4) NOT NULL DEFAULT '0' COMMENT '属性 0 1 2',
  `key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE,
  KEY `title` (`title`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '我在测试', '25', '![][0.46741679430962646]我在测试看行不行\r\n\r\n  \r\n----------\r\n[0.46741679430962646]: http://127.0.0.1/laravel/public/path/534f259925a5a548c9d8f9dccb053f91.jpg', '2016-11-16 15:13:04', '2016-11-16 15:13:04', '1', '测试');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `pid` tinyint(4) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL COMMENT '关键字',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `sort` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('25', 'PHP', '0', 'PHP', '2016-11-16 10:23:59', '2016-11-16 09:29:09', '1');
INSERT INTO `category` VALUES ('26', 'JS', '0', 'Js闭包', '2016-11-16 09:37:19', '2016-11-16 09:37:19', '2');
INSERT INTO `category` VALUES ('27', 'Linux', '0', '运维，Linux', '2016-11-16 12:45:10', '2016-11-16 12:45:10', '3');
INSERT INTO `category` VALUES ('28', 'Laravel', '0', 'Laravel', '2016-11-16 12:46:22', '2016-11-16 12:46:22', '4');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'yeyu79520', '$2y$10$8HXZxTTbB1n0/qQpeGXYoueBBhj.PiV/..DXGJqIRsoH8X2a97Nue', '414604667@qq,com', '13648056469', '2016-11-13 17:10:21', '2016-11-13 14:09:04', 'AsN4HiJaMfb1hpHgjAH840rrgGHDl40IFgvy4d7f1iwu8p49sgTjyLlRwPqC');
