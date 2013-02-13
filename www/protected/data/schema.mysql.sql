SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `yiimti` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `yiimti` ;

-- -----------------------------------------------------
-- Table `yiimti`.`car`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `yiimti`.`car` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `type` ENUM('Car','SportCar','FamilyCar') NULL DEFAULT 'Car' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yiimti`.`sport_car_data`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `yiimti`.`sport_car_data` (
  `car_id` INT NOT NULL ,
  `power` INT NOT NULL ,
  PRIMARY KEY (`car_id`) ,
  CONSTRAINT `fk_sport_car_data_car`
    FOREIGN KEY (`car_id` )
    REFERENCES `yiimti`.`car` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yiimti`.`family_car_data`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `yiimti`.`family_car_data` (
  `car_id` INT NOT NULL ,
  `seats` INT NOT NULL ,
  PRIMARY KEY (`car_id`) ,
  CONSTRAINT `fk_table2_car1`
    FOREIGN KEY (`car_id` )
    REFERENCES `yiimti`.`car` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Placeholder table for view `yiimti`.`view_sport_car`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yiimti`.`view_sport_car` (`id` INT, `name` INT, `type` INT, `power` INT);

-- -----------------------------------------------------
-- Placeholder table for view `yiimti`.`view_family_car`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yiimti`.`view_family_car` (`id` INT, `name` INT, `type` INT, `seats` INT);

-- -----------------------------------------------------
-- View `yiimti`.`view_sport_car`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yiimti`.`view_sport_car`;
USE `yiimti`;
CREATE  OR REPLACE VIEW `yiimti`.`view_sport_car` AS
select c.id, c.name, c.type, sc.power from car c
join sport_car_data sc on sc.car_id = c.id
where c.type='SportCar'
;

-- -----------------------------------------------------
-- View `yiimti`.`view_family_car`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `yiimti`.`view_family_car`;
USE `yiimti`;
CREATE  OR REPLACE VIEW `yiimti`.`view_family_car` AS
select c.id, c.name, c.type, fc.seats from car c
join family_car_data fc on fc.car_id = c.id
where c.type='FamilyCar';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
