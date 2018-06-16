-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema riquest
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema riquest
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `riquest` DEFAULT CHARACTER SET utf8 ;
USE `riquest` ;

-- -----------------------------------------------------
-- Table `riquest`.`processes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`processes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` INT UNSIGNED NULL,
  `order` TINYINT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_process_process_idx` (`parent_id` ASC),
  UNIQUE INDEX `uq_unique_order_for_process` (`parent_id` ASC, `order` ASC),
  CONSTRAINT `fk_process_process`
    FOREIGN KEY (`parent_id`)
    REFERENCES `riquest`.`processes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`scenarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`scenarios` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_scenario_process`
    FOREIGN KEY (`id`)
    REFERENCES `riquest`.`processes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`pois`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`pois` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_poi_process`
    FOREIGN KEY (`id`)
    REFERENCES `riquest`.`processes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`place_steps`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`place_steps` (
  `id` INT UNSIGNED NOT NULL,
  `step_type` ENUM('') NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_place_step_step`
    FOREIGN KEY (`id`)
    REFERENCES `riquest`.`processes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`info_steps`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`info_steps` (
  `id` INT UNSIGNED NOT NULL,
  `step_type` ENUM('') NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_info_step_step`
    FOREIGN KEY (`id`)
    REFERENCES `riquest`.`processes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`task_steps`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`task_steps` (
  `id` INT UNSIGNED NOT NULL,
  `step_type` ENUM('') NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_fun_step_step`
    FOREIGN KEY (`id`)
    REFERENCES `riquest`.`processes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`tasks` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `task_step_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_task_task_step_idx` (`task_step_id` ASC),
  CONSTRAINT `fk_task_task_step`
    FOREIGN KEY (`task_step_id`)
    REFERENCES `riquest`.`task_steps` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`question_tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`question_tasks` (
  `id` INT UNSIGNED NOT NULL,
  `text` VARCHAR(50) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_question_task_task`
    FOREIGN KEY (`id`)
    REFERENCES `riquest`.`tasks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`answers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`answers` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `question_id` INT UNSIGNED NOT NULL,
  `text` VARCHAR(50) NOT NULL,
  `type` ENUM('correct', 'wrong') NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_answer_question_idx` (`question_id` ASC),
  CONSTRAINT `fk_answer_question`
    FOREIGN KEY (`question_id`)
    REFERENCES `riquest`.`question_tasks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`message_stacks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`message_stacks` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` ENUM('general', 'process', 'question', 'correct_answer', 'wrong_answer_reaction_1', 'wrong_answer_reaction_2', 'wrong_answer_reaction_3', '') NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`messages` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `order` TINYINT UNSIGNED NULL,
  `message_stack_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_message_message_stack_idx` (`message_stack_id` ASC),
  CONSTRAINT `fk_message_message_stack`
    FOREIGN KEY (`message_stack_id`)
    REFERENCES `riquest`.`message_stacks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`fun_tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`fun_tasks` (
  `id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_fun_task_task`
    FOREIGN KEY (`id`)
    REFERENCES `riquest`.`tasks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`content_blocks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`content_blocks` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `message_id` INT UNSIGNED NOT NULL,
  `order` TINYINT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_content_block_message_idx` (`message_id` ASC),
  CONSTRAINT `fk_content_block_message`
    FOREIGN KEY (`message_id`)
    REFERENCES `riquest`.`messages` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`text_content_blocks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`text_content_blocks` (
  `id` INT UNSIGNED NOT NULL,
  `text` VARCHAR(1000) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_text_content_block_content_block`
    FOREIGN KEY (`id`)
    REFERENCES `riquest`.`content_blocks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`image_content_blocks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`image_content_blocks` (
  `id` INT UNSIGNED NOT NULL,
  `src` VARCHAR(1000) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_image_content_block_content_block`
    FOREIGN KEY (`id`)
    REFERENCES `riquest`.`content_blocks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`link_content_blocks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`link_content_blocks` (
  `id` INT UNSIGNED NOT NULL,
  `text` VARCHAR(1000) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_link_content_block_content_block`
    FOREIGN KEY (`id`)
    REFERENCES `riquest`.`content_blocks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`audio_content_blocks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`audio_content_blocks` (
  `id` INT UNSIGNED NOT NULL,
  `src` VARCHAR(1000) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_audio_content_block_content_block`
    FOREIGN KEY (`id`)
    REFERENCES `riquest`.`content_blocks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`video_content_blocks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`video_content_blocks` (
  `id` INT UNSIGNED NOT NULL,
  `src` VARCHAR(1000) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_video_content_block_content_block`
    FOREIGN KEY (`id`)
    REFERENCES `riquest`.`content_blocks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`concrete_processes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`concrete_processes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` INT UNSIGNED NULL,
  `type` ENUM('scenario', 'poi', 'step', 'access', 'completion') NOT NULL,
  `state` ENUM('unknown', 'scenario_started') NOT NULL DEFAULT 'unknown',
  PRIMARY KEY (`id`),
  INDEX `fk_concrete_process_concrete_process_idx` (`parent_id` ASC),
  CONSTRAINT `fk_concrete_process_concrete_process`
    FOREIGN KEY (`parent_id`)
    REFERENCES `riquest`.`concrete_processes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`quests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`quests` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `scenario_id` INT UNSIGNED NOT NULL,
  `concrete_process_id` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_quest_scenario_idx` (`scenario_id` ASC),
  INDEX `fk_quest_concrete_process_idx` (`concrete_process_id` ASC),
  CONSTRAINT `fk_quest_scenario`
    FOREIGN KEY (`scenario_id`)
    REFERENCES `riquest`.`scenarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_quest_concrete_process`
    FOREIGN KEY (`concrete_process_id`)
    REFERENCES `riquest`.`concrete_processes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`semantical_message_stacks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`semantical_message_stacks` (
  `id` INT UNSIGNED NOT NULL,
  `semantic` ENUM('hint', 'cancellation', 'answer_fail_reaction', 'failed_attempt_reaction') NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_semantical_message_stack_message_stack`
    FOREIGN KEY (`id`)
    REFERENCES `riquest`.`message_stacks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`process_message_stacks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`process_message_stacks` (
  `id` INT UNSIGNED NOT NULL,
  `processx` ENUM('ScenarioMessageStack', 'PoiMessageStack', 'StepMessageStack') NOT NULL,
  `state` ENUM('bar') NOT NULL,
  `event` ENUM('bar') NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_process_message_stack_message_stack`
    FOREIGN KEY (`id`)
    REFERENCES `riquest`.`message_stacks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`process_process_message_stack`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`process_process_message_stack` (
  `process_id` INT UNSIGNED NOT NULL,
  `process_message_stack_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`process_id`, `process_message_stack_id`),
  INDEX `fk_process_process_message_stack_process_message_stack_idx` (`process_message_stack_id` ASC),
  INDEX `fk_process_process_message_stack_process_idx` (`process_id` ASC),
  CONSTRAINT `fk_process_process_message_stack_process`
    FOREIGN KEY (`process_id`)
    REFERENCES `riquest`.`processes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_process_process_message_stack_process_message_stack`
    FOREIGN KEY (`process_message_stack_id`)
    REFERENCES `riquest`.`process_message_stacks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`tasks_semantical_message_stacks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`tasks_semantical_message_stacks` (
  `task_id` INT UNSIGNED NOT NULL,
  `semantical_message_stack_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`task_id`, `semantical_message_stack_id`),
  INDEX `fk_task_semantical_message_stack_semantical_message_stack_idx` (`semantical_message_stack_id` ASC),
  INDEX `fk_task_semantical_message_stack_task_idx` (`task_id` ASC),
  CONSTRAINT `fk_task_semantical_message_stack_task`
    FOREIGN KEY (`task_id`)
    REFERENCES `riquest`.`tasks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_task_semantical_message_stack_semantical_message_stack`
    FOREIGN KEY (`semantical_message_stack_id`)
    REFERENCES `riquest`.`semantical_message_stacks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `riquest`.`answers_semantical_message_stacks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `riquest`.`answers_semantical_message_stacks` (
  `answer_id` INT UNSIGNED NOT NULL,
  `semantical_message_stack_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`answer_id`, `semantical_message_stack_id`),
  INDEX `fk_answer_semantical_message_stack_semantical_message_stack_idx` (`semantical_message_stack_id` ASC),
  INDEX `fk_answer_semantical_message_stack_answer_idx` (`answer_id` ASC),
  CONSTRAINT `fk_answer_semantical_message_stack_answer`
    FOREIGN KEY (`answer_id`)
    REFERENCES `riquest`.`answers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_answer_semantical_message_stack_semantical_message_stack`
    FOREIGN KEY (`semantical_message_stack_id`)
    REFERENCES `riquest`.`semantical_message_stacks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
