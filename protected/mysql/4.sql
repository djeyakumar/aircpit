ALTER TABLE `aircpit`.`user` 
ADD COLUMN `showOnSearch` ENUM('Y','N') NOT NULL DEFAULT 'N'  AFTER `biodata` ;

ALTER TABLE `aircpit`.`user` 
ADD COLUMN `iagree` ENUM('Y','N') NOT NULL DEFAULT 'N'  AFTER `status` ;