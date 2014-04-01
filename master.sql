/*
Navicat MySQL Data Transfer

Source Server         : loc
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : master

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2013-11-26 11:46:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cities`
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `city_id` int(30) NOT NULL AUTO_INCREMENT,
  `city` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cities
-- ----------------------------
INSERT INTO `cities` VALUES ('1', 'Smolensk');
INSERT INTO `cities` VALUES ('2', 'Moscow');
INSERT INTO `cities` VALUES ('3', 'St.Petersburg');
INSERT INTO `cities` VALUES ('4', 'Kaliningrad');
INSERT INTO `cities` VALUES ('5', 'Sochi');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `age` int(30) DEFAULT NULL,
  `city_id` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `city_id` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('6', 'Nikon', '2', '3');
INSERT INTO `users` VALUES ('15', 'borya', '24', '2');
