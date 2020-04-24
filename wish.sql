/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : wish

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2020-04-24 08:46:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '123456');

-- ----------------------------
-- Table structure for `wish_content`
-- ----------------------------
DROP TABLE IF EXISTS `wish_content`;
CREATE TABLE `wish_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT '',
  `content` varchar(255) DEFAULT '',
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wish_content
-- ----------------------------
INSERT INTO `wish_content` VALUES ('1', '123', '456', '2020-04-02 15:33:37');
INSERT INTO `wish_content` VALUES ('2', '456', '564[害羞][害羞]', '2020-04-01 15:33:40');
INSERT INTO `wish_content` VALUES ('3', '4567', '[害羞][害羞][害羞]', '2020-03-27 15:33:48');
INSERT INTO `wish_content` VALUES ('4', 'tode', '[酷][酷][酷][酷]', '2020-03-12 03:33:56');
INSERT INTO `wish_content` VALUES ('5', 'aaa', '[害羞][害羞][害羞]', '2020-03-27 12:34:06');
INSERT INTO `wish_content` VALUES ('6', '333', '[抓狂][抓狂][抓狂]', '2020-03-20 15:25:12');
INSERT INTO `wish_content` VALUES ('7', '2218572042@qq.com', '[偷笑][偷笑]', '2020-03-12 05:34:20');
INSERT INTO `wish_content` VALUES ('8', '999', '[花心][花心][花心]', '2019-07-11 16:16:34');
INSERT INTO `wish_content` VALUES ('9', 'nnn', '[嘻嘻][嘻嘻][嘻嘻]', '2020-04-02 07:37:45');
INSERT INTO `wish_content` VALUES ('10', 'llll', '[钱][钱][钱]', '2020-04-02 07:39:20');
INSERT INTO `wish_content` VALUES ('11', '888', '[花心][花心]', '2020-04-08 12:47:43');
INSERT INTO `wish_content` VALUES ('12', '中文', '中文demo[偷笑]', '2020-04-08 12:49:47');
INSERT INTO `wish_content` VALUES ('13', '测试', '测试', '2020-04-09 14:20:01');
