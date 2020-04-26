/*
Navicat MySQL Data Transfer

Source Server         : XAMPP
Source Server Version : 50505
Source Host           : localhost:1337
Source Database       : employee_app

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-04-26 19:33:28
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `logins`
-- ----------------------------
DROP TABLE IF EXISTS `logins`;
CREATE TABLE `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_date` varchar(64) DEFAULT NULL,
  `logout_date` varchar(64) DEFAULT 'Didn''t logout yet.',
  `session_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of logins
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(64) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(64) NOT NULL,
  `user_surname` varchar(64) NOT NULL,
  `user_birthday` varchar(11) NOT NULL DEFAULT '0000-00-00',
  `user_address` varchar(64) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `user_title` varchar(11) NOT NULL DEFAULT 'Employee',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('4', 'Admin', '$2y$10$EnKU00frDZ5hCtrWMJywLuyAVW4XI252VBHigw6wFkav04q2r9Y.W', 'Firstname', 'Surname', '11/11/1911', 'Address', '12345678', '1', 'Employer');
