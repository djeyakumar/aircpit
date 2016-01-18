CREATE DATABASE `aircpit` ;

CREATE  TABLE `aircpit`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(255) NULL ,
  `lastname` VARCHAR(255) NULL ,
  `username` VARCHAR(255) NULL ,
  `password` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `mobile` VARCHAR(255) NULL ,
  `telephone` VARCHAR(255) NULL ,
  `current_location` VARCHAR(255) NULL ,
  `experience` VARCHAR(255) NULL ,
  `skills` VARCHAR(255) NULL ,
  `address1` VARCHAR(255) NULL ,
  `address2` VARCHAR(255) NULL ,
  `photo` VARCHAR(255) NULL ,
  `biodata` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) );
