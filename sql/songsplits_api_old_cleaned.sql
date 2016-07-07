-- This is the db create script for SongSplits API
-- DB with applied patches
-- Cleaned MySQL errors
--


SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `songsplits_api` DEFAULT CHARACTER SET utf8;

USE `songsplits_api`;


--
-- access_control
--


CREATE TABLE IF NOT EXISTS `songsplits_api`.`access_control` (
  `ac_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `resource_id` INT NOT NULL,
  `resource_type` VARCHAR(128) NOT NULL,
  `read_access` TINYINT(1) NOT NULL DEFAULT 0,
  `write_access` TINYINT(1) NOT NULL DEFAULT 0,
  `role` enum('cowriter', 'publisher', 'manager', 'attorney', 'administrator') NULL,
  `granted_by` INT NOT NULL,
  PRIMARY KEY (`ac_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- user_group
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`user_group` (
  `gr_id` INT NOT NULL AUTO_INCREMENT,
  `gr_name` VARCHAR(128) NULL,
  PRIMARY KEY (`gr_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;




--
-- user_group_perm
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`user_group_perm` (
  `per_id` INT NOT NULL AUTO_INCREMENT,
  `per_group_id` INT NULL,
  `per_flag` VARCHAR(100) NULL,
  PRIMARY KEY (`per_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



--
-- writer_administrator
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`writer_administrator` (
  `wa_id` int NOT NULL AUTO_INCREMENT,
  `admin_id` int NULL,
  `user_id` int NULL,
  `access_type` enum('none', 'read', 'write'),
  `rel_type` enum('publisher', 'manager', 'attorney', 'other', 'administrator') NULL,
  PRIMARY KEY (`wa_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- activity
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`activity` (
  `action` enum('insert') NULL,
  `activity` varchar(50) NOT NULL,
  `activity_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date_created` datetime NULL,
  `user_id` int(11) NOT NULL,
  `work_id` int(11) NULL,
  PRIMARY KEY (`activity_id`),
  INDEX `fk_activity_to_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_activity_to_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `songsplits`.`user`(`user_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- administration
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`administration` (

  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `administrator_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `access` enum('view','control') NULL,
  `deal_type` varchar(255) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_administration_to_administrator_idx` (`administrator_id` ASC),
  CONSTRAINT `fk_administration_to_administrator`
    FOREIGN KEY (`administrator_id`)
    REFERENCES `songsplits`.`administrator`(`administrator_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- administrator
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`administrator` (
  `administrator_id` int(11) NOT NULL AUTO_INCREMENT,
  `cae_ipi` int(11) NULL,
  `company_name` varchar(255) NOT NULL,
  `location_id` int(11) NULL,
  `parent_name` varchar(255) NULL,
  PRIMARY KEY (`administrator_id`),
  INDEX `fk_administrator_to_locations_idx` (`location_id` ASC),
  CONSTRAINT `fk_administrator_to_locations`
    FOREIGN KEY (`location_id`)
    REFERENCES `songsplits`.`locations`(`location_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- attorney
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`attorney` (
  `attorney_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(225) NULL,
  `user_id` int(11) NULL,
  PRIMARY KEY (`attorney_id`),
  INDEX `fk_attorney_to_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_attorney_to_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `songsplits`.`user`(`user_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- co_writer
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`co_writer` (
  `co_writer_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `writer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_co_writer_to_writer_idx` (`writer_id` ASC),
  CONSTRAINT `fk_co_writer_to_writer`
    FOREIGN KEY (`writer_id`)
    REFERENCES `songsplits`.`writer`(`writer_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- connection
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`connection` (
  `connection_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_connection_to_user_idx` (`connection_id` ASC),
  CONSTRAINT `fk_connection_to_user`
    FOREIGN KEY (`connection_id`)
    REFERENCES `songsplits`.`user`(`user_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- image
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`image` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_link` varchar(255) NULL,
  PRIMARY KEY (`img_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- language
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) NOT NULL,
  PRIMARY KEY (`language_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- locations
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`locations` (
  `city` varchar(255) NULL,
  `country` varchar(255) NULL,
  `location_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `state_region` varchar(255) NULL,
  PRIMARY KEY (`location_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- manager
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`manager` (
  `attorney_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(225) NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`attorney_id`),
  INDEX `fk_manager_to_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_manager_to_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `songsplits`.`user`(`user_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- other
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`other` (
  `company` varchar(225) NULL,
  `other_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`other_id`),
  INDEX `fk_other_to_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_other_to_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `songsplits`.`user`(`user_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- publisher
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`publisher` (
  `admin_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`publisher_id`),
  INDEX `fk_publisher_to_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_publisher_to_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `songsplits`.`user`(`user_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- publisher_split
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`publisher_split` (
  `confirmed` datetime NOT NULL,
  `created` timestamp NULL,
  `publisher_id` int(11) NOT NULL,
  `role` enum('E','SE') NULL,
  `split` float(7,3) NULL,
  `split_id` int(11) NOT NULL AUTO_INCREMENT,
  `split_type` enum('original','sample','translation') NULL,
  `status_id` enum('1','2') NULL,
  `version` int(4) NULL,
  `work_id` int(11) NOT NULL,
  PRIMARY KEY (`split_id`),
  INDEX `fk_publisher_split_to_publisher_idx` (`publisher_id` ASC),
  CONSTRAINT `fk_publisher_split_to_publisher`
    FOREIGN KEY (`publisher_id`)
    REFERENCES `songsplits`.`publisher`(`publisher_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- referral
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`referral` (
  `date_created` datetime NOT NULL,
  `email` text NOT NULL,
  `new_user_id` int(11) NOT NULL,
  `referral_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`referral_id`),
  INDEX `fk_referral_to_referral_idx` (`user_id` ASC),
  CONSTRAINT `fk_referral_to_referral_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `songsplits`.`user`(`user_id`),

  INDEX `fk_referral_to_new_user_idx` (`new_user_id` ASC),
  CONSTRAINT `fk_referral_to_new_user`
    FOREIGN KEY (`new_user_id`)
    REFERENCES `songsplits`.`user`(`user_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- reminder
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`reminder` (
  `date_created` datetime NOT NULL,
  `recieve_user_id` int(11) NOT NULL,
  `reminder_id` int(11) NOT NULL AUTO_INCREMENT,
  `send_user_id` int(11) NOT NULL,
  `split_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,

  PRIMARY KEY (`reminder_id`),

  INDEX `fk_reminder_to_recieve_user_idx` (`recieve_user_id` ASC),
  CONSTRAINT `fk_reminder_to_recieve_user_id`
    FOREIGN KEY (`recieve_user_id`)
    REFERENCES `songsplits`.`user`(`user_id`),

  INDEX `fk_reminder_to_send_user_id` (`send_user_id` ASC),
  CONSTRAINT `fk_reminder_to_send_user_id`
    FOREIGN KEY (`send_user_id`)
    REFERENCES `songsplits`.`user`(`user_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- request
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`request` (
  `device_type` varchar(50) NULL,
  `email` varchar(255) NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(50) NULL,
  `timestamp` timestamp NULL,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- session
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`session` (
  `expiry_date` datetime NOT NULL,
  `session_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`session_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- signup
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`signup` (
  `date_created` datetime NULL,
  `email` varchar(255) NULL,
  `full_name` varchar(255) NULL,
  `salt` text NULL,
  `signup_id` int(11) NOT NULL AUTO_INCREMENT,
  `society` varchar(50) NULL,
  `status_id` int(1) NULL,
  PRIMARY KEY (`signup_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- social
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`social` (
  `facebook_access_token` varchar(100) NULL,
  `facebook_id` int(11) NULL,
  `google_plus_id` varchar(255) NULL,
  `social_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `twitter_access_token` varchar(255) NULL,
  `twitter_id` int(11) NULL,
  `twitter_secret` varchar(255) NULL,
  `user_id` int(11) NULL,
  PRIMARY KEY (`social_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- society
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`society` (
  `affiliation_code` int(11) NULL,
  `contact_email` varchar(200) NULL,
  `contact_name` varchar(200) NULL,
  `full_name` varchar(200) NULL,
  `short_name` varchar(100) NOT NULL,
  `society_country` varchar(100) NULL,
  `society_id` int(11) NOT NULL AUTO_INCREMENT,
  `society_type` enum('Performance','Mechanical') NULL,
  `territory_code` int(11) NULL,
  PRIMARY KEY (`society_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- user
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`user` (
  `group_id` INT NOT NULL DEFAULT 1,
  `alias_1` varchar(250) NULL,
  `alias_2` varchar(250) NULL,
  `date_joined` timestamp NULL,
  `email_1` varchar(255) NOT NULL,
  `email_2` varchar(255) NULL,
  `img_id` int(11) NOT NULL DEFAULT 1,
  `language_id` int(2) NULL,
  `last_login` datetime NULL,
  `legal_name` varchar(250) NULL,
  `location_id` int(11) NULL,
  `main_user_type` enum('writer','manager','attorney','publisher','other') NULL,
  `password` text NOT NULL,
  `phone` varchar(15) NULL,
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_pwdresettoken` VARCHAR(255),
  `usr_verify_email_token` VARCHAR(255),
  `usr_verified` TINYINT(0) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`),
  INDEX `fk_user_to_locations_idx` (`location_id` ASC),
  CONSTRAINT `fk_user_to_locations`
    FOREIGN KEY (`location_id`)
    REFERENCES `songsplits`.`locations`(`location_id`),
  INDEX `fk_user_to_image_idx` (`img_id` ASC),
  CONSTRAINT `fk_user_to_image`
    FOREIGN KEY (`img_id`)
    REFERENCES `songsplits`.`image`(`img_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- work
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`work` (
  `alt_title` varchar(255) NULL,
  `create_user_id` int(11) NOT NULL,
  `current_version` int(4) NULL,
  `date_confirmed` datetime NULL,
  `date_created` timestamp NULL,
  `iswc` varchar(30) NULL,
  `lyrics` text NULL,
  `sample_id` int(11) NULL,
  `status_id` enum('1','2') NULL,
  `title` varchar(255) NULL,
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `work_type` enum('song','cue','track') NULL,
  PRIMARY KEY (`work_id`),
  
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- work_history
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`work_history` (
  `date_created` datetime NULL,
  `note` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `version` int(4) NOT NULL,
  `work_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NOT NULL,
  PRIMARY KEY (`work_history_id`),
  INDEX `fk_work_history_to_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_work_history_to_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `songsplits`.`user`(`user_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- work_meta
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`work_meta` (
  `date_created` timestamp NULL,
  `meta_role` enum('producer','main','featured') NULL,
  `user_id` int(11) NULL,
  `work_id` int(11) NULL,
  `work_meta_id_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`work_meta_id_id`),
  INDEX `fk_work_meta_to_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_work_meta_to_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `songsplits`.`user`(`user_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- writer
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`writer` (
  `attorney_control` enum('on','off') NULL,
  `attorney_notify` enum('on','off') NULL,
  `attorney_view` enum('on','off') NULL,
  `cae_ipi` int(11) NULL,
  `cae_ipi_2` int(11) NULL,
  `cae_ipi_3` int(11) NULL,
  `manager_control` enum('on','off') NULL,
  `manager_notify` enum('on','off') NULL,
  `manager_view` enum('on','off') NULL,
  `promo_email` enum('on','off') NULL,
  `publisher_control` enum('on','off') NULL,
  `publisher_notify` enum('on','off') NULL,
  `publisher_view` enum('on','off') NULL,
  `realtime_email` enum('on','off') NULL,
  `society_id` int(11) NULL,
  `user_id` int(11) NULL,
  `weekly_email` enum('on','off') NULL,
  `writer_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`writer_id`),
  INDEX `fk_writer_to_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_writer_to_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `songsplits`.`user`(`user_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- writer_split
--

CREATE TABLE IF NOT EXISTS `songsplits_api`.`writer_split` (
  `confirmed` datetime NOT NULL,
  `created` timestamp NULL,
  `writer_id` int(11) NOT NULL,
  `role` enum('A','AR','C','CA') NULL,
  `split` float(7,3) NULL,
  `split_id` int(11) NOT NULL AUTO_INCREMENT,
  `split_type` enum('original','sample','translation') NULL,
  `status_id` enum('1','2') NULL,
  `version` int(4) NULL,
  `work_id` int(11) NOT NULL,
  PRIMARY KEY (`split_id`),
  INDEX `fk_writer_split_to_publisher_idx` (`writer_id` ASC),
  CONSTRAINT `fk_writer_split_to_publisher`
    FOREIGN KEY (`writer_id`)
    REFERENCES `songsplits`.`publisher`(`writer_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;