/*
 Navicat Premium Data Transfer

 Source Server         : 119
 Source Server Type    : MySQL
 Source Server Version : 50625
 Source Host           : 172.18.4.110
 Source Database       : monitor

 Target Server Type    : MySQL
 Target Server Version : 50625
 File Encoding         : utf-8

 Date: 12/15/2015 11:11:18 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `m_basic`
-- ----------------------------
DROP TABLE IF EXISTS `m_basic`;
CREATE TABLE `m_basic` (
  `id` int(110) NOT NULL AUTO_INCREMENT,
  `HOSTNAME` varchar(255) NOT NULL,
  `IP` varchar(255) DEFAULT NULL,
  `DISK` int(255) DEFAULT NULL,
  `MEM` int(255) DEFAULT NULL,
  `CPU` int(255) DEFAULT NULL,
  `UP_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `host` (`HOSTNAME`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=133171 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `m_other`
-- ----------------------------
DROP TABLE IF EXISTS `m_other`;
CREATE TABLE `m_other` (
  `id` int(110) NOT NULL AUTO_INCREMENT,
  `HOSTNAME` varchar(255) NOT NULL,
  `IP` varchar(255) DEFAULT NULL,
  `PORT80` varchar(255) DEFAULT NULL,
  `PORT53` varchar(255) DEFAULT NULL,
  `PORT3306` varchar(255) DEFAULT NULL,
  `CHECK_LOGS` varchar(255) DEFAULT NULL,
  `CHECK_GATEWAY` int(255) DEFAULT NULL,
  `CHECK_SERVICE` varchar(1000) DEFAULT NULL,
  `UP_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `host` (`HOSTNAME`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=133158 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `m_report`
-- ----------------------------
DROP TABLE IF EXISTS `m_report`;
CREATE TABLE `m_report` (
  `id` int(110) NOT NULL AUTO_INCREMENT,
  `HOSTNAME` varchar(255) NOT NULL,
  `CID` varchar(255) DEFAULT NULL,
  `CONTROL` varchar(255) DEFAULT NULL,
  `REPORT_STATUS` varchar(255) DEFAULT NULL,
  `MONITOR` varchar(255) DEFAULT NULL,
  `R_CPU` varchar(255) DEFAULT NULL,
  `R_MEM` varchar(255) DEFAULT NULL,
  `R_LOAD` varchar(255) DEFAULT NULL,
  `R_DISK` varchar(255) DEFAULT NULL,
  `U_CONTROL` varchar(255) DEFAULT NULL,
  `UP_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `host` (`HOSTNAME`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=633 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `m_report_use`
-- ----------------------------
DROP TABLE IF EXISTS `m_report_use`;
CREATE TABLE `m_report_use` (
  `id` int(110) NOT NULL AUTO_INCREMENT,
  `HOSTNAME` varchar(255) NOT NULL,
  `R_CPU` varchar(255) DEFAULT NULL,
  `R_MEM` varchar(255) DEFAULT NULL,
  `R_DISK` varchar(255) DEFAULT NULL,
  `R_LOAD` varchar(255) DEFAULT NULL,
  `U_CID` int(11) DEFAULT NULL,
  `UP_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `host` (`HOSTNAME`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `m_sub`
-- ----------------------------
DROP TABLE IF EXISTS `m_sub`;
CREATE TABLE `m_sub` (
  `id` int(110) NOT NULL AUTO_INCREMENT,
  `HOSTNAME` varchar(255) NOT NULL,
  `IP` varchar(255) DEFAULT NULL,
  `SUB` varchar(255) DEFAULT NULL,
  `CHECK_STATUS` varchar(255) DEFAULT NULL,
  `UP_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `host` (`HOSTNAME`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=133176 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `m_use`
-- ----------------------------
DROP TABLE IF EXISTS `m_use`;
CREATE TABLE `m_use` (
  `id` int(110) NOT NULL AUTO_INCREMENT,
  `HOSTNAME` varchar(255) NOT NULL,
  `IP` varchar(255) DEFAULT NULL,
  `DISK_USE` int(255) DEFAULT NULL,
  `MEM_USE` int(255) DEFAULT NULL,
  `CPU_USE` varchar(255) DEFAULT NULL,
  `LOAD_USE` text,
  `BAND` varchar(255) DEFAULT NULL,
  `STATUS` varchar(255) DEFAULT NULL,
  `UP_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hostname` (`HOSTNAME`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=133158 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `m_use_his`
-- ----------------------------
DROP TABLE IF EXISTS `m_use_his`;
CREATE TABLE `m_use_his` (
  `id` int(110) NOT NULL AUTO_INCREMENT,
  `HOSTNAME` varchar(255) NOT NULL,
  `IP` varchar(255) DEFAULT NULL,
  `DISK_USE` int(255) DEFAULT NULL,
  `MEM_USE` varchar(255) DEFAULT NULL,
  `CPU_USE` varchar(255) DEFAULT NULL,
  `LOAD_USE` text,
  `BAND` varchar(255) DEFAULT NULL,
  `STATUS` varchar(255) DEFAULT NULL,
  `UP_TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133155 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

SET FOREIGN_KEY_CHECKS = 1;
