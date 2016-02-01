CREATE  TABLE `aircpit`.`visitors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ip_address` VARCHAR(255) NULL ,
  `createdBy` INT(11) NOT NULL ,
  `createdDate` DATETIME NOT NULL ,
  `modifiedBy` INT(11) NOT NULL ,
  `modifiedDate` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) );