-- Project updated today `28/12/22`
CREATE DATABASE IF NOT EXISTS `realestate_records`;

USE realestate_records;



-- Table structure for registered users `users` 
CREATE TABLE `realestate_users` ( 
`id` INT(11) AUTO_INCREMENT,
`uniqueid` VARCHAR(50) NOT NULL,
`email` VARCHAR(100) NOT NULL,
`username` VARCHAR(100) NOT NULL,
`password` VARCHAR(150) DEFAULT NULL,
`profile` ENUM('User', 'Moderator', 'Admin') DEFAULT 'User',
`code` varchar(20) NOT NULL,
`mailer` varchar(10) DEFAULT '0',
`log_session` varchar(30) DEFAULT NULL,
`status` ENUM('New', 'Deactivated', 'Activated', 'Banned', 'Trash') DEFAULT 'New',
`login_status` ENUM('Logged_out', 'Logged_in') DEFAULT 'Logged_out',
`notify` ENUM('On', 'Off') DEFAULT 'Off',
`hash` VARCHAR(150) NOT NULL,
`lastlogin` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
`ip` VARCHAR(50) NOT NULL,
`user_agent` VARCHAR(250) NOT NULL,
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;



-- Table structure for confirmed users `profile` 
CREATE TABLE `realestate_profile` ( 
`id` INT(11) AUTO_INCREMENT,
`uniqueid` VARCHAR(50) NOT NULL,
`fname` VARCHAR(100) NOT NULL,
`lname` VARCHAR(100) NOT NULL,
`dob` varchar(20) DEFAULT NULL,
`wallet` VARCHAR(50) DEFAULT '0',
`pin` VARCHAR(10) DEFAULT 'GOOD',
`gender` ENUM('Male', 'Female', 'Not Say') DEFAULT 'Not Say',
`occupation` varchar(100) DEFAULT NULL,
`phone` varchar(20) DEFAULT NULL,
`phone1` varchar(20) DEFAULT NULL,
`email1` VARCHAR(150) DEFAULT NULL,
`facebook` VARCHAR(150) DEFAULT NULL,
`instagram` VARCHAR(150) DEFAULT NULL,
`linkedin` VARCHAR(150) DEFAULT NULL,
`twitter` VARCHAR(150) DEFAULT NULL,
`address` VARCHAR(200) DEFAULT NULL,
`city` VARCHAR(100) DEFAULT NULL,
`country` VARCHAR(150) DEFAULT NULL,
`zipcode` VARCHAR(50) DEFAULT NULL,
`profileimage` VARCHAR(200) DEFAULT 'favicon.png',
`details` longtext DEFAULT NULL,   
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;




-- Table structure for aboutus `aboutus` 
CREATE TABLE `realestate_aboutus` ( 
`id` INT(11) AUTO_INCREMENT,
`abt_title` VARCHAR(200) NOT NULL,
`abt_body` longtext NOT NULL,
`whyus` longtext NOT NULL,
`mission` longtext NOT NULL,
`vision` longtext NOT NULL,
`details` longtext NOT NULL,
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;







-- Table structure for projects `projects` 
CREATE TABLE `realestate_projects` ( 
`id` INT(11) AUTO_INCREMENT,
`createdby` VARCHAR(20) NOT NULL,
`uniqueid` VARCHAR(20) NOT NULL,
`title` VARCHAR(100) NOT NULL,
`length` VARCHAR(20) DEFAULT NULL,
`sqm` VARCHAR(10) DEFAULT NULL,
`address` VARCHAR(200) NOT NULL,
`city` VARCHAR(20) NOT NULL,
`state` VARCHAR(50) NOT NULL,
`country` VARCHAR(20) NOT NULL,
`img` VARCHAR(20) NOT NULL,
`type` ENUM('Catalogue', 'Sales', 'Lease', 'Rent') DEFAULT 'Catalogue',
`status` ENUM('Activated', 'Draft', 'Deactivated', 'Trash') DEFAULT 'Activated',
`details` longtext NOT NULL,
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;






-- Table structure for project_images `project_images` 
CREATE TABLE `realestate_project_images` ( 
`id` INT(11) AUTO_INCREMENT,
`uniqueid` VARCHAR(20) NOT NULL,
`img1` VARCHAR(20) DEFAULT NULL,
`img2` VARCHAR(20) DEFAULT NULL,
`img3` VARCHAR(20) DEFAULT NULL,
`img4` VARCHAR(20) DEFAULT NULL,
`img5` VARCHAR(20) DEFAULT NULL,
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;





-- Table structure for project_facilities `project_facilities` 
CREATE TABLE `realestate_project_facilities` ( 
`id` INT(11) AUTO_INCREMENT,
`uniqueid` VARCHAR(20) NOT NULL,
`beds` VARCHAR(10) NOT NULL,
`bath` VARCHAR(10) DEFAULT NULL,
`cars` VARCHAR(10) DEFAULT NULL,
`stories` VARCHAR(10) DEFAULT NULL,
`price` VARCHAR(10) DEFAULT NULL,
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;




-- Table structure for msg report `msgreport` 
CREATE TABLE `realestate_msgreport` ( 
`id` INT(11) AUTO_INCREMENT,
`fname` VARCHAR(100) NOT NULL,
`lname` VARCHAR(100) NOT NULL,
`email` VARCHAR(100) NOT NULL,
`phone` varchar(20) NOT NULL,
`dept` VARCHAR(50) NOT NULL,
`issue` VARCHAR(50) NOT NULL,
`subject` VARCHAR(100) NOT NULL,
`details` longtext NOT NULL,
`status` ENUM('Unread', 'Read', 'Trash') DEFAULT 'Unread',
`ip` VARCHAR(50) NOT NULL,
`user_agent` VARCHAR(250) NOT NULL,
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;





-- Table structure for Subscribers `subscribe` 
CREATE TABLE `realestate_subscribe` ( 
`id` INT(11) AUTO_INCREMENT,
`email` VARCHAR(100) NOT NULL,
`status` ENUM('Active', 'Unactive') DEFAULT 'Active',
`type` ENUM('Newsletter', 'WaitList') DEFAULT 'Newsletter',
`ip` VARCHAR(50) NOT NULL,
`user_agent` VARCHAR(250) NOT NULL,
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;





-- Table structure for career `career` 
CREATE TABLE `realestate_career` ( 
`id` INT(11) AUTO_INCREMENT,
`fname` VARCHAR(100) NOT NULL,
`lname` VARCHAR(100) NOT NULL,
`email` VARCHAR(100) NOT NULL,
`phone` VARCHAR(20) NOT NULL,
`role` VARCHAR(100) NOT NULL,
`cv` VARCHAR(100) NOT NULL,
`details` longtext NOT NULL,
`status` ENUM('Unread', 'Read', 'Trash') DEFAULT 'Unread',
`ip` VARCHAR(50) NOT NULL,
`user_agent` VARCHAR(250) NOT NULL,
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;







-- Table structure for Company Information `coy_info` 
CREATE TABLE `realestate_info` ( 
`id` INT(11) AUTO_INCREMENT,
`coyname` VARCHAR(150) NOT NULL,
`slogan` VARCHAR(500) DEFAULT NULL,
`email` VARCHAR(150) NOT NULL,
`email1` VARCHAR(150) DEFAULT NULL,
`facebook` VARCHAR(150) DEFAULT NULL,
`instagram` VARCHAR(150) DEFAULT NULL,
`linkedin` VARCHAR(150) DEFAULT NULL,
`twitter` VARCHAR(150) DEFAULT NULL,
`phone` VARCHAR(50) NOT NULL,
`phone1` VARCHAR(50) DEFAULT NULL,
`address` text NOT NULL,
`img` VARCHAR(200) DEFAULT 'favicon.png',
`status` ENUM('Draft', 'Publish', 'Trash') DEFAULT 'Draft',
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;







-- Table structure for table `transaction` 
CREATE TABLE `realestate_transaction` ( 
`id` INT NOT NULL AUTO_INCREMENT,
`img` VARCHAR(50) NOT NULL,
`uniqueid` VARCHAR(50) NOT NULL, 
`trancid` VARCHAR(50) NOT NULL,
`projectid` VARCHAR(50) NOT NULL,
`title` VARCHAR(100) NOT NULL,
`charges` VARCHAR(50) NOT NULL,
`amount` VARCHAR(50) NOT NULL, 
`total` VARCHAR(50) NOT NULL, 
`type` ENUM('Rent', 'Sale', 'Lease') DEFAULT 'Sale',
`status` ENUM('Processing', 'Completed', 'Cancelled', 'Trash') DEFAULT 'Processing', 
`details` text, 
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB  DEFAULT CHARSET=latin1 ;






-- Table structure for Shipment Setting `shipment_settings` 
CREATE TABLE `realestate_currency` ( 
`id` INT NOT NULL AUTO_INCREMENT,
`currency` VARCHAR(20) DEFAULT '$',
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)) ENGINE = InnoDB DEFAULT CHARSET=latin1   ;





-- Table structure for activity `activity` 
CREATE TABLE `realestate_activity` ( 
`id` INT(11) AUTO_INCREMENT,
`uniqueid` VARCHAR(50) NOT NULL,
`username` VARCHAR(100) DEFAULT NULL,
`details` longtext,
`status` ENUM('Unread', 'Hide', 'Read', 'Trash') DEFAULT 'Unread',
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;





-- Table structure for team members `teammembers` 
CREATE TABLE `realestate_teammembers` ( 
`id` INT(11) AUTO_INCREMENT,
`uniqueid` VARCHAR(50) NOT NULL,
`name` VARCHAR(100) DEFAULT NULL,
`position` VARCHAR(50) DEFAULT NULL,
`phone` varchar(20) DEFAULT NULL,
`email` VARCHAR(150) DEFAULT NULL,
`facebook` VARCHAR(100) DEFAULT NULL,
`instagram` VARCHAR(100) DEFAULT NULL,
`linkedin` VARCHAR(100) DEFAULT NULL,
`twitter` VARCHAR(100) DEFAULT NULL,
`img` VARCHAR(100) NOT NULL,
`details` longtext DEFAULT NULL,
`status` ENUM('Publish', 'Deactivate') DEFAULT 'Publish',
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;






-- Table structure for User Tickets `user_tickets` 
CREATE TABLE `realestate_tickets` ( 
`id` INT(11) AUTO_INCREMENT,
`uniqueid` VARCHAR(50) NOT NULL,
`ticketid` VARCHAR(50) NOT NULL,
`receiver` VARCHAR(100) NOT NULL,
`replyto` VARCHAR(100) DEFAULT NULL,
`dept` VARCHAR(100) NOT NULL,
`issue` VARCHAR(100) NOT NULL,
`subject` VARCHAR(500) NOT NULL,
`details` longtext NOT NULL,
`status` ENUM('Unread', 'Read', 'Reply', 'Closed', 'Trash') DEFAULT 'Unread',
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;




-- Table structure for Bank Details `bank` 
CREATE TABLE `realestate_bank` ( 
`id` INT(11) AUTO_INCREMENT,
`bank` VARCHAR(100) DEFAULT NULL,
`accountName` VARCHAR(100) DEFAULT NULL,
`accountNumber` VARCHAR(50) DEFAULT NULL,
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;







-- Table structure for Charges Details `charges` 
CREATE TABLE `realestate_charges` ( 
`id` INT(11) AUTO_INCREMENT,
`fee` VARCHAR(50) DEFAULT NULL,
`type` ENUM ('Rent', 'Lease', 'Sale') DEFAULT 'Sale',
`percent` VARCHAR(10) DEFAULT NULL,
`status` ENUM ('Draft', 'Activated', 'Deactivated') DEFAULT 'Draft',
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;






-- Table structure for Services API `utiliAPI` 
CREATE TABLE `realestate_utilAPI` ( 
`id` INT(11) AUTO_INCREMENT,
`name` VARCHAR(50) DEFAULT NULL,
`url` VARCHAR(100) DEFAULT NULL,
`code` VARCHAR(100) DEFAULT NULL,
`public` VARCHAR(100) DEFAULT NULL,
`private` VARCHAR(100) DEFAULT NULL,
`wallet` VARCHAR(50) DEFAULT NULL,
`status` ENUM('Active', 'Deactivated') DEFAULT 'Active',
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;






-- Table structure for User Notifications `finance_notify` 
CREATE TABLE `realestate_notify` ( 
`id` INT(11) AUTO_INCREMENT,
`subject` varchar(100) NOT NULL,
`details` longtext,
`status` ENUM('Publish', 'Draft', 'Trash') DEFAULT 'Publish',
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;







-- Table structure for all users from Admin `settings` 
CREATE TABLE `realestate_users_settings` ( 
`id` INT(11) AUTO_INCREMENT,
`makepost` ENUM('Yes', 'No') DEFAULT 'Yes',
`publishpost` ENUM('Yes', 'No') DEFAULT 'No',
`postview` ENUM('Grid', 'Table') DEFAULT 'Grid',
`deletepost` ENUM('Yes', 'No') DEFAULT 'No',
`deleteaccount` ENUM('Yes', 'No') DEFAULT 'No',
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;








-- Table structure for all moderators from Admin `settings` 
CREATE TABLE `realestate_moderators_settings` ( 
`id` INT(11) AUTO_INCREMENT,
`makepost` ENUM('Yes', 'No') DEFAULT 'Yes',
`publishpost` ENUM('Yes', 'No') DEFAULT 'No',
`deletepost` ENUM('Yes', 'No') DEFAULT 'No',
`readtranc` ENUM('Yes', 'No') DEFAULT 'No',
`edittranc` ENUM('Yes', 'No') DEFAULT 'No',
`readmsg` ENUM('Yes', 'No') DEFAULT 'Yes',
`replymsg` ENUM('Yes', 'No') DEFAULT 'No',
`readticket` ENUM('Yes', 'No') DEFAULT 'Yes',
`replyticket` ENUM('Yes', 'No') DEFAULT 'No',
`makeanounce` ENUM('Yes', 'No') DEFAULT 'Yes',
`editanounce` ENUM('Yes', 'No') DEFAULT 'No',
`maketeam` ENUM('Yes', 'No') DEFAULT 'Yes',
`editteam` ENUM('Yes', 'No') DEFAULT 'No',
`makeprofile` ENUM('Yes', 'No') DEFAULT 'No',
`editprofile` ENUM('Yes', 'No') DEFAULT 'No',
`readusers` ENUM('Yes', 'No') DEFAULT 'No',
`editusers` ENUM('Yes', 'No') DEFAULT 'No',
`deleteaccount` ENUM('Yes', 'No') DEFAULT 'No',
`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,    
PRIMARY KEY  (`id`)
) ENGINE = InnoDB   DEFAULT CHARSET=latin1 ;






--
-- Dumping data for table `users`
--

INSERT INTO `realestate_users` (`id`, `uniqueid`, `email`, `username`, `password`, `profile`, `code`, `mailer`, `status`, `log_session`, `login_status`, `notify`, `hash`, `lastlogin`, `ip`, `user_agent`, `created`) VALUES
(1, 'FondofTc35','admintester@profile.com', 'adminTester', '$2y$10$hEjHAQrERtIEOicsWzrqPeuYbALGeGdkNzA5n3orsk/PUHUtP.E4.', 'Admin', 'Hwjvh', '0', 'Activated', 'none', 'Logged_out', 'Off', '63dc7ed1010d3c3b8269faf0ba7491d4', '2023-01-19 09:24:18', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', '2022-12-24 05:32:18');



--
-- Dumping data for table `Profile`
--
INSERT INTO `realestate_profile` (`id`, `uniqueid`, `fname`, `lname`) VALUES (1, 'FondofTc35','admin', 'tester'); 




--
-- Dumping data for table `user settings`
--
INSERT INTO `realestate_users_settings` (`id`) VALUES (1); 



--
-- Dumping data for table `moderators settings`
--
INSERT INTO `realestate_moderators_settings` (`id`) VALUES (1); 



