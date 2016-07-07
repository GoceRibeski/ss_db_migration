-- This is the db create script for SongSplits Old app, sonngsplits_live

--  cleaned from triggers, 
--  prepeared structure for migration CI CC app
--  replaced from latin1 to utf8




-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2016 at 11:02 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `songsplits`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `adminParent_id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL DEFAULT '',
  `country` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(255) DEFAULT '',
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=130 ;

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE IF NOT EXISTS `administration` (
  `administration_id` int(11) NOT NULL AUTO_INCREMENT,
  `writer_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `ipi` int(11) DEFAULT NULL,
  `publisher_society_id` int(11) NOT NULL,
  `publisher_admin_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`administration_id`),
  KEY `writer_id` (`writer_id`),
  KEY `company_name` (`company_name`),
  KEY `publisher_society_id` (`publisher_society_id`),
  KEY `ipi` (`ipi`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=27221 ;




-- --------------------------------------------------------

--
-- Table structure for table `admin_contact`
--

CREATE TABLE IF NOT EXISTS `admin_contact` (
  `adminContact_id` int(11) NOT NULL AUTO_INCREMENT,
  `adminContact_name` varchar(255) NOT NULL DEFAULT '',
  `admin_id` varchar(255) NOT NULL DEFAULT '',
  `authorized` int(1) NOT NULL DEFAULT '0',
  `notification` varchar(6) NOT NULL DEFAULT 'real',
  `email` text,
  `password` text,
  `phone` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`adminContact_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=104 ;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `temp_id` int(11) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `release` text,
  `artist` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=230 ;

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE IF NOT EXISTS `analytics` (
  `writer_id` int(11) DEFAULT NULL,
  `split_count` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT charset="UTF8";

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE IF NOT EXISTS `artist` (
  `artist_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `temp_id` int(11) DEFAULT NULL,
  `artist_name` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `alt_names` text COLLATE utf8_general_ci,
  `label` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`artist_id`),
  UNIQUE KEY `artist_name_2` (`artist_name`),
  KEY `artist_name` (`artist_name`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" COLLATE=utf8_general_ci AUTO_INCREMENT=504 ;

-- --------------------------------------------------------

--
-- Table structure for table `artist_song`
--

CREATE TABLE IF NOT EXISTS `artist_song` (
  `artist_song_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) unsigned NOT NULL,
  `song_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`artist_song_id`)
) ENGINE=InnoDB DEFAULT charset="UTF8" AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attorney`
--

CREATE TABLE IF NOT EXISTS `attorney` (
  `attorney_id` int(11) NOT NULL AUTO_INCREMENT,
  `attorney_name` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `notification` varchar(6) COLLATE utf8_general_ci NOT NULL DEFAULT 'real',
  `email` text COLLATE utf8_general_ci NOT NULL,
  `password` text COLLATE utf8_general_ci NOT NULL,
  `language_id` int(2) NOT NULL DEFAULT '1',
  `phone` varchar(15) COLLATE utf8_general_ci DEFAULT NULL,
  `fax` varchar(15) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`attorney_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" COLLATE=utf8_general_ci AUTO_INCREMENT=574 ;

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE IF NOT EXISTS `connection` (
  `connection_id` int(11) NOT NULL AUTO_INCREMENT,
  `writer_id` int(11) NOT NULL,
  `writer_id1` int(11) NOT NULL,
  PRIMARY KEY (`connection_id`),
  UNIQUE KEY `writer_id` (`writer_id`,`writer_id1`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=4083559 ;


-- --------------------------------------------------------

--
-- Table structure for table `email_activity`
--

CREATE TABLE IF NOT EXISTS `email_activity` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) DEFAULT NULL,
  `song_id` int(11) DEFAULT NULL,
  `songtitle` varchar(255) DEFAULT NULL,
  `event` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) DEFAULT NULL,
  `sg_message_id` text,
  `timestamp` int(11) DEFAULT NULL,
  `smtp-id` text,
  `category` varchar(255) DEFAULT NULL,
  `url` text,
  `asm_group_id` int(11) DEFAULT NULL,
  `useragent` text,
  `sg_event_id` text,
  PRIMARY KEY (`id`),
  KEY `song_id` (`song_id`),
  KEY `sender_id` (`sender_id`),
  KEY `event` (`event`),
  KEY `email` (`email`),
  KEY `date_created` (`date_created`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=396633 ;



-- --------------------------------------------------------

--
-- Table structure for table `harvest`
--

CREATE TABLE IF NOT EXISTS `harvest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` text,
  `society` varchar(50) DEFAULT NULL,
  `code` text,
  `status` int(1) DEFAULT NULL,
  `created_datatime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=5483 ;



-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=3330 ;


-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=7 ;


-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `manager_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `language_id` int(2) NOT NULL DEFAULT '1',
  `notification` varchar(6) NOT NULL DEFAULT 'real',
  `email` text,
  `password` text,
  `alt_email` text,
  `phone` varchar(15) DEFAULT NULL,
  `super` int(1) NOT NULL DEFAULT '0',
  `locations` text,
  `company` varchar(255) DEFAULT NULL,
  `notifiy_client` int(1) NOT NULL DEFAULT '0',
  `notifiy_attorney` int(1) NOT NULL DEFAULT '0',
  `notifiy_admin` int(1) NOT NULL DEFAULT '0',
  `notifiy_society` int(1) NOT NULL DEFAULT '0',
  `u_id` int(11) DEFAULT NULL,
  `access_token` text,
  `t_id` int(11) DEFAULT NULL,
  `t_oauth_token` text,
  `t_oauth_token_secret` text,
  `date_joined` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`manager_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=1177 ;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `is_admin` tinyint(1) unsigned DEFAULT '0',
  `token` varchar(255) NOT NULL DEFAULT '',
  `expiry_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=235 ;

-- --------------------------------------------------------

--
-- Table structure for table `society`
--

CREATE TABLE IF NOT EXISTS `society` (
  `society_id` int(11) NOT NULL AUTO_INCREMENT,
  `society_name` varchar(100) NOT NULL,
  `society_contact` varchar(100) DEFAULT NULL,
  `stated_writers` int(11) DEFAULT NULL,
  `actual_writers` int(11) DEFAULT NULL,
  `stated_publishers` int(11) DEFAULT NULL,
  `actual_publishers` int(11) DEFAULT NULL,
  PRIMARY KEY (`society_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=132 ;


-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE IF NOT EXISTS `song` (
  `song_id` int(11) NOT NULL AUTO_INCREMENT,
  `create_by_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `song_title` varchar(255) DEFAULT NULL,
  `alt_title1` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `sampled` int(11) DEFAULT '0',
  `is_cue` int(1) NOT NULL DEFAULT '0',
  `is_track` int(1) NOT NULL DEFAULT '0',
  `is_lyrics` int(1) NOT NULL DEFAULT '0',
  `current_version` int(4) NOT NULL DEFAULT '1',
  `lyrics` text,
  `iswc` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`song_id`),
  KEY `song_title` (`song_title`),
  KEY `create_by_id` (`create_by_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=59346 ;



-- --------------------------------------------------------

--
-- Table structure for table `split`
--

CREATE TABLE IF NOT EXISTS `split` (
  `split_id` int(11) NOT NULL AUTO_INCREMENT,
  `song_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `split_type` int(1) NOT NULL DEFAULT '0',
  `percent` float(7,3) NOT NULL DEFAULT '0.000',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `version` int(4) NOT NULL DEFAULT '1',
  `role_id` int(11) DEFAULT '2',
  PRIMARY KEY (`split_id`),
  KEY `song_id` (`song_id`),
  KEY `writer_id` (`writer_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=1124578 ;



-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `song_id` int(11) NOT NULL,
  `writer_id` int(11) DEFAULT NULL,
  `tag_type_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  `other_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=2536 ;

-- --------------------------------------------------------

--
-- Table structure for table `tag_type`
--

CREATE TABLE IF NOT EXISTS `tag_type` (
  `tag_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_type_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`tag_type_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `trackemail`
--

CREATE TABLE IF NOT EXISTS `trackemail` (
  `track_id` int(11) NOT NULL AUTO_INCREMENT,
  `writer_id` int(11) NOT NULL,
  `new_writer_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`track_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=17849 ;


-- --------------------------------------------------------

--
-- Table structure for table `trackreminder`
--

CREATE TABLE IF NOT EXISTS `trackreminder` (
  `track_id` int(11) NOT NULL AUTO_INCREMENT,
  `writer_id` int(11) NOT NULL,
  `split_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`track_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=7191 ;



-- --------------------------------------------------------

--
-- Table structure for table `versions`
--

CREATE TABLE IF NOT EXISTS `versions` (
  `version_id` int(11) NOT NULL AUTO_INCREMENT,
  `song_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `version` int(4) NOT NULL,
  `additional_info` text NOT NULL,
  `old_song_title` varchar(255) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`version_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=1942 ;



-- --------------------------------------------------------

--
-- Table structure for table `writer`
--

CREATE TABLE IF NOT EXISTS `writer` (
  `writer_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `suffix_name` varchar(100) DEFAULT NULL,
  `alias_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text,
  `bcryptPassword` char(60) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `access_token` text,
  `gender` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `full_name` varchar(250) DEFAULT NULL,
  `date_joined` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `language_id` int(2) NOT NULL DEFAULT '1',
  `society_id` int(3) DEFAULT NULL,
  `ipi` int(11) DEFAULT NULL,
  `publisher_ascap` varchar(120) DEFAULT NULL,
  `publisher_bmi` varchar(120) DEFAULT NULL,
  `publisher_sesac` varchar(120) DEFAULT NULL,
  `other_publisher_alias` varchar(120) DEFAULT NULL,
  `admin_contact_id` int(11) DEFAULT NULL,
  `attorney_id` int(11) DEFAULT NULL,
  `attorney_authorized` int(1) NOT NULL DEFAULT '0',
  `manager_id` int(11) NOT NULL,
  `manager_authorized` int(1) NOT NULL DEFAULT '0',
  `notification` varchar(15) DEFAULT 'real',
  `notifiy_manager` int(1) NOT NULL DEFAULT '0',
  `notifiy_attorney` int(1) NOT NULL DEFAULT '0',
  `notifiy_admin` int(1) NOT NULL DEFAULT '0',
  `notifiy_society` int(1) NOT NULL DEFAULT '0',
  `t_id` int(11) DEFAULT NULL,
  `t_oauth_token` varchar(100) DEFAULT NULL,
  `t_oauth_token_secret` varchar(100) DEFAULT NULL,
  `display_name` varchar(250) DEFAULT NULL,
  `backup_email` text,
  `locations` varchar(255) DEFAULT NULL,
  `publisher_society_id` int(11) DEFAULT NULL,
  `publisher_admin_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `temp` int(11) DEFAULT NULL,
  PRIMARY KEY (`writer_id`),
  UNIQUE KEY `u_id` (`u_id`),
  KEY `full_name` (`full_name`),
  KEY `ipi` (`ipi`),
  KEY `display_name` (`display_name`),
  KEY `society_id` (`society_id`),
  KEY `email` (`email`),
  KEY `date_joined` (`date_joined`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=2180051 ;


-- --------------------------------------------------------

--
-- Table structure for table `writer_role`
--

CREATE TABLE IF NOT EXISTS `writer_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) NOT NULL,
  `shortcode` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT charset="UTF8" AUTO_INCREMENT=8 ;
