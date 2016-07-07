
CREATE TABLE IF NOT EXISTS `access_control` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `resource_type` varchar(50) DEFAULT NULL,
  `read_access` tinyint(1) DEFAULT NULL,
  `write_access` tinyint(1) DEFAULT NULL,
  `role` varchar(128) DEFAULT NULL,
  `granted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`ac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `action` enum('insert') DEFAULT NULL,
  `activity` varchar(50) NOT NULL,
  `activity_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date_created` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `work_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `fk_activity_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE IF NOT EXISTS `administration` (
  `access` enum('view','control') DEFAULT NULL,
  `administrator_id` int(11) NOT NULL,
  `deal_type` varchar(255) DEFAULT NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `publisher_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_administration_to_administrator_idx` (`administrator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `administrator_id` int(11) NOT NULL AUTO_INCREMENT,
  `cae_ipi` int(11) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `parent_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`administrator_id`),
  KEY `fk_administrator_to_locations_idx` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attorney`
--

CREATE TABLE IF NOT EXISTS `attorney` (
  `attorney_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(225) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`attorney_id`),
  KEY `fk_attorney_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE IF NOT EXISTS `connection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `connection_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_connection_to_user_idx` (`connection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `co_writer`
--

CREATE TABLE IF NOT EXISTS `co_writer` (
  `co_writer_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `writer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_co_writer_to_writer_idx` (`writer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) DEFAULT NULL,
  `state_region` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `attorney_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(225) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`attorney_id`),
  KEY `fk_manager_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------


--
-- Table structure for table `other`
--

CREATE TABLE IF NOT EXISTS `other` (
  `other_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`other_id`),
  KEY `fk_other_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `society_id` int(11) NOT NULL DEFAULT '130',
  `cae_ipi` int(11) DEFAULT NULL,
  `cae_ipi_2` int(11) DEFAULT NULL,
  PRIMARY KEY (`publisher_id`),
  KEY `fk_publisher_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `publisher_split`
--

CREATE TABLE IF NOT EXISTS `publisher_split` (
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
  KEY `fk_publisher_split_to_publisher_idx` (`publisher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



--
-- Table structure for table `referral`
--

CREATE TABLE IF NOT EXISTS `referral` (
  `date_created` datetime NOT NULL,
  `email` text NOT NULL,
  `new_user_id` int(11) NOT NULL,
  `referral_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`referral_id`),
  KEY `fk_referral_to_user_idx` (`user_id`),
  KEY `fk_referral_to_new_user_idx` (`new_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE IF NOT EXISTS `reminder` (
  `date_created` datetime NOT NULL,
  `recieve_user_id` int(11) NOT NULL,
  `reminder_id` int(11) NOT NULL AUTO_INCREMENT,
  `send_user_id` int(11) NOT NULL,
  `split_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  PRIMARY KEY (`reminder_id`),
  KEY `fk_reminder_to_recieve_user_idx` (`recieve_user_id`),
  KEY `fk_reminder_to_send_user_idx` (`send_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `device_type` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `expiry_date` datetime NOT NULL,
  `session_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `date_created` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `salt` text,
  `signup_id` int(11) NOT NULL AUTO_INCREMENT,
  `society` varchar(50) DEFAULT NULL,
  `status_id` int(1) DEFAULT NULL,
  PRIMARY KEY (`signup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `facebook_access_token` varchar(100) DEFAULT NULL,
  `facebook_id` int(11) DEFAULT NULL,
  `google_plus_id` varchar(255) DEFAULT NULL,
  `social_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `twitter_access_token` varchar(255) DEFAULT NULL,
  `twitter_id` int(11) DEFAULT NULL,
  `twitter_secret` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`social_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `society`
--

CREATE TABLE IF NOT EXISTS `society` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
  KEY `fk_user_to_image_idx` (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `gr_id` int(11) NOT NULL AUTO_INCREMENT,
  `gr_name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`gr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_group_perm`
--

CREATE TABLE IF NOT EXISTS `user_group_perm` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_group_id` int(11) DEFAULT NULL,
  `per_flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE IF NOT EXISTS `work` (
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
  KEY `fk_work_to_user_idx` (`create_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `work_history`
--

CREATE TABLE IF NOT EXISTS `work_history` (
  `work_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `version` int(4) NOT NULL,
  PRIMARY KEY (`work_history_id`),
  KEY `fk_work_history_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_meta`
--

CREATE TABLE IF NOT EXISTS `work_meta` (
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `meta_role` enum('producer','main','featured') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `work_meta_id_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`work_meta_id_id`),
  KEY `fk_work_meta_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `writer`
--

CREATE TABLE IF NOT EXISTS `writer` (
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
  KEY `fk_writer_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `writer_administrator`
--

CREATE TABLE IF NOT EXISTS `writer_administrator` (
  `wa_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rel_type` enum('publisher','manager','attorney','other') DEFAULT NULL,
  `access_type` enum('read','write','none') DEFAULT NULL,
  PRIMARY KEY (`wa_id`),
  KEY `fk_writer_administrator_to_user_idx` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `access_control` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `resource_type` varchar(50) DEFAULT NULL,
  `read_access` tinyint(1) DEFAULT NULL,
  `write_access` tinyint(1) DEFAULT NULL,
  `role` varchar(128) DEFAULT NULL,
  `granted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`ac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `action` enum('insert') DEFAULT NULL,
  `activity` varchar(50) NOT NULL,
  `activity_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date_created` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `work_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `fk_activity_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE IF NOT EXISTS `administration` (
  `access` enum('view','control') DEFAULT NULL,
  `administrator_id` int(11) NOT NULL,
  `deal_type` varchar(255) DEFAULT NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `publisher_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_administration_to_administrator_idx` (`administrator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `administrator_id` int(11) NOT NULL AUTO_INCREMENT,
  `cae_ipi` int(11) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `parent_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`administrator_id`),
  KEY `fk_administrator_to_locations_idx` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------


--
-- Table structure for table `attorney`
--

CREATE TABLE IF NOT EXISTS `attorney` (
  `attorney_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(225) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`attorney_id`),
  KEY `fk_attorney_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE IF NOT EXISTS `connection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `connection_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_connection_to_user_idx` (`connection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



--
-- Table structure for table `co_writer`
--

CREATE TABLE IF NOT EXISTS `co_writer` (
  `co_writer_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `writer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_co_writer_to_writer_idx` (`writer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) DEFAULT NULL,
  `state_region` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `attorney_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(225) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`attorney_id`),
  KEY `fk_manager_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------



--
-- Table structure for table `other`
--

CREATE TABLE IF NOT EXISTS `other` (
  `other_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`other_id`),
  KEY `fk_other_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `society_id` int(11) NOT NULL DEFAULT '130',
  `cae_ipi` int(11) DEFAULT NULL,
  `cae_ipi_2` int(11) DEFAULT NULL,
  PRIMARY KEY (`publisher_id`),
  KEY `fk_publisher_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `publisher_split`
--

CREATE TABLE IF NOT EXISTS `publisher_split` (
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
  KEY `fk_publisher_split_to_publisher_idx` (`publisher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `referral`
--

CREATE TABLE IF NOT EXISTS `referral` (
  `date_created` datetime NOT NULL,
  `email` text NOT NULL,
  `new_user_id` int(11) NOT NULL,
  `referral_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`referral_id`),
  KEY `fk_referral_to_user_idx` (`user_id`),
  KEY `fk_referral_to_new_user_idx` (`new_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE IF NOT EXISTS `reminder` (
  `date_created` datetime NOT NULL,
  `recieve_user_id` int(11) NOT NULL,
  `reminder_id` int(11) NOT NULL AUTO_INCREMENT,
  `send_user_id` int(11) NOT NULL,
  `split_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  PRIMARY KEY (`reminder_id`),
  KEY `fk_reminder_to_recieve_user_idx` (`recieve_user_id`),
  KEY `fk_reminder_to_send_user_idx` (`send_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `device_type` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `expiry_date` datetime NOT NULL,
  `session_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `date_created` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `salt` text,
  `signup_id` int(11) NOT NULL AUTO_INCREMENT,
  `society` varchar(50) DEFAULT NULL,
  `status_id` int(1) DEFAULT NULL,
  PRIMARY KEY (`signup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `facebook_access_token` varchar(100) DEFAULT NULL,
  `facebook_id` int(11) DEFAULT NULL,
  `google_plus_id` varchar(255) DEFAULT NULL,
  `social_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `twitter_access_token` varchar(255) DEFAULT NULL,
  `twitter_id` int(11) DEFAULT NULL,
  `twitter_secret` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`social_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `society`
--

CREATE TABLE IF NOT EXISTS `society` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
  KEY `fk_user_to_image_idx` (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `gr_id` int(11) NOT NULL AUTO_INCREMENT,
  `gr_name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`gr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_group_perm`
--

CREATE TABLE IF NOT EXISTS `user_group_perm` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_group_id` int(11) DEFAULT NULL,
  `per_flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE IF NOT EXISTS `work` (
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
  KEY `fk_work_to_user_idx` (`create_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `work_history`
--

CREATE TABLE IF NOT EXISTS `work_history` (
  `work_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `version` int(4) NOT NULL,
  PRIMARY KEY (`work_history_id`),
  KEY `fk_work_history_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `work_meta`
--

CREATE TABLE IF NOT EXISTS `work_meta` (
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `meta_role` enum('producer','main','featured') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `work_meta_id_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`work_meta_id_id`),
  KEY `fk_work_meta_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `writer`
--

CREATE TABLE IF NOT EXISTS `writer` (
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
  KEY `fk_writer_to_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `writer_administrator`
--

CREATE TABLE IF NOT EXISTS `writer_administrator` (
  `wa_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rel_type` enum('publisher','manager','attorney','other') DEFAULT NULL,
  `access_type` enum('read','write','none') DEFAULT NULL,
  PRIMARY KEY (`wa_id`),
  KEY `fk_writer_administrator_to_user_idx` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `writer_split`
--

CREATE TABLE IF NOT EXISTS `writer_split` (
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
  KEY `fk_writer_split_to_writer_idx` (`writer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Table structure for table `writer_split`
--

CREATE TABLE IF NOT EXISTS `writer_split` (
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
  KEY `fk_writer_split_to_writer_idx` (`writer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
