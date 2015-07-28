-- MySQL dump 10.11
--
-- Host: db2689.perfora.net    Database: db346561779
-- ------------------------------------------------------
-- Server version	5.0.91-log

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
-- Table structure for table `acravhelp`
--

DROP TABLE IF EXISTS `acravhelp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acravhelp` (
  `id` int(11) NOT NULL auto_increment,
  `page` varchar(30) NOT NULL,
  `topic` varchar(300) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acravhelp`
--

LOCK TABLES `acravhelp` WRITE;
/*!40000 ALTER TABLE `acravhelp` DISABLE KEYS */;
INSERT INTO `acravhelp` VALUES (1,'Page 1','LOG IN','Acrav is a business Software application for bidding,and tracking cargo.  To log in enter your username and password else click on forgot password to receive a new password on your email.');
INSERT INTO `acravhelp` VALUES (3,'Page 3','Help Topic 3','Details topic 3');
/*!40000 ALTER TABLE `acravhelp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appqueries`
--

DROP TABLE IF EXISTS `appqueries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appqueries` (
  `id` bigint(20) NOT NULL auto_increment,
  `querycode` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `query` text NOT NULL,
  `dateentered` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `querycode` (`querycode`)
) ENGINE=MyISAM AUTO_INCREMENT=298 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appqueries`
--

LOCK TABLES `appqueries` WRITE;
/*!40000 ALTER TABLE `appqueries` DISABLE KEYS */;
INSERT INTO `appqueries` VALUES (1,'user_login','Picks an active user\'s details who matches the pair _USERNAME_ and _PASSWORD_','SELECT *,(TO_DAYS(passwordexpirydate)-TO_DAYS(CURRENT_DATE)) AS timeleft FROM employee WHERE username=\'_USERNAME_\' AND password = \'_PASSWORD_\' AND isactive = \'Y\'','2010-10-19 13:13:13');
INSERT INTO `appqueries` VALUES (220,'pick_company_by_id','Selects a company based on its id','SELECT * FROM company WHERE company_id=\'_COMPANYID_\'','2011-01-06 10:20:47');
INSERT INTO `appqueries` VALUES (221,'pick_employee_by_id','Selects the employee by the given ID','SELECT * FROM employee WHERE id=\'_ID_\'','2011-01-03 16:14:10');
INSERT INTO `appqueries` VALUES (222,'double_check_employee','Checks whether a similar employee was submitted','SELECT * FROM employee WHERE username=\'_USERNAME_\' OR (firstname=\'_FIRSTNAME_\' AND middlename=\'_MIDDLENAME_\' AND lastname=\'_LASTNAME_\') OR emailaddress=\'_EMAILADDRESS_\'','2010-12-27 22:00:13');
INSERT INTO `appqueries` VALUES (223,'pick_all_employees','Picks all active employees from the employee list','ELECT *, CONCAT(salutation, \' \', firstname, \' \', middlename, \' \', lastname) AS name FROM employee WHERE username != \'admin\' AND isactive=\'Y\' ORDER BY username, firstname, middlename, lastname ASC','2010-12-28 12:28:13');
INSERT INTO `appqueries` VALUES (224,'delete_employee_record','Deletes an employee record from the database','DELETE FROM employee WHERE id = \'_ID_\'','2010-12-27 22:02:39');
INSERT INTO `appqueries` VALUES (225,'update_employee_record','Updates the employee information in the database','UPDATE employee SET password=\'_PASSWORD_\', salutation=\'_SALUTATION_\', firstname=\'_FIRSTNAME_\', middlename=\'_MIDDLENAME_\', lastname=\'_LASTNAME_\', gender=\'_GENDER_\', jobtitle=\'_JOBTITLE_\', shortconame=\'_SHORTCONAME_\', companyid=\'_COMPANYID_\', emailaddress=\'_EMAILADDRESS_\', isactive=\'_ISACTIVE_\', isadmin=\'_ISADMIN_\', \nusertype=\'_USERTYPE_\', telephone=\'_TELEPHONE_\', \nstateorprovince=\'_STATEORPROVINCE_\', lastupdatedby=\'_USERID_\', lastupdatedate=NOW(), \nsecurityquestion=\'_SECURITYQUESTION_\', answer=\'_ANSWER_\', passwordexpirydate=\'_PASSWORDEXPIRYDATE_\' WHERE id=\'_ID_\'','2011-02-05 14:07:43');
INSERT INTO `appqueries` VALUES (282,'get_all_security_qns','Get all security questions','SELECT * FROM securityquestions ORDER BY question','2011-01-31 20:47:17');
INSERT INTO `appqueries` VALUES (25,'pick_all_queries','Returns all queries used in the system','SELECT * FROM appqueries ORDER BY dateentered DESC','2010-11-11 21:08:30');
INSERT INTO `appqueries` VALUES (26,'pick_query_by_id','Select a query from the database based on its ID','SELECT * FROM appqueries WHERE id=\'_ID_\'','2011-01-03 12:46:16');
INSERT INTO `appqueries` VALUES (27,'update_db_query','Updates the system query in the database','UPDATE appqueries SET description=\'_DESCRIPTION_\', query=\'_QUERY_\', dateentered=NOW() WHERE querycode=\'_QUERYCODE_\'','2010-11-12 09:34:54');
INSERT INTO `appqueries` VALUES (28,'insert_db_query','Inserts a new database query into the database','INSERT INTO appqueries (querycode, description, query, dateentered) VALUES (\'_QUERYCODE_\', \'_DESCRIPTION_\', \'_QUERY_\', NOW())','2010-11-02 17:35:03');
INSERT INTO `appqueries` VALUES (30,'delete_db_query','Deletes a database query based on passed ID','DELETE FROM appqueries WHERE id=\'_ID_\'','2010-11-02 18:16:32');
INSERT INTO `appqueries` VALUES (47,'pick_query_by_code','Returns a query given its code','SELECT * FROM appqueries WHERE querycode = \'_QUERYCODE_\'','2010-11-08 12:20:46');
INSERT INTO `appqueries` VALUES (61,'search_employee_table','Searches the employee table where the search field has portions similar to the passed phrase.','SELECT *, CONCAT(salutation, \' \', firstname, \' \', middlename, \' \', lastname) AS name FROM employee WHERE username != \'administrator\' AND _SEARCHFIELD_ LIKE \'%_PHRASE_%\' ORDER BY username, firstname, middlename, lastname ASC','2011-01-04 09:35:00');
INSERT INTO `appqueries` VALUES (63,'pick_all_jobcategories','Returns all job categories from the job categories DB table','SELECT * FROM jobcategories','2010-11-11 19:14:54');
INSERT INTO `appqueries` VALUES (66,'insert_employee_record','Inserts a new record into the employee database table.','INSERT INTO employee (salutation, firstname, middlename, lastname, gender, usertype, isadmin, isactive, companyid, shortconame, jobtitle, stateorprovince, emailaddress, datecreated, createdby, lastupdatedby, lastupdatedate, passwordexpirydate) VALUES (\'_SALUTATION_\', \'_FIRSTNAME_\', \'_MIDDLENAME_\', \'_LASTNAME_\', \'_GENDER_\', \'_USERTYPE_\', \'_ISADMIN_\', \'_ISACTIVE_\', \'_COMPANYID_\', \'_SHORTCONAME_\', \'_JOBTITLE_\', \'_STATEORPROVINCE_\', \'_EMAILADDRESS_\', NOW(), \'_USERID_\', \'_USERID_\', NOW(), \'_PASSWORDEXPIRYDATE_\')','2011-02-05 16:27:05');
INSERT INTO `appqueries` VALUES (71,'search_query_table','Searches all queries for the given field.','SELECT * FROM appqueries WHERE _SEARCHFIELD_ LIKE \'%_PHRASE_%\' ORDER BY dateentered DESC','2010-11-12 13:30:51');
INSERT INTO `appqueries` VALUES (91,'pick_all_help_topics','Returns all help topics from the database.','SELECT * FROM acravhelp ORDER BY page, topic ASC','2011-01-04 11:33:49');
INSERT INTO `appqueries` VALUES (92,'search_help_table','Searches the help table based on the search field provided','SELECT * FROM acravhelp WHERE _SEARCHFIELD_ LIKE \'%_PHRASE_%\' ORDER BY page, topic ASC','2011-01-04 14:05:52');
INSERT INTO `appqueries` VALUES (93,'pick_help_topic_by_id','Returns a help topic by the given ID','SELECT * FROM acravhelp WHERE id=\'_ID_\'','2011-01-04 14:06:40');
INSERT INTO `appqueries` VALUES (94,'pick_all_help_pages','Returns all pages that an administrator can assign help to.','SELECT DISTINCT(page) FROM acravhelp ORDER BY page ASC','2011-01-04 14:06:59');
INSERT INTO `appqueries` VALUES (95,'pick_help_by_page_and_topic','Returns help with the given topic and page','SELECT * FROM acravhelp WHERE page=\'_PAGE_\' AND topic=\'_TOPIC_\'','2011-01-04 14:07:19');
INSERT INTO `appqueries` VALUES (96,'delete_nhsn_help','Deletes a help topic with a given id from the database','DELETE FROM acravhelp WHERE id=\'_ID_\'','2011-01-04 14:07:37');
INSERT INTO `appqueries` VALUES (97,'update_nhsn_help','Updates NHSN help data of a record given its id','UPDATE acravhelp SET page=\'_PAGE_\', topic=\'_TOPIC_\', content=\'_CONTENT_\' WHERE id=\'_ID_\'','2011-01-04 14:08:02');
INSERT INTO `appqueries` VALUES (98,'insert_nhsn_help','Insert into the help table a new help record','INSERT INTO acravhelp (page, topic, content) VALUES (\'_PAGE_\', \'_TOPIC_\', \'_CONTENT_\')','2011-01-04 12:46:15');
INSERT INTO `appqueries` VALUES (99,'search_all_help','Searches the help topic by any of the fields provided','SELECT * FROM acravhelp WHERE page LIKE \'%_PAGE_%\' AND topic LIKE \'%_TOPIC_%\' AND content LIKE \'%_CONTENT_%\'','2011-01-04 14:06:14');
INSERT INTO `appqueries` VALUES (227,'pick_employees','picks all employess','select * from employee','2011-01-03 14:49:25');
INSERT INTO `appqueries` VALUES (229,'search_jobcategory_table','searches for the jabcategories','SELECT * FROM jobcategories WHERE _SEARCHFIELD_ LIKE \'%_PHRASE_%\' ORDER BY jobtitle ASC','2011-01-06 15:14:56');
INSERT INTO `appqueries` VALUES (230,'pick_jobcategory_by_id','picks jobcategory by Id','SELECT * FROM jobcategories WHERE id=\'_ID_\'','2011-01-05 12:54:33');
INSERT INTO `appqueries` VALUES (231,'pick_jobcategory_tittle','Returns jobcategory by jobtitle','SELECT * FROM jobcategories WHERE jobtitle=\'_JOBTITLE_\'','2011-01-05 14:02:23');
INSERT INTO `appqueries` VALUES (232,'delete_jobcategory','deletes job category by ID','DELETE FROM jobcategories WHERE id=\'_ID_\'','2011-01-05 14:10:28');
INSERT INTO `appqueries` VALUES (233,'update_jobcategory','updates selected jobcategory','UPDATE jobcategories SET jobtitle=\'_JOBTITLE_\' WHERE id=\'_ID_\'','2011-01-05 15:09:19');
INSERT INTO `appqueries` VALUES (234,'insert_jobcategory','inserts jobcategories into database','INSERT INTO jobcategories (jobtitle) VALUES (\'_JOBTITLE_\')','2011-01-05 14:22:49');
INSERT INTO `appqueries` VALUES (235,'pick_company_info','Returns company details','select * from company','2011-01-06 09:34:23');
INSERT INTO `appqueries` VALUES (236,'pick_company_by_email','returns company by email','SELECT * FROM company WHERE emailaddress = \'_EMAILADDRESS_\'','2011-01-06 10:46:53');
INSERT INTO `appqueries` VALUES (237,'delete_company','delete company details by id','DELETE FROM COMPANY WHERE company_id=\'_COMPANY_ID_\'','2011-01-06 10:57:29');
INSERT INTO `appqueries` VALUES (238,'update_company','updates company details','UPDATE company SET companyname=\'_COMPANYNAME_\', emailaddress=\'_EMAILADDRESS_\', physicaladdress=\'_PHYSICALADDRESS_\',state=\'_STATE_\', country=\'_COUNTRY_\',telephone=\'_TELEPHONE_\', faxnumber=\'_FAXNUMBER_\' WHERE company_id=\'_COMPANY_ID_\'','2011-01-06 11:05:17');
INSERT INTO `appqueries` VALUES (239,'insert_company_info','store company details','INSERT INTO company (companyname,emailaddress,physicaladdress,state,role,country,telephone,faxnumber,dateestablished) VALUES (\'_COMPANYNAME_\',\'_EMAILADDRESS_\',\'_PHYSICALADDRESS_\',\'_STATE_\',\'_ROLE_\',\'_COUNTRY_\',\'_TELEPHONE_\',\'_FAXNUMBER_\',\'_.startday.-.startmonth.-.startyear._\')','2011-01-12 00:52:10');
INSERT INTO `appqueries` VALUES (240,'pick_all_users','selects all users','SELECT * FROM users WHERE company_id=\'_COMPANY_ID_\'','2011-01-16 20:56:42');
INSERT INTO `appqueries` VALUES (241,'pick_user_by_id','selects user by id','SELECT * FROM users WHERE user_id = \'_USER_ID_\'','2011-01-16 21:02:25');
INSERT INTO `appqueries` VALUES (242,'pick_user_by_email','selects user by email address','SELECT * FROM users WHERE emailaddress =\'_EMAILADDRESS_\'','2011-01-16 21:00:29');
INSERT INTO `appqueries` VALUES (243,'Update_user','updates a user in DB','UPDATE users SET fname=\'_FNAME_\',lname=\'_LNAME_\',telephone=\'_TELEPHONE_\',emailaddress=\'_EMAILADDRESS_\',gender=\'_GENDER_\' WHERE user_id=\'_USER_ID_\'','2011-01-18 08:54:02');
INSERT INTO `appqueries` VALUES (244,'delete_user','Deletes a user from data base','DELETE FROM users WHERE user_id=\'_USER_ID_\'','2011-01-16 20:59:51');
INSERT INTO `appqueries` VALUES (245,'insert_user','stores user in the data base','INSERT INTO users (fname,lname,emailaddress,telephone,gender,company_id) VALUES(\'_FNAME_\',\'_LNAME_\',\'_EMAILADDRESS_\',\'_TELEPHONE_\',\'_GENDER_\',\'_COMPANYID_\')','2011-01-16 20:58:01');
INSERT INTO `appqueries` VALUES (246,'search_user_table','searches entire user table','SELECT * FROM users WHERE _SEARCHFIELD_ LIKE \'%_PHRASE_%\' ORDER BY fname DESC','2011-01-07 11:06:16');
INSERT INTO `appqueries` VALUES (247,'pick_all_trucks','picks all trucks','SELECT * FROM trucks WHERE company_id=\'_COMPANY_ID_\'','2011-01-14 04:45:22');
INSERT INTO `appqueries` VALUES (248,'pick_truck_by_id','picks a truck by is id','SELECT * FROM trucks WHERE truck_id = \'_TRUCK_ID_\'','2011-01-16 20:59:18');
INSERT INTO `appqueries` VALUES (249,'pick_truck_by_regno','Selects a truck by its registration number','SELECT * FROM trucks WHERE regnumber = \'_REGNUMBER_\'','2011-01-16 20:58:48');
INSERT INTO `appqueries` VALUES (250,'delete_truck','Deletes a truck by its id','DELETE FROM trucks WHERE truck_id = \'_TRUCK_ID_\'','2011-01-16 20:58:28');
INSERT INTO `appqueries` VALUES (251,'update_truck','Updates a selected truck','UPDATE trucks SET regnumber=\'_REGNUMBER_\',enginenumber=\'_ENGINENUMBER_\',description=\'_DESCRIPTION_\',systemstatus=\'_SYSTEMSTATUS_\',datebought=\'_DATEBOUGHT_\',cargoweight=\'_CARGOWEIGHT_\',cargolength=\'_CARGOLENGTH_\',cargowidth=\'_CARGOWIDTH_\',allowedcargo=\'_ALLOWEDCARGO_\',cargoheight=\'_CARGOHEIGHT_\' WHERE TRUCK_ID=\'_TRUCK_ID_\'','2011-02-28 12:34:49');
INSERT INTO `appqueries` VALUES (252,'insert_truck','Stores all truck data in database','INSERT INTO trucks (regnumber,company_id,enginenumber,datebought,allowedcargo,description,systemstatus,cargoweight,cargolength,cargowidth,cargoheight) VALUES (\'_REGNUMBER_\',\'_COMPANYID_\',\'_ENGINENUMBER_\',\'_DATEBOUGHT_\',\'_ALLOWEDCARGO_\',\'_DESCRIPTION_\',\'_SYSTEMSTATUS_\',\'_CARGOWEIGHT_\',\'_CARGOLENGTH_\',\'_CARGOWIDTH_\',\'_CARGOHEIGHT_\')','2011-02-28 12:18:58');
INSERT INTO `appqueries` VALUES (253,'search_truck_table','Searches trucks in the table','SELECT * FROM trucks WHERE _SEARCHFIELD_ LIKE \'%_PHRASE_%\' ORDER BY regnumber DESC','2011-01-07 16:31:17');
INSERT INTO `appqueries` VALUES (254,'check_employee','checks whether the employee already exists','SELECT * FROM employee WHERE emailaddress=\'_EMAILADDRESS_\'','2011-01-09 21:52:18');
INSERT INTO `appqueries` VALUES (255,'add_company_details','stores details of a company at registration','INSERT INTO company (companyname,emailaddress,role) values (\'_COMPANYNAME_\',\'_EMAILADDRESS_\',\'_ROLE_\')','2011-01-13 04:51:00');
INSERT INTO `appqueries` VALUES (256,'insert_user_rights','Inserts user rights in the database','INSERT INTO USER_RIGHTS (USER_ID,SUBMITBIDS,ADDEDIT_TRUCK,ADDEDIT_CARGO,ADDEDIT_DRIVER,TRACK_CARGO,DELETE_TRUCK) VALUES (\'_SUBMITBIDS_\',\'_ADDEDIT_TRUCK_\',\'_ADDEDIT_CARGO_\',\'_ADDEDIT_DRIVER_\',\'_TRACKCARGO_\',\'_DELETETRUCK_\')','2011-01-14 03:39:07');
INSERT INTO `appqueries` VALUES (257,'pick_all_containers','Selects containers from their table','SELECT * FROM containers WHERE company_id=\'_COMPANY_ID_\'','2011-01-16 20:53:41');
INSERT INTO `appqueries` VALUES (258,'insert_container','stores containers in their table','INSERT INTO containers (containernumber,company_id,cargotype,description,instructions,originaddress,destinationaddress,origincountry,destinationcountry,cargoweight,cargolength,cargowidth,cargoheight) VALUES (\'_CONTAINERNUMBER_\',\'_COMPANYID_\',\'_CARGOTYPE[]_\',\'_DESCRIPTION_\',\'_INSTRUCTIONS_\',\'_ORIGINADDRESS_\',\'_DESTINATIONADDRESS_\',\'_ORIGINCOUNTRY_\',\'_DESTINATIONCOUNTRY_\',\'_CARGOWEIGHT_\',\'_CARGOLENGTH_\',\'_CARGOWIDTH_\',\'_CARGOHEIGHT_\')','2011-03-03 13:05:31');
INSERT INTO `appqueries` VALUES (259,'update_container','Updates a container by its id','UPDATE containers SET containernumber=\'_CONTAINERNUMBER_\',description=\'_DESCRIPTION_\',instructions=\'_INSTRUCTIONS_\',originaddress=\'_ORIGINADDRESS_\',destinationaddress=\'_DESTINATIONADDRESS_\',origincountry=\'_ORIGINCOUNTRY_\',destinationcountry=\'_DESTINATIONCOUNTRY_\',cargoweight=\'_CARGOWEIGHT_\',cargotype=\'_CARGOTYPE_\',cargolength=\'_CARGOLENGTH_\',cargowidth=\'_CARGOWIDTH_\',cargoheight=\'_CARGOHEIGHT_\' WHERE container_id=\'_CONTAINER_ID_\'','2011-03-04 15:55:19');
INSERT INTO `appqueries` VALUES (260,'pick_container_by_id','selects a container by its number','SELECT * FROM containers WHERE container_id=\'_CONTAINER_ID_\'','2011-01-16 20:52:20');
INSERT INTO `appqueries` VALUES (261,'pick_container_by_number','selects a container by its number','SELECT * FROM containers WHERE containernumber=\'_CONTAINERNUMBER_\'','2011-01-16 20:52:59');
INSERT INTO `appqueries` VALUES (262,'delete_container','Deletes a container by its id','DELETE FROM containers WHERE container_id=\'_CONTAINER_ID_\'','2011-01-16 20:52:42');
INSERT INTO `appqueries` VALUES (263,'pick_all_drivers','selects all drivers','SELECT * FROM drivers WHERE company_id=\'_COMPANY_ID_\'','2011-01-16 20:52:03');
INSERT INTO `appqueries` VALUES (264,'insert_driver','stores drivers in database','INSERT INTO drivers (company_id,fname,lname,image,truck_id,experiance,dateofbirth,telephone1,telephone2,actingas) Values (\'_COMPANYID_\',\'_FNAME_\',\'_LNAME_\',\'_DRIVERPHOTO_\',\'_TRUCKID_\',\'_EXPERIANCE_\',\'_DATEOFBIRTH_\',\'_TELEPHONE1_\',\'_TELEPHONE2_\',\'_ACTINGAS_\')','2011-03-03 12:46:07');
INSERT INTO `appqueries` VALUES (265,'update_driver','updates a driver','UPDATE drivers SET fname=\'_FNAME_\',lname=\'_LNAME_\',experiance=\'_EXPERIANCE_\',telephone1=\'_TELEPHONE1_\',telephone2=\'_TELEPHONE2_\',actingas=\'_ACTINGAS_\', dateofbirth=\'_DATEOFBIRTH_\',image=\'_DRIVERPHOTO_\' WHERE driver_id=\'_DRIVER_ID_\'','2011-03-03 12:47:08');
INSERT INTO `appqueries` VALUES (266,'delete_driver','deletes a driver by id','DELETE FROM drivers WHERE driver_id=\'_DRIVER_ID_\'','2011-01-16 20:51:09');
INSERT INTO `appqueries` VALUES (267,'pick_driver_by_id','selects a driver with his id','SELECT * FROM drivers WHERE driver_id=\'_DRIVER_ID_\'','2011-01-16 20:50:38');
INSERT INTO `appqueries` VALUES (268,'Pick_driver_by_name','picks a driver by name','SELECT * FROM drivers WHERE fname=\'_FNAME_\'','2011-01-16 20:50:53');
INSERT INTO `appqueries` VALUES (270,'pick_driver_for_truck','selects a driver for a truck','SELECT fname,lname FROM drivers WHERE truck_id=\'_TRUCK_ID_\'','2011-01-17 21:43:54');
INSERT INTO `appqueries` VALUES (271,'search_driver_table','searches drivers','SELECT * FROM drivers WHERE _SEARCHFIELD_ LIKE \'%_PHRASE_%\' ORDER BY fname DESC','2011-01-17 22:16:20');
INSERT INTO `appqueries` VALUES (272,'pick_truck_for_driver','selects a truck for the driver','SELECT regnumber FROM trucks WHERE truck_id=\'_TRUCK_ID_\'','2011-01-17 23:08:30');
INSERT INTO `appqueries` VALUES (273,'pick_truck_id_from_drivers','selects truck id from the drivers table','SELECT truck_id FROM drivers WHERE driver_id=\'_DRIVER_ID_\' ','2011-01-17 23:12:24');
INSERT INTO `appqueries` VALUES (274,'insert_payments','stores payments in the payments table','INSERT INTO payments (company_id,billingaddress,companybank,image,bankaccount,fname,lname,emailaddress,telephone,paymentterms) values (\'_COMPANYID_\',\'_BILLINGADDRESS_\',\'_COMPANYBANK_\',\'_IMAGE_\',\n\'_BANKACCOUNT_\',\'_FNAME_\',\'_LNAME_\',\n\'_EMAILADDRESS_\',\'_TELEPHONE_\'\n,\'_PAYMENTTERMS_\')','2011-01-18 00:04:30');
INSERT INTO `appqueries` VALUES (275,'delete_payment','deletes a payment from a list','DELETE FROM payments WHERE payment_id=\'_PAYMENT_ID_\'','2011-01-18 21:26:28');
INSERT INTO `appqueries` VALUES (276,'update_payment','updates a payment','UPDATE payments SET billingaddress=\'_BILLINGADDRESS_\',companybank=\'_COMPANYBANK_\',bankaccount=\'_BANKACCOUNT_\',fname=\'_FNAME_\',lname=\'_LNAME_\',emailaddress=\'_EMAILADDRESS_\',telephone=\'_TELEPHONE_\',paymentterms=\'_PAYMENTTERMS_\' WHERE payment_id=\'_PAYMENT_ID_\'','2011-01-18 21:40:47');
INSERT INTO `appqueries` VALUES (277,'pick_payment_by_id','selects payment by its id','SELECT * FROM payments WHERE payment_id=\'_ID_\'','2011-02-14 10:33:44');
INSERT INTO `appqueries` VALUES (278,'pick_all_payments','selects all payments made','SELECT * FROM payments WHERE company_id=\'_COMPANY_ID_\'','2011-01-17 23:53:59');
INSERT INTO `appqueries` VALUES (279,'pick_payment_by_email','checks whether payment exists','SELECT * FROM payments WHERE emailaddress=\'_EMAILADDRESS_\'','2011-01-18 20:32:20');
INSERT INTO `appqueries` VALUES (280,'search_payment_table','searches payment table','SELECT * FROM payments WHERE _SEARCHFIELD_ LIKE \'%_PHRASE_%\' ORDER BY companybank DESC','2011-01-18 21:48:35');
INSERT INTO `appqueries` VALUES (100,'insert_temp_company','Insert data about a temporary company that intends to register.','INSERT INTO temp_company_data (firstname, lastname, companyname, useremailaddress, roles, dateofentry) VALUES (\'_FIRSTNAME_\', \'_LASTNAME_\', \'_COMPANYNAME_\', \'_USEREMAILADDRESS_\', \'_ROLES_\', NOW())','2011-01-26 19:08:01');
INSERT INTO `appqueries` VALUES (101,'get_temp_user_by_id','Returns a user from the temporary company database','SELECT * FROM temp_company_data WHERE id = \'_USERID_\'','2011-01-26 21:12:32');
INSERT INTO `appqueries` VALUES (102,'update_temp_user_record','Add the username and password for the temporary user','UPDATE temp_company_data SET username=\'_USERNAME_\', password=\'_PASSWORD_\' WHERE id=\'_USERID_\'','2011-01-26 21:29:06');
INSERT INTO `appqueries` VALUES (103,'insert_permanent_company_data','Insert permanent company data','INSERT INTO company (companyname, emailaddress, administratorid, lastupdatedate, lastupdatedby) VALUES (\'_COMPANYNAME_\', \'_USEREMAILADDRESS_\', \'_ID_\', NOW(), \'_ID_\')','2011-01-26 21:47:57');
INSERT INTO `appqueries` VALUES (104,'insert_permanent_user_data','Add a new user','INSERT INTO employee (username, password, firstname, lastname, companyid, emailaddress, isactive, isadmin, datecreated, lastupdatedate, companyname, usertype) VALUES (\'_USERNAME_\', \'_PASSWORD_\', \'_FIRSTNAME_\', \'_LASTNAME_\', \'_COMPANYID_\', \'_USEREMAILADDRESS_\', \'Y\', \'N\', NOW(), NOW(), \'_COMPANYNAME_\', \'_USERTYPE_\')','2011-01-26 21:59:41');
INSERT INTO `appqueries` VALUES (105,'set_who_updated_user_record','Set who updated a user ID record','UPDATE employee SET createdby=\'_WHO_\', lastupdatedby=\'_WHO_\' WHERE id=\'_USERID_\'','2011-01-26 22:04:09');
INSERT INTO `appqueries` VALUES (281,'pick_employee_by_email','Pick employee based on their email address','SELECT * FROM employee WHERE emailaddress=\'_EMAILADDRESS_\'','2011-01-30 18:44:27');
INSERT INTO `appqueries` VALUES (283,'get_company_by_id','Gets the company by its ID','SELECT * FROM company WHERE id=\'_ID_\'','2011-01-31 21:15:52');
INSERT INTO `appqueries` VALUES (284,'pick_company_and_user_by_id','Returns the company and user data','SELECT C.*, E.firstname, E.lastname, E.companyid FROM company C LEFT JOIN employee E ON (C.administratorid=E.id) WHERE C.id=\'_COMPANYID_\'','2011-02-03 18:54:01');
INSERT INTO `appqueries` VALUES (285,'search_company_admin','Search through a company employees information for a new admin','SELECT * FROM employee WHERE _SEARCHQUERY_ companyid=\'_COMPANYID_\' AND isactive=\'Y\'','2011-02-03 19:18:24');
INSERT INTO `appqueries` VALUES (286,'update_company_data','Update company data','UPDATE company SET companyname=\'_COMPANYNAME_\', emailaddress=\'_EMAILADDRESS_\', physicaladdress=\'_PHYSICALADDRESS_\', country=\'_COUNTRY_\', telephone=\'_TELEPHONE_\', dateestablished=\'_DATEESTABLISHED_\', administratorid=\'_ADMINISTRATORID_\', logofile=\'_COMPANYLOGO_\', website=\'_WEBSITE_\' WHERE id=\'_EDITID_\'','2011-02-04 20:23:42');
INSERT INTO `appqueries` VALUES (287,'get_company_users','Gets users of a given company','SELECT * FROM employee WHERE companyid=\'_COMPANYID_\' AND foruserdisplay=\'Y\' ORDER BY lastname ASC','2011-02-05 14:26:39');
INSERT INTO `appqueries` VALUES (288,'get_user_rights_templates','Get the user rights templates','SELECT * FROM userrights WHERE isinternal=\'_ISINTERNAL_\'','2011-02-05 11:33:40');
INSERT INTO `appqueries` VALUES (289,'get_template_rights_by_code','Gets all template rights based on its code','SELECT * FROM userrights WHERE rightsname=\'_TEMPLATECODE_\'','2011-02-05 12:43:18');
INSERT INTO `appqueries` VALUES (290,'get_right_by_id','Get a user right details by ID','SELECT * FROM rightsdefinition WHERE id=\'_ID_\'','2011-02-05 12:50:35');
INSERT INTO `appqueries` VALUES (292,'update_user_credentials','Add the username and password to the users details','UPDATE employee SET username=\'_USERNAME_\', password=\'_PASSWORD_\' WHERE id=\'_USERID_\'','2011-02-05 14:52:55');
INSERT INTO `appqueries` VALUES (291,'deactivate_employee_record','Do not show the employee record to the user anymore','UPDATE employee SET isactive=\'N\', foruserdisplay=\'N\' WHERE id=\'_ID_\'','2011-02-05 14:26:09');
INSERT INTO `appqueries` VALUES (293,'activate_user','Activates a user record','UPDATE employee SET isactive=\'Y\' WHERE id=\'_ID_\'','2011-02-05 16:31:38');
INSERT INTO `appqueries` VALUES (294,'pick_payment_by_company_id','Returns payment of a company using an ID','Select * from payments where company_id=\'_COMPANYID_\'','2011-02-14 09:46:12');
INSERT INTO `appqueries` VALUES (295,'get_payment_by_id','selects a payment by id','SELECT * FROM payments WHERE payment_id=\'_ID_\'','2011-02-17 10:21:10');
INSERT INTO `appqueries` VALUES (296,'update_payment_data','Updates a payment','UPDATE payments SET billingaddress=\'_BILLINGADDRESS_\', companybank=\'_COMPANYBANK_\', bankaccount=\'_BANKACCOUNT_\', fname=\'_FNAME_\', lname=\'_LNAME_\', emailaddress=\'_EMAILADDRESS_\', telephone=\'_TELEPHONE_\', paymentterms=\'_PAYMENTTERMS_\',cashierphoto=\'_CASHIERPHOTO_\' WHERE payment_id=\'_EDITID_\'','2011-02-24 16:54:30');
INSERT INTO `appqueries` VALUES (297,'pick_drivers_by_company_id','picks all drivers with companyid','Select * from drivers where company_id=\'_COMPANYID_\'','2011-02-25 09:34:05');
/*!40000 ALTER TABLE `appqueries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) collate latin1_general_ci NOT NULL default '0',
  `ip_address` varchar(16) collate latin1_general_ci NOT NULL default '0',
  `user_agent` varchar(50) collate latin1_general_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('c7d18d06e2d10ae92c397190ba045019','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130507,'a:1:{s:9:\"error_msg\";s:97:\"You are attempting to access un-authorized pages. Please login as administrator to view the page.\";}');
INSERT INTO `ci_sessions` VALUES ('45d07b87624c7bf7db851b7505528180','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130507,'');
INSERT INTO `ci_sessions` VALUES ('4e4bf76b7071705ab59fd3cd0dd8bff3','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130507,'a:1:{s:10:\"page_title\";s:5:\"Login\";}');
INSERT INTO `ci_sessions` VALUES ('446e93e5265281100007171b6c11e86c','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130508,'');
INSERT INTO `ci_sessions` VALUES ('31489f0bdc1fac25afd074cd30a80ead','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130503,'a:15:{s:6:\"userid\";s:1:\"1\";s:8:\"password\";s:5:\"admin\";s:8:\"username\";s:5:\"admin\";s:7:\"isadmin\";s:1:\"Y\";s:12:\"emailaddress\";s:21:\"admin@acravonline.com\";s:9:\"companyid\";s:1:\"1\";s:18:\"passwordexpirydate\";s:19:\"0000-00-00 00:00:00\";s:5:\"names\";s:23:\"Administrator Technical\";s:11:\"jobcategory\";s:0:\"\";s:11:\"companyname\";s:25:\"New Wave Technologies Ltd\";s:9:\"telephone\";s:11:\"_TELEPHONE_\";s:10:\"iscomplete\";s:1:\"Y\";s:8:\"usertype\";s:13:\"Administrator\";s:11:\"alluserdata\";a:13:{s:6:\"userid\";s:1:\"1\";s:8:\"password\";s:5:\"admin\";s:8:\"username\";s:5:\"admin\";s:7:\"isadmin\";s:1:\"Y\";s:12:\"emailaddress\";s:21:\"admin@acravonline.com\";s:9:\"companyid\";s:1:\"1\";s:18:\"passwordexpirydate\";s:19:\"0000-00-00 00:00:00\";s:5:\"names\";s:23:\"Administrator Technical\";s:11:\"jobcategory\";s:0:\"\";s:11:\"companyname\";s:25:\"New Wave Technologies Ltd\";s:9:\"telephone\";s:11:\"_TELEPHONE_\";s:10:\"iscomplete\";s:1:\"Y\";s:8:\"usertype\";s:13:\"Administrator\";}s:10:\"page_title\";s:9:\"Dashboard\";}');
INSERT INTO `ci_sessions` VALUES ('7f5a658f85a7de1987b92e521dd879af','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130494,'');
INSERT INTO `ci_sessions` VALUES ('cec827635217aadce539abe27c9b3964','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130493,'a:1:{s:9:\"error_msg\";s:81:\"Your session expired or user information could not be resolved. <br>Please login.\";}');
INSERT INTO `ci_sessions` VALUES ('5b6ba48210762e8e3e68e51a9b67ec06','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130493,'');
INSERT INTO `ci_sessions` VALUES ('52135689b415ad24df83553da538ccbe','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130494,'a:1:{s:10:\"page_title\";s:5:\"Login\";}');
INSERT INTO `ci_sessions` VALUES ('3047433d8295a4890b352026ad408a13','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130295,'a:17:{s:10:\"page_title\";s:9:\"Dashboard\";s:6:\"userid\";s:1:\"1\";s:8:\"password\";s:5:\"admin\";s:8:\"username\";s:5:\"admin\";s:7:\"isadmin\";s:1:\"Y\";s:12:\"emailaddress\";s:21:\"admin@acravonline.com\";s:9:\"companyid\";s:1:\"1\";s:18:\"passwordexpirydate\";s:19:\"0000-00-00 00:00:00\";s:5:\"names\";s:23:\"Administrator Technical\";s:11:\"jobcategory\";s:0:\"\";s:11:\"companyname\";s:25:\"New Wave Technologies Ltd\";s:9:\"telephone\";s:11:\"_TELEPHONE_\";s:10:\"iscomplete\";s:1:\"Y\";s:8:\"usertype\";s:13:\"Administrator\";s:11:\"alluserdata\";a:13:{s:6:\"userid\";s:1:\"1\";s:8:\"password\";s:5:\"admin\";s:8:\"username\";s:5:\"admin\";s:7:\"isadmin\";s:1:\"Y\";s:12:\"emailaddress\";s:21:\"admin@acravonline.com\";s:9:\"companyid\";s:1:\"1\";s:18:\"passwordexpirydate\";s:19:\"0000-00-00 00:00:00\";s:5:\"names\";s:23:\"Administrator Technical\";s:11:\"jobcategory\";s:0:\"\";s:11:\"companyname\";s:25:\"New Wave Technologies Ltd\";s:9:\"telephone\";s:11:\"_TELEPHONE_\";s:10:\"iscomplete\";s:1:\"Y\";s:8:\"usertype\";s:13:\"Administrator\";}s:24:\"local_allowed_extensions\";s:15:\".gif,.png,.jpeg\";s:19:\"local_max_file_size\";s:7:\"1000000\";}');
INSERT INTO `ci_sessions` VALUES ('9b4b85e3f79139d3f2ec23d11790c990','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130483,'a:1:{s:9:\"error_msg\";s:81:\"Your session expired or user information could not be resolved. <br>Please login.\";}');
INSERT INTO `ci_sessions` VALUES ('f2786818ff3c4f6da055db3cf8a43457','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130484,'');
INSERT INTO `ci_sessions` VALUES ('118118a52dcdec7ccd788862251beb8f','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130484,'a:1:{s:10:\"page_title\";s:5:\"Login\";}');
INSERT INTO `ci_sessions` VALUES ('57e4f8230934617afaa9f4b8a13d8ace','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130484,'');
INSERT INTO `ci_sessions` VALUES ('b2a9986a5deaf2e3db9f23a695ebf03b','68.44.40.245','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;',1299130491,'a:15:{s:6:\"userid\";s:1:\"1\";s:8:\"password\";s:5:\"admin\";s:8:\"username\";s:5:\"admin\";s:7:\"isadmin\";s:1:\"Y\";s:12:\"emailaddress\";s:21:\"admin@acravonline.com\";s:9:\"companyid\";s:1:\"1\";s:18:\"passwordexpirydate\";s:19:\"0000-00-00 00:00:00\";s:5:\"names\";s:23:\"Administrator Technical\";s:11:\"jobcategory\";s:0:\"\";s:11:\"companyname\";s:25:\"New Wave Technologies Ltd\";s:9:\"telephone\";s:11:\"_TELEPHONE_\";s:10:\"iscomplete\";s:1:\"Y\";s:8:\"usertype\";s:13:\"Administrator\";s:11:\"alluserdata\";a:13:{s:6:\"userid\";s:1:\"1\";s:8:\"password\";s:5:\"admin\";s:8:\"username\";s:5:\"admin\";s:7:\"isadmin\";s:1:\"Y\";s:12:\"emailaddress\";s:21:\"admin@acravonline.com\";s:9:\"companyid\";s:1:\"1\";s:18:\"passwordexpirydate\";s:19:\"0000-00-00 00:00:00\";s:5:\"names\";s:23:\"Administrator Technical\";s:11:\"jobcategory\";s:0:\"\";s:11:\"companyname\";s:25:\"New Wave Technologies Ltd\";s:9:\"telephone\";s:11:\"_TELEPHONE_\";s:10:\"iscomplete\";s:1:\"Y\";s:8:\"usertype\";s:13:\"Administrator\";}s:10:\"page_title\";s:9:\"Dashboard\";}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` bigint(20) NOT NULL auto_increment,
  `companyname` varchar(255) NOT NULL,
  `emailaddress` varchar(100) NOT NULL,
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
  PRIMARY KEY  (`id`),
  UNIQUE KEY `emailaddress` (`emailaddress`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'New Wave Technologies Ltd','admin@nwtuganda.co.ug','Plot 30 Jinja Rd. 2nd Floor, Conrad Hse.','','Uganda','0784000808','041490023423','companylogo_1.jpg','','2002-06-20','1','2010-12-27 18:48:19','1');
INSERT INTO `company` VALUES (4,'Mega Transporters','azziwa@gmail.com','Plot 51 Kayunga Road\nMukono Town','','Uganda','0772345234','','companylogo_4.gif','www.megatrans.com','1986-03-27','16','2011-01-30 16:42:55','16');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `containers`
--

DROP TABLE IF EXISTS `containers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `containers` (
  `container_id` bigint(20) unsigned NOT NULL auto_increment,
  `company_id` bigint(20) default NULL,
  `cargotype` text,
  `description` text,
  `instructions` text,
  `originaddress` text,
  `destinationaddress` text,
  `origincountry` varchar(32) default NULL,
  `destinationcountry` varchar(32) default NULL,
  `cargoweight` int(32) default NULL,
  `cargolength` int(32) default NULL,
  `cargowidth` int(32) default NULL,
  `cargoheight` int(32) NOT NULL,
  `containernumber` varchar(32) default NULL,
  PRIMARY KEY  (`container_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `containers`
--

LOCK TABLES `containers` WRITE;
/*!40000 ALTER TABLE `containers` DISABLE KEYS */;
INSERT INTO `containers` VALUES (2,52,'_CARGOTYPE_','Plastic material','Handle with care includes glasses','Kongop','cairo','Burundi','Egypt',55,44,54,0,'YT098947');
INSERT INTO `containers` VALUES (5,52,'_CARGOTYPE_','Shirts and trousers','ples','kampala','jinja','Uganda','Uganda',2,14,67,0,'YT000545');
INSERT INTO `containers` VALUES (6,5,'_CARGOTYPE_','Flowers and glass','help','kampala','jinja','Uganda','Uganda',90,76,31,0,'YT09844');
INSERT INTO `containers` VALUES (7,52,'_CARGOTYPE_','5t45','ert','er','re','Zambia','Zambia',4,40,4,0,'YT09894');
INSERT INTO `containers` VALUES (8,1,'Fragile cargo','sfsf','sdfsdf','dfd','fsfsdf','Togo','Libya',23,33,56,60,'YT0989900');
INSERT INTO `containers` VALUES (9,1,'Refrigerated cargo,Fragile cargo,Wide cargo,None','edre','ertrterter','erter','tertertr','Malawi','Zambia',1,1,1,0,'yt000097878787');
INSERT INTO `containers` VALUES (10,1,'Refrigerated cargo,Fragile cargo,Wide cargo,None','sdfsdf','dsdfsd','fsdfsd','fsdfdsf','Rwanda','Tanzania',2,2,25,2,'yt3434343434');
/*!40000 ALTER TABLE `containers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drivers` (
  `driver_id` bigint(20) unsigned NOT NULL auto_increment,
  `company_id` bigint(20) default NULL,
  `fname` varchar(32) default NULL,
  `lname` varchar(32) default NULL,
  `image` varchar(32) NOT NULL,
  `truck_id` bigint(20) default NULL,
  `dateofbirth` date NOT NULL,
  `telephone1` varchar(32) default NULL,
  `telephone2` varchar(32) default NULL,
  `experiance` text,
  `actingas` varchar(32) default NULL,
  `datecreated` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`driver_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drivers`
--

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
INSERT INTO `drivers` VALUES (1,1,'david','buwembo','_DRIVERPHOTO_',1,'2011-02-01','0784260362','0784260362','2 years and counting','Driver','2011-03-04 13:40:47');
INSERT INTO `drivers` VALUES (2,1,'sam','mumbere','_DRIVERPHOTO_',0,'1986-02-14','078426036','07483647','He is expericed and able to travel ','Turnboy','2011-03-04 13:41:42');
INSERT INTO `drivers` VALUES (5,1,'Yusuf','yopad','_IMAGE_',0,'1981-04-16','07483647','07483647','he is','Driver','2011-02-28 15:22:51');
INSERT INTO `drivers` VALUES (6,1,'david2','buwembo','_IMAGE_',0,'2011-04-30','784260362','784260362','2 years and counting','Driver','2011-02-28 19:28:54');
INSERT INTO `drivers` VALUES (7,1,'david','buwembo3','_IMAGE_',0,'1984-06-16','0784260362','784260362','2 years and counting','Driver','2011-02-28 15:23:04');
INSERT INTO `drivers` VALUES (8,1,'david3','buwembo','_IMAGE_',0,'1970-07-27','0784260362','0784260362','2 years and counting','Driver','2011-02-28 19:28:20');
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id` bigint(20) NOT NULL auto_increment,
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
  `isactive` enum('Y','N') NOT NULL default 'Y',
  `isadmin` enum('Y','N') NOT NULL default 'N',
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
  `employeetype` varchar(32) default NULL,
  `stateorprovince` varchar(32) default NULL,
  `usertype` varchar(32) default NULL,
  `shortconame` varchar(100) NOT NULL,
  `iscomplete` enum('Y','N') NOT NULL default 'N',
  `foruserdisplay` enum('Y','N') NOT NULL default 'Y',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `emailaddress` (`emailaddress`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Mr.','admin','d033e22ae348aeb5660fc2140aec35850c4da997','Administrator','','Technical','Male','Administrator','1','admin@acravonline.com','Y','Y','_TELEPHONE_','0000-00-00','0000-00-00','',1,'2010-12-16 16:45:33',1,'2011-01-04 14:41:58','3','Red','0000-00-00 00:00:00','Contractor','Texas','Administrator','','Y','Y');
INSERT INTO `employee` VALUES (2,'Mr.','AC003','8cb2237d0679ca88db6464eac60da96345513964','Al','','Zziwa','Male','Developer','_COMPANYID_','','Y','N','_TELEPHONE_','0000-00-00','0000-00-00','',2,'2010-12-25 21:32:14',2,'2011-01-04 09:13:43','4','Chico','0000-00-00 00:00:00','','','Power','','N','Y');
INSERT INTO `employee` VALUES (3,'','technician','cb101192dff2cc1ddd0272f73de307c89bebc181','ash','ashboy','aluwambo','Male','Developer','_COMPANYID_','ash@gmail.com','Y','N','_TELEPHONE_','0000-00-00','0000-00-00','',0,'2011-01-03 16:27:41',1,'2011-01-04 10:32:01','','','0000-00-00 00:00:00','Contractor','West Virginia','Power','','N','Y');
INSERT INTO `employee` VALUES (4,'Mr.','technician','','dave','david','Buwembo','Male','technician','_COMPANYID_','buwian12@yahoo.com','Y','Y','_TELEPHONE_','0000-00-00','0000-00-00','',0,'2011-01-03 16:53:24',1,'2011-01-04 10:32:31','','','0000-00-00 00:00:00','Full Time','Kansas','Power','','N','Y');
INSERT INTO `employee` VALUES (5,'Mr.','advisor','f16bed56189e249fe4ca8ed10a1ecae60e8ceac0','sam','kawoya','mumbere','Female','Supervisor','_COMPANYID_','sam@yahoo.com','N','N','_TELEPHONE_','0000-00-00','0000-00-00','',0,'2011-01-04 08:14:59',1,'2011-01-04 10:31:36','','','0000-00-00 00:00:00','Hourly','Iowa','Normal','','N','Y');
INSERT INTO `employee` VALUES (8,'','','1f03db0984c6a5d1a9a9b2ad709a3439','david','','buwembo','Male','','2','Buwian12@gmail.com','Y','Y','','0000-00-00','0000-00-00','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00','','','0000-00-00 00:00:00',NULL,NULL,NULL,'','N','Y');
INSERT INTO `employee` VALUES (16,'Mr.','AC15251319','d033e22ae348aeb5660fc2140aec35850c4da997','Al','','Zziwa','Male','Techie','4','azziwa@gmail.com','Y','N','07872344234','0000-00-00','0000-00-00','',16,'2011-01-30 16:42:55',16,'2011-01-31 22:13:28','1','red','0000-00-00 00:00:00','','Uganda','company_administrator','ADA','N','Y');
INSERT INTO `employee` VALUES (19,'Dr.','','','Jeth','T','Zziwa','Male','Chief Organizer','4','jethro.zziwa@gmail.com','N','N','','0000-00-00','0000-00-00','',16,'2011-02-06 15:25:13',16,'2011-02-06 15:25:13','','','2011-03-12 00:00:00',NULL,'','data_entry','','N','Y');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobcategories`
--

DROP TABLE IF EXISTS `jobcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobcategories` (
  `id` bigint(20) unsigned NOT NULL,
  `jobtitle` varchar(32) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobcategories`
--

LOCK TABLES `jobcategories` WRITE;
/*!40000 ALTER TABLE `jobcategories` DISABLE KEYS */;
INSERT INTO `jobcategories` VALUES (1,'Technician');
INSERT INTO `jobcategories` VALUES (2,'Skilled');
INSERT INTO `jobcategories` VALUES (3,'Manager');
INSERT INTO `jobcategories` VALUES (6,'Technician');
INSERT INTO `jobcategories` VALUES (9,'Skilled');
INSERT INTO `jobcategories` VALUES (10,'Manager');
/*!40000 ALTER TABLE `jobcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `payment_id` bigint(20) unsigned NOT NULL auto_increment,
  `company_id` bigint(20) default NULL,
  `billingaddress` varchar(32) collate latin1_general_ci default NULL,
  `companybank` varchar(32) collate latin1_general_ci default NULL,
  `bankaccount` varchar(32) collate latin1_general_ci default NULL,
  `image` varchar(32) collate latin1_general_ci default NULL,
  `fname` varchar(32) collate latin1_general_ci default NULL,
  `lname` varchar(32) collate latin1_general_ci default NULL,
  `emailaddress` varchar(32) collate latin1_general_ci default NULL,
  `telephone` int(32) default NULL,
  `paymentterms` text collate latin1_general_ci,
  `datecreated` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,1,'Jinja','Barclays','23344556','','David','Buwembo','Buwian12@gmail.com',704475878,'cash on delivery','2011-02-24 12:53:13');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rightsdefinition`
--

DROP TABLE IF EXISTS `rightsdefinition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rightsdefinition` (
  `id` bigint(20) NOT NULL auto_increment,
  `definition` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rightsdefinition`
--

LOCK TABLES `rightsdefinition` WRITE;
/*!40000 ALTER TABLE `rightsdefinition` DISABLE KEYS */;
INSERT INTO `rightsdefinition` VALUES (1,'Can submit bids ');
INSERT INTO `rightsdefinition` VALUES (2,'Can edit trucks ');
INSERT INTO `rightsdefinition` VALUES (3,'Can add trucks ');
INSERT INTO `rightsdefinition` VALUES (4,'Can add cargo ');
INSERT INTO `rightsdefinition` VALUES (5,'Can edit cargo ');
INSERT INTO `rightsdefinition` VALUES (6,'Can add driver information ');
INSERT INTO `rightsdefinition` VALUES (7,'Can edit driver information ');
INSERT INTO `rightsdefinition` VALUES (8,'Can track cargo');
INSERT INTO `rightsdefinition` VALUES (9,'Can delete cargo');
INSERT INTO `rightsdefinition` VALUES (10,'Can delete trucks');
INSERT INTO `rightsdefinition` VALUES (11,'Can choose bid winner');
INSERT INTO `rightsdefinition` VALUES (12,'Can invite bids');
INSERT INTO `rightsdefinition` VALUES (13,'Can view bid winner');
INSERT INTO `rightsdefinition` VALUES (14,'Can add payment settings');
INSERT INTO `rightsdefinition` VALUES (15,'Can view payment settings');
INSERT INTO `rightsdefinition` VALUES (16,'Can update payment settings');
/*!40000 ALTER TABLE `rightsdefinition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `securityquestions`
--

DROP TABLE IF EXISTS `securityquestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `securityquestions` (
  `id` int(11) NOT NULL auto_increment,
  `question` varchar(512) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `securityquestions`
--

LOCK TABLES `securityquestions` WRITE;
/*!40000 ALTER TABLE `securityquestions` DISABLE KEYS */;
INSERT INTO `securityquestions` VALUES (1,'What is your favorite color?');
INSERT INTO `securityquestions` VALUES (2,'In which town were you born?');
INSERT INTO `securityquestions` VALUES (3,'What is your mother\'s maiden name?');
INSERT INTO `securityquestions` VALUES (4,'What is your best friend\'s name?');
INSERT INTO `securityquestions` VALUES (5,'What was the name of your first pet?');
/*!40000 ALTER TABLE `securityquestions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp_company_data`
--

DROP TABLE IF EXISTS `temp_company_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_company_data` (
  `id` bigint(20) NOT NULL auto_increment,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `companyname` varchar(300) NOT NULL,
  `useremailaddress` varchar(200) NOT NULL,
  `roles` varchar(200) NOT NULL,
  `isactive` enum('Y','N') NOT NULL default 'Y',
  `dateofentry` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp_company_data`
--

LOCK TABLES `temp_company_data` WRITE;
/*!40000 ALTER TABLE `temp_company_data` DISABLE KEYS */;
INSERT INTO `temp_company_data` VALUES (15,'Buwembo','David ','AC8564015','201140','SMK','buwian12@gmail.com','Bid for work','Y','2011-02-01 08:56:40');
INSERT INTO `temp_company_data` VALUES (16,'David','Buwembo','AC6401116','201111','WBS','buwian12@yahoo.com','Submit work for sub-contractors','Y','2011-02-02 06:40:10');
INSERT INTO `temp_company_data` VALUES (14,'Al','Zziwa','AC14084514','201145','Mega Transporters','azziwa@gmail.com','Bid for work,Submit work for sub-contractors','Y','2011-01-30 14:08:45');
/*!40000 ALTER TABLE `temp_company_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trucks`
--

DROP TABLE IF EXISTS `trucks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trucks` (
  `truck_id` bigint(20) unsigned NOT NULL auto_increment,
  `regnumber` varchar(32) default NULL,
  `company_id` bigint(20) default NULL,
  `enginenumber` varchar(255) default NULL,
  `datebought` date default NULL,
  `allowedcargo` text,
  `description` text,
  `systemstatus` varchar(32) default NULL,
  `cargoweight` int(32) default NULL,
  `cargolength` int(32) default NULL,
  `cargowidth` int(32) default NULL,
  `cargoheight` int(32) NOT NULL,
  `datecreated` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`truck_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trucks`
--

LOCK TABLES `trucks` WRITE;
/*!40000 ALTER TABLE `trucks` DISABLE KEYS */;
INSERT INTO `trucks` VALUES (1,'UAA 890',1,'778883','2011-01-01','Refrigerated cargo,Fragile cargo,Wide cargo,N/A','this','Active',35,33,10,70,'2011-02-28 20:48:57');
INSERT INTO `trucks` VALUES (2,'UAB 256',52,'22311','0000-00-00','_ALLOWEDCARGO_','This hopes','Inactive',34,21,25,20,'2011-01-31 21:18:12');
INSERT INTO `trucks` VALUES (6,'VUWEE 5677',1,'6767676','1995-09-17','Wide cargo','56565','Active',7,76,54,40,'2011-03-04 13:17:22');
/*!40000 ALTER TABLE `trucks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userrights`
--

DROP TABLE IF EXISTS `userrights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userrights` (
  `id` int(11) NOT NULL auto_increment,
  `rightsname` varchar(250) NOT NULL,
  `displayname` varchar(250) NOT NULL,
  `rightsids` text NOT NULL,
  `isinternal` enum('Y','N') NOT NULL default 'N',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `rightsname` (`rightsname`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userrights`
--

LOCK TABLES `userrights` WRITE;
/*!40000 ALTER TABLE `userrights` DISABLE KEYS */;
INSERT INTO `userrights` VALUES (1,'company_administrator','Company Administrator','1,2,3,4,5,6,7,8,11,12,15','N');
INSERT INTO `userrights` VALUES (2,'data_entry','Data Entry','1,3,4,5,6,7,8,9','N');
INSERT INTO `userrights` VALUES (3,'acrav_data_entry','ACRAV Data Entry','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16','Y');
/*!40000 ALTER TABLE `userrights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` bigint(20) unsigned NOT NULL auto_increment,
  `company_id` bigint(20) NOT NULL,
  `fname` varchar(32) collate latin1_general_ci NOT NULL,
  `lname` varchar(32) collate latin1_general_ci NOT NULL,
  `telephone` varchar(32) collate latin1_general_ci NOT NULL,
  `emailaddress` varchar(32) collate latin1_general_ci NOT NULL,
  `gender` varchar(32) collate latin1_general_ci NOT NULL,
  `datecreated` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,52,'buwembo','david','0704475878','Buwian12@gmail.com','_GENDER_','2011-01-14 03:51:40');
INSERT INTO `users` VALUES (2,52,'Aloysious','Zziwa','0704475878','alzziwa@yahoo.com','_GENDER_','2011-01-14 07:52:40');
INSERT INTO `users` VALUES (3,52,'Ash','Aluwambo','0704475878','Ash@gmail.com','_GENDER_','2011-01-14 07:52:20');
INSERT INTO `users` VALUES (7,52,'sam','Mumbere','0704475878','sam@newwave.com','_GENDER_','2011-01-14 08:25:58');
INSERT INTO `users` VALUES (8,52,'Yusuf','Opad','0774260362','Opad@newwave.co.ug','_GENDER_','2011-01-14 08:42:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db346561779'
--
DELIMITER ;;
DELIMITER ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-04-05 18:43:59
