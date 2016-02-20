CREATE  TABLE `aircpit`.`visitors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ip_address` VARCHAR(255) NULL ,
  `createdBy` INT(11) NOT NULL ,
  `createdDate` DATETIME NOT NULL ,
  `modifiedBy` INT(11) NOT NULL ,
  `modifiedDate` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) );


ALTER TABLE `aircpit`.`employer`
ADD COLUMN `createdBy` INT(11) NOT NULL ,
  ADD COLUMN `createdDate` DATETIME NOT NULL ,
  ADD COLUMN  `modifiedBy` INT(11) NOT NULL ,
  ADD COLUMN  `modifiedDate` DATETIME NOT NULL ,
  ADD COLUMN  `status` ENUM('A','I','D') NOT NULL DEFAULT 'A' 
  AFTER `file`;

ALTER TABLE `aircpit`.`user`
ADD COLUMN `createdBy` INT(11) NOT NULL ,
  ADD COLUMN `createdDate` DATETIME NOT NULL ,
  ADD COLUMN  `modifiedBy` INT(11) NOT NULL ,
  ADD COLUMN  `modifiedDate` DATETIME NOT NULL ,
  ADD COLUMN  `status` ENUM('A','I','D') NOT NULL DEFAULT 'A' 
  AFTER `biodata`;