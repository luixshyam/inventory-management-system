/*
Navicat MySQL Data Transfer

Source Server         : con
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ongcims

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-07-05 21:22:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `adminlogin`
-- ----------------------------
DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE `adminlogin` (
  `a_user` varchar(20) NOT NULL,
  `a_pass` varchar(10) NOT NULL,
  PRIMARY KEY (`a_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of adminlogin
-- ----------------------------
INSERT INTO `adminlogin` VALUES ('admin', 'admin');

-- ----------------------------
-- Table structure for `employee`
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `des` varchar(50) NOT NULL,
  `dept` varchar(15) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phno` bigint(13) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('3', 'Ratul Sharma', 'male', 'Manager', 'Store', 'ratuls', '12345', 'ratul@gmail.com', '9435090908', 'employee/5b214b33e55aa.png');
INSERT INTO `employee` VALUES ('1', 'Pran Shankar Dutta', 'male', 'Asst Director', 'IT', 'shankar', '12345', 'pran01@gmail.com', '9954456789', 'employee/5b2c660e685d4.png');
INSERT INTO `employee` VALUES ('2', 'Pranjit Dutta', 'male', 'Junior Assistant', 'H&N', 'pran', '12345', 'prand@gmail.com', '8876599999', 'employee/5b214b33e55aa.png');

-- ----------------------------
-- Table structure for `issuedetail`
-- ----------------------------
DROP TABLE IF EXISTS `issuedetail`;
CREATE TABLE `issuedetail` (
  `reqid` int(11) NOT NULL,
  `item` varchar(40) NOT NULL,
  `brand` varchar(40) DEFAULT NULL,
  `particulars` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`reqid`,`item`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of issuedetail
-- ----------------------------
INSERT INTO `issuedetail` VALUES ('5', 'Printer', 'Canon', 'lbp2900', '1', '2018-06-10');
INSERT INTO `issuedetail` VALUES ('6', 'A4 Paper', 'NA', 'NA', '2', '2018-06-11');
INSERT INTO `issuedetail` VALUES ('7', 'Desktop', 'Acer', 'a2000', '1', '2018-06-21');
INSERT INTO `issuedetail` VALUES ('8', 'A4 Paper', 'NA', 'NA', '1', '2018-06-22');

-- ----------------------------
-- Table structure for `issuenotice`
-- ----------------------------
DROP TABLE IF EXISTS `issuenotice`;
CREATE TABLE `issuenotice` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `emp` varchar(40) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of issuenotice
-- ----------------------------
INSERT INTO `issuenotice` VALUES ('1', '8', '2018-06-20', 'pran', 'Could not issue due to low stock');

-- ----------------------------
-- Table structure for `manager`
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `empid` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`empid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of manager
-- ----------------------------
INSERT INTO `manager` VALUES ('3', 'ratul123', '12345');

-- ----------------------------
-- Table structure for `reqdetail`
-- ----------------------------
DROP TABLE IF EXISTS `reqdetail`;
CREATE TABLE `reqdetail` (
  `reqid` int(11) NOT NULL,
  `item` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`reqid`,`item`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of reqdetail
-- ----------------------------

-- ----------------------------
-- Table structure for `reqdupli`
-- ----------------------------
DROP TABLE IF EXISTS `reqdupli`;
CREATE TABLE `reqdupli` (
  `reqid` int(11) NOT NULL,
  `item` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`reqid`,`item`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of reqdupli
-- ----------------------------

-- ----------------------------
-- Table structure for `requisition`
-- ----------------------------
DROP TABLE IF EXISTS `requisition`;
CREATE TABLE `requisition` (
  `reqid` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `employee` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`reqid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of requisition
-- ----------------------------

-- ----------------------------
-- Table structure for `stockin`
-- ----------------------------
DROP TABLE IF EXISTS `stockin`;
CREATE TABLE `stockin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `invoiceno` varchar(20) NOT NULL,
  `invoicedate` date NOT NULL,
  `item` varchar(40) NOT NULL,
  `brand` varchar(35) DEFAULT NULL,
  `particulars` varchar(20) DEFAULT NULL,
  `unit` varchar(15) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of stockin
-- ----------------------------
INSERT INTO `stockin` VALUES ('22', '2020-03-20', '789', '2018-03-15', 'A4 Paper', 'NA', 'NA', 'Packets', '130', '10', '1300');
INSERT INTO `stockin` VALUES ('23', '2020-03-20', '777', '2018-03-15', 'Pen', 'NA', 'NA', 'Pcs', '10', '50', '500');
INSERT INTO `stockin` VALUES ('25', '2020-03-30', '889', '2018-03-26', 'Laptop', 'HP', 'HP-smart-100', 'Pcs', '33000', '2', '33000');
INSERT INTO `stockin` VALUES ('26', '2020-03-30', '892', '2018-03-26', 'Printer', 'Canon', 'lbp2900', 'Pcs', '6500', '3', '6500');
INSERT INTO `stockin` VALUES ('27', '2020-06-13', '908', '2018-06-05', 'Laptop', 'Dell', 'Q342', 'Pcs', '31000', '2', '62000');
INSERT INTO `stockin` VALUES ('28', '2020-06-13', '999', '2018-06-05', 'Printer', 'HP', 'pl900', 'Pcs', '6500', '2', '13000');
INSERT INTO `stockin` VALUES ('32', '2020-06-21', '721', '2018-06-07', 'Desktop', 'Acer', 'a2000', 'Pcs', '35000', '1', '35000');
INSERT INTO `stockin` VALUES ('31', '2020-06-21', '889', '2018-06-04', 'Desktop', 'Acer', 'a1000', 'Pcs', '30000', '1', '30000');

-- ----------------------------
-- Table structure for `stockmaster`
-- ----------------------------
DROP TABLE IF EXISTS `stockmaster`;
CREATE TABLE `stockmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(25) NOT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `item` varchar(30) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of stockmaster
-- ----------------------------
INSERT INTO `stockmaster` VALUES ('13', 'Stationary', 'NA', 'Pen', 'Pcs', '50');
INSERT INTO `stockmaster` VALUES ('12', 'Stationary', 'NA', 'A4 Paper', 'Packets', '17');
INSERT INTO `stockmaster` VALUES ('10', 'Fixed', 'HP', 'Desktop', 'Pcs', '1');
INSERT INTO `stockmaster` VALUES ('9', 'Fixed', 'Canon', 'Printer', 'Pcs', '2');
INSERT INTO `stockmaster` VALUES ('14', 'Fixed', 'Acer', 'Desktop', 'Pcs', '0');
INSERT INTO `stockmaster` VALUES ('15', 'Fixed', 'HP', 'Laptop', 'Pcs', '2');
INSERT INTO `stockmaster` VALUES ('18', 'Fixed', 'Dell', 'Laptop', 'Pcs', '1');
INSERT INTO `stockmaster` VALUES ('19', 'Fixed', 'HP', 'Printer', 'Pcs', '2');
