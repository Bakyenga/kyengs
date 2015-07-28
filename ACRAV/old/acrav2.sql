-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 16, 2011 at 09:31 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acrav2`
--

-- --------------------------------------------------------

--
-- Table structure for table `acravhelp`
--

CREATE TABLE IF NOT EXISTS `acravhelp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(30) NOT NULL,
  `topic` varchar(300) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `acravhelp`
--

INSERT INTO `acravhelp` (`id`, `page`, `topic`, `content`) VALUES
(1, 'Page 1', 'LOG IN', 'Acrav is a business Software application for bidding,and tracking cargo.  To log in enter your username and password else click on forgot password to receive a new password on your email.\n');

-- --------------------------------------------------------

--
-- Table structure for table `appqueries`
--

CREATE TABLE IF NOT EXISTS `appqueries` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `querycode` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `query` text NOT NULL,
  `dateentered` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `querycode` (`querycode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=298 ;

--
-- Dumping data for table `appqueries`
--

INSERT INTO `appqueries` (`id`, `querycode`, `description`, `query`, `dateentered`) VALUES
(1, 'user_login', 'Picks an active user''s details who matches the pair _USERNAME_ and _PASSWORD_', 'SELECT *,(TO_DAYS(passwordexpirydate)-TO_DAYS(CURRENT_DATE)) AS timeleft FROM employee WHERE username=''_USERNAME_'' AND password = ''_PASSWORD_'' AND isactive = ''Y''', '2010-10-19 13:13:13'),
(220, 'pick_company_by_id', 'Selects a company based on its id', 'SELECT * FROM company WHERE id=''_COMPANYID_''', '2011-01-06 10:20:47'),
(221, 'pick_employee_by_id', 'Selects the employee by the given ID', 'SELECT * FROM employee WHERE id=''_ID_''', '2011-01-03 16:14:10'),
(222, 'double_check_employee', 'Checks whether a similar employee was submitted', 'SELECT * FROM employee WHERE username=''_USERNAME_'' OR (firstname=''_FIRSTNAME_'' AND middlename=''_MIDDLENAME_'' AND lastname=''_LASTNAME_'') OR emailaddress=''_EMAILADDRESS_''', '2010-12-27 22:00:13'),
(223, 'pick_all_employees', 'Picks all active employees from the employee list', 'ELECT *, CONCAT(salutation, '' '', firstname, '' '', middlename, '' '', lastname) AS name FROM employee WHERE username != ''admin'' AND isactive=''Y'' ORDER BY username, firstname, middlename, lastname ASC', '2010-12-28 12:28:13'),
(224, 'delete_employee_record', 'Deletes an employee record from the database', 'DELETE FROM employee WHERE id = ''_ID_''', '2010-12-27 22:02:39'),
(225, 'update_employee_record', 'Updates the employee information in the database', 'UPDATE employee SET password=''_PASSWORD_'', salutation=''_SALUTATION_'', firstname=''_FIRSTNAME_'', middlename=''_MIDDLENAME_'', lastname=''_LASTNAME_'', gender=''_GENDER_'', jobtitle=''_JOBTITLE_'', shortconame=''_SHORTCONAME_'', companyid=''_COMPANYID_'', emailaddress=''_EMAILADDRESS_'', isactive=''_ISACTIVE_'', isadmin=''_ISADMIN_'', \nusertype=''_USERTYPE_'', telephone=''_TELEPHONE_'', \nstateorprovince=''_STATEORPROVINCE_'', lastupdatedby=''_USERID_'', lastupdatedate=NOW(), \nsecurityquestion=''_SECURITYQUESTION_'', answer=''_ANSWER_'', passwordexpirydate=''_PASSWORDEXPIRYDATE_'' WHERE id=''_ID_''', '2011-02-05 14:07:43'),
(282, 'get_all_security_qns', 'Get all security questions', 'SELECT * FROM securityquestions ORDER BY question', '2011-01-31 20:47:17'),
(25, 'pick_all_queries', 'Returns all queries used in the system', 'SELECT * FROM appqueries ORDER BY dateentered DESC', '2010-11-11 21:08:30'),
(26, 'pick_query_by_id', 'Select a query from the database based on its ID', 'SELECT * FROM appqueries WHERE id=''_ID_''', '2011-01-03 12:46:16'),
(27, 'update_db_query', 'Updates the system query in the database', 'UPDATE appqueries SET description=''_DESCRIPTION_'', query=''_QUERY_'', dateentered=NOW() WHERE querycode=''_QUERYCODE_''', '2010-11-12 09:34:54'),
(28, 'insert_db_query', 'Inserts a new database query into the database', 'INSERT INTO appqueries (querycode, description, query, dateentered) VALUES (''_QUERYCODE_'', ''_DESCRIPTION_'', ''_QUERY_'', NOW())', '2010-11-02 17:35:03'),
(30, 'delete_db_query', 'Deletes a database query based on passed ID', 'DELETE FROM appqueries WHERE id=''_ID_''', '2010-11-02 18:16:32'),
(47, 'pick_query_by_code', 'Returns a query given its code', 'SELECT * FROM appqueries WHERE querycode = ''_QUERYCODE_''', '2010-11-08 12:20:46'),
(61, 'search_employee_table', 'Searches the employee table where the search field has portions similar to the passed phrase.', 'SELECT *, CONCAT(salutation, '' '', firstname, '' '', middlename, '' '', lastname) AS name FROM employee WHERE username != ''administrator'' AND _SEARCHFIELD_ LIKE ''%_PHRASE_%'' ORDER BY username, firstname, middlename, lastname ASC', '2011-01-04 09:35:00'),
(63, 'pick_all_jobcategories', 'Returns all job categories from the job categories DB table', 'SELECT * FROM jobcategories', '2010-11-11 19:14:54'),
(66, 'insert_employee_record', 'Inserts a new record into the employee database table.', 'INSERT INTO employee (salutation, firstname, middlename, lastname, username, password, gender, usertype, isadmin, isactive, companyid, shortconame, jobtitle, stateorprovince, emailaddress, datecreated, createdby, lastupdatedby, lastupdatedate, passwordexpirydate) VALUES (''_SALUTATION_'', ''_FIRSTNAME_'', ''_MIDDLENAME_'', ''_LASTNAME_'', ''_USERNAME_'',''_PASSWORD_'',  ''_GENDER_'', ''_USERTYPE_'', ''_ISADMIN_'', ''_ISACTIVE_'', ''_COMPANYID_'', ''_SHORTCONAME_'', ''_JOBTITLE_'', ''_STATEORPROVINCE_'', ''_EMAILADDRESS_'', NOW(), ''_USERID_'', ''_USERID_'', NOW(), ''_PASSWORDEXPIRYDATE_'')', '2011-02-05 16:27:05'),
(71, 'search_query_table', 'Searches all queries for the given field.', 'SELECT * FROM appqueries WHERE _SEARCHFIELD_ LIKE ''%_PHRASE_%'' ORDER BY dateentered DESC', '2010-11-12 13:30:51'),
(91, 'pick_all_help_topics', 'Returns all help topics from the database.', 'SELECT * FROM acravhelp ORDER BY page, topic ASC', '2011-01-04 11:33:49'),
(92, 'search_help_table', 'Searches the help table based on the search field provided', 'SELECT * FROM acravhelp WHERE _SEARCHFIELD_ LIKE ''%_PHRASE_%'' ORDER BY page, topic ASC', '2011-01-04 14:05:52'),
(93, 'pick_help_topic_by_id', 'Returns a help topic by the given ID', 'SELECT * FROM acravhelp WHERE id=''_ID_''', '2011-01-04 14:06:40'),
(94, 'pick_all_help_pages', 'Returns all pages that an administrator can assign help to.', 'SELECT DISTINCT(page) FROM acravhelp ORDER BY page ASC', '2011-01-04 14:06:59'),
(95, 'pick_help_by_page_and_topic', 'Returns help with the given topic and page', 'SELECT * FROM acravhelp WHERE page=''_PAGE_'' AND topic=''_TOPIC_''', '2011-01-04 14:07:19'),
(96, 'delete_nhsn_help', 'Deletes a help topic with a given id from the database', 'DELETE FROM acravhelp WHERE id=''_ID_''', '2011-01-04 14:07:37'),
(97, 'update_nhsn_help', 'Updates NHSN help data of a record given its id', 'UPDATE acravhelp SET page=''_PAGE_'', topic=''_TOPIC_'', content=''_CONTENT_'' WHERE id=''_ID_''', '2011-01-04 14:08:02'),
(98, 'insert_nhsn_help', 'Insert into the help table a new help record', 'INSERT INTO acravhelp (page, topic, content) VALUES (''_PAGE_'', ''_TOPIC_'', ''_CONTENT_'')', '2011-01-04 12:46:15'),
(99, 'search_all_help', 'Searches the help topic by any of the fields provided', 'SELECT * FROM acravhelp WHERE page LIKE ''%_PAGE_%'' AND topic LIKE ''%_TOPIC_%'' AND content LIKE ''%_CONTENT_%''', '2011-01-04 14:06:14'),
(227, 'pick_employees', 'picks all employess', 'select * from employee WHERE companyid =''_COMPANYID_''', '2011-01-03 14:49:25'),
(229, 'search_jobcategory_table', 'searches for the jabcategories', 'SELECT * FROM jobcategories WHERE _SEARCHFIELD_ LIKE ''%_PHRASE_%'' ORDER BY jobtitle ASC', '2011-01-06 15:14:56'),
(230, 'pick_jobcategory_by_id', 'picks jobcategory by Id', 'SELECT * FROM jobcategories WHERE id=''_ID_''', '2011-01-05 12:54:33'),
(231, 'pick_jobcategory_tittle', 'Returns jobcategory by jobtitle', 'SELECT * FROM jobcategories WHERE jobtitle=''_JOBTITLE_''', '2011-01-05 14:02:23'),
(232, 'delete_jobcategory', 'deletes job category by ID', 'DELETE FROM jobcategories WHERE id=''_ID_''', '2011-01-05 14:10:28'),
(233, 'update_jobcategory', 'updates selected jobcategory', 'UPDATE jobcategories SET jobtitle=''_JOBTITLE_'' WHERE id=''_ID_''', '2011-01-05 15:09:19'),
(234, 'insert_jobcategory', 'inserts jobcategories into database', 'INSERT INTO jobcategories (jobtitle) VALUES (''_JOBTITLE_'')', '2011-01-05 14:22:49'),
(235, 'pick_company_info', 'Returns company details', 'select * from company WHERE id =''_ID_''', '2011-01-06 09:34:23'),
(236, 'pick_company_by_email', 'returns company by email', 'SELECT * FROM company WHERE emailaddress = ''_EMAILADDRESS_''', '2011-01-06 10:46:53'),
(237, 'delete_company', 'delete company details by id', 'DELETE FROM COMPANY WHERE company_id=''_COMPANY_ID_''', '2011-01-06 10:57:29'),
(238, 'update_company', 'updates company details', 'UPDATE company SET companyname=''_COMPANYNAME_'', emailaddress=''_EMAILADDRESS_'', physicaladdress=''_PHYSICALADDRESS_'',state=''_STATE_'', country=''_COUNTRY_'',telephone=''_TELEPHONE_'', faxnumber=''_FAXNUMBER_'' WHERE id=''_COMPANY_ID_''', '2011-01-06 11:05:17'),
(239, 'insert_company_info', 'store company details', 'INSERT INTO company (companyname,emailaddress,physicaladdress,state,role,country,telephone,faxnumber,dateestablished) VALUES (''_COMPANYNAME_'',''_EMAILADDRESS_'',''_PHYSICALADDRESS_'',''_STATE_'',''_ROLE_'',''_COUNTRY_'',''_TELEPHONE_'',''_FAXNUMBER_'',''_.startday.-.startmonth.-.startyear._'')', '2011-01-12 00:52:10'),
(240, 'pick_all_users', 'selects all users', 'SELECT * FROM users WHERE company_id=''_COMPANY_ID_''', '2011-01-16 20:56:42'),
(241, 'pick_user_by_id', 'selects user by id', 'SELECT * FROM users WHERE user_id = ''_USER_ID_''', '2011-01-16 21:02:25'),
(242, 'pick_user_by_email', 'selects user by email address', 'SELECT * FROM users WHERE emailaddress =''_EMAILADDRESS_''', '2011-01-16 21:00:29'),
(243, 'Update_user', 'updates a user in DB', 'UPDATE users SET fname=''_FNAME_'',lname=''_LNAME_'',telephone=''_TELEPHONE_'',emailaddress=''_EMAILADDRESS_'',gender=''_GENDER_'' WHERE user_id=''_USER_ID_''', '2011-01-18 08:54:02'),
(244, 'delete_user', 'Deletes a user from data base', 'DELETE FROM users WHERE user_id=''_USER_ID_''', '2011-01-16 20:59:51'),
(245, 'insert_user', 'stores user in the data base', 'INSERT INTO users (fname,lname,emailaddress,telephone,gender,company_id) VALUES(''_FNAME_'',''_LNAME_'',''_EMAILADDRESS_'',''_TELEPHONE_'',''_GENDER_'',''_COMPANYID_'')', '2011-01-16 20:58:01'),
(246, 'search_user_table', 'searches entire user table', 'SELECT * FROM users WHERE _SEARCHFIELD_ LIKE ''%_PHRASE_%'' ORDER BY fname DESC', '2011-01-07 11:06:16'),
(247, 'pick_all_trucks', 'picks all trucks', 'SELECT * FROM trucks WHERE company_id=''_COMPANY_ID_''', '2011-01-14 04:45:22'),
(248, 'pick_truck_by_id', 'picks a truck by is id', 'SELECT * FROM trucks WHERE truck_id = ''_TRUCK_ID_''', '2011-01-16 20:59:18'),
(249, 'pick_truck_by_regno', 'Selects a truck by its registration number', 'SELECT * FROM trucks WHERE regnumber = ''_REGNUMBER_''', '2011-01-16 20:58:48'),
(250, 'delete_truck', 'Deletes a truck by its id', 'DELETE FROM trucks WHERE truck_id = ''_TRUCK_ID_''', '2011-01-16 20:58:28'),
(251, 'update_truck', 'Updates a selected truck', 'UPDATE trucks SET regnumber=''_REGNUMBER_'',enginenumber=''_ENGINENUMBER_'',description=''_DESCRIPTION_'',systemstatus=''_SYSTEMSTATUS_'',datebought=''_DATEBOUGHT_'',cargoweight=''_CARGOWEIGHT_'',cargolength=''_CARGOLENGTH_'',cargowidth=''_CARGOWIDTH_'',allowedcargo=''_ALLOWEDCARGO_'',cargoheight=''_CARGOHEIGHT_'' WHERE TRUCK_ID=''_TRUCK_ID_''', '2011-02-28 12:34:49'),
(252, 'insert_truck', 'Stores all truck data in database', 'INSERT INTO trucks (regnumber,company_id,enginenumber,datebought,allowedcargo,description,systemstatus,cargoweight,cargolength,cargowidth,cargoheight) VALUES (''_REGNUMBER_'',''_COMPANYID_'',''_ENGINENUMBER_'',''_DATEBOUGHT_'',''_ALLOWEDCARGO_'',''_DESCRIPTION_'',''_SYSTEMSTATUS_'',''_CARGOWEIGHT_'',''_CARGOLENGTH_'',''_CARGOWIDTH_'',''_CARGOHEIGHT_'')', '2011-02-28 12:18:58'),
(253, 'search_truck_table', 'Searches trucks in the table', 'SELECT * FROM trucks WHERE _SEARCHFIELD_ LIKE ''%_PHRASE_%'' ORDER BY regnumber DESC', '2011-01-07 16:31:17'),
(254, 'check_employee', 'checks whether the employee already exists', 'SELECT * FROM employee WHERE emailaddress=''_EMAILADDRESS_''', '2011-01-09 21:52:18'),
(255, 'add_company_details', 'stores details of a company at registration', 'INSERT INTO company (companyname,emailaddress,role) values (''_COMPANYNAME_'',''_EMAILADDRESS_'',''_ROLE_'')', '2011-01-13 04:51:00'),
(256, 'insert_user_rights', 'Inserts user rights in the database', 'INSERT INTO USER_RIGHTS (USER_ID,SUBMITBIDS,ADDEDIT_TRUCK,ADDEDIT_CARGO,ADDEDIT_DRIVER,TRACK_CARGO,DELETE_TRUCK) VALUES (''_SUBMITBIDS_'',''_ADDEDIT_TRUCK_'',''_ADDEDIT_CARGO_'',''_ADDEDIT_DRIVER_'',''_TRACKCARGO_'',''_DELETETRUCK_'')', '2011-01-14 03:39:07'),
(257, 'pick_all_containers', 'Selects containers from their table', 'SELECT * FROM containers WHERE company_id=''_COMPANY_ID_''', '2011-01-16 20:53:41'),
(258, 'insert_container', 'stores containers in their table', 'INSERT INTO containers (containernumber,company_id,cargotype,description,instructions,originaddress,destinationaddress,origincountry,destinationcountry,cargoweight,cargolength,cargowidth,cargoheight) VALUES (''_CONTAINERNUMBER_'',''_COMPANYID_'',''_CARGOTYPE_'',''_DESCRIPTION_'',''_INSTRUCTIONS_'',''_ORIGINADDRESS_'',''_DESTINATIONADDRESS_'',''_ORIGINCOUNTRY_'',''_DESTINATIONCOUNTRY_'',''_CARGOWEIGHT_'',''_CARGOLENGTH_'',''_CARGOWIDTH_'',''_CARGOHEIGHT_'')', '2011-02-28 15:29:12'),
(259, 'update_container', 'Updates a container by its id', 'UPDATE containers SET containernumber=''_CONTAINERNUMBER_'',description=''_DESCRIPTION_'',instructions=''_INSTRUCTIONS_'',originaddress=''_ORIGINADDRESS_'',destinationaddress=''_DESTINATIONADDRESS_'',origincountry=''_ORIGINCOUNTRY_'',destinationcountry=''_DESTINATIONCOUNTRY_'',cargoweight=''_CARGOWEIGHT_'',cargotype=''_CARGOTYPE_'',cargolength=''_CARGOLENGTH_'',cargowidth=''_CARGOWIDTH_'',cargoheight=''_CARGOHEIGHT_'' WHERE container_id=''_CONTAINER_ID_''', '2011-02-28 11:20:00'),
(260, 'pick_container_by_id', 'selects a container by its number', 'SELECT * FROM containers WHERE container_id=''_CONTAINER_ID_''', '2011-01-16 20:52:20'),
(261, 'pick_container_by_number', 'selects a container by its number', 'SELECT * FROM containers WHERE containernumber=''_CONTAINERNUMBER_''', '2011-01-16 20:52:59'),
(262, 'delete_container', 'Deletes a container by its id', 'DELETE FROM containers WHERE container_id=''_CONTAINER_ID_''', '2011-01-16 20:52:42'),
(263, 'pick_all_drivers', 'selects all drivers', 'SELECT * FROM drivers WHERE company_id=''_COMPANY_ID_''', '2011-01-16 20:52:03'),
(264, 'insert_driver', 'stores drivers in database', 'INSERT INTO drivers (company_id,fname,lname,image,truck_id,experiance,dateofbirth,telephone1,telephone2,actingas) Values (''_COMPANYID_'',''_FNAME_'',''_LNAME_'',''_IMAGE_'',''_TRUCKID_'',''_EXPERIANCE_'',''_DATEOFBIRTH_'',''_TELEPHONE1_'',''_TELEPHONE2_'',''_ACTINGAS_'')', '2011-01-18 00:09:34'),
(265, 'update_driver', 'updates a driver', 'UPDATE drivers SET fname=''_FNAME_'',lname=''_LNAME_'',experiance=''_EXPERIANCE_'',telephone1=''_TELEPHONE1_'',telephone2=''_TELEPHONE2_'',actingas=''_ACTINGAS_'', dateofbirth=''_DATEOFBIRTH_'' WHERE driver_id=''_DRIVER_ID_''', '2011-02-28 14:40:16'),
(266, 'delete_driver', 'deletes a driver by id', 'DELETE FROM drivers WHERE driver_id=''_DRIVER_ID_''', '2011-01-16 20:51:09'),
(267, 'pick_driver_by_id', 'selects a driver with his id', 'SELECT * FROM drivers WHERE driver_id=''_DRIVER_ID_''', '2011-01-16 20:50:38'),
(268, 'Pick_driver_by_name', 'picks a driver by name', 'SELECT * FROM drivers WHERE fname=''_FNAME_''', '2011-01-16 20:50:53'),
(270, 'pick_driver_for_truck', 'selects a driver for a truck', 'SELECT fname,lname FROM drivers WHERE truck_id=''_TRUCK_ID_''', '2011-01-17 21:43:54'),
(271, 'search_driver_table', 'searches drivers', 'SELECT * FROM drivers WHERE _SEARCHFIELD_ LIKE ''%_PHRASE_%'' ORDER BY fname DESC', '2011-01-17 22:16:20'),
(272, 'pick_truck_for_driver', 'selects a truck for the driver', 'SELECT regnumber FROM trucks WHERE truck_id=''_TRUCK_ID_''', '2011-01-17 23:08:30'),
(273, 'pick_truck_id_from_drivers', 'selects truck id from the drivers table', 'SELECT truck_id FROM drivers WHERE driver_id=''_DRIVER_ID_'' ', '2011-01-17 23:12:24'),
(274, 'insert_payments', 'stores payments in the payments table', 'INSERT INTO payments (company_id,billingaddress,companybank,image,bankaccount,fname,lname,emailaddress,telephone,paymentterms) values (''_COMPANYID_'',''_BILLINGADDRESS_'',''_COMPANYBANK_'',''_IMAGE_'',\n''_BANKACCOUNT_'',''_FNAME_'',''_LNAME_'',\n''_EMAILADDRESS_'',''_TELEPHONE_''\n,''_PAYMENTTERMS_'')', '2011-01-18 00:04:30'),
(275, 'delete_payment', 'deletes a payment from a list', 'DELETE FROM payments WHERE payment_id=''_PAYMENT_ID_''', '2011-01-18 21:26:28'),
(276, 'update_payment', 'updates a payment', 'UPDATE payments SET billingaddress=''_BILLINGADDRESS_'',companybank=''_COMPANYBANK_'',bankaccount=''_BANKACCOUNT_'',fname=''_FNAME_'',lname=''_LNAME_'',emailaddress=''_EMAILADDRESS_'',telephone=''_TELEPHONE_'',paymentterms=''_PAYMENTTERMS_'' WHERE payment_id=''_PAYMENT_ID_''', '2011-01-18 21:40:47'),
(277, 'pick_payment_by_id', 'selects payment by its id', 'SELECT * FROM payments WHERE payment_id=''_ID_''', '2011-02-14 10:33:44'),
(278, 'pick_all_payments', 'selects all payments made', 'SELECT * FROM payments WHERE company_id=''_COMPANY_ID_''', '2011-01-17 23:53:59'),
(279, 'pick_payment_by_email', 'checks whether payment exists', 'SELECT * FROM payments WHERE emailaddress=''_EMAILADDRESS_''', '2011-01-18 20:32:20'),
(280, 'search_payment_table', 'searches payment table', 'SELECT * FROM payments WHERE _SEARCHFIELD_ LIKE ''%_PHRASE_%'' ORDER BY companybank DESC', '2011-01-18 21:48:35'),
(100, 'insert_temp_company', 'Insert data about a temporary company that intends to register.', 'INSERT INTO temp_company_data (firstname, lastname, companyname, useremailaddress, roles, dateofentry) VALUES (''_FIRSTNAME_'', ''_LASTNAME_'', ''_COMPANYNAME_'', ''_USEREMAILADDRESS_'', ''_ROLES_'', NOW())', '2011-01-26 19:08:01'),
(101, 'get_temp_user_by_id', 'Returns a user from the temporary company database', 'SELECT * FROM temp_company_data WHERE id = ''_USERID_''', '2011-01-26 21:12:32'),
(102, 'update_temp_user_record', 'Add the username and password for the temporary user', 'UPDATE temp_company_data SET username=''_USERNAME_'', password=''_PASSWORD_'' WHERE id=''_USERID_''', '2011-01-26 21:29:06'),
(103, 'insert_permanent_company_data', 'Insert permanent company data', 'INSERT INTO company SET companyname = ''_COMPANYNAME_'', emailaddress =''_USEREMAILADDRESS_'', administratorid =''_ID_'', lastupdatedate =NOW(), lastupdatedby =''_ID_''', '2011-01-26 21:47:57'),
(104, 'insert_permanent_user_data', 'Add a new user', 'INSERT INTO employee (username, password, firstname, lastname, companyid, emailaddress, isactive, isadmin, datecreated, lastupdatedate, usertype) VALUES (''_USERNAME_'', ''_PASSWORD_'', ''_FIRSTNAME_'', ''_LASTNAME_'', ''_COMPANYID_'', ''_USEREMAILADDRESS_'', ''Y'', ''N'', NOW(), NOW(), ''_USERTYPE_'')', '2011-01-26 21:59:41'),
(105, 'set_who_updated_user_record', 'Set who updated a user ID record', 'UPDATE employee SET createdby=''_WHO_'', lastupdatedby=''_WHO_'' WHERE id=''_USERID_''', '2011-01-26 22:04:09'),
(281, 'pick_employee_by_email', 'Pick employee based on their email address', 'SELECT * FROM employee WHERE emailaddress=''_EMAILADDRESS_''', '2011-01-30 18:44:27'),
(283, 'get_company_by_id', 'Gets the company by its ID', 'SELECT * FROM company WHERE id=''_ID_''', '2011-01-31 21:15:52'),
(284, 'pick_company_and_user_by_id', 'Returns the company and user data', 'SELECT C.*, E.firstname, E.lastname, E.companyid FROM company C LEFT JOIN employee E ON (C.administratorid=E.id) WHERE C.id=''_COMPANYID_''', '2011-02-03 18:54:01'),
(285, 'search_company_admin', 'Search through a company employees information for a new admin', 'SELECT * FROM employee WHERE _SEARCHQUERY_ companyid=''_COMPANYID_'' AND isactive=''Y''', '2011-02-03 19:18:24'),
(286, 'update_company_data', 'Update company data', 'UPDATE company SET companyname=''_COMPANYNAME_'', emailaddress=''_EMAILADDRESS_'', physicaladdress=''_PHYSICALADDRESS_'', country=''_COUNTRY_'', telephone=''_TELEPHONE_'', dateestablished=''_DATEESTABLISHED_'', administratorid=''_ADMINISTRATORID_'', logofile=''_COMPANYLOGO_'', website=''_WEBSITE_'' WHERE id=''_EDITID_''', '2011-02-04 20:23:42'),
(287, 'get_company_users', 'Gets users of a given company', 'SELECT * FROM employee WHERE companyid=''_COMPANYID_'' AND foruserdisplay=''Y'' ORDER BY lastname ASC', '2011-02-05 14:26:39'),
(288, 'get_user_rights_templates', 'Get the user rights templates', 'SELECT * FROM userrights WHERE isinternal=''_ISINTERNAL_''', '2011-02-05 11:33:40'),
(289, 'get_template_rights_by_code', 'Gets all template rights based on its code', 'SELECT * FROM userrights WHERE rightsname=''_TEMPLATECODE_''', '2011-02-05 12:43:18'),
(290, 'get_right_by_id', 'Get a user right details by ID', 'SELECT * FROM rightsdefinition WHERE id=''_ID_''', '2011-02-05 12:50:35'),
(292, 'update_user_credentials', 'Add the username and password to the users details', 'UPDATE employee SET username=''_USERNAME_'', password=''_PASSWORD_'' WHERE id=''_USERID_''', '2011-02-05 14:52:55'),
(291, 'deactivate_employee_record', 'Do not show the employee record to the user anymore', 'UPDATE employee SET isactive=''N'', foruserdisplay=''N'' WHERE id=''_ID_''', '2011-02-05 14:26:09'),
(293, 'activate_user', 'Activates a user record', 'UPDATE employee SET isactive=''Y'' WHERE id=''_ID_''', '2011-02-05 16:31:38'),
(294, 'pick_payment_by_company_id', 'Returns payment of a company using an ID', 'Select * from payments where company_id=''_COMPANYID_''', '2011-02-14 09:46:12'),
(295, 'get_payment_by_id', 'selects a payment by id', 'SELECT * FROM payments WHERE payment_id=''_ID_''', '2011-02-17 10:21:10'),
(296, 'update_payment_data', 'Updates a payment', 'UPDATE payments SET billingaddress=''_BILLINGADDRESS_'', companybank=''_COMPANYBANK_'', bankaccount=''_BANKACCOUNT_'', fname=''_FNAME_'', lname=''_LNAME_'', emailaddress=''_EMAILADDRESS_'', telephone=''_TELEPHONE_'', paymentterms=''_PAYMENTTERMS_'',cashierphoto=''_CASHIERPHOTO_'' WHERE payment_id=''_EDITID_''', '2011-02-24 16:54:30'),
(297, 'pick_drivers_by_company_id', 'picks all drivers with companyid', 'Select * from drivers where company_id=''_COMPANYID_''', '2011-02-25 09:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE IF NOT EXISTS `bids` (
  `bid_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bid_title` varchar(128) DEFAULT NULL,
  `bid_type` varchar(128) DEFAULT NULL,
  `bid_amount` int(11) DEFAULT NULL,
  `bid_issue_date` varchar(128) DEFAULT NULL,
  `bid_close_date` varchar(128) DEFAULT NULL,
  `response_status` varchar(128) DEFAULT NULL,
  `goods_category` varchar(128) DEFAULT NULL,
  `short_description` text,
  `contact_name` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `origin_city` varchar(128) DEFAULT NULL,
  `origin_is` varchar(128) DEFAULT NULL,
  `destination_city` varchar(128) DEFAULT NULL,
  `destination_is` varchar(128) DEFAULT NULL,
  `earliest_pick_time` varchar(128) DEFAULT NULL,
  `latest_pick_time` varchar(128) DEFAULT NULL,
  `earliest_delivery_time` varchar(128) DEFAULT NULL,
  `latest_delivery_time` varchar(128) DEFAULT NULL,
  `type_of_load` varchar(128) DEFAULT NULL,
  `type_of_transportation` varchar(128) DEFAULT NULL,
  `contents_type` varchar(128) DEFAULT NULL,
  `number_of_pallets` varchar(128) DEFAULT NULL,
  `are_the_pallets_stackable` varchar(128) DEFAULT NULL,
  `total_transportation_weigth` varchar(128) DEFAULT NULL,
  `dimension_of_goods` varchar(128) DEFAULT NULL,
  `comments` text,
  `kilometers` int(11) DEFAULT NULL,
  `quantity_of_loads` int(11) DEFAULT NULL,
  `additional_stops` int(11) DEFAULT NULL,
  `posted_by` varchar(128) DEFAULT NULL,
  `company_id` int(32) DEFAULT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`bid_id`, `bid_title`, `bid_type`, `bid_amount`, `bid_issue_date`, `bid_close_date`, `response_status`, `goods_category`, `short_description`, `contact_name`, `city`, `country`, `origin_city`, `origin_is`, `destination_city`, `destination_is`, `earliest_pick_time`, `latest_pick_time`, `earliest_delivery_time`, `latest_delivery_time`, `type_of_load`, `type_of_transportation`, `contents_type`, `number_of_pallets`, `are_the_pallets_stackable`, `total_transportation_weigth`, `dimension_of_goods`, `comments`, `kilometers`, `quantity_of_loads`, `additional_stops`, `posted_by`, `company_id`) VALUES
(1, 'Transportation of', 'By Truck', 2500000, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdssdsd', '', '', 'sdds', '', 'mbfbdjk', '', '', ' ', '', 0, 9000, 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bid_events`
--

CREATE TABLE IF NOT EXISTS `bid_events` (
  `event_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time_of_arrival_of_goods` date DEFAULT NULL,
  `status_of_goods_on_delivery` varchar(100) DEFAULT NULL,
  `comments_on_delivery` text,
  `cause` text,
  `person_responsible` varchar(100) DEFAULT NULL,
  `action_take_on_delivery` varchar(100) DEFAULT NULL,
  `date_posted` date DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bid_events`
--


-- --------------------------------------------------------

--
-- Table structure for table `bid_replies`
--

CREATE TABLE IF NOT EXISTS `bid_replies` (
  `reply_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(11) DEFAULT NULL,
  `brief` text,
  `reply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`reply_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bid_replies`
--

INSERT INTO `bid_replies` (`reply_id`, `amount`, `brief`, `reply_date`) VALUES
(1, 23000, 'We have alot', '2010-10-30 22:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('4b97bd1ec20e1844334f9fe083e3868a', '196.0.21.52', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv', 1297252071, 'a:17:{s:10:"page_title";s:5:"Login";s:6:"userid";s:1:"1";s:8:"password";s:5:"admin";s:8:"username";s:5:"admin";s:7:"isadmin";s:1:"Y";s:12:"emailaddress";s:21:"admin@acravonline.com";s:9:"companyid";s:1:"1";s:18:"passwordexpirydate";s:19:"0000-00-00 00:00:00";s:5:"names";s:23:"Administrator Technical";s:11:"jobcategory";s:0:"";s:11:"companyname";s:25:"New Wave Technologies Ltd";s:9:"telephone";s:11:"_TELEPHONE_";s:10:"iscomplete";s:1:"Y";s:8:"usertype";s:13:"Administrator";s:24:"local_allowed_extensions";s:15:".gif,.png,.jpeg";s:19:"local_max_file_size";s:7:"1000000";s:8:"usersave";s:177:"ERROR: The user data was not saved or may not be saved correctly. Please contact your administrator.<br>DETAILS: A similar record already exists. Please search and edit instead.";}');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(255) NOT NULL,
  `emailaddress` varchar(200) NOT NULL,
  `physicaladdress` varchar(255) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `faxnumber` varchar(255) NOT NULL,
  `logofile` varchar(500) NOT NULL,
  `website` varchar(250) NOT NULL,
  `dateestablished` date NOT NULL,
  `administratorid` varchar(100) NOT NULL,
  `lastupdatedate` datetime NOT NULL,
  `lastupdatedby` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emailaddress` (`emailaddress`),
  UNIQUE KEY `emailaddress_2` (`emailaddress`),
  UNIQUE KEY `emailaddress_3` (`emailaddress`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `companyname`, `emailaddress`, `physicaladdress`, `state`, `country`, `telephone`, `faxnumber`, `logofile`, `website`, `dateestablished`, `administratorid`, `lastupdatedate`, `lastupdatedby`) VALUES
(2, 'New Wave Technologies Ltd2', 'admin@nwtuganda.co.ug', 'Plot 30 Jinja Rd. 2nd Floor, Conrad Hse.', '', 'Uganda', '0784000808', '041490023423', '', '', '2002-06-20', '1', '2010-12-27 18:48:19', '1'),
(1, 'Mega Transporters', 'azziwa@gmail.com', 'Plot 51 Kayunga Road\nMukono Town', '', 'Uganda', '0772345234', '', 'companylogo_4.gif', 'www.megatrans.com', '1986-03-27', '16', '2011-01-30 16:42:55', '16'),
(8, 'newwave', 'jjyusuf@gmail.com', 'fdfd      ', '_STATE_', '_COUNTRY_', '0782060209', '_FAXNUMBER_', '', '', '0000-00-00', '51', '2011-11-14 20:48:30', '51');

-- --------------------------------------------------------

--
-- Table structure for table `containers`
--

CREATE TABLE IF NOT EXISTS `containers` (
  `container_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) DEFAULT NULL,
  `cargotype` text,
  `description` text,
  `instructions` text,
  `originaddress` text,
  `destinationaddress` text,
  `origincountry` varchar(32) DEFAULT NULL,
  `destinationcountry` varchar(32) DEFAULT NULL,
  `cargoweight` int(32) DEFAULT NULL,
  `cargolength` int(32) DEFAULT NULL,
  `cargowidth` int(32) DEFAULT NULL,
  `cargoheight` int(32) NOT NULL,
  `containernumber` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`container_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `containers`
--

INSERT INTO `containers` (`container_id`, `company_id`, `cargotype`, `description`, `instructions`, `originaddress`, `destinationaddress`, `origincountry`, `destinationcountry`, `cargoweight`, `cargolength`, `cargowidth`, `cargoheight`, `containernumber`) VALUES
(1, 1, ',,,', 'Textile Material', 'this', 'from mbarar to mbale then past the ea africna community via kilekka to ', 'burui', 'Zambia', 'Togo', 55, 44, 54, 10, 'YT0989472'),
(2, 52, '_CARGOTYPE_', 'Plastic material', 'Handle with care includes glasses', 'Kongop', 'cairo', 'Burundi', 'Egypt', 55, 44, 54, 0, 'YT098947'),
(5, 52, '_CARGOTYPE_', 'Shirts and trousers', 'ples', 'kampala', 'jinja', 'Uganda', 'Uganda', 2, 14, 67, 0, 'YT000545'),
(6, 5, '_CARGOTYPE_', 'Flowers and glass', 'help', 'kampala', 'jinja', 'Uganda', 'Uganda', 90, 76, 31, 0, 'YT09844'),
(7, 52, '_CARGOTYPE_', '5t45', 'ert', 'er', 're', 'Zambia', 'Zambia', 4, 40, 4, 0, 'YT09894'),
(8, 1, 'Refrigerated cargo,,,None', 'sfsf', 'sdfsdf', 'dfd', 'fsfsdf', 'Togo', 'Libya', 23, 33, 56, 60, 'YT0989900'),
(9, 1, ',,,', 'edre', 'ertrterter', 'erter', 'tertertr', 'Malawi', 'Zambia', 1, 1, 1, 0, 'YT000097878787'),
(10, 1, ',,,', 'sdfsdf', 'dsdfsd', 'fsdfsd', 'fsdfdsf', 'Rwanda', 'Tanzania', 2, 2, 25, 20, 'YT3434343434');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE IF NOT EXISTS `drivers` (
  `driver_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) DEFAULT NULL,
  `fname` varchar(32) DEFAULT NULL,
  `lname` varchar(32) DEFAULT NULL,
  `image` varchar(32) NOT NULL,
  `truck_id` bigint(20) DEFAULT NULL,
  `dateofbirth` date NOT NULL,
  `telephone1` varchar(32) DEFAULT NULL,
  `telephone2` varchar(32) DEFAULT NULL,
  `experiance` text,
  `actingas` varchar(32) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`driver_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `company_id`, `fname`, `lname`, `image`, `truck_id`, `dateofbirth`, `telephone1`, `telephone2`, `experiance`, `actingas`, `datecreated`) VALUES
(1, 1, 'david', 'buwembo', '', 1, '2011-03-03', '0784260362', '0784260362', '2 years and counting', 'Driver', '2011-03-01 08:39:40'),
(2, 1, 'sam', 'mumbere', '', 0, '1986-02-14', '078426036', '07483647', 'He is expericed and able to travel ', 'Turnboy', '2011-02-28 14:45:00'),
(5, 1, 'Yusuf', 'yopad', '_IMAGE_', 0, '1981-04-16', '07483647', '07483647', 'he is', 'Driver', '2011-02-28 10:22:51'),
(6, 1, 'david2', 'buwembo', '_IMAGE_', 0, '2011-04-30', '784260362', '784260362', '2 years and counting', 'Driver', '2011-02-28 14:28:54'),
(7, 1, 'david', 'buwembo3', '_IMAGE_', 0, '1984-06-16', '0784260362', '784260362', '2 years and counting', 'Driver', '2011-02-28 10:23:04'),
(8, 1, 'david3', 'buwembo', '_IMAGE_', 0, '1970-07-27', '0784260362', '0784260362', '2 years and counting', 'Driver', '2011-02-28 14:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `salutation` varchar(25) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `companyid` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `isactive` enum('Y','N') NOT NULL DEFAULT 'Y',
  `isadmin` enum('Y','N') NOT NULL DEFAULT 'N',
  `telephone` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `hireddate` date NOT NULL,
  `assignedtruckid` varchar(20) NOT NULL,
  `createdby` int(11) NOT NULL,
  `datecreated` datetime NOT NULL,
  `lastupdatedby` int(11) NOT NULL,
  `lastupdatedate` datetime NOT NULL,
  `securityquestion` varchar(512) NOT NULL,
  `answer` varchar(512) NOT NULL,
  `passwordexpirydate` datetime NOT NULL,
  `employeetype` varchar(32) DEFAULT NULL,
  `stateorprovince` varchar(32) DEFAULT NULL,
  `usertype` varchar(32) DEFAULT NULL,
  `shortconame` varchar(100) NOT NULL,
  `iscomplete` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`),
  UNIQUE KEY `emailaddress` (`emailaddress`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `salutation`, `username`, `password`, `firstname`, `middlename`, `lastname`, `gender`, `jobtitle`, `companyid`, `emailaddress`, `isactive`, `isadmin`, `telephone`, `birthdate`, `hireddate`, `assignedtruckid`, `createdby`, `datecreated`, `lastupdatedby`, `lastupdatedate`, `securityquestion`, `answer`, `passwordexpirydate`, `employeetype`, `stateorprovince`, `usertype`, `shortconame`, `iscomplete`) VALUES
(1, 'Mr.', 'admin', 'a1058ebf894c244b4424a21185351189', 'Administrator', '', 'Technical', 'Male', 'Administrator', '1', 'admin@acravonline.com', 'Y', 'Y', '_TELEPHONE_', '0000-00-00', '0000-00-00', '', 1, '2010-12-16 16:45:33', 1, '2011-01-04 14:41:58', '3', 'Red', '0000-00-00 00:00:00', 'Contractor', 'Texas', 'Power', '', 'Y'),
(2, 'Mr.', 'AC003', '172522ec1028ab781d9dfd17eaca4427', 'Al', '', 'Zziwa', 'Male', 'Developer', '_COMPANYID_', '', 'Y', 'Y', '_TELEPHONE_', '0000-00-00', '0000-00-00', '', 2, '2010-12-25 21:32:14', 2, '2011-01-04 09:13:43', '4', 'Chico', '0000-00-00 00:00:00', '', '', 'Power', '', 'Y'),
(3, '', 'technician', 'cb101192dff2cc1ddd0272f73de307c89bebc181', 'ash', 'ashboy', 'aluwambo', 'Male', 'Developer', '_COMPANYID_', 'ash@gmail.com', 'Y', 'N', '_TELEPHONE_', '0000-00-00', '0000-00-00', '', 0, '2011-01-03 16:27:41', 1, '2011-01-04 10:32:01', '', '', '0000-00-00 00:00:00', 'Contractor', 'West Virginia', 'Power', '', 'N'),
(4, 'Mr.', 'technician', '', 'dave', 'david', 'Buwembo', 'Male', 'technician', '_COMPANYID_', 'buwian12@yahoo.com', 'Y', 'Y', '_TELEPHONE_', '0000-00-00', '0000-00-00', '', 0, '2011-01-03 16:53:24', 1, '2011-01-04 10:32:31', '', '', '0000-00-00 00:00:00', 'Full Time', 'Kansas', 'Power', '', 'N'),
(5, 'Mr.', 'advisor', 'f16bed56189e249fe4ca8ed10a1ecae60e8ceac0', 'sam', 'kawoya', 'mumbere', 'Female', 'Supervisor', '_COMPANYID_', 'sam@yahoo.com', 'N', 'N', '_TELEPHONE_', '0000-00-00', '0000-00-00', '', 0, '2011-01-04 08:14:59', 1, '2011-01-04 10:31:36', '', '', '0000-00-00 00:00:00', 'Hourly', 'Iowa', 'Normal', '', 'N'),
(8, '', 'david', 'fac69589c590f7350067075120e86d4a', 'david', '', 'buwembo', 'Male', '', '2', 'Buwian12@gmail.com', 'Y', 'Y', '', '0000-00-00', '0000-00-00', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', NULL, NULL, NULL, '', 'Y'),
(16, 'Mr.', 'AC14084514', '7c222fb2927d828af22f592134e8932480637c0d', 'Al', '', 'Zziwa', 'Male', 'Techie', '4', 'azziwa@gmail.com', 'Y', 'N', '07872344234', '0000-00-00', '0000-00-00', '', 16, '2011-01-30 16:42:55', 16, '2011-01-31 22:13:28', '1', 'red', '0000-00-00 00:00:00', '', 'Uganda', 'company_admin', 'ADA', 'N'),
(18, '', 'AC11234051', 'a1058ebf894c244b4424a21185351189', 'opad', '', 'yusf', 'Male', '', '8', 'jjyusuf@gmail.com', 'Y', 'N', '', '0000-00-00', '0000-00-00', '', 18, '2011-11-14 20:48:30', 18, '2011-11-14 20:48:30', '', '', '0000-00-00 00:00:00', NULL, NULL, 'company_administrator', '', 'N'),
(19, 'Mr.', '', '', 'opad', '', 'Mophius', '', '', '_COMPANYID_', 'yusuf@lyteweb.com', 'Y', 'N', '', '0000-00-00', '0000-00-00', '', 0, '2011-11-15 09:08:13', 0, '2011-11-15 09:08:13', '', '', '0000-00-00 00:00:00', NULL, 'Northern Mariana Islands', 'Normal', '_SHORTCONAME_', 'N'),
(20, 'Mr.', '', '', 'kenzo', '', 'musician', '', '', '8', 'jjyusuf2002@gmail.com', 'Y', 'N', '', '0000-00-00', '0000-00-00', '', 0, '2011-11-15 09:40:01', 0, '2011-11-15 09:40:01', '', '', '0000-00-00 00:00:00', NULL, 'Iowa', 'Normal', '_SHORTCONAME_', 'N'),
(21, 'Ms.', 'qery', 'a1058ebf894c244b4424a21185351189', 'rer', 'rere', 'erer', '', '', '8', 'tyrohansen@yahoo.com', 'Y', 'N', '', '0000-00-00', '0000-00-00', '', 0, '2011-11-15 10:04:55', 0, '2011-11-15 10:04:55', '', '', '0000-00-00 00:00:00', NULL, '', 'Normal', '_SHORTCONAME_', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `jobcategories`
--

CREATE TABLE IF NOT EXISTS `jobcategories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `jobtitle` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `jobcategories`
--

INSERT INTO `jobcategories` (`id`, `jobtitle`) VALUES
(1, 'Technician'),
(2, 'Skilled'),
(3, 'Manager'),
(6, 'Technician'),
(9, 'Skilled'),
(10, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pagetile` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `page`
--


-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) DEFAULT NULL,
  `billingaddress` varchar(32) DEFAULT NULL,
  `companybank` varchar(32) DEFAULT NULL,
  `bankaccount` varchar(32) DEFAULT NULL,
  `cashierphoto` varchar(32) NOT NULL,
  `fname` varchar(32) DEFAULT NULL,
  `lname` varchar(32) DEFAULT NULL,
  `emailaddress` varchar(32) DEFAULT NULL,
  `telephone` varchar(32) DEFAULT NULL,
  `paymentterms` text,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `company_id`, `billingaddress`, `companybank`, `bankaccount`, `cashierphoto`, `fname`, `lname`, `emailaddress`, `telephone`, `paymentterms`, `datecreated`) VALUES
(1, 1, 'Jinja', 'Barclays', '23344556', '_CASHIERPHOTO_', 'david', 'buwembo', 'Buwian12@gmail.com', '0704475878', 'please', '2011-02-28 11:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `rightsdefinition`
--

CREATE TABLE IF NOT EXISTS `rightsdefinition` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `definition` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `rightsdefinition`
--

INSERT INTO `rightsdefinition` (`id`, `definition`) VALUES
(1, 'Can submit bids '),
(2, 'Can edit trucks '),
(3, 'Can add trucks '),
(4, 'Can add cargo '),
(5, 'Can edit cargo '),
(6, 'Can add driver information '),
(7, 'Can edit driver information '),
(8, 'Can track cargo'),
(9, 'Can delete cargo'),
(10, 'Can delete trucks'),
(11, 'Can choose bid winner'),
(12, 'Can invite bids'),
(13, 'Can view bid winner'),
(14, 'Can add payment settings'),
(15, 'Can view payment settings'),
(16, 'Can update payment settings');

-- --------------------------------------------------------

--
-- Table structure for table `securityquestions`
--

CREATE TABLE IF NOT EXISTS `securityquestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `securityquestions`
--

INSERT INTO `securityquestions` (`id`, `question`) VALUES
(1, 'What is your favorite color?'),
(2, 'In which town were you born?'),
(3, 'What is your mother''s maiden name?'),
(4, 'What is your best friend''s name?'),
(5, 'What was the name of your first pet?');

-- --------------------------------------------------------

--
-- Table structure for table `temp_company_data`
--

CREATE TABLE IF NOT EXISTS `temp_company_data` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `companyname` varchar(300) NOT NULL,
  `useremailaddress` varchar(200) NOT NULL,
  `roles` varchar(200) NOT NULL,
  `dateofentry` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `temp_company_data`
--

INSERT INTO `temp_company_data` (`id`, `firstname`, `lastname`, `username`, `password`, `companyname`, `useremailaddress`, `roles`, `dateofentry`) VALUES
(15, 'Buwembo', 'David ', 'AC8564015', '201140', 'SMK', 'buwian12@gmail.com', 'Bid for work', '2011-02-01 08:56:40'),
(14, 'Al', 'Zziwa', 'AC14084514', '201145', 'Mega Transporters', 'azziwa@gmail.com', 'Bid for work,Submit work for sub-contractors', '2011-01-30 14:08:45'),
(56, 'opad', 'Mophius', 'AC6025956', '201159', 'New wave', 'yopad@newwavetech.co.ug', 'Bid for work', '2011-11-15 09:02:59'),
(55, 'opad', 'Mophius', 'AC6012455', '201124', 'New wave', 'yopad@newwavetech.co.ug', 'Bid for work', '2011-11-15 09:01:24'),
(54, 'opad', 'Mophius', 'AC5583354', '201133', 'New wave', 'yopad@newwavetech.co.ug', 'Bid for work', '2011-11-15 08:58:33'),
(53, 'opad', 'Mophius', 'AC5553753', '201137', 'New wave', 'yopad@newwavetech.co.ug', 'Bid for work,Submit work for sub-contractors', '2011-11-15 08:55:37'),
(52, 'Neo', 'Mophius', 'AC5550252', '201102', 'New wave', 'yopad@gmail.com', 'Bid for work,Submit work for sub-contractors', '2011-11-15 08:55:02'),
(51, 'opad', 'yusf', 'AC11234051', '201140', 'newwave', 'jjyusuf@gmail.com', 'Bid for work,Submit work for sub-contractors', '2011-11-14 14:23:40'),
(50, 'opad', 'yusf', 'AC11233050', '201130', 'newwave', 'jjyusuf@gmail.com', 'Bid for work,Submit work for sub-contractors', '2011-11-14 14:23:30'),
(49, 'opad', 'yusf', 'AC11214649', '201146', 'newwave', 'jjyusuf@gmail.com', 'Bid for work,Submit work for sub-contractors', '2011-11-14 14:21:46'),
(48, 'opad', 'yusf', 'AC11204848', '201148', 'newwave', 'jjyusuf@gmail.com', 'Bid for work,Submit work for sub-contractors', '2011-11-14 14:20:48'),
(47, 'opad', 'yusf', 'AC11200547', '201105', 'newwave', 'jjyusuf@gmail.com', 'Bid for work,Submit work for sub-contractors', '2011-11-14 14:20:05'),
(46, 'opad', 'yusf', 'AC11180146', '201101', 'newwave', 'jjyusuf@gmail.com', 'Bid for work,Submit work for sub-contractors', '2011-11-14 14:18:01'),
(45, 'opad', 'yusf', 'AC11143545', '201135', 'newwave', 'jjyusuf@gmail.com', 'Bid for work,Submit work for sub-contractors', '2011-11-14 14:14:35'),
(44, 'opad', 'yusf', 'AC11132844', '201128', 'newwave', 'jjyusuf@gmail.com', 'Bid for work,Submit work for sub-contractors', '2011-11-14 14:13:28'),
(43, 'opad', 'yusf', 'AC11130643', '201106', 'newwave', 'jjyusuf@gmail.com', 'Bid for work,Submit work for sub-contractors', '2011-11-14 14:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE IF NOT EXISTS `trucks` (
  `truck_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `regnumber` varchar(32) DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `enginenumber` varchar(255) DEFAULT NULL,
  `datebought` date DEFAULT NULL,
  `allowedcargo` text,
  `description` text,
  `systemstatus` varchar(32) DEFAULT NULL,
  `cargoweight` int(32) DEFAULT NULL,
  `cargolength` int(32) DEFAULT NULL,
  `cargowidth` int(32) DEFAULT NULL,
  `cargoheight` int(32) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`truck_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`truck_id`, `regnumber`, `company_id`, `enginenumber`, `datebought`, `allowedcargo`, `description`, `systemstatus`, `cargoweight`, `cargolength`, `cargowidth`, `cargoheight`, `datecreated`) VALUES
(1, 'UAA 890', 1, '778883', '2011-01-01', 'Refrigerated cargo,Fragile cargo,Wide cargo,N/A', 'this', 'Active', 35, 33, 10, 70, '2011-02-28 15:48:57'),
(2, 'UAB 256', 52, '22311', '0000-00-00', '_ALLOWEDCARGO_', 'This hopes', 'Inactive', 34, 21, 25, 20, '2011-01-31 16:18:12'),
(6, 'VUWEE 5677', 1, '6767676', '1995-09-17', ',,,', '56565', 'Active', 7, 76, 54, 40, '2011-02-28 12:34:58'),
(7, 'dfdfd', 1, 'fdfg', '1995-01-18', 'Refrigerated cargo,,,', 'sssdfd', 'Inactive', 66, 6, 66, 6, '2011-02-28 16:36:19'),
(8, 'uad 789 d', 8, '445563345', '1994-02-17', '_ALLOWEDCARGO_', 'this sis a good car. very expensive.', 'Active', 0, 0, 0, 0, '2011-11-15 10:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `userrights`
--

CREATE TABLE IF NOT EXISTS `userrights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rightsname` varchar(250) NOT NULL,
  `displayname` varchar(250) NOT NULL,
  `rightsids` text NOT NULL,
  `isinternal` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`),
  UNIQUE KEY `rightsname` (`rightsname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `userrights`
--

INSERT INTO `userrights` (`id`, `rightsname`, `displayname`, `rightsids`, `isinternal`) VALUES
(1, 'company_administrator', 'Company Administrator', '1,2,3,4,5,6,7,8,11,12,15', 'N'),
(2, 'data_entry', 'Data Entry', '1,3,4,5,6,7,8,9', 'N'),
(3, 'acrav_data_entry', 'ACRAV Data Entry', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(32) DEFAULT NULL,
  `lname` varchar(32) DEFAULT NULL,
  `telephone` varchar(32) DEFAULT NULL,
  `emailaddress` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(32) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `company_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `telephone`, `emailaddress`, `password`, `gender`, `datecreated`, `company_id`) VALUES
(1, 'buwembo', 'david', '0704475878', 'Buwian12@gmail.com', '', 'Male', '2011-01-22 22:36:59', 52),
(2, 'Aloysious', 'Zziwa', '0704475878', 'Alzziwa@yahoo.com', '', 'Male', '2011-01-22 22:38:28', 52),
(3, 'Ash', 'Aluwambo', '0704475878', 'Ash@gmail.com', '', 'Male', '2011-01-22 22:38:34', 52),
(7, 'sam', 'Mumbere', '0704475878', 'Sam@newwave.com', '', 'Female', '2011-01-22 22:38:42', 52),
(8, 'Yusuf', 'Opad', '0774260362', 'Opad@newwave.co.ug', 'a1058ebf894c244b4424a21185351189', 'Male', '2011-11-11 08:35:06', 52);

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

CREATE TABLE IF NOT EXISTS `user_rights` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `rights` varchar(32) DEFAULT NULL,
  `submitbids` enum('Y','N') DEFAULT 'N',
  `addedit_truck` enum('Y','N') DEFAULT 'N',
  `addedit_cargo` enum('Y','N') DEFAULT 'N',
  `addedit_driver` enum('Y','N') DEFAULT 'N',
  `track_cargo` enum('Y','N') DEFAULT 'N',
  `delete_trucks` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_rights`
--

