CREATE DATABASE `aircpit` ;

CREATE  TABLE `aircpit`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(255) NULL ,
  `lastname` VARCHAR(255) NULL ,
  `sex` ENUM('M','F'),
  `age` INT(11),
  `username` VARCHAR(255) NULL ,
  `password` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `mobile` VARCHAR(255) NULL ,
  `telephone` VARCHAR(255) NULL ,
  `country` INT(11) NULL ,
  `state` INT(11) NULL ,
  `district` INT(11) NULL ,
  `city` VARCHAR(255) NULL ,
  `experience` VARCHAR(255) NULL ,
  `industry` VARCHAR(255) NULL ,
  `functional_area` VARCHAR(255) NULL ,
  `address1` VARCHAR(255) NULL ,
  `address2` VARCHAR(255) NULL ,
  `photo` VARCHAR(255) NULL ,
  `biodata` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) );

CREATE  TABLE `aircpit`.`employer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `companyname` VARCHAR(255) NULL ,
  `companydescription` TEXT NULL ,
  `username` VARCHAR(255) NULL ,
  `password` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `mobile` VARCHAR(255) NULL ,
  `telephone` VARCHAR(255) NULL ,
  `country` INT(11) NULL ,
  `state` INT(11) NULL ,
  `district` INT(11) NULL ,
  `city` VARCHAR(255) NULL ,
  `address1` VARCHAR(255) NULL ,
  `address2` VARCHAR(255) NULL ,
  `logo` VARCHAR(255) NULL ,
  `file` TEXT NULL, 
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) );

CREATE TABLE `aircpit`.`countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `aircpit`.`states` (
  `id` int(11) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `aircpit`.`districts` (
  `id` int(11) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `aircpit`.`industries` (
  `id` int(11) NOT NULL,
  `industry` varchar(255) NOT NULL,
  PRIMARY KEY (`id`));

insert into `aircpit`.`industries` values(1, 'signaling');
insert into `aircpit`.`industries` values(2, 'telecom');
insert into `aircpit`.`industries` values(3, 'electrical');
insert into `aircpit`.`industries` values(4, 'earth work');
insert into `aircpit`.`industries` values(5, 'bridge construction');
insert into `aircpit`.`industries` values(6, 'platform work (construction)');
insert into `aircpit`.`industries` values(7, 'building work (construction)');
insert into `aircpit`.`industries` values(8, 'linking');
insert into `aircpit`.`industries` values(9, 'welding work');
insert into `aircpit`.`industries` values(10, 'security');
insert into `aircpit`.`industries` values(11, 'safety');
insert into `aircpit`.`industries` values(12, 'coal loading');
insert into `aircpit`.`industries` values(13, 'platform cleaning');
insert into `aircpit`.`industries` values(14, 'coach cleaning');
insert into `aircpit`.`industries` values(15, 'food');

CREATE TABLE `aircpit`.`functional_areas` (
  `id` int(11) NOT NULL,
  `functional_area` varchar(255) NOT NULL,
  `industries` varchar(255) NOT NULL,
  PRIMARY KEY (`id`));

insert into `aircpit`.`functional_areas` values(1,'engineer', '1,2,3,4,5,6,7,8');
insert into `aircpit`.`functional_areas` values(2,'supervisor', '1,2,3,4,5,6,7,8,9,12,13,14,15');
insert into `aircpit`.`functional_areas` values(3,'sub contractor', '1,2,3,4,5,6,7,8');
insert into `aircpit`.`functional_areas` values(4,'wireman', '1');
insert into `aircpit`.`functional_areas` values(5,'wireman helper', '1');
insert into `aircpit`.`functional_areas` values(6,'fitter', '1,8');
insert into `aircpit`.`functional_areas` values(7,'fitter helper', '1');
insert into `aircpit`.`functional_areas` values(8,'carpenter', '1,7');
insert into `aircpit`.`functional_areas` values(9,'painter', '1');
insert into `aircpit`.`functional_areas` values(10,'labour', '1,3,4,5,6,7,8,9,12,13,14,15');
insert into `aircpit`.`functional_areas` values(11,'material supplier', '1,2,3');
insert into `aircpit`.`functional_areas` values(12,'technician','2');
insert into `aircpit`.`functional_areas` values(13,'cable jointer','2');
insert into `aircpit`.`functional_areas` values(14,'helper','3,8,9,12');
insert into `aircpit`.`functional_areas` values(15,'electrician','3');
insert into `aircpit`.`functional_areas` values(16,'mason','5,6,7');
insert into `aircpit`.`functional_areas` values(17,'welder','9');
insert into `aircpit`.`functional_areas` values(18,'officer-1','10');
insert into `aircpit`.`functional_areas` values(19,'officer-2','10');
insert into `aircpit`.`functional_areas` values(20,'safety officer','11');
insert into `aircpit`.`functional_areas` values(21,'loadman','12');
insert into `aircpit`.`functional_areas` values(22,'master','15');
insert into `aircpit`.`functional_areas` values(23,'server','15');