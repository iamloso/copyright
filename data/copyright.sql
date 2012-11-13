-- MySQL dump 10.11
--
-- Host: localhost    Database: copyright
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt-log

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
-- Table structure for table `pp_admin`
--

DROP TABLE IF EXISTS `pp_admin`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pp_admin` (
  `admin_id` smallint(6) unsigned NOT NULL auto_increment,
  `admin_name` varchar(50) NOT NULL,
  `admin_pwd` char(32) NOT NULL,
  `admin_count` smallint(6) NOT NULL,
  `admin_ok` varchar(50) NOT NULL,
  `admin_del` bigint(1) NOT NULL,
  `admin_ip` varchar(40) NOT NULL,
  `admin_email` varchar(40) NOT NULL,
  `admin_logintime` int(11) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `pp_admin`
--

LOCK TABLES `pp_admin` WRITE;
/*!40000 ALTER TABLE `pp_admin` DISABLE KEYS */;
INSERT INTO `pp_admin` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e',21,'1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1',0,'127.0.0.1','admin@qq.com',1352523516);
/*!40000 ALTER TABLE `pp_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pp_ads`
--

DROP TABLE IF EXISTS `pp_ads`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pp_ads` (
  `ads_id` smallint(4) unsigned NOT NULL auto_increment,
  `ads_name` varchar(50) NOT NULL,
  `ads_content` text NOT NULL,
  PRIMARY KEY  (`ads_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `pp_ads`
--

LOCK TABLES `pp_ads` WRITE;
/*!40000 ALTER TABLE `pp_ads` DISABLE KEYS */;
INSERT INTO `pp_ads` VALUES (1,'top72890','<iframe width=\"728\" scrolling=\"no\" height=\"90\" frameborder=\"0\" src=\"http://union.ff84.com/ads/72890.html\" marginwidth=\"0\" marginheight=\"0\" vspace=\"0\" hspace=\"0\" allowtransparency=\"true\"></iframe>'),(2,'top46860','<iframe width=\"468\" scrolling=\"no\" height=\"60\" frameborder=\"0\" src=\"http://union.ff84.com/ads/46860.html\" marginwidth=\"0\" marginheight=\"0\" vspace=\"0\" hspace=\"0\" allowtransparency=\"true\"></iframe>'),(3,'left250250','<iframe width=\"250\" scrolling=\"no\" height=\"250\" frameborder=\"0\" src=\"http://union.ff84.com/ads/250250.html\" marginwidth=\"0\" marginheight=\"0\" vspace=\"0\" hspace=\"0\" allowtransparency=\"true\"></iframe>'),(4,'right300250','<iframe width=\"300\" scrolling=\"no\" height=\"250\" frameborder=\"0\" src=\"http://union.ff84.com/ads/300250.html\" marginwidth=\"0\" marginheight=\"0\" vspace=\"0\" hspace=\"0\" allowtransparency=\"true\"></iframe>'),(5,'top960','<iframe width=\"960\" scrolling=\"no\" height=\"90\" frameborder=\"0\" src=\"http://union.ff84.com/ads/96060.html\" marginwidth=\"0\" marginheight=\"0\" vspace=\"0\" hspace=\"0\" allowtransparency=\"true\"></iframe>');
/*!40000 ALTER TABLE `pp_ads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pp_cm`
--

DROP TABLE IF EXISTS `pp_cm`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pp_cm` (
  `cm_id` mediumint(8) unsigned NOT NULL auto_increment,
  `cm_cid` mediumint(8) NOT NULL,
  `cm_user` varchar(50) NOT NULL,
  `cm_content` text NOT NULL,
  `cm_up` mediumint(8) NOT NULL default '0',
  `cm_down` mediumint(8) NOT NULL default '0',
  `cm_face` tinyint(1) NOT NULL default '1',
  `cm_ip` varchar(20) NOT NULL,
  `cm_addtime` int(11) NOT NULL,
  `cm_sid` tinyint(1) NOT NULL default '1',
  `cm_del` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`cm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `pp_cm`
--

LOCK TABLES `pp_cm` WRITE;
/*!40000 ALTER TABLE `pp_cm` DISABLE KEYS */;
/*!40000 ALTER TABLE `pp_cm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pp_collect`
--

DROP TABLE IF EXISTS `pp_collect`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pp_collect` (
  `collect_id` smallint(6) unsigned NOT NULL auto_increment,
  `collect_title` varchar(50) NOT NULL,
  `collect_encoding` varchar(10) NOT NULL,
  `collect_player` varchar(50) NOT NULL,
  `collect_savepic` tinyint(4) NOT NULL,
  `collect_order` tinyint(4) NOT NULL,
  `collect_pagetype` tinyint(4) NOT NULL,
  `collect_liststr` text NOT NULL,
  `collect_pagestr` text NOT NULL,
  `collect_pagesid` smallint(6) unsigned NOT NULL,
  `collect_pageeid` smallint(6) unsigned NOT NULL,
  `collect_listurlstr` text NOT NULL,
  `collect_listlink` text NOT NULL,
  `collect_listpicstr` text NOT NULL,
  `collect_cid` text NOT NULL,
  `collect_listname` text NOT NULL,
  `collect_name` text NOT NULL,
  `collect_actor` text NOT NULL,
  `collect_director` text NOT NULL,
  `collect_content` text NOT NULL,
  `collect_pic` text NOT NULL,
  `collect_area` text NOT NULL,
  `collect_language` text NOT NULL,
  `collect_year` text NOT NULL,
  `collect_continu` text NOT NULL,
  `collect_urlstr` text NOT NULL,
  `collect_urlname` text NOT NULL,
  `collect_urllink` text NOT NULL,
  `collect_url` text NOT NULL,
  `collect_replace` text NOT NULL,
  PRIMARY KEY  (`collect_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `pp_collect`
--

LOCK TABLES `pp_collect` WRITE;
/*!40000 ALTER TABLE `pp_collect` DISABLE KEYS */;
/*!40000 ALTER TABLE `pp_collect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pp_gb`
--

DROP TABLE IF EXISTS `pp_gb`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pp_gb` (
  `gb_id` mediumint(8) unsigned NOT NULL auto_increment,
  `gb_cid` mediumint(8) NOT NULL default '0',
  `gb_user` varchar(50) NOT NULL,
  `gb_content` text NOT NULL,
  `gb_intro` text NOT NULL,
  `gb_addtime` int(11) NOT NULL,
  `gb_qq` varchar(20) NOT NULL,
  `gb_ip` varchar(20) NOT NULL,
  `gb_oid` tinyint(1) NOT NULL default '0',
  `gb_del` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`gb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `pp_gb`
--

LOCK TABLES `pp_gb` WRITE;
/*!40000 ALTER TABLE `pp_gb` DISABLE KEYS */;
/*!40000 ALTER TABLE `pp_gb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pp_link`
--

DROP TABLE IF EXISTS `pp_link`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pp_link` (
  `link_id` tinyint(4) unsigned NOT NULL auto_increment,
  `link_name` varchar(255) NOT NULL,
  `link_logo` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `link_order` tinyint(4) NOT NULL,
  `link_type` tinyint(1) NOT NULL,
  PRIMARY KEY  (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `pp_link`
--

LOCK TABLES `pp_link` WRITE;
/*!40000 ALTER TABLE `pp_link` DISABLE KEYS */;
INSERT INTO `pp_link` VALUES (1,'飞飞影视系统','http://','http://www.ff84.com',1,1),(2,'电影网站导航','http://','http://www.8369.info',2,1);
/*!40000 ALTER TABLE `pp_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pp_list`
--

DROP TABLE IF EXISTS `pp_list`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pp_list` (
  `list_id` smallint(6) unsigned NOT NULL auto_increment,
  `list_pid` smallint(6) NOT NULL,
  `list_oid` smallint(6) NOT NULL,
  `list_sid` tinyint(1) NOT NULL,
  `list_name` char(20) NOT NULL,
  `list_skin` char(20) NOT NULL,
  `list_dir` varchar(90) NOT NULL,
  `list_keywords` varchar(255) NOT NULL,
  `list_title` varchar(50) NOT NULL,
  `list_description` varchar(255) NOT NULL,
  PRIMARY KEY  (`list_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `pp_list`
--

LOCK TABLES `pp_list` WRITE;
/*!40000 ALTER TABLE `pp_list` DISABLE KEYS */;
INSERT INTO `pp_list` VALUES (1,0,1,0,'电影','Film','','','',''),(2,0,2,0,'电视剧','Television Drama','','','',''),(3,0,3,0,'动画','Cartoon','','','',''),(4,0,4,0,'图片素材','Picture Material','','','',''),(5,0,5,0,'视频素材','File Material','','','',''),(6,0,6,0,'科教记录','Science and Educatio','','','',''),(7,0,7,0,'漫画','Caricature','','','',''),(8,1,8,0,'动作片','pp_vodlist','','','',''),(9,1,9,0,'喜剧片','pp_vodlist','','','',''),(10,1,10,0,'爱情片','pp_vodlist','','','',''),(11,1,11,0,'科幻片','pp_vodlist','','','',''),(12,1,12,0,'恐怖片','pp_vodlist','','','',''),(13,1,13,0,'战争片','pp_vodlist','','','',''),(14,1,14,0,'故事片','pp_vodlist','','','',''),(15,2,15,0,'国产剧','pp_vodlist','','','',''),(16,2,16,0,'港台剧','pp_vodlist','','','',''),(17,2,17,0,'欧美剧','pp_vodlist','','','',''),(18,2,18,0,'日韩剧','pp_vodlist','','','',''),(19,2,19,0,'海外剧','pp_vodlist','','','',''),(20,0,8,0,'综艺娱乐','Entertainment Weekly','','','',''),(21,0,21,0,'版权登记','Copyright Registrati','','','',''),(22,0,22,0,'版权服务','Copyright Service','','','',''),(27,26,24,0,'图片素材3','pppppp','','','',''),(26,4,23,0,'图片素材2','ppp','','','',''),(28,3,25,0,'木偶','pp_vodlist','','','',''),(29,3,26,0,'韩国动画','pp_vodlist','','','',''),(30,3,27,0,'中国动画','pp_vodlist','','','',''),(31,3,28,0,'西班牙','pp_vodlist','','','',''),(32,4,29,0,'中国素材','pp_vodlist','','','',''),(33,5,30,0,'中国视频','pp_vodlist','','','',''),(34,5,31,0,'韩国视频','pp_vodlist','','','',''),(35,6,32,0,'中国纪录','pp_vodlist','','','',''),(36,6,33,0,'韩国纪录','pp_vodlist','','','',''),(37,6,34,0,'美国纪录','pp_vodlist','','','',''),(38,7,35,0,'中国漫画','pp_vodlist','','','',''),(39,7,36,0,'韩国漫画','pp_vodlist','','','',''),(40,20,37,0,'湖南卫视','pp_vodlist','','','',''),(41,20,38,0,'浙江卫视','pp_vodlist','','','',''),(42,20,39,0,'cctv','pp_vodlist','','','','');
/*!40000 ALTER TABLE `pp_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pp_news`
--

DROP TABLE IF EXISTS `pp_news`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pp_news` (
  `news_id` mediumint(8) unsigned NOT NULL auto_increment,
  `news_cid` smallint(6) NOT NULL,
  `news_name` varchar(255) NOT NULL,
  `news_keywords` varchar(255) NOT NULL,
  `news_color` char(8) NOT NULL,
  `news_pic` varchar(255) NOT NULL,
  `news_inputer` varchar(50) NOT NULL,
  `news_reurl` varchar(255) NOT NULL,
  `news_remark` text NOT NULL,
  `news_content` text NOT NULL,
  `news_hits` mediumint(8) NOT NULL,
  `news_stars` tinyint(1) NOT NULL,
  `news_del` tinyint(1) NOT NULL,
  `news_up` mediumint(8) NOT NULL,
  `news_down` mediumint(8) NOT NULL,
  `news_gourl` varchar(255) NOT NULL,
  `news_letter` char(2) NOT NULL,
  `news_addtime` int(8) NOT NULL,
  `news_gold` decimal(3,1) NOT NULL,
  `news_golder` smallint(6) NOT NULL,
  PRIMARY KEY  (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `pp_news`
--

LOCK TABLES `pp_news` WRITE;
/*!40000 ALTER TABLE `pp_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `pp_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pp_tag`
--

DROP TABLE IF EXISTS `pp_tag`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pp_tag` (
  `tag_id` mediumint(8) NOT NULL,
  `tag_sid` tinyint(1) NOT NULL,
  `tag_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `pp_tag`
--

LOCK TABLES `pp_tag` WRITE;
/*!40000 ALTER TABLE `pp_tag` DISABLE KEYS */;
INSERT INTO `pp_tag` VALUES (1,1,'动作'),(2,1,'标签'),(3,1,'标签'),(4,1,'标签'),(5,1,'标签'),(6,1,'标签'),(7,1,'电影'),(9,1,'电影'),(10,1,'标签'),(11,1,'标签'),(12,1,'标签'),(13,1,'标签'),(14,1,'标签'),(15,1,'电影'),(16,1,'动作'),(17,1,'动作'),(18,1,'动作'),(19,1,'动作'),(20,1,'电影'),(21,1,'动作'),(22,1,'动作'),(8,1,'动作'),(23,1,'标签'),(24,1,'动作'),(27,1,'动作');
/*!40000 ALTER TABLE `pp_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pp_vod`
--

DROP TABLE IF EXISTS `pp_vod`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pp_vod` (
  `vod_id` mediumint(8) unsigned NOT NULL auto_increment,
  `vod_cid` smallint(6) NOT NULL,
  `vod_name` varchar(255) NOT NULL,
  `vod_title` varchar(255) NOT NULL,
  `vod_keywords` varchar(255) NOT NULL,
  `vod_color` varchar(255) default NULL,
  `vod_actor` varchar(255) NOT NULL,
  `vod_director` varchar(255) NOT NULL,
  `vod_content` text NOT NULL,
  `vod_pic` varchar(255) NOT NULL,
  `vod_area` char(10) NOT NULL,
  `vod_language` char(10) NOT NULL,
  `vod_year` smallint(4) NOT NULL,
  `vod_continu` varchar(20) NOT NULL default '0',
  `vod_addtime` int(11) NOT NULL,
  `vod_hits` mediumint(8) NOT NULL default '0',
  `vod_stars` tinyint(1) NOT NULL default '0',
  `vod_del` tinyint(1) NOT NULL default '0',
  `vod_up` datetime default NULL,
  `vod_down` mediumint(8) NOT NULL default '0',
  `vod_play` varchar(255) NOT NULL,
  `vod_server` varchar(255) NOT NULL,
  `vod_url` longtext NOT NULL,
  `vod_inputer` varchar(30) NOT NULL,
  `vod_reurl` varchar(255) NOT NULL,
  `vod_letter` char(2) NOT NULL,
  `vod_skin` varchar(30) NOT NULL,
  `vod_gold` varchar(255) default NULL,
  `vod_golder` varchar(255) default NULL,
  `vod_company` varchar(255) default NULL,
  `vod_people` varchar(255) default NULL,
  `vod_phone` varchar(255) default NULL,
  `vod_tele` varchar(255) default NULL,
  `vod_email` varchar(255) default NULL,
  `vod_money` varchar(50) default NULL,
  `vod_hot` tinyint(1) default NULL,
  `vod_mhot` tinyint(1) default '0',
  `vod_ditch` varchar(255) default NULL,
  `vod_way` tinyint(1) default NULL,
  PRIMARY KEY  (`vod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `pp_vod`
--

LOCK TABLES `pp_vod` WRITE;
/*!40000 ALTER TABLE `pp_vod` DISABLE KEYS */;
INSERT INTO `pp_vod` VALUES (1,27,'功夫熊猫','gongfuxiongmao','大地','','陈真','冯小刚','是独立快放假拉丝机菲拉斯减肥拉到减肥垃圾堆里分离式库搭建法拉束带结发<br />','video/2012-11/5095e414bfe5e.png','香港','台语',2012,'10',1352000535,778,1,0,'1970-01-01 08:00:00',1,'qvod','','打顺风开讲啦束带结发垃圾束带结发考虑到手机发','admin','www.baidu.com','G','大地','10.0','123','','','','','','0',0,0,NULL,NULL),(2,27,'标题','英名称','总时长','1','演员','导演','拉萨到房间卡洛斯杰弗里斯两地分居阿斯兰的减肥啦束带结发垃圾法拉快来撒当减肥啦数据量发神经李稻葵数据量是独立快速路的减肥了圣诞节法律使肌肤拉萨到减肥啦商家登陆速度快加福禄寿加到分类<br />','video/2012-11/5095e3daeb277.jpg','香港','粤语',2012,'分钟/集',1352002366,0,1,1,'1970-01-01 08:32:50',0,'','','','admin','出品公司','B','集数','素材介质','0','','','','','','0',1,1,NULL,NULL),(7,8,'画皮','Painted Skin: The Resurrection','120','','赵薇 陈坤 周迅','乌尔善','<span style=\"color:#000000;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:24px;orphans:2;text-align:left;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#ffffff;display:inline !important;float:none;\">　在天狼国迎亲的仪仗中，公主乘车撵而去。在黑暗的寒窑中小唯皮肤皲裂。当捉妖师庞郎将公主与小唯的真像告诉霍心后，霍心明白了一切，他做出了最终选择。一起去营救小唯，而在那惨烈的战役中，雀儿化作原型，而结果又会怎样？</span><span style=\"color:#000000;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:24px;orphans:2;text-align:left;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#ffffff;display:inline !important;float:none;\">　　在情、命、心的三重疑惑中，在色、心、生、死、情的五大</span><a target=\"_blank\" href=\"http://baike.baidu.com/view/713825.htm\" style=\"text-decoration:underline;color:#136ec2;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:24px;orphans:2;text-align:left;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#ffffff;\">劫难</a><span style=\"color:#000000;font-family:arial, 宋体, sans-serif;font-size:14px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:24px;orphans:2;text-align:left;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;-webkit-text-size-adjust:auto;-webkit-text-stroke-width:0px;background-color:#ffffff;display:inline !important;float:none;\">中，每一个生命都受到了巨大的挑战，每一生命都给出了极致的答案。劫惑心色，唯爱永恒！</span>','video/2012-11/5095e2e5bad89.jpg','大陆','国语',2012,'0',1352000232,120,1,0,'1970-01-01 08:32:50',0,'','','','admin','宁夏电影，鼎龙达，华谊，麒麟','H','','电视','1564','公司名称','王苏怡','13236358895','59784625','12@126.com','50000',1,0,'0',0),(8,17,'dgh','gongfuxiongmao','120','',']Casablanca',']Casablanca','The IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe Illusionist','video/2012-11/5095e2ba17b1d.jpg','','',0,'0',1352026336,0,1,0,'1970-01-01 08:32:50',0,'','','','admin','www.baidu.com','d','','电视','123','天马影视','王苏怡','手机','59784625','12@126.com','50000',1,0,NULL,NULL),(9,12,'忍者神龟 |','TMNT','120','','克里斯·埃文斯 Chris Evans 莎拉·米歇尔·盖拉 Sarah Michelle Gellar ',' 凯文·门罗 Kevin Munroe ','话说在纽约市的下水道之中住着四只功夫高强的忍者龟，它们跟随着忍者师父……一只来自日本的超级大老鼠。当它们认识了一名正义的电视记者之后，便帮助他四出打击犯罪，成为城市英雄。','video/2012-11/5095e309612a3.jpg','欧美','英语',2011,'',1352000270,120,1,0,'1970-01-01 08:32:50',0,'','','','admin','埃文斯','R','','电视','','天马影视','王苏怡','13236358895','59784625','12@126.com','50000',1,0,'0',0),(15,10,'放牛班的春天',']Casablanca','120','2',']Casablanca',']Casablanca','不料，这时杰克却被霍利以偷窃钻石之名栽赃陷害，并被关在下层船舱。不明真相的罗丝随众人一起在甲板上等候救生艇，可她终究还是相信杰克是无辜的。罗丝不\r\n顾一切回到空无一人的船舱寻找杰克，并在紧要关头找来救生斧救出他。两人来到甲板，罗丝在杰克的劝说下上了救生艇。救生艇徐徐放下，罗丝神情恍惚，突然她\r\n放弃了也许是最后的逃生机会跳回泰坦尼克号，这对情侣紧紧地拥抱在一起。 <br />\r\n“梦幻之船”泰坦尼克号开始缓缓下沉，一幕悲剧开始上演。漆黑的海洋和天空连成一片，无情的吞噬着绝望的乘客。杰克带着罗丝跑到船尾，爬上栏杆\r\n（也就是他们爱情开始的地方）坚持到最后，直到泰坦尼克号沉没。两人全力挣扎出巨大的漩涡之后，杰克将罗丝推上一块漂浮木板，自己却浸泡在冰冷的海水中。\r\n <br />\r\n几个小时之后，救援船返回救起了奄奄一息的罗丝，而此时早已冻僵的杰克却被冰海无情的吞没。罗丝信守对杰克许下的诺言，勇敢地活着。 <br />\r\n八十四年后，罗丝又来到泰坦尼克号沉没的地方，将“海洋之心”抛入海中，以告杰克在天之灵…','video/2012-11/5095e3c90b482.jpg','欧美','英语',2011,'',1352002377,120,2,0,'1970-01-01 08:32:50',0,'','','','admin','出品公司','F','','电视','262','天马影视','王苏怡','13236358895','59784625','12@126.com','50000',1,1,'0',0),(16,10,'功夫熊猫','gongfuxiongmao','120','2',']Casablanca',']Casablanca','不料，这时杰克却被霍利以偷窃钻石之名栽赃陷害，并被关在下层船舱。不明真相的罗丝随众人一起在甲板上等候救生艇，可她终究还是相信杰克是无辜的。罗丝不\r\n顾一切回到空无一人的船舱寻找杰克，并在紧要关头找来救生斧救出他。两人来到甲板，罗丝在杰克的劝说下上了救生艇。救生艇徐徐放下，罗丝神情恍惚，突然她\r\n放弃了也许是最后的逃生机会跳回泰坦尼克号，这对情侣紧紧地拥抱在一起。 <br />\r\n“梦幻之船”泰坦尼克号开始缓缓下沉，一幕悲剧开始上演。漆黑的海洋和天空连成一片，无情的吞噬着绝望的乘客。杰克带着罗丝跑到船尾，爬上栏杆\r\n（也就是他们爱情开始的地方）坚持到最后，直到泰坦尼克号沉没。两人全力挣扎出巨大的漩涡之后，杰克将罗丝推上一块漂浮木板，自己却浸泡在冰冷的海水中。\r\n <br />\r\n几个小时之后，救援船返回救起了奄奄一息的罗丝，而此时早已冻僵的杰克却被冰海无情的吞没。罗丝信守对杰克许下的诺言，勇敢地活着。 <br />\r\n八十四年后，罗丝又来到泰坦尼克号沉没的地方，将“海洋之心”抛入海中，以告杰克在天之灵…','video/2012-11/5095e4ea2f784.png','欧美','英语',2011,'',1352002335,120,2,0,'1970-01-01 08:32:50',0,'','','','admin','www.baidu.com','G','','电视','123','授权方公司名称','王苏怡','13236358895','59784625','12@126.com','50000',1,1,NULL,0),(17,8,'盗梦空间','gongfuxiongmao','120','2',']Casablanca',']Casablanca','<pre class=\"reply-text mb10\" id=\"content-590628506\" data-accusearea=\"aContent\">不料，这时杰克却被霍利以偷窃钻石之名栽赃陷害，并被关在下层船舱。不明真相的罗丝随众人一起在甲板上等候救生艇，可她终究还是相信杰克是无辜的。罗丝不\r\n顾一切回到空无一人的船舱寻找杰克，并在紧要关头找来救生斧救出他。两人来到甲板，罗丝在杰克的劝说下上了救生艇。救生艇徐徐放下，罗丝神情恍惚，突然她\r\n放弃了也许是最后的逃生机会跳回泰坦尼克号，这对情侣紧紧地拥抱在一起。 \r\n\r\n“梦幻之船”泰坦尼克号开始缓缓下沉，一幕悲剧开始上演。漆黑的海洋和天空连成一片，无情的吞噬着绝望的乘客。杰克带着罗丝跑到船尾，爬上栏杆\r\n（也就是他们爱情开始的地方）坚持到最后，直到泰坦尼克号沉没。两人全力挣扎出巨大的漩涡之后，杰克将罗丝推上一块漂浮木板，自己却浸泡在冰冷的海水中。\r\n \r\n\r\n几个小时之后，救援船返回救起了奄奄一息的罗丝，而此时早已冻僵的杰克却被冰海无情的吞没。罗丝信守对杰克许下的诺言，勇敢地活着。 \r\n\r\n八十四年后，罗丝又来到泰坦尼克号沉没的地方，将“海洋之心”抛入海中，以告杰克在天之灵…</pre>','video/2012-11/5095e3b773205.jpg','欧美','英语',2009,'',1352000442,120,1,0,'1970-01-01 08:33:20',0,'','','','admin','www.baidu.com','D','','电视','262','授权方公司名称','王苏怡','13236358895','59784625','12@126.com','50000',1,0,'0',0),(18,8,'盗梦空间','gongfuxiongmao','120','2',']Casablanca',']Casablanca','不料，这时杰克却被霍利以偷窃钻石之名栽赃陷害，并被关在下层船舱。不明真相的罗丝随众人一起在甲板上等候救生艇，可她终究还是相信杰克是无辜的。罗丝不\r\n顾一切回到空无一人的船舱寻找杰克，并在紧要关头找来救生斧救出他。两人来到甲板，罗丝在杰克的劝说下上了救生艇。救生艇徐徐放下，罗丝神情恍惚，突然她\r\n放弃了也许是最后的逃生机会跳回泰坦尼克号，这对情侣紧紧地拥抱在一起。 <br />\r\n“梦幻之船”泰坦尼克号开始缓缓下沉，一幕悲剧开始上演。漆黑的海洋和天空连成一片，无情的吞噬着绝望的乘客。杰克带着罗丝跑到船尾，爬上栏杆\r\n（也就是他们爱情开始的地方）坚持到最后，直到泰坦尼克号沉没。两人全力挣扎出巨大的漩涡之后，杰克将罗丝推上一块漂浮木板，自己却浸泡在冰冷的海水中。\r\n <br />\r\n几个小时之后，救援船返回救起了奄奄一息的罗丝，而此时早已冻僵的杰克却被冰海无情的吞没。罗丝信守对杰克许下的诺言，勇敢地活着。 <br />\r\n八十四年后，罗丝又来到泰坦尼克号沉没的地方，将“海洋之心”抛入海中，以告杰克在天之灵…','video/2012-11/5095e3a23529b.jpg','欧美','英语',2009,'',1352000420,120,1,0,'1970-01-01 08:33:09',0,'','','','admin','www.baidu.com','D','','电视','123','授权方公司名称','联系人','13236358895','59784625','12@126.com','50000',1,0,NULL,0),(19,8,'盗梦空间',']Casablanca','120','2',']Casablanca',']Casablanca','不料，这时杰克却被霍利以偷窃钻石之名栽赃陷害，并被关在下层船舱。不明真相的罗丝随众人一起在甲板上等候救生艇，可她终究还是相信杰克是无辜的。罗丝不\r\n顾一切回到空无一人的船舱寻找杰克，并在紧要关头找来救生斧救出他。两人来到甲板，罗丝在杰克的劝说下上了救生艇。救生艇徐徐放下，罗丝神情恍惚，突然她\r\n放弃了也许是最后的逃生机会跳回泰坦尼克号，这对情侣紧紧地拥抱在一起。 <br />\r\n“梦幻之船”泰坦尼克号开始缓缓下沉，一幕悲剧开始上演。漆黑的海洋和天空连成一片，无情的吞噬着绝望的乘客。杰克带着罗丝跑到船尾，爬上栏杆\r\n（也就是他们爱情开始的地方）坚持到最后，直到泰坦尼克号沉没。两人全力挣扎出巨大的漩涡之后，杰克将罗丝推上一块漂浮木板，自己却浸泡在冰冷的海水中。\r\n <br />\r\n几个小时之后，救援船返回救起了奄奄一息的罗丝，而此时早已冻僵的杰克却被冰海无情的吞没。罗丝信守对杰克许下的诺言，勇敢地活着。 <br />\r\n八十四年后，罗丝又来到泰坦尼克号沉没的地方，将“海洋之心”抛入海中，以告杰克在天之灵…','video/2012-11/5095e38f0297d.jpg','欧美','英语',2008,'0',1352000402,120,1,0,'1970-01-01 08:33:20',0,'','','','admin','www.baidu.com','D','','电视','','授权方公司名称','王苏怡','13236358895','59784625','12@126.com','50000',1,0,'0',0),(21,13,'勇敢的心',']Casablanca','120','2',']Casablanca',']Casablanca','勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心勇敢的心','video/2012-11/5095e4b9b8faa.png','欧美','英语',2010,'',1352002356,120,2,0,'1970-01-01 08:32:50',0,'','','','admin','www.baidu.com','Y','','电视','123','天马影视','王苏怡','13236358895','59784625','12@126.com','50000',1,1,NULL,0),(22,10,'魔术师','The Illusionist','120','2','陈真','冯小刚','The IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe Illusionist','video/2012-11/5095e37d2c093.jpg','大陆','国语',2008,'',1352000385,120,1,0,'1970-01-01 08:32:50',0,'','','','admin','www.baidu.com','M','','电视','123','天马影视','王苏怡','13236358895','59784625','12@126.com','50000',1,0,NULL,0),(23,14,'盗梦空间','gongfuxiongmao','120','1',']Casablanca',']Casablanca','The IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe Illusionist','video/2012-11/5095e2a603c85.jpg','日韩','粤语',2009,'',1352000168,120,1,0,'1970-01-01 08:32:50',0,'','','','admin','www.baidu.com','D','','10','','授权方公司名称','王苏怡','13236358895','59784625','邮箱','50000',1,0,'0',0),(24,10,'功夫熊猫','gongfuxiongmao','120','2',']Casablanca',']Casablanca','The IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe Illusionist','video/2012-11/5095e4d793449.png','日韩','台语',2008,'',1352002347,120,2,0,'1970-01-01 08:32:50',0,'','','','admin','www.baidu.com','G','','10','123','天马影视','联系人','13236358895','59784625','12@126.com','50000',1,1,'0',1),(25,11,'盗梦空间','gongfuxiongmao','120','',']Casablanca','导演','The IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe Illusionist','video/2012-11/5095e2978868c.jpg','台湾','台语',2011,'',1352002465,123,1,0,'1970-01-01 08:32:50',0,'','','','admin','www.baidu.com','D','','电视','123','公司名称','王苏怡','13236358895','59784625','12@126.com','50000',1,1,'0',0),(26,11,'盗梦空间','gongfuxiongmao','120','2',']Casablanca',']Casablanca','The IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe IllusionistThe Illusionist','video/2012-11/5095e27fcd4dc.jpg','大陆','台语',2009,'',1352000132,121,1,0,'1970-01-01 08:32:50',0,'','','','admin','www.baidu.com1','D','','电视','123','天马影视','联系人','13236358895','59784625','12@126.com','50000',1,0,'0',1);
/*!40000 ALTER TABLE `pp_vod` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-11-13  0:26:35
