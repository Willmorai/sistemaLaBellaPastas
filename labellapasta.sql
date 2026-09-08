SELECT * FROM mydb.categoria;
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pagamento` (
  `id_pagamento` INT NOT NULL AUTO_INCREMENT,
  `tipo_pagamento` VARCHAR(45) NULL,
  PRIMARY KEY (`id_pagamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`mesa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`mesa` (
  `id_mesa` INT NOT NULL AUTO_INCREMENT,
  `numero` INT NULL,
  PRIMARY KEY (`id_mesa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`garcom`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`garcom` (
  `id_garcom` INT NOT NULL AUTO_INCREMENT,
  `nome_garcom` VARCHAR(45) NULL,
  PRIMARY KEY (`id_garcom`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pedido` (
  `id_pedido` INT NOT NULL AUTO_INCREMENT,
  `data_pedido` TIMESTAMP NULL,
  `id_pagamento` INT NOT NULL,
  `id_mesa` INT NOT NULL,
  `id_garcom` INT NOT NULL,
  PRIMARY KEY (`id_pedido`),
  INDEX `fk_pedido_pagamento1_idx` (`id_pagamento` ASC) VISIBLE,
  INDEX `fk_pedido_mesa1_idx` (`id_mesa` ASC) VISIBLE,
  INDEX `fk_pedido_garcom1_idx` (`id_garcom` ASC) VISIBLE,
  CONSTRAINT `fk_pedido_pagamento1`
    FOREIGN KEY (`id_pagamento`)
    REFERENCES `mydb`.`pagamento` (`id_pagamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_mesa1`
    FOREIGN KEY (`id_mesa`)
    REFERENCES `mydb`.`mesa` (`id_mesa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_garcom1`
    FOREIGN KEY (`id_garcom`)
    REFERENCES `mydb`.`garcom` (`id_garcom`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`produto` (
  `id_produto` INT NOT NULL AUTO_INCREMENT,
  `nome_produto` VARCHAR(45) NULL,
  `preco` DECIMAL NULL,
  `categoria_idcategoria` INT NOT NULL,
  PRIMARY KEY (`id_produto`),
  INDEX `fk_produto_categoria_idx` (`categoria_idcategoria` ASC) VISIBLE,
  CONSTRAINT `fk_produto_categoria`
    FOREIGN KEY (`categoria_idcategoria`)
    REFERENCES `mydb`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pedido_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pedido_produto` (
  `id_pedido_produto` INT NOT NULL AUTO_INCREMENT,
  `id_produto` INT NOT NULL,
  `quantidade` INT NULL,
  PRIMARY KEY (`id_pedido_produto`, `id_produto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`produto_has_pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`produto_has_pedido` (
  `id_produto` INT NOT NULL,
  `id_pedido` INT NOT NULL,
  PRIMARY KEY (`id_produto`, `id_pedido`),
  INDEX `fk_produto_has_pedido_pedido1_idx` (`id_pedido` ASC) VISIBLE,
  INDEX `fk_produto_has_pedido_produto1_idx` (`id_produto` ASC) VISIBLE,
  CONSTRAINT `fk_produto_has_pedido_produto1`
    FOREIGN KEY (`id_produto`)
    REFERENCES `mydb`.`produto` (`id_produto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_has_pedido_pedido1`
    FOREIGN KEY (`id_pedido`)
    REFERENCES `mydb`.`pedido` (`id_pedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;