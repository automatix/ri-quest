-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS,
                         UNIQUE_CHECKS=0;


SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS,
                              FOREIGN_KEY_CHECKS=0;


SET @OLD_SQL_MODE=@@SQL_MODE,
                    SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema riquest
-- -----------------------------------------------------
 -- -----------------------------------------------------
-- Schema riquest
-- -----------------------------------------------------

CREATE SCHEMA IF NOT EXISTS `riquest` DEFAULT CHARACTER
SET utf8mb4 ;

USE `riquest` ;

-- -----------------------------------------------------
-- Table `riquest`.`processes`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`processes` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                                                                 `parent_id` INT(10) UNSIGNED NULL DEFAULT NULL,
                                                                                                                           `order` TINYINT(1) NOT NULL,
                                                                                                                                              PRIMARY KEY (`id`), UNIQUE INDEX `uq_unique_order_for_process` (`parent_id` ASC, `order` ASC),
                                                                                                                                                                               INDEX `fk_process_process_idx` (`parent_id` ASC),
                                                                                                                                                                                     CONSTRAINT `FK_A4289E4C727ACA70`
                                                  FOREIGN KEY (`parent_id`) REFERENCES `riquest`.`processes` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`scenarios`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`scenarios` (`id` INT(10) UNSIGNED NOT NULL,
                                                                        PRIMARY KEY (`id`), CONSTRAINT `FK_9338D025BF396750`
                                                  FOREIGN KEY (`id`) REFERENCES `riquest`.`processes` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`pois`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`pois` (`id` INT(10) UNSIGNED NOT NULL,
                                                                   PRIMARY KEY (`id`), CONSTRAINT `FK_74C303F5BF396750`
                                             FOREIGN KEY (`id`) REFERENCES `riquest`.`processes` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`place_steps`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`place_steps` (`id` INT(10) UNSIGNED NOT NULL,
                                                                          `step_type` VARCHAR(255) CHARACTER
                                                    SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                                                                                               PRIMARY KEY (`id`), CONSTRAINT `FK_9D541151BF396750`
                                                    FOREIGN KEY (`id`) REFERENCES `riquest`.`processes` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`info_steps`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`info_steps` (`id` INT(10) UNSIGNED NOT NULL,
                                                                         `step_type` VARCHAR(255) CHARACTER
                                                   SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                                                                                              PRIMARY KEY (`id`), CONSTRAINT `FK_3E7BCF87BF396750`
                                                   FOREIGN KEY (`id`) REFERENCES `riquest`.`processes` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`task_steps`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`task_steps` (`id` INT(10) UNSIGNED NOT NULL,
                                                                         `step_type` VARCHAR(255) CHARACTER
                                                   SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                                                                                              PRIMARY KEY (`id`), CONSTRAINT `FK_F3861152BF396750`
                                                   FOREIGN KEY (`id`) REFERENCES `riquest`.`processes` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`tasks`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`tasks` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                                                             `task_step_id` INT(10) UNSIGNED NULL DEFAULT NULL,
                                                                                                                          PRIMARY KEY (`id`), INDEX `fk_task_task_step_idx` (`task_step_id` ASC),
                                                                                                                                                    CONSTRAINT `FK_505865976C533476`
                                              FOREIGN KEY (`task_step_id`) REFERENCES `riquest`.`task_steps` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`question_tasks`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`question_tasks` (`id` INT(10) UNSIGNED NOT NULL,
                                                                             `text` VARCHAR(50) CHARACTER
                                                       SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
                                                                                                               PRIMARY KEY (`id`), CONSTRAINT `FK_60B37493BF396750`
                                                       FOREIGN KEY (`id`) REFERENCES `riquest`.`tasks` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`answers`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`answers` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                                                               `question_id` INT(10) UNSIGNED NULL DEFAULT NULL,
                                                                                                                           `text` VARCHAR(50) CHARACTER
                                                SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                                                                                           `type` VARCHAR(255) CHARACTER
                                                SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
                                                                                                        PRIMARY KEY (`id`), INDEX `fk_answer_question_idx` (`question_id` ASC),
                                                                                                                                  CONSTRAINT `FK_50D0C6061E27F6BF`
                                                FOREIGN KEY (`question_id`) REFERENCES `riquest`.`question_tasks` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`message_stacks`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`message_stacks` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                                                                      `type` VARCHAR(255) CHARACTER
                                                       SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
                                                                                                               PRIMARY KEY (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`messages`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`messages` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                                                                `message_stack_id` INT(10) UNSIGNED NULL DEFAULT NULL,
                                                                                                                                 `order` TINYINT(1) NULL DEFAULT NULL,
                                                                                                                                                                 PRIMARY KEY (`id`), INDEX `fk_message_message_stack_idx` (`message_stack_id` ASC),
                                                                                                                                                                                           CONSTRAINT `FK_DB021E963EE1C471`
                                                 FOREIGN KEY (`message_stack_id`) REFERENCES `riquest`.`message_stacks` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`fun_tasks`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`fun_tasks` (`id` INT(10) UNSIGNED NOT NULL,
                                                                        PRIMARY KEY (`id`), CONSTRAINT `FK_9DEB6C64BF396750`
                                                  FOREIGN KEY (`id`) REFERENCES `riquest`.`tasks` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`text_content_blocks`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`text_content_blocks` (`id` INT(10) UNSIGNED NOT NULL,
                                                                                  `text` VARCHAR(1000) CHARACTER
                                                            SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                                                                                                       PRIMARY KEY (`id`), CONSTRAINT `FK_6C1D09C3BF396750`
                                                            FOREIGN KEY (`id`) REFERENCES `riquest`.`content_blocks` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`semantical_message_stacks`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`semantical_message_stacks` (`id` INT(10) UNSIGNED NOT NULL,
                                                                                        `semantic` VARCHAR(255) CHARACTER
                                                                  SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
                                                                                                                          PRIMARY KEY (`id`), CONSTRAINT `FK_1F915555BF396750`
                                                                  FOREIGN KEY (`id`) REFERENCES `riquest`.`message_stacks` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`content_blocks`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`content_blocks` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                                                                      `message_id` INT(10) UNSIGNED NULL DEFAULT NULL,
                                                                                                                                 `order` TINYINT(1) NULL DEFAULT NULL,
                                                                                                                                                                 PRIMARY KEY (`id`), INDEX `fk_content_block_message_idx` (`message_id` ASC),
                                                                                                                                                                                           CONSTRAINT `FK_A6DBE5D4537A1329`
                                                       FOREIGN KEY (`message_id`) REFERENCES `riquest`.`messages` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`answers_semantical_message_stacks`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`answers_semantical_message_stacks` (`answer_id` INT(10) UNSIGNED NOT NULL,
                                                                                                       `semantical_message_stack_id` INT(10) UNSIGNED NOT NULL,
                                                                                                                                                      PRIMARY KEY (`answer_id`,
                                                                                                                                                                   `semantical_message_stack_id`), INDEX `IDX_E8647BEAAA334807` (`answer_id` ASC),
                                                                                                                                                                                                         INDEX `IDX_E8647BEA52A3CB2F` (`semantical_message_stack_id` ASC),
                                                                                                                                                                                                               CONSTRAINT `FK_E8647BEA52A3CB2F`
                                                                          FOREIGN KEY (`semantical_message_stack_id`) REFERENCES `riquest`.`semantical_message_stacks` (`id`),
                                                                                                                                 CONSTRAINT `FK_E8647BEAAA334807`
                                                                          FOREIGN KEY (`answer_id`) REFERENCES `riquest`.`answers` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`audio_content_blocks`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`audio_content_blocks` (`id` INT(10) UNSIGNED NOT NULL,
                                                                                   `src` VARCHAR(1000) CHARACTER
                                                             SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
                                                                                                                     PRIMARY KEY (`id`), CONSTRAINT `FK_E718E1DEBF396750`
                                                             FOREIGN KEY (`id`) REFERENCES `riquest`.`content_blocks` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`concrete_processes`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`concrete_processes` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                                                                          `parent_id` INT(10) UNSIGNED NULL DEFAULT NULL,
                                                                                                                                    `type` VARCHAR(255) CHARACTER
                                                           SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                                                                                                      `state` VARCHAR(255) CHARACTER
                                                           SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL DEFAULT 'unknown',
                                                                                                                       PRIMARY KEY (`id`), INDEX `fk_concrete_process_concrete_process_idx` (`parent_id` ASC),
                                                                                                                                                 CONSTRAINT `FK_819D2361727ACA70`
                                                           FOREIGN KEY (`parent_id`) REFERENCES `riquest`.`concrete_processes` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`image_content_blocks`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`image_content_blocks` (`id` INT(10) UNSIGNED NOT NULL,
                                                                                   `src` VARCHAR(1000) CHARACTER
                                                             SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                                                                                                        PRIMARY KEY (`id`), CONSTRAINT `FK_314D32BEBF396750`
                                                             FOREIGN KEY (`id`) REFERENCES `riquest`.`content_blocks` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`link_content_blocks`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`link_content_blocks` (`id` INT(10) UNSIGNED NOT NULL,
                                                                                  `text` VARCHAR(1000) CHARACTER
                                                            SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
                                                                                                                    PRIMARY KEY (`id`), CONSTRAINT `FK_B2AF2197BF396750`
                                                            FOREIGN KEY (`id`) REFERENCES `riquest`.`content_blocks` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`migration_versions`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`migration_versions` (`version` VARCHAR(255) CHARACTER
                                                           SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
                                                                                                PRIMARY KEY (`version`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8 COLLATE = utf8_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`process_message_stacks`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`process_message_stacks` (`id` INT(10) UNSIGNED NOT NULL,
                                                                                     `processx` VARCHAR(255) CHARACTER
                                                               SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                                                                                                          `state` VARCHAR(255) CHARACTER
                                                               SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                                                                                                          `event` VARCHAR(255) CHARACTER
                                                               SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
                                                                                                          PRIMARY KEY (`id`), CONSTRAINT `FK_5C53BA4EBF396750`
                                                               FOREIGN KEY (`id`) REFERENCES `riquest`.`message_stacks` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`process_process_message_stack`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`process_process_message_stack` (`process_id` INT(10) UNSIGNED NOT NULL,
                                                                                                    `process_message_stack_id` INT(10) UNSIGNED NOT NULL,
                                                                                                                                                PRIMARY KEY (`process_id`,
                                                                                                                                                             `process_message_stack_id`), INDEX `IDX_12130B1C7EC2F574` (`process_id` ASC),
                                                                                                                                                                                                INDEX `IDX_12130B1CCB20BC9E` (`process_message_stack_id` ASC),
                                                                                                                                                                                                      CONSTRAINT `FK_12130B1C7EC2F574`
                                                                      FOREIGN KEY (`process_id`) REFERENCES `riquest`.`processes` (`id`),
                                                                                                            CONSTRAINT `FK_12130B1CCB20BC9E`
                                                                      FOREIGN KEY (`process_message_stack_id`) REFERENCES `riquest`.`process_message_stacks` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`quests`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`quests` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                                                              `concrete_process_id` INT(10) UNSIGNED NULL DEFAULT NULL,
                                                                                                                                  `scenario_id` INT(10) UNSIGNED NULL DEFAULT NULL,
                                                                                                                                                                              PRIMARY KEY (`id`), INDEX `fk_quest_scenario_idx` (`scenario_id` ASC),
                                                                                                                                                                                                        INDEX `fk_quest_concrete_process_idx` (`concrete_process_id` ASC),
                                                                                                                                                                                                              CONSTRAINT `FK_989E5D343B381CBC`
                                               FOREIGN KEY (`concrete_process_id`) REFERENCES `riquest`.`concrete_processes` (`id`),
                                                                                              CONSTRAINT `FK_989E5D34E04E49DF`
                                               FOREIGN KEY (`scenario_id`) REFERENCES `riquest`.`scenarios` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`tasks_semantical_message_stacks`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`tasks_semantical_message_stacks` (`task_id` INT(10) UNSIGNED NOT NULL,
                                                                                                   `semantical_message_stack_id` INT(10) UNSIGNED NOT NULL,
                                                                                                                                                  PRIMARY KEY (`task_id`,
                                                                                                                                                               `semantical_message_stack_id`), INDEX `IDX_40B34EEA8DB60186` (`task_id` ASC),
                                                                                                                                                                                                     INDEX `IDX_40B34EEA52A3CB2F` (`semantical_message_stack_id` ASC),
                                                                                                                                                                                                           CONSTRAINT `FK_40B34EEA52A3CB2F`
                                                                        FOREIGN KEY (`semantical_message_stack_id`) REFERENCES `riquest`.`semantical_message_stacks` (`id`),
                                                                                                                               CONSTRAINT `FK_40B34EEA8DB60186`
                                                                        FOREIGN KEY (`task_id`) REFERENCES `riquest`.`tasks` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `riquest`.`video_content_blocks`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `riquest`.`video_content_blocks` (`id` INT(10) UNSIGNED NOT NULL,
                                                                                   `src` VARCHAR(1000) CHARACTER
                                                             SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
                                                                                                                     PRIMARY KEY (`id`), CONSTRAINT `FK_8009AF54BF396750`
                                                             FOREIGN KEY (`id`) REFERENCES `riquest`.`content_blocks` (`id`)) ENGINE = InnoDB DEFAULT CHARACTER
SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;


SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;


SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
