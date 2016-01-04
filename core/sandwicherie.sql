/*
Navicat MySQL Data Transfer

Source Server         : Dedibox VM102 (sandwicherie)
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : sandwicherie

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2016-01-04 17:58:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for clients
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `idClient` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  PRIMARY KEY (`idClient`),
  UNIQUE KEY `mail_unique` (`mail`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clients
-- ----------------------------

-- ----------------------------
-- Table structure for commandes
-- ----------------------------
DROP TABLE IF EXISTS `commandes`;
CREATE TABLE `commandes` (
  `idCommande` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idClient` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `pain` varchar(255) NOT NULL,
  `garniture` varchar(255) NOT NULL,
  `sauce` varchar(255) NOT NULL DEFAULT '[]' COMMENT 'Json datas',
  PRIMARY KEY (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of commandes
-- ----------------------------

-- ----------------------------
-- Table structure for produits
-- ----------------------------
DROP TABLE IF EXISTS `produits`;
CREATE TABLE `produits` (
  `idProduit` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idProduitCategorie` int(10) unsigned NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `visuel` varchar(255) DEFAULT NULL,
  `prixHT` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of produits
-- ----------------------------

-- ----------------------------
-- Table structure for slider
-- ----------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `idSlider` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `visuel` varchar(255) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`idSlider`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slider
-- ----------------------------
INSERT INTO `slider` VALUES ('1', 'grilled chicken', 'stock-photo-grilled-chicken-sandwich-213726613.jpg', '1');
INSERT INTO `slider` VALUES ('2', 'ham and cheese submarine', 'stock-photo-ham-and-cheese-salad-submarine-sandwich-from-fresh-baguette-112286855.jpg', '1');
INSERT INTO `slider` VALUES ('3', 'two long ciabatta', 'stock-photo-two-long-ciabatta-sandwiches-with-lettuce-slices-of-fresh-tomatoes-cucumber-ham-salami-and-167357615.jpg', '1');

-- ----------------------------
-- Table structure for stock
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `idProduit` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stock` int(10) unsigned NOT NULL DEFAULT '0',
  `alertMin` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idProduit`),
  CONSTRAINT `FK_ref_idProduit` FOREIGN KEY (`idProduit`) REFERENCES `produits` (`idProduit`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stock
-- ----------------------------
