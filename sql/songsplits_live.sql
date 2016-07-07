-- This is the db create script for SongSplits Old app, sonngsplits_live

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27221 ;

--
-- Triggers `administration`
--
DROP TRIGGER IF EXISTS `administration_delete`;
DELIMITER //
CREATE TRIGGER `administration_delete` AFTER DELETE ON `administration`
 FOR EACH ROW INSERT INTO log_ss_live.administration_log (action, administration_id, writer_id, company_name, ipi, publisher_society_id, publisher_admin_id, created)
  VALUES(
  	'delete', 
  	OLD.administration_id,
	OLD.writer_id,
	OLD.company_name,
	OLD.ipi,
	OLD.publisher_society_id,
	OLD.publisher_admin_id,
	OLD.created
	)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `administration_update`;
DELIMITER //
CREATE TRIGGER `administration_update` AFTER UPDATE ON `administration`
 FOR EACH ROW INSERT INTO log_ss_live.administration_log (action, administration_id, writer_id, company_name, ipi, publisher_society_id, publisher_admin_id, created)
  VALUES(
  	'update', 
  	NEW.administration_id,
	NEW.writer_id,
	NEW.company_name,
	NEW.ipi,
	NEW.publisher_society_id,
	NEW.publisher_admin_id,
	NEW.created
	)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `s3_db.publisher Insert`;
DELIMITER //
CREATE TRIGGER `s3_db.publisher Insert` AFTER INSERT ON `administration`
 FOR EACH ROW BEGIN
INSERT INTO log_ss_live.administration_log (action, administration_id, writer_id, company_name, ipi, publisher_society_id, publisher_admin_id, created)
  VALUES(
  	'insert', 
  	NEW.administration_id,
	NEW.writer_id,
	NEW.company_name,
	NEW.ipi,
	NEW.publisher_society_id,
	NEW.publisher_admin_id,
	NEW.created
	);

INSERT INTO s3_db.publisher (publisher_id, society_id, admin_id, cae_ipi)
VALUES(
NEW.administration_id,
NEW.publisher_society_id,
NEW.publisher_admin_id,
NEW.ipi
);
END
//
DELIMITER ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=230 ;

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE IF NOT EXISTS `analytics` (
  `writer_id` int(11) DEFAULT NULL,
  `split_count` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE IF NOT EXISTS `artist` (
  `artist_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `temp_id` int(11) DEFAULT NULL,
  `artist_name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `alt_names` text COLLATE latin1_general_ci,
  `label` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`artist_id`),
  UNIQUE KEY `artist_name_2` (`artist_name`),
  KEY `artist_name` (`artist_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=504 ;

-- --------------------------------------------------------

--
-- Table structure for table `artist_song`
--

CREATE TABLE IF NOT EXISTS `artist_song` (
  `artist_song_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) unsigned NOT NULL,
  `song_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`artist_song_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attorney`
--

CREATE TABLE IF NOT EXISTS `attorney` (
  `attorney_id` int(11) NOT NULL AUTO_INCREMENT,
  `attorney_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `company_name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `notification` varchar(6) COLLATE latin1_general_ci NOT NULL DEFAULT 'real',
  `email` text COLLATE latin1_general_ci NOT NULL,
  `password` text COLLATE latin1_general_ci NOT NULL,
  `language_id` int(2) NOT NULL DEFAULT '1',
  `phone` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `fax` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`attorney_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=574 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4083559 ;

--
-- Triggers `connection`
--
DROP TRIGGER IF EXISTS `s3_db.connection Insert`;
DELIMITER //
CREATE TRIGGER `s3_db.connection Insert` AFTER INSERT ON `connection`
 FOR EACH ROW BEGIN
INSERT INTO s3_db.connection (id, user_id, connection_id)
VALUES(
NEW.connection_id,
NEW.writer_id,
NEW.writer_id1
);
END
//
DELIMITER ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=396633 ;

--
-- Triggers `email_activity`
--
DROP TRIGGER IF EXISTS `activity_insert`;
DELIMITER //
CREATE TRIGGER `activity_insert` AFTER INSERT ON `email_activity`
 FOR EACH ROW INSERT INTO ss_beta.activity (action, writer_id, activity, `song_id`,  date_created)
  VALUES(
  	'insert', 
  	NEW.sender_id,
  	NEW.event,
  	NEW.song_id, 
	NEW.date_created 
	)
//
DELIMITER ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5483 ;

--
-- Triggers `harvest`
--
DROP TRIGGER IF EXISTS `s3_db.signup Insert`;
DELIMITER //
CREATE TRIGGER `s3_db.signup Insert` AFTER INSERT ON `harvest`
 FOR EACH ROW BEGIN
INSERT INTO s3_db.signup (id, first_name, last_name, email, society, salt, status_id,date_created)
VALUES(
NEW.id,
NEW.first_name,
NEW.last_name,
NEW.email,
NEW.society,
NEW.code,
NEW.status,
NEW.created_datatime
);
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3330 ;

--
-- Triggers `img`
--
DROP TRIGGER IF EXISTS `s3_db.image Insert`;
DELIMITER //
CREATE TRIGGER `s3_db.image Insert` AFTER INSERT ON `img`
 FOR EACH ROW BEGIN
INSERT INTO s3_db.image (img_id, img_link)
VALUES(
NEW.img_id,
NEW.img_name
);
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Triggers `language`
--
DROP TRIGGER IF EXISTS `s3_db.language Insert`;
DELIMITER //
CREATE TRIGGER `s3_db.language Insert` AFTER INSERT ON `language`
 FOR EACH ROW BEGIN
INSERT INTO s3_db.language (language_id, language_name)
VALUES(
NEW.language_id,
NEW.language_name
);
END
//
DELIMITER ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1177 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

--
-- Triggers `society`
--
DROP TRIGGER IF EXISTS `s3_db.society Insert`;
DELIMITER //
CREATE TRIGGER `s3_db.society Insert` AFTER INSERT ON `society`
 FOR EACH ROW BEGIN
INSERT INTO s3_db.society (society_id, short_name, contact_name)
VALUES(
NEW.society_id,
NEW.society_name,
NEW.society_contact
);
END
//
DELIMITER ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59346 ;

--
-- Triggers `song`
--
DROP TRIGGER IF EXISTS `song_delete`;
DELIMITER //
CREATE TRIGGER `song_delete` AFTER DELETE ON `song`
 FOR EACH ROW INSERT INTO log_ss_live.song_log (action,`song_id`, create_by_id, status_id, song_title, created, modified, sampled, is_cue, is_track, is_lyrics, current_version, lyrics)
  VALUES(
  	'delete', 
  	OLD.song_id, 
  	OLD.create_by_id, 
	OLD.status_id, 
	OLD.song_title, 
	OLD.created, 
	OLD.modified, 
	OLD.sampled, 
	OLD.is_cue, 
	OLD.is_track, 
	OLD.is_lyrics, 
	OLD.current_version, 
	OLD.lyrics
	)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `song_insert`;
DELIMITER //
CREATE TRIGGER `song_insert` AFTER INSERT ON `song`
 FOR EACH ROW BEGIN
INSERT INTO log_ss_live.song_log (action,`song_id`, create_by_id, status_id, song_title, created, modified, sampled, is_cue, is_track, is_lyrics, current_version, lyrics)
  VALUES(
  	'insert', 
  	NEW.song_id, 
  	NEW.create_by_id, 
	NEW.status_id, 
	NEW.song_title, 
	NEW.created, 
	NEW.modified, 
	NEW.sampled, 
	NEW.is_cue, 
	NEW.is_track, 
	NEW.is_lyrics, 
	NEW.current_version, 
	NEW.lyrics
	);
INSERT INTO s3_db.work (work_id, create_user_id, status_id, title, alt_title, date_created, date_confirmed, sample_id, work_type, current_version, lyrics,iswc)
VALUES(
NEW.song_id,
NEW.create_by_id,
NEW.status_id,
NEW.song_title,
NEW.alt_title1,
NEW.created,
NEW.modified,
NEW.sampled,
NEW.is_cue,
NEW.current_version,
NEW.lyrics,
NEW.iswc
);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `song_update`;
DELIMITER //
CREATE TRIGGER `song_update` AFTER UPDATE ON `song`
 FOR EACH ROW INSERT INTO log_ss_live.song_log (action,`song_id`, create_by_id, status_id, song_title, created, modified, sampled, is_cue, is_track, is_lyrics, current_version, lyrics)
  VALUES(
  	'update', 
  	NEW.song_id, 
  	NEW.create_by_id, 
	NEW.status_id, 
	NEW.song_title, 
	NEW.created, 
	NEW.modified, 
	NEW.sampled, 
	NEW.is_cue, 
	NEW.is_track, 
	NEW.is_lyrics, 
	NEW.current_version, 
	NEW.lyrics
	)
//
DELIMITER ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1124578 ;

--
-- Triggers `split`
--
DROP TRIGGER IF EXISTS `delete_split`;
DELIMITER //
CREATE TRIGGER `delete_split` AFTER DELETE ON `split`
 FOR EACH ROW INSERT INTO log_ss_live.split_log (action,`split_id`, song_id, writer_id, status_id, split_type, percent, created, modified, version, role_id)
  VALUES(
  	'delete', 
  	OLD.split_id,
  	OLD.song_id, 
  	OLD.writer_id, 
	OLD.status_id, 
	OLD.split_type, 
	OLD.percent, 
	OLD.created, 
	OLD.modified, 
	OLD.version, 
	OLD.role_id
	)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `split_insert`;
DELIMITER //
CREATE TRIGGER `split_insert` AFTER INSERT ON `split`
 FOR EACH ROW BEGIN
INSERT INTO log_ss_live.split_log (action,`split_id`, song_id, writer_id, status_id, split_type, percent, created, modified, version, role_id)
  VALUES(
  	'insert', 
  	NEW.split_id,
  	NEW.song_id, 
  	NEW.writer_id, 
	NEW.status_id, 
	NEW.split_type, 
	NEW.percent, 
	NEW.created, 
	NEW.modified, 
	NEW.version, 
	NEW.role_id
	);
INSERT INTO s3_db.writer_split (legacy_id, work_id, writer_id, split_type, status_id, split, created, confirmed, version, role)
VALUES(
NEW.split_id,
NEW.song_id,
NEW.writer_id,
NEW.split_type,
NEW.status_id,
NEW.percent,
NEW.created,
NEW.modified,
NEW.version,
NEW.role_id
);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `split_update`;
DELIMITER //
CREATE TRIGGER `split_update` AFTER UPDATE ON `split`
 FOR EACH ROW INSERT INTO log_ss_live.split_log (action,`split_id`, song_id, writer_id, status_id, split_type, percent, created, modified, version, role_id)
  VALUES(
  	'update', 
  	NEW.split_id,
  	NEW.song_id, 
  	NEW.writer_id, 
	NEW.status_id, 
	NEW.split_type, 
	NEW.percent, 
	NEW.created, 
	NEW.modified, 
	NEW.version, 
	NEW.role_id
	)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2536 ;

-- --------------------------------------------------------

--
-- Table structure for table `tag_type`
--

CREATE TABLE IF NOT EXISTS `tag_type` (
  `tag_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_type_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`tag_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17849 ;

--
-- Triggers `trackemail`
--
DROP TRIGGER IF EXISTS `s3_db.referral Insert`;
DELIMITER //
CREATE TRIGGER `s3_db.referral Insert` AFTER INSERT ON `trackemail`
 FOR EACH ROW BEGIN
INSERT INTO s3_db.referral (referral_id, user_id, new_user_id, email,date_created)
VALUES(
NEW.track_id,
NEW.writer_id,
NEW.new_writer_id,
NEW.email,
NEW.date_added
);
END
//
DELIMITER ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7191 ;

--
-- Triggers `trackreminder`
--
DROP TRIGGER IF EXISTS `s3_db.reminder Insert`;
DELIMITER //
CREATE TRIGGER `s3_db.reminder Insert` AFTER INSERT ON `trackreminder`
 FOR EACH ROW BEGIN
INSERT INTO s3_db.reminder (reminder_id, send_user_id, split_id, date_created)
VALUES(
NEW.track_id,
NEW.writer_id,
NEW.split_id,
NEW.date_added
);
END
//
DELIMITER ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1942 ;

--
-- Triggers `versions`
--
DROP TRIGGER IF EXISTS `s3_db.work_history Insert`;
DELIMITER //
CREATE TRIGGER `s3_db.work_history Insert` AFTER INSERT ON `versions`
 FOR EACH ROW BEGIN
INSERT INTO s3_db.work_history (work_id, version, note, date_created)
VALUES(
NEW.song_id,
NEW.version,
NEW.additional_info,
NEW.date_added
);
END
//
DELIMITER ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2180051 ;

--
-- Triggers `writer`
--
DROP TRIGGER IF EXISTS `writer_delete`;
DELIMITER //
CREATE TRIGGER `writer_delete` AFTER DELETE ON `writer`
 FOR EACH ROW INSERT INTO ss_db_sandbox_log.writer_log  (action, writer_id, img_id, first_name, middle_name, last_name, suffix_name, alias_name, email, `password`, bcryptPassword, u_id, access_token, gender, birthday, full_name, date_joined, last_login, phone, language_id, society_id, ipi, publisher_ascap, publisher_bmi, publisher_sesac, other_publisher_alias, admin_contact_id, attorney_id, attorney_authorized, manager_id, manager_authorized, notification, notifiy_manager, notifiy_attorney, notifiy_admin, notifiy_society, t_id, t_oauth_token, t_oauth_token_secret, display_name, backup_email, locations, publisher_society_id, publisher_admin_id)
  VALUES(
  	'delete', 
  	OLD.writer_id,
	OLD.img_id,
	OLD.first_name,
	OLD.middle_name,
	OLD.last_name,
	OLD.suffix_name,
	OLD.alias_name,
	OLD.email,
	OLD.password,
	OLD.bcryptPassword,
	OLD.u_id,
	OLD.access_token,
	OLD.gender,
	OLD.birthday,
	OLD.full_name,
	OLD.date_joined,
	OLD.last_login,
	OLD.phone,
	OLD.language_id,
	OLD.society_id,
	OLD.ipi,
	OLD.publisher_ascap,
	OLD.publisher_bmi,
	OLD.publisher_sesac,
	OLD.other_publisher_alias,
	OLD.admin_contact_id,
	OLD.attorney_id,
	OLD.attorney_authorized,
	OLD.manager_id,
	OLD.manager_authorized,
	OLD.notification,
	OLD.notifiy_manager,
	OLD.notifiy_attorney,
	OLD.notifiy_admin,
	OLD.notifiy_society,
	OLD.t_id,
	OLD.t_oauth_token,
	OLD.t_oauth_token_secret,
	OLD.display_name,
	OLD.backup_email,
	OLD.locations,
	OLD.publisher_society_id,
	OLD.publisher_admin_id
	)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `writer_insert`;
DELIMITER //
CREATE TRIGGER `writer_insert` AFTER INSERT ON `writer`
 FOR EACH ROW BEGIN
INSERT INTO ss_db_sandbox_log.writer_log (action, writer_id, img_id, first_name, middle_name, last_name, suffix_name, alias_name, email, password, bcryptPassword, u_id, access_token, gender, birthday, full_name, date_joined, last_login, phone, language_id, society_id, ipi, publisher_ascap, publisher_bmi, publisher_sesac, other_publisher_alias, admin_contact_id, attorney_id, attorney_authorized, manager_id, manager_authorized, notification, notifiy_manager, notifiy_attorney, notifiy_admin, notifiy_society, t_id, t_oauth_token, t_oauth_token_secret, display_name, backup_email, locations, publisher_society_id, publisher_admin_id)
  VALUES(
  	'insert', 
  	NEW.writer_id,
	NEW.img_id,
	NEW.first_name,
	NEW.middle_name,
	NEW.last_name,
	NEW.suffix_name,
	NEW.alias_name,
	NEW.email,
	NEW.password,
	NEW.bcryptPassword,
	NEW.u_id,
	NEW.access_token,
	NEW.gender,
	NEW.birthday,
	NEW.full_name,
	NEW.date_joined,
	NEW.last_login,
	NEW.phone,
	NEW.language_id,
	NEW.society_id,
	NEW.ipi,
	NEW.publisher_ascap,
	NEW.publisher_bmi,
	NEW.publisher_sesac,
	NEW.other_publisher_alias,
	NEW.admin_contact_id,
	NEW.attorney_id,
	NEW.attorney_authorized,
	NEW.manager_id,
	NEW.manager_authorized,
	NEW.notification,
	NEW.notifiy_manager,
	NEW.notifiy_attorney,
	NEW.notifiy_admin,
	NEW.notifiy_society,
	NEW.t_id,
	NEW.t_oauth_token,
	NEW.t_oauth_token_secret,
	NEW.display_name,
	NEW.backup_email,
	NEW.locations,
	NEW.publisher_society_id,
	NEW.publisher_admin_id
	);
INSERT INTO s3_db.user (img_id, legal_name, alias_1, email_1, email_2, password, date_joined, last_login, phone, language_id)
  VALUES(
NEW.img_id,
NEW.full_name,
NEW.display_name,
NEW.email,
NEW.backup_email,
NEW.password,
NEW.date_joined,
NEW.last_login,
NEW.phone,
NEW.language_id
);
INSERT INTO s3_db.social (fb_userID, fb_access_token, tw_userID, tw_token, tw_secret)
VALUES(
NEW.u_id,
NEW.access_token,
NEW.t_id,
NEW.t_oauth_token,
NEW.t_oauth_token_secret
);
INSERT INTO s3_db.user (img_id, legal_name, alias_1, email_1, email_2, password, date_joined, last_login, phone, language_id, location_id)
VALUES(
NEW.img_id,
NEW.full_name,
NEW.display_name,
NEW.email,
NEW.backup_email,
NEW.password,
NEW.date_joined,
NEW.last_login,
NEW.phone,
NEW.language_id,
NEW.locations
);
INSERT INTO s3_db.writer (writer_id, society_id, cae_ipi, realtime_email, weekly_email, manager_notify, manager_control, attorney_notify, attorney_control)
VALUES(
NEW.writer_id,
NEW.society_id,
NEW.ipi,
NEW.notification,
NEW.notification,
NEW.notifiy_manager,
NEW.manager_authorized,
NEW.notifiy_attorney,
NEW.attorney_authorized
);
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `writer_update`;
DELIMITER //
CREATE TRIGGER `writer_update` AFTER UPDATE ON `writer`
 FOR EACH ROW BEGIN
INSERT INTO ss_db_sandbox_log.writer_log (action, writer_id, img_id, first_name, middle_name, last_name, suffix_name, alias_name, email, password, bcryptPassword, u_id, access_token, gender, birthday, full_name, date_joined, last_login, phone, language_id, society_id, ipi, publisher_ascap, publisher_bmi, publisher_sesac, other_publisher_alias, admin_contact_id, attorney_id, attorney_authorized, manager_id, manager_authorized, notification, notifiy_manager, notifiy_attorney, notifiy_admin, notifiy_society, t_id, t_oauth_token, t_oauth_token_secret, display_name, backup_email, locations, publisher_society_id, publisher_admin_id)
  VALUES(
  	'insert', 
  	NEW.writer_id,
	NEW.img_id,
	NEW.first_name,
	NEW.middle_name,
	NEW.last_name,
	NEW.suffix_name,
	NEW.alias_name,
	NEW.email,
	NEW.password,
	NEW.bcryptPassword,
	NEW.u_id,
	NEW.access_token,
	NEW.gender,
	NEW.birthday,
	NEW.full_name,
	NEW.date_joined,
	NEW.last_login,
	NEW.phone,
	NEW.language_id,
	NEW.society_id,
	NEW.ipi,
	NEW.publisher_ascap,
	NEW.publisher_bmi,
	NEW.publisher_sesac,
	NEW.other_publisher_alias,
	NEW.admin_contact_id,
	NEW.attorney_id,
	NEW.attorney_authorized,
	NEW.manager_id,
	NEW.manager_authorized,
	NEW.notification,
	NEW.notifiy_manager,
	NEW.notifiy_attorney,
	NEW.notifiy_admin,
	NEW.notifiy_society,
	NEW.t_id,
	NEW.t_oauth_token,
	NEW.t_oauth_token_secret,
	NEW.display_name,
	NEW.backup_email,
	NEW.locations,
	NEW.publisher_society_id,
	NEW.publisher_admin_id
	);
INSERT INTO s3_db.user (img_id, legal_name, alias_1, email_1, email_2, password, date_joined, last_login, phone, language_id)
  VALUES(
NEW.img_id,
NEW.full_name,
NEW.display_name,
NEW.email,
NEW.backup_email,
NEW.password,
NEW.date_joined,
NEW.last_login,
NEW.phone,
NEW.language_id
);
INSERT INTO s3_db.social (fb_userID, fb_access_token, tw_userID, tw_token, tw_secret)
VALUES(
NEW.u_id,
NEW.access_token,
NEW.t_id,
NEW.t_oauth_token,
NEW.t_oauth_token_secret
);
INSERT INTO s3_db.user (img_id, legal_name, alias_1, email_1, email_2, password, date_joined, last_login, phone, language_id, location_id)
VALUES(
NEW.img_id,
NEW.full_name,
NEW.display_name,
NEW.email,
NEW.backup_email,
NEW.password,
NEW.date_joined,
NEW.last_login,
NEW.phone,
NEW.language_id,
NEW.locations
);
INSERT INTO s3_db.writer (writer_id, society_id, cae_ipi, realtime_email, weekly_email, manager_notify, manager_control, attorney_notify, attorney_control)
VALUES(
NEW.writer_id,
NEW.society_id,
NEW.ipi,
NEW.notification,
NEW.notification,
NEW.notifiy_manager,
NEW.manager_authorized,
NEW.notifiy_attorney,
NEW.attorney_authorized
);
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `writer_role`
--

CREATE TABLE IF NOT EXISTS `writer_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) NOT NULL,
  `shortcode` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;
