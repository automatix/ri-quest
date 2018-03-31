-- CREATE DATABASE /*!32312 IF NOT EXISTS*/`riquest_test` /*!40100 DEFAULT CHARACTER SET utf8 */;

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema riquest_test
-- -----------------------------------------------------
-- RI-Quest Test database

-- -----------------------------------------------------
-- Table `foo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `foo` (
  `id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `version` INT UNSIGNED NULL,
  PRIMARY KEY (`id`))
  ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `bar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bar` (
  `id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `version` INT UNSIGNED NULL,
  PRIMARY KEY (`id`))
  ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `buz`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `buz` (
  `id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `version` INT UNSIGNED NULL,
  PRIMARY KEY (`id`))
  ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
