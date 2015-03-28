-- MySQL Script generated by MySQL Workbench
-- 03/27/15 02:59:00
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`account` (
  `id` INT(11) NOT NULL,
  `account_username` VARCHAR(25) NULL,
  `account_password` VARCHAR(25) NULL,
  `account_type` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`teacher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`teacher` (
  `id` INT(11) NOT NULL,
  `teacher_fname` VARCHAR(30) NULL,
  `teacher_midname` VARCHAR(30) NULL,
  `teacher_lname` VARCHAR(30) NULL,
  `teacher_address` VARCHAR(70) NULL,
  `teacher_age` INT(3) NULL,
  `teacher_gender` VARCHAR(6) NULL,
  `teacher_contact` VARCHAR(45) NULL,
  `teacher_birthdate` DATE NULL,
  `account_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_teacher_account1_idx` (`account_id` ASC),
  CONSTRAINT `fk_teacher_account1`
    FOREIGN KEY (`account_id`)
    REFERENCES `mydb`.`account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`section`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`section` (
  `id` INT(11) NOT NULL,
  `section_name` VARCHAR(45) NULL,
  `section_description` VARCHAR(45) NULL,
  `teacher_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_section_teacher1_idx` (`teacher_id` ASC),
  CONSTRAINT `fk_section_teacher1`
    FOREIGN KEY (`teacher_id`)
    REFERENCES `mydb`.`teacher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`year_level`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`year_level` (
  `id` INT NOT NULL,
  `year_level_name` VARCHAR(45) NULL,
  `section_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_year_level_section1_idx` (`section_id` ASC),
  CONSTRAINT `fk_year_level_section1`
    FOREIGN KEY (`section_id`)
    REFERENCES `mydb`.`section` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`student` (
  `id` INT(11) NOT NULL,
  `student_fname` VARCHAR(30) NULL,
  `student_midname` VARCHAR(30) NULL,
  `student_lname` VARCHAR(30) NULL,
  `student_address` VARCHAR(45) NULL,
  `student_age` INT(3) NULL,
  `student_gender` VARCHAR(6) NULL,
  `student_birthdate` DATE NULL,
  `account_id` INT(11) NOT NULL,
  `year_level_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_student_account1_idx` (`account_id` ASC),
  INDEX `fk_student_year_level1_idx` (`year_level_id` ASC),
  CONSTRAINT `fk_student_account1`
    FOREIGN KEY (`account_id`)
    REFERENCES `mydb`.`account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_year_level1`
    FOREIGN KEY (`year_level_id`)
    REFERENCES `mydb`.`year_level` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`grade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`grade` (
  `id` INT NOT NULL,
  `grade_remarks` VARCHAR(45) NULL,
  `grade_date_submitted` TIMESTAMP NULL,
  `student_id` INT(11) NOT NULL,
  `teacher_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_grade_student_idx` (`student_id` ASC),
  INDEX `fk_grade_teacher1_idx` (`teacher_id` ASC),
  CONSTRAINT `fk_grade_student`
    FOREIGN KEY (`student_id`)
    REFERENCES `mydb`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grade_teacher1`
    FOREIGN KEY (`teacher_id`)
    REFERENCES `mydb`.`teacher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`registrar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`registrar` (
  `id` INT(11) NOT NULL,
  `registrar_fname` VARCHAR(45) NULL,
  `registrar_midname` VARCHAR(45) NULL,
  `registrar_lname` VARCHAR(45) NULL,
  `registrar_address` VARCHAR(70) NULL,
  `registrar_age` INT(3) NULL,
  `registrar_gender` VARCHAR(6) NULL,
  `registrar_contact` VARCHAR(45) NULL,
  `registrar_birthdate` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`subject` (
  `id` INT(11) NOT NULL,
  `subject_name` VARCHAR(20) NULL,
  `subect_description` VARCHAR(45) NULL,
  `grade_id` INT NOT NULL,
  `registrar_id` INT(11) NOT NULL,
  `student_id` INT(11) NOT NULL,
  `teacher_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_subject_grade1_idx` (`grade_id` ASC),
  INDEX `fk_subject_registrar1_idx` (`registrar_id` ASC),
  INDEX `fk_subject_student1_idx` (`student_id` ASC),
  INDEX `fk_subject_teacher1_idx` (`teacher_id` ASC),
  CONSTRAINT `fk_subject_grade1`
    FOREIGN KEY (`grade_id`)
    REFERENCES `mydb`.`grade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_registrar1`
    FOREIGN KEY (`registrar_id`)
    REFERENCES `mydb`.`registrar` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `mydb`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_teacher1`
    FOREIGN KEY (`teacher_id`)
    REFERENCES `mydb`.`teacher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`parent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`parent` (
  `id` INT(11) NOT NULL,
  `parent_fname` VARCHAR(30) NULL,
  `parent_midname` VARCHAR(30) NULL,
  `parent_lname` VARCHAR(30) NULL,
  `parent_address` VARCHAR(70) NULL,
  `parent_age` INT(3) NULL,
  `parent_gender` VARCHAR(6) NULL,
  `parent_occupation` VARCHAR(45) NULL,
  `parent_contact` VARCHAR(45) NULL,
  `parent_email` VARCHAR(45) NULL,
  `student_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_parent_student1_idx` (`student_id` ASC),
  CONSTRAINT `fk_parent_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `mydb`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`school_year`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`school_year` (
  `id` INT(11) NOT NULL,
  `school_year_name` VARCHAR(45) NULL,
  `school_year_description` VARCHAR(45) NULL,
  `student_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_school_year_student1_idx` (`student_id` ASC),
  CONSTRAINT `fk_school_year_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `mydb`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;