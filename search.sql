/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : akademik

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-11-18 00:54:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `siswa`
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `SiswaID` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Alamat` text COLLATE utf8mb4_unicode_ci,
  `JenisKelamin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`SiswaID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of siswa
-- ----------------------------
INSERT INTO `siswa` VALUES ('1', 'Ardin', 'Semarang', 'Laki-laki');
INSERT INTO `siswa` VALUES ('2', 'Vita', 'Semarang', 'Perempuan');
INSERT INTO `siswa` VALUES ('3', 'Wisnu', 'Semarang', 'Laki-laki');
INSERT INTO `siswa` VALUES ('4', 'Angga', 'Rembang', 'Laki-laki');
INSERT INTO `siswa` VALUES ('5', 'Dian', 'Wonosobo', 'Laki-laki');
INSERT INTO `siswa` VALUES ('6', 'Ali', 'Brebes', 'Laki-laki');
INSERT INTO `siswa` VALUES ('7', 'Nia', 'Pati', 'Perempuan');
INSERT INTO `siswa` VALUES ('8', 'Yudis', 'Salatiga', 'Laki-laki');
INSERT INTO `siswa` VALUES ('9', 'Iman', 'Surakarta', 'Laki-laki');
INSERT INTO `siswa` VALUES ('10', 'Yogi', 'Sleman', 'Laki-laki');
INSERT INTO `siswa` VALUES ('11', 'Rifki', 'Semarang', 'Laki-laki');
INSERT INTO `siswa` VALUES ('12', 'Anisa', 'Wonosobo', 'Perempuan');
INSERT INTO `siswa` VALUES ('13', 'Rani', 'Rembang', 'Perempuan');
INSERT INTO `siswa` VALUES ('14', 'Rahmat', 'Semarang', 'Laki-laki');
INSERT INTO `siswa` VALUES ('15', 'Ayu', 'Semarang', 'Perempuan');
INSERT INTO `siswa` VALUES ('16', 'Nabila', 'Sleman', 'Perempuan');
INSERT INTO `siswa` VALUES ('17', 'Heri', 'Pati', 'Laki-laki');
INSERT INTO `siswa` VALUES ('18', 'Nugroho', 'Semarang', 'Laki-laki');
INSERT INTO `siswa` VALUES ('19', 'Farida', 'Salatiga', 'Perempuan');
INSERT INTO `siswa` VALUES ('20', 'Andri', 'Semarang', 'Laki-laki');
INSERT INTO `siswa` VALUES ('21', 'Andi', 'Surakarta', 'Laki-laki');
INSERT INTO `siswa` VALUES ('22', 'Handayani', 'Semarang', 'Perempuan');
INSERT INTO `siswa` VALUES ('23', 'Rendy', 'Semarang', 'Laki-laki');
