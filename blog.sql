/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : 127.0.0.1:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-11-17 17:53:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `article`
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '我在测试我来了', '25', '<p>今天天气很好\r\n你最北封\r\n没有什么不可以</p>\r\n                       ', '2016-11-17 13:39:13', '2016-11-16 15:13:04', '1', '测试');
INSERT INTO `article` VALUES ('2', 'Js 大神来了', '26', '1. 就是这么拽\r\n哈哈哈不找到了吧', '2016-11-17 13:40:16', '2016-11-17 13:40:16', '0', 'Js闭包');

-- ----------------------------
-- Table structure for `basic`
-- ----------------------------
DROP TABLE IF EXISTS `basic`;
CREATE TABLE `basic` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '网站标题',
  `s_key` varchar(255) DEFAULT NULL COMMENT '网站关键字',
  `friendship_link` text COMMENT '友情链接',
  `domain_name` varchar(255) DEFAULT NULL COMMENT '域名',
  `bottom_information` text COMMENT '底部信息',
  `description` text COMMENT '网站描述',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of basic
-- ----------------------------
INSERT INTO `basic` VALUES ('1', '夜雨79520', null, '', 'www.yeyu79520.cn', '', '', null, '2016-11-17 17:52:52');

-- ----------------------------
-- Table structure for `category`
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
-- Table structure for `users`
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
