Skip to content
This repository
Search
Pull requests
Issues
Gist
 @GoceRibeski
 Unwatch 3
  Star 0
  Fork 0 headcoach/songsplits_api PRIVATE
 Code  Issues 0  Pull requests 0  Wiki  Pulse  Graphs
Branch: master Find file Copy pathsongsplits_api/sql/base/patch.sql
6ea70a6  17 days ago
 headcoach version 6
0 contributors
RawBlameHistory     64 lines (53 sloc)  1.32 KB
--
-- Patch script for SongSplit
--

--
-- access_control
--

CREATE TABLE IF NOT EXISTS `access_control` (
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

CREATE TABLE IF NOT EXISTS `user_group` (
  `gr_id` INT NOT NULL AUTO_INCREMENT,
  `gr_name` VARCHAR(128) NULL,
  PRIMARY KEY (`gr_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


--
-- user_group_perm
--

CREATE TABLE IF NOT EXISTS `user_group_perm` (
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

CREATE TABLE IF NOT EXISTS `writer_administrator` (
  `wa_id` int NOT NULL AUTO_INCREMENT,
  `admin_id` int NULL,
  `user_id` int NULL,
  `access_type` enum('none', 'read', 'write'),
  `rel_type` enum('publisher', 'manager', 'attorney', 'other', 'administrator') NULL,
  PRIMARY KEY (`wa_id`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;
Status API Training Shop Blog About
© 2016 GitHub, Inc. Terms Privacy Security Contact Help