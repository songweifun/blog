-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	5.7.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `6d_admin`
--

DROP TABLE IF EXISTS `6d_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `6d_admin` (
  `adminid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL DEFAULT '' COMMENT '后台用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '后台用户密码',
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='后台用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `6d_admin`
--

LOCK TABLES `6d_admin` WRITE;
/*!40000 ALTER TABLE `6d_admin` DISABLE KEYS */;
INSERT INTO `6d_admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `6d_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `6d_article`
--

DROP TABLE IF EXISTS `6d_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `6d_article` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '' COMMENT '文章标题',
  `content` text COMMENT '文章内容',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发表时间',
  `thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图',
  `suminfo` varchar(200) NOT NULL DEFAULT '' COMMENT '文章摘要',
  `click` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `istop` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0为正常，1为置顶',
  `isdel` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0为正常，1为进入回收站',
  `cid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属栏目id',
  PRIMARY KEY (`aid`),
  KEY `fk_6d_article_6d_category1_idx` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='文章表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `6d_article`
--

LOCK TABLES `6d_article` WRITE;
/*!40000 ALTER TABLE `6d_article` DISABLE KEYS */;
INSERT INTO `6d_article` VALUES (23,'php','3',1460795210,'Upload/2016-04-16/洗手间_副本1460795210_300x210.jpg','3',112,1,0,2),(24,'div','divcss',1460797617,'Upload/2016-04-16/SAM_3145_副本1460797617_300x210.jpg','divcss',300,0,1,2),(25,'啊啊','aaa',1460817604,'Upload/2016-04-16/洗手间_副本1460817604_300x210.jpg','aaa',107,1,0,7);
/*!40000 ALTER TABLE `6d_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `6d_category`
--

DROP TABLE IF EXISTS `6d_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `6d_category` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `isoff` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0正常，1关闭',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='栏目表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `6d_category`
--

LOCK TABLES `6d_category` WRITE;
/*!40000 ALTER TABLE `6d_category` DISABLE KEYS */;
INSERT INTO `6d_category` VALUES (2,'娱乐','娱乐八卦','明星娱乐八卦',0),(7,'PHP','PHP','PHP视频教程',0);
/*!40000 ALTER TABLE `6d_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `6d_comment`
--

DROP TABLE IF EXISTS `6d_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `6d_comment` (
  `comid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(20) NOT NULL DEFAULT '' COMMENT '用户昵称',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '评论内容',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论时间',
  `aid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属文章id',
  PRIMARY KEY (`comid`),
  KEY `fk_6d_comment_6d_article_idx` (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='评论表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `6d_comment`
--

LOCK TABLES `6d_comment` WRITE;
/*!40000 ALTER TABLE `6d_comment` DISABLE KEYS */;
INSERT INTO `6d_comment` VALUES (1,'fansongwei','沙发',1460813091,23),(2,'孟楠','你好',1460813116,23),(3,'小李','大家好',1460813138,23),(4,'啊','thanks',1460813183,23),(5,'1','qqqqq',1460813357,23);
/*!40000 ALTER TABLE `6d_comment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-17 22:11:33
