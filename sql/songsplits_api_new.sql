# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 70.32.77.202 (MySQL 5.5.49)
# Database: songsplits_api
# Generation Time: 2016-06-14 04:55:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table access_control
# ------------------------------------------------------------

DROP TABLE IF EXISTS `access_control`;

CREATE TABLE `access_control` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `resource_type` varchar(50) DEFAULT NULL,
  `read_access` tinyint(1) DEFAULT NULL,
  `write_access` tinyint(1) DEFAULT NULL,
  `role` varchar(128) DEFAULT NULL,
  `granted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`ac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table activity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activity`;

CREATE TABLE `activity` (
  `action` enum('insert') DEFAULT NULL,
  `activity` varchar(50) NOT NULL,
  `activity_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date_created` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `work_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `fk_activity_to_user_idx` (`user_id`),
  CONSTRAINT `fk_activity_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table administration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `administration`;

CREATE TABLE `administration` (
  `access` enum('view','control') DEFAULT NULL,
  `administrator_id` int(11) NOT NULL,
  `deal_type` varchar(255) DEFAULT NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `publisher_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_administration_to_administrator_idx` (`administrator_id`),
  CONSTRAINT `fk_administration_to_administrator` FOREIGN KEY (`administrator_id`) REFERENCES `administrator` (`administrator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table administrator
# ------------------------------------------------------------

DROP TABLE IF EXISTS `administrator`;

CREATE TABLE `administrator` (
  `administrator_id` int(11) NOT NULL AUTO_INCREMENT,
  `cae_ipi` int(11) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `parent_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`administrator_id`),
  KEY `fk_administrator_to_locations_idx` (`location_id`),
  CONSTRAINT `fk_administrator_to_locations` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table alias_v
# ------------------------------------------------------------

DROP VIEW IF EXISTS `alias_v`;

CREATE TABLE `alias_v` (
   `alias` VARCHAR(250) NULL DEFAULT NULL,
   `user_id` INT(11) NOT NULL DEFAULT '0',
   `legal_name` VARCHAR(250) NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table attorney
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attorney`;

CREATE TABLE `attorney` (
  `attorney_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(225) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`attorney_id`),
  KEY `fk_attorney_to_user_idx` (`user_id`),
  CONSTRAINT `fk_attorney_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table co_writer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `co_writer`;

CREATE TABLE `co_writer` (
  `co_writer_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `writer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_co_writer_to_writer_idx` (`writer_id`),
  CONSTRAINT `fk_co_writer_to_writer` FOREIGN KEY (`writer_id`) REFERENCES `writer` (`writer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`bryson`@`%` */ /*!50003 TRIGGER `ssplit_cowriter_ins` AFTER INSERT ON `co_writer` FOR EACH ROW BEGIN
	DECLARE workid   INT;
	DECLARE myID     INT;
	DECLARE otherID  INT;
	DECLARE done     INT DEFAULT FALSE;
	DECLARE work_c CURSOR FOR SELECT work.work_id FROM work, writer WHERE writer.writer_id = NEW.writer_id AND work.create_user_id = writer.user_id;
	DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done = 1; 
    
    SELECT user_id INTO myID FROM writer WHERE writer_id = NEW.writer_id;
    SELECT user_id INTO otherID FROM writer WHERE writer_id = NEW.co_writer_id;
    
    open work_c;
    
    cursor_loop:repeat 		        
		FETCH work_c INTO workid; 
        
        IF done THEN
			LEAVE cursor_loop;
		END IF;
                
        INSERT INTO access_control(
			user_id,
            resource_id,
            resource_type,
            read_access,
            write_access,
            role,
            granted_by
        ) VALUES (
			otherID,
            workid,
            'work',
            1,
            1,
            'cowriter',
			myID
        );
        
        UNTIL done
	END repeat;     
    
    close work_c;
    
END */;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`bryson`@`%` */ /*!50003 TRIGGER `ssplit_cowriter_del` AFTER DELETE ON `co_writer` FOR EACH ROW BEGIN
	DECLARE myID INT;
	DECLARE otherID INT;
    
    SELECT user_id INTO myID FROM writer WHERE writer_id = OLD.writer_id;
    SELECT user_id INTO otherID FROM writer WHERE writer_id = OLD.co_writer_id;

	DELETE FROM access_control WHERE user_id = otherID AND granted_by = myID AND role = 'cowriter';

END */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table connection
# ------------------------------------------------------------

DROP TABLE IF EXISTS `connection`;

CREATE TABLE `connection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `connection_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_connection_to_user_idx` (`connection_id`),
  CONSTRAINT `fk_connection_to_user` FOREIGN KEY (`connection_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`bryson`@`%` */ /*!50003 TRIGGER `t_insert_connection` AFTER INSERT ON `connection` FOR EACH ROW BEGIN

	INSERT INTO access_control (
			user_id,
            resource_id,
            resource_type,
            read_access,
            write_access,
            role,
            granted_by
		)
        VALUES (
			NEW.connection_id,
            NEW.user_id,
            'user',
            1,
            1,
            'manager',
            NEW.user_id
        )
	;

END */;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`bryson`@`%` */ /*!50003 TRIGGER `t_delete_connection` AFTER DELETE ON `connection` FOR EACH ROW BEGIN

	DELETE FROM 
		access_control
	WHERE
		user_id = OLD.user_id
	AND
		resource_id = OLD.connection_id
	AND
		resource_type = 'user'
	AND
		role = 'manager'
	AND
		granted_by = OLD.connection_id
	;	

END */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table connection_v
# ------------------------------------------------------------

DROP VIEW IF EXISTS `connection_v`;

CREATE TABLE `connection_v` (
   `connectionID` INT(11) NOT NULL DEFAULT '0',
   `ownerID` INT(11) NOT NULL,
   `connectedUserID` INT(11) NOT NULL DEFAULT '0',
   `connectedLegalName` VARCHAR(250) NULL DEFAULT NULL,
   `connectedAlias1` VARCHAR(250) NULL DEFAULT NULL,
   `connectedAlias2` VARCHAR(250) NULL DEFAULT NULL,
   `connectedLocationID` INT(11) NOT NULL DEFAULT '100217',
   `connectedUserType` ENUM('writer','manager','attorney','publisher','other') NOT NULL DEFAULT 'writer'
) ENGINE=MyISAM;



# Dump of table image
# ------------------------------------------------------------

DROP TABLE IF EXISTS `image`;

CREATE TABLE `image` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table language
# ------------------------------------------------------------

DROP TABLE IF EXISTS `language`;

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) DEFAULT NULL,
  `state_region` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table manager
# ------------------------------------------------------------

DROP TABLE IF EXISTS `manager`;

CREATE TABLE `manager` (
  `attorney_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(225) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`attorney_id`),
  KEY `fk_manager_to_user_idx` (`user_id`),
  CONSTRAINT `fk_manager_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table managers_v
# ------------------------------------------------------------

DROP VIEW IF EXISTS `managers_v`;

CREATE TABLE `managers_v` (
   `connectionID` INT(11) NOT NULL DEFAULT '0',
   `userID` INT(11) NOT NULL,
   `managerID` INT(11) NOT NULL DEFAULT '0',
   `managerType` ENUM('writer','manager','attorney','publisher','other') NOT NULL DEFAULT 'writer',
   `managerName` VARCHAR(250) NULL DEFAULT NULL,
   `managerPhone` VARCHAR(15) NULL DEFAULT NULL,
   `managerEmailPrimary` VARCHAR(255) NOT NULL,
   `managerEmailSecondary` VARCHAR(255) NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table other
# ------------------------------------------------------------

DROP TABLE IF EXISTS `other`;

CREATE TABLE `other` (
  `other_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`other_id`),
  KEY `fk_other_to_user_idx` (`user_id`),
  CONSTRAINT `fk_other_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table publisher
# ------------------------------------------------------------

DROP TABLE IF EXISTS `publisher`;

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `society_id` int(11) NOT NULL DEFAULT '130',
  `cae_ipi` int(11) DEFAULT NULL,
  `cae_ipi_2` int(11) DEFAULT NULL,
  PRIMARY KEY (`publisher_id`),
  KEY `fk_publisher_to_user_idx` (`user_id`),
  CONSTRAINT `fk_publisher_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table publisher_split
# ------------------------------------------------------------

DROP TABLE IF EXISTS `publisher_split`;

CREATE TABLE `publisher_split` (
  `confirmed` datetime NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publisher_id` int(11) NOT NULL,
  `role` enum('E','SE') NOT NULL DEFAULT 'E',
  `split` float(7,3) DEFAULT NULL,
  `split_id` int(11) NOT NULL AUTO_INCREMENT,
  `split_type` enum('original','sample','translation') NOT NULL DEFAULT 'original',
  `status_id` enum('1','2') NOT NULL DEFAULT '1',
  `version` int(4) DEFAULT NULL,
  `work_id` int(11) NOT NULL,
  PRIMARY KEY (`split_id`),
  KEY `fk_publisher_split_to_publisher_idx` (`publisher_id`),
  CONSTRAINT `fk_publisher_split_to_publisher` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`bryson`@`%` */ /*!50003 TRIGGER `t_update_psplit_activities_ins` AFTER INSERT ON `publisher_split` FOR EACH ROW BEGIN
	DECLARE myID INT;

	SELECT user_id INTO myID FROM publisher WHERE publisher_id = NEW.publisher_id;

	INSERT INTO activity (
		user_id,
        work_id,
        activity,
        date_created
    ) VALUES (
		myID,
        NEW.work_id,
        'created',
        now()
    );

END */;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`bryson`@`%` */ /*!50003 TRIGGER `t_update_psplit_activities_upd` AFTER UPDATE ON `publisher_split` FOR EACH ROW BEGIN
	DECLARE myID INT;

	SELECT user_id INTO myID FROM writer WHERE writer_id = NEW.publisher_id;

	IF (NEW.status_id = 2)  THEN
		INSERT INTO activity (
			user_id,
			work_id,
			activity,
			date_created
		) VALUES (
			myID,
			NEW.work_id,
			'confirmed',
			now()
		);
	ELSE
		INSERT INTO activity (
			user_id,
			work_id,
			activity,
			date_created
		) VALUES (
			myID,
			NEW.work_id,
			'modified',
			now()
		);
    END IF;
END */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table referral
# ------------------------------------------------------------

DROP TABLE IF EXISTS `referral`;

CREATE TABLE `referral` (
  `date_created` datetime NOT NULL,
  `email` text NOT NULL,
  `new_user_id` int(11) NOT NULL,
  `referral_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`referral_id`),
  KEY `fk_referral_to_user_idx` (`user_id`),
  KEY `fk_referral_to_new_user_idx` (`new_user_id`),
  CONSTRAINT `fk_referral_to_new_user` FOREIGN KEY (`new_user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `fk_referral_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table reminder
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reminder`;

CREATE TABLE `reminder` (
  `date_created` datetime NOT NULL,
  `recieve_user_id` int(11) NOT NULL,
  `reminder_id` int(11) NOT NULL AUTO_INCREMENT,
  `send_user_id` int(11) NOT NULL,
  `split_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  PRIMARY KEY (`reminder_id`),
  KEY `fk_reminder_to_recieve_user_idx` (`recieve_user_id`),
  KEY `fk_reminder_to_send_user_idx` (`send_user_id`),
  CONSTRAINT `fk_reminder_to_recieve_user` FOREIGN KEY (`recieve_user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `fk_reminder_to_send_user` FOREIGN KEY (`send_user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table request
# ------------------------------------------------------------

DROP TABLE IF EXISTS `request`;

CREATE TABLE `request` (
  `device_type` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table session
# ------------------------------------------------------------

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session` (
  `expiry_date` datetime NOT NULL,
  `session_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table signup
# ------------------------------------------------------------

DROP TABLE IF EXISTS `signup`;

CREATE TABLE `signup` (
  `date_created` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `salt` text,
  `signup_id` int(11) NOT NULL AUTO_INCREMENT,
  `society` varchar(50) DEFAULT NULL,
  `status_id` int(1) DEFAULT NULL,
  PRIMARY KEY (`signup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table social
# ------------------------------------------------------------

DROP TABLE IF EXISTS `social`;

CREATE TABLE `social` (
  `facebook_access_token` varchar(100) DEFAULT NULL,
  `facebook_id` int(11) DEFAULT NULL,
  `google_plus_id` varchar(255) DEFAULT NULL,
  `social_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `twitter_access_token` varchar(255) DEFAULT NULL,
  `twitter_id` int(11) DEFAULT NULL,
  `twitter_secret` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`social_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table society
# ------------------------------------------------------------

DROP TABLE IF EXISTS `society`;

CREATE TABLE `society` (
  `society_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) DEFAULT NULL,
  `short_name` varchar(100) NOT NULL,
  `contact_name` varchar(200) DEFAULT NULL,
  `contact_email` varchar(200) DEFAULT NULL,
  `society_type` enum('Performance','Mechanical') DEFAULT NULL,
  `society_country` varchar(100) DEFAULT NULL,
  `territory_code` int(11) DEFAULT NULL,
  `affiliation_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`society_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL DEFAULT '1',
  `usr_verified` tinyint(4) NOT NULL DEFAULT '0',
  `main_user_type` enum('writer','manager','attorney','publisher','other') NOT NULL DEFAULT 'writer',
  `legal_name` varchar(250) DEFAULT NULL,
  `alias_1` varchar(250) DEFAULT NULL,
  `alias_2` varchar(250) DEFAULT NULL,
  `email_1` varchar(255) NOT NULL,
  `email_2` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `img_id` int(11) NOT NULL DEFAULT '1',
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL,
  `location_id` int(11) NOT NULL DEFAULT '100217',
  `password` text NOT NULL,
  `language_id` int(2) NOT NULL DEFAULT '1',
  `usr_pwdresettoken` varchar(255) DEFAULT NULL,
  `usr_verify_email_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_unique_index` (`main_user_type`,`email_1`,`legal_name`),
  UNIQUE KEY `user_unique_index2` (`main_user_type`,`email_2`,`legal_name`),
  KEY `fk_user_to_locations_idx` (`location_id`),
  KEY `fk_user_to_image_idx` (`img_id`),
  CONSTRAINT `fk_user_to_image` FOREIGN KEY (`img_id`) REFERENCES `image` (`img_id`),
  CONSTRAINT `fk_user_to_locations` FOREIGN KEY (`location_id`) REFERENCES `locations` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user_group
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_group`;

CREATE TABLE `user_group` (
  `gr_id` int(11) NOT NULL AUTO_INCREMENT,
  `gr_name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`gr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user_group_perm
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_group_perm`;

CREATE TABLE `user_group_perm` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_group_id` int(11) DEFAULT NULL,
  `per_flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table work
# ------------------------------------------------------------

DROP TABLE IF EXISTS `work`;

CREATE TABLE `work` (
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `create_user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alt_title` varchar(255) DEFAULT NULL,
  `work_type` enum('song','cue','track') DEFAULT NULL,
  `status_id` enum('1','2') DEFAULT NULL,
  `current_version` int(4) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_confirmed` datetime DEFAULT NULL,
  `iswc` varchar(30) DEFAULT NULL,
  `lyrics` text,
  `sample_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`work_id`),
  KEY `fk_work_to_user_idx` (`create_user_id`),
  CONSTRAINT `fk_work_to_user` FOREIGN KEY (`create_user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`bryson`@`%` */ /*!50003 TRIGGER `ssplit_work_t` AFTER INSERT ON `work` FOR EACH ROW BEGIN
	#Man, a %ROWTYPE would be sweet...
    DECLARE man_view INT;
    DECLARE man_edit INT;
    DECLARE pub_view INT;
    DECLARE pub_edit INT;
    DECLARE att_view INT;
    DECLARE att_edit INT;
	DECLARE adminid  INT;
    DECLARE admintp  VARCHAR(255);
    DECLARE canView  INT;
    DECLARE canEdit  INT;
    DECLARE pubadmin INT;
    DECLARE done     INT DEFAULT FALSE;
	DECLARE w_manager CURSOR FOR SELECT admin_id, rel_type FROM writer_administrator WHERE user_id = NEW.create_user_id;
	DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done = 1; 
    
	INSERT INTO activity (
		user_id,
        work_id,
        activity,
        date_created
    ) VALUES (
		NEW.create_user_id,
        NEW.work_id,
        'modified',
        now()
    );	
    
    INSERT INTO access_control(
		user_id,
		resource_id,
		resource_type,
		read_access,
		write_access,
		role,
		granted_by
	) VALUES (
		NEW.create_user_id,
		NEW.work_id,
		'work',
		1,
		1,
		'owner',
		NEW.create_user_id
	);
    
    
    #Get the current settings
    SELECT 
		manager_view,
        manager_control,
        publisher_view,
        publisher_control,
        attorney_view,
        attorney_control
	INTO
		man_view, man_edit, pub_view, pub_edit, att_view, att_edit
	FROM
		writer
	WHERE
		user_id = NEW.create_user_id;
        			
    open w_manager; 
    
    #Insert access rows for all work owned by user_id
    cursor_loop:repeat 		
		FETCH w_manager INTO adminid, admintp; 
        
        IF done THEN
			LEAVE cursor_loop;
		END IF;
        
        IF admintp = 'publisher' THEN
			SET canView := pub_view;
            SET canEdit := pub_edit;
        ELSEIF admintp = 'manager' THEN
			SET canView := man_view;
            SET canEdit := man_edit;
        ELSE 
			SET canView := att_view;
            SET canEdit := att_edit;
        END IF;

        INSERT INTO access_control(
			user_id,
            resource_id,
            resource_type,
            read_access,
            write_access,
            role,
            granted_by
        ) VALUES (
			adminid,
            NEW.work_id,
            'work',
            canView,
            canEdit,
            admintp,
			NEW.create_user_id
        );
        
        IF admintp = 'publisher' THEN
			SELECT user_id INTO pubadmin FROM administrator WHERE administrator_id = adminid;
            IF pubadmin IS NOT NULL THEN
				INSERT INTO access_control(
					user_id, 
					resource_id, 
					resource_type, 
					read_access_write_access, 
					role, 
					granted_by
				) VALUES (
					pubadmin,
                    NEW.work_id,
                    'work',
                    canVeiw,
                    canEdit,
                    'administrator',
                    NEW.create_user_id
				);
            END IF;            
		END IF;
        
        UNTIL done
	END repeat;     
    
    close w_manager;

END */;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`bryson`@`%` */ /*!50003 TRIGGER `t_update_work_activities_upd` AFTER UPDATE ON `work` FOR EACH ROW BEGIN

	INSERT INTO activity (
		user_id,
        work_id,
        activity,
        date_created
    ) VALUES (
		NEW.create_user_id,
        NEW.work_id,
        'modified',
        now()
    );

END */;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`bryson`@`%` */ /*!50003 TRIGGER `ssplit_work_del_t` AFTER DELETE ON `work` FOR EACH ROW BEGIN
	DELETE FROM access_control WHERE resource_type = 'work' AND resource_id = OLD.work_id;
END */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table work_history
# ------------------------------------------------------------

DROP TABLE IF EXISTS `work_history`;

CREATE TABLE `work_history` (
  `work_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `version` int(4) NOT NULL,
  PRIMARY KEY (`work_history_id`),
  KEY `fk_work_history_to_user_idx` (`user_id`),
  CONSTRAINT `fk_work_history_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table work_meta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `work_meta`;

CREATE TABLE `work_meta` (
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `meta_role` enum('producer','main','featured') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `work_meta_id_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`work_meta_id_id`),
  KEY `fk_work_meta_to_user_idx` (`user_id`),
  CONSTRAINT `fk_work_meta_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table writer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `writer`;

CREATE TABLE `writer` (
  `user_id` int(11) DEFAULT NULL,
  `writer_id` int(11) NOT NULL AUTO_INCREMENT,
  `society_id` int(11) DEFAULT NULL,
  `cae_ipi` int(11) DEFAULT NULL,
  `cae_ipi_2` int(11) DEFAULT NULL,
  `cae_ipi_3` int(11) DEFAULT NULL,
  `realtime_email` enum('on','off') NOT NULL DEFAULT 'on',
  `weekly_email` enum('on','off') DEFAULT NULL,
  `promo_email` enum('on','off') NOT NULL DEFAULT 'on',
  `manager_control` enum('on','off') NOT NULL DEFAULT 'on',
  `manager_notify` enum('on','off') NOT NULL DEFAULT 'on',
  `manager_view` enum('on','off') NOT NULL DEFAULT 'on',
  `attorney_control` enum('on','off') NOT NULL DEFAULT 'on',
  `attorney_notify` enum('on','off') NOT NULL DEFAULT 'on',
  `attorney_view` enum('on','off') NOT NULL DEFAULT 'on',
  `publisher_control` enum('on','off') NOT NULL DEFAULT 'on',
  `publisher_notify` enum('on','off') NOT NULL DEFAULT 'on',
  `publisher_view` enum('on','off') NOT NULL DEFAULT 'on',
  PRIMARY KEY (`writer_id`),
  KEY `fk_writer_to_user_idx` (`user_id`),
  CONSTRAINT `fk_writer_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`bryson`@`%` */ /*!50003 TRIGGER `ssplit_writer_t` AFTER UPDATE ON `writer` FOR EACH ROW BEGIN
	DECLARE adminid INT;
	
    #Update the manager permissions
	IF NEW.manager_view != OLD.manager_view OR new.manager_control != OLD.manager_control THEN
        UPDATE 
			access_control
		SET
			read_access = (NEW.manager_view = 'on'),
            write_access = (NEW.manager_control = 'on')
		WHERE
			granted_by = NEW.writer_id
		AND
			role = 'manager'
        ;
    END IF;
    
    #Update the attorney permissions
	IF NEW.attorney_view != OLD.attorney_view OR new.attorney_control != OLD.attorney_control THEN
        UPDATE 
			access_control
		SET
			read_access = (NEW.attorney_view = 'on'),
            write_access = (NEW.attorney_control = 'on')
		WHERE
			granted_by = NEW.writer_id
		AND
			role = 'attorney'
        ;
    END IF;
    
    #Update the publisher permissions
	IF NEW.publisher_view != OLD.publisher_view OR new.publisher_control != OLD.publisher_control THEN
        UPDATE 
			access_control
		SET
			read_access = (NEW.publisher_view = 'on'),
            write_access = (NEW.publisher_control = 'on')
		WHERE
			granted_by = NEW.writer_id
		AND
			(role = 'publisher' OR role = 'administrator')
        ;
        			
    END IF;
    
    
END */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table writer_administrator
# ------------------------------------------------------------

DROP TABLE IF EXISTS `writer_administrator`;

CREATE TABLE `writer_administrator` (
  `wa_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rel_type` enum('publisher','manager','attorney','other') DEFAULT NULL,
  `access_type` enum('read','write','none') DEFAULT NULL,
  PRIMARY KEY (`wa_id`),
  KEY `fk_writer_administrator_to_user_idx` (`admin_id`),
  CONSTRAINT `fk_writer_administrator_to_user` FOREIGN KEY (`admin_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`bryson`@`%` */ /*!50003 TRIGGER `ssplit_writer_administrator_t` AFTER INSERT ON `writer_administrator` FOR EACH ROW BEGIN	
	#Man, a %ROWTYPE would be sweet...
    DECLARE man_view INT;
    DECLARE man_edit INT;
    DECLARE pub_view INT;
    DECLARE pub_edit INT;
    DECLARE att_view INT;
    DECLARE att_edit INT;
	DECLARE workid   INT;
    DECLARE canView  INT;
    DECLARE canEdit  INT;
    DECLARE done     INT DEFAULT FALSE;
	DECLARE work_c CURSOR FOR SELECT work_id FROM work WHERE create_user_id = NEW.user_id;
	DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done = 1; 
    
    #Get the current settings
    SELECT 
		manager_view,
        manager_control,
        publisher_view,
        publisher_control,
        attorney_view,
        attorney_control
	INTO
		man_view, man_edit, pub_view, pub_edit, att_view, att_edit
	FROM
		writer
	WHERE
		user_id = NEW.user_id;
        			
    open work_c; 
    
    #Insert access rows for all work owned by user_id
    cursor_loop:repeat 		
		FETCH work_c INTO workid; 
        
        IF done THEN
			LEAVE cursor_loop;
		END IF;
        
        IF NEW.rel_type = 'publisher' THEN
			SET canView := pub_view;
            SET canEdit := pub_edit;
        ELSEIF NEW.rel_type = 'manager' THEN
			SET canView := man_view;
            SET canEdit := man_edit;
        ELSE 
			SET canView := att_view;
            SET canEdit := att_edit;
        END IF;

        INSERT INTO access_control(
			user_id,
            resource_id,
            resource_type,
            read_access,
            write_access,
            role,
            granted_by
        ) VALUES (
			NEW.admin_id,
            work_c,
            'work',
            canView,
            canEdit,
            NEW.rel_type,
			NEW.user_id
        );
        
        UNTIL done
	END repeat;     
    
    close work_c;
    
END */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table writer_split
# ------------------------------------------------------------

DROP TABLE IF EXISTS `writer_split`;

CREATE TABLE `writer_split` (
  `confirmed` datetime NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `writer_id` int(11) NOT NULL,
  `role` enum('A','AR','C','CA') DEFAULT NULL,
  `split` float(7,3) DEFAULT NULL,
  `split_id` int(11) NOT NULL AUTO_INCREMENT,
  `split_type` enum('original','sample','translation') DEFAULT NULL,
  `status_id` enum('1','2') NOT NULL DEFAULT '1',
  `version` int(4) DEFAULT NULL,
  `work_id` int(11) NOT NULL,
  PRIMARY KEY (`split_id`),
  KEY `fk_writer_split_to_writer_idx` (`writer_id`),
  CONSTRAINT `fk_writer_split_to_writer` FOREIGN KEY (`writer_id`) REFERENCES `writer` (`writer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`bryson`@`%` */ /*!50003 TRIGGER `t_update_wsplit_activities_ins` AFTER INSERT ON `writer_split` FOR EACH ROW BEGIN
	DECLARE myID INT;

	SELECT user_id INTO myID FROM writer WHERE writer_id = NEW.writer_id;

	INSERT INTO activity (
		user_id,
        work_id,
        activity,
        date_created
    ) VALUES (
		myID,
        NEW.work_id,
        'created',
        now()
    );

END */;;
/*!50003 SET SESSION SQL_MODE="" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`bryson`@`%` */ /*!50003 TRIGGER `t_update_wsplit_activities_upd` AFTER UPDATE ON `writer_split` FOR EACH ROW BEGIN
	DECLARE myID INT;

	SELECT user_id INTO myID FROM writer WHERE writer_id = NEW.writer_id;

	IF (NEW.status_id = 2)  THEN
		INSERT INTO activity (
			user_id,
			work_id,
			activity,
			date_created
		) VALUES (
			myID,
			NEW.work_id,
			'confirmed',
			now()
		);
	ELSE
		INSERT INTO activity (
			user_id,
			work_id,
			activity,
			date_created
		) VALUES (
			myID,
			NEW.work_id,
			'modified',
			now()
		);
    END IF;
END */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;




# Replace placeholder table for alias_v with correct view syntax
# ------------------------------------------------------------

DROP TABLE `alias_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bryson`@`%` SQL SECURITY DEFINER VIEW `alias_v`
AS SELECT
   `user`.`alias_1` AS `alias`,
   `user`.`user_id` AS `user_id`,
   `user`.`legal_name` AS `legal_name`
FROM `user` where (`user`.`alias_1` is not null) union select `user`.`alias_2` AS `alias`,`user`.`user_id` AS `user_id`,`user`.`legal_name` AS `legal_name` from `user` where (`user`.`alias_2` is not null);


# Replace placeholder table for connection_v with correct view syntax
# ------------------------------------------------------------

DROP TABLE `connection_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bryson`@`%` SQL SECURITY DEFINER VIEW `connection_v`
AS SELECT
   `connection`.`id` AS `connectionID`,
   `connection`.`user_id` AS `ownerID`,
   `connected`.`user_id` AS `connectedUserID`,
   `connected`.`legal_name` AS `connectedLegalName`,
   `connected`.`alias_1` AS `connectedAlias1`,
   `connected`.`alias_2` AS `connectedAlias2`,
   `connected`.`location_id` AS `connectedLocationID`,
   `connected`.`main_user_type` AS `connectedUserType`
FROM (`connection` join `user` `connected`) where (`connected`.`user_id` = `connection`.`connection_id`);


# Replace placeholder table for managers_v with correct view syntax
# ------------------------------------------------------------

DROP TABLE `managers_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`bryson`@`%` SQL SECURITY DEFINER VIEW `managers_v`
AS SELECT
   `con`.`id` AS `connectionID`,
   `con`.`user_id` AS `userID`,
   `user`.`user_id` AS `managerID`,
   `user`.`main_user_type` AS `managerType`,
   `user`.`legal_name` AS `managerName`,
   `user`.`phone` AS `managerPhone`,
   `user`.`email_1` AS `managerEmailPrimary`,
   `user`.`email_2` AS `managerEmailSecondary`
FROM (`user` join `connection` `con`) where ((`con`.`connection_id` = `user`.`user_id`) and (`user`.`main_user_type` <> 'writer'));

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
