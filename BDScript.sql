-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Antena
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Antena
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Antena` DEFAULT CHARACTER SET utf8 ;
USE `Antena` ;

-- -----------------------------------------------------
-- Table `Antena`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Antena`.`clientes` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `contraseña` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(15) NOT NULL,
  `last_session` datetime NULL,
  `activacion` INT NULL,
  `token` VARCHAR(200) NULL,
  `token_password` VARCHAR(200) NULL,
  `password_request` INT NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Antena`.`datosEnvio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Antena`.`datosEnvio` (
  `idDatoEnvio` INT NOT NULL AUTO_INCREMENT,
  `idCliente` INT NOT NULL,
  `codigoPostal` TINYINT(8) NOT NULL,
  `calle` VARCHAR(100) NOT NULL,
  `numeroExterior` TINYINT(8) NOT NULL,
  `numeroInterior` TINYINT(8) NULL,
  `entreCalles` VARCHAR(160) NOT NULL,
  `referencias` VARCHAR(160) NULL,
  `estado` VARCHAR(60) NOT NULL,
  `municipio` VARCHAR(160) NOT NULL,
  `colonia` VARCHAR(160) NOT NULL,
  PRIMARY KEY (`idDatoEnvio`),
  INDEX `fk_datosEnvio_clientes_idx` (`idCliente` ASC),
  CONSTRAINT `fk_datosEnvio_clientes`
    FOREIGN KEY (`idCliente`)
    REFERENCES `Antena`.`clientes` (`idCliente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Antena`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Antena`.`producto` (
  `idproducto` INT NOT NULL AUTO_INCREMENT,
  `nombreProducto` VARCHAR(100) NOT NULL,
  `precio` DECIMAL(8,2) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `cantidad` MEDIUMINT NOT NULL,
  `marca` VARCHAR(45) NOT NULL,
  `modelo` VARCHAR(45) NOT NULL,
  `calificacion` VARCHAR(45) NOT NULL,
  `categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idproducto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Antena`.`compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Antena`.`compras` (
  `idCompra` INT NOT NULL,
  `idProducto` INT NOT NULL,
  `numProductos` MEDIUMINT NOT NULL,
  `fechaCompra` VARCHAR(45) NOT NULL,
  `monto` DECIMAL(8,2) NOT NULL,
  PRIMARY KEY (`idCompra`),
  INDEX `fk_compras_producto1_idx` (`idProducto` ASC),
  CONSTRAINT `fk_compras_producto1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `Antena`.`producto` (`idproducto`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `Antena`.`codigo_estado_compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Antena`.`codigo_estado_compra` (
  `codigoEstado` MEDIUMINT NOT NULL,
  `descripcionEstado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`codigoEstado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Antena`.`codigo_metodo_pago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Antena`.`codigo_metodo_pago` (
  `idMetodoPago` MEDIUMINT UNSIGNED NOT NULL,
  `descripcionMetodo` VARCHAR(100) NULL,
  PRIMARY KEY (`idMetodoPago`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Antena`.`orden`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Antena`.`orden` (
  `idorden` INT NOT NULL AUTO_INCREMENT,
  `idCliente` INT NOT NULL,
  `codigoEstado` MEDIUMINT NOT NULL,
  `fechaOrden` DATETIME NOT NULL,
  PRIMARY KEY (`idorden`),
  INDEX `fk_orden_codigo_estado_compra1_idx` (`codigoEstado` ASC),
  INDEX `fk_orden_clientes1_idx` (`idCliente` ASC),
  CONSTRAINT `fk_orden_codigo_estado_compra1`
    FOREIGN KEY (`codigoEstado`)
    REFERENCES `Antena`.`codigo_estado_compra` (`codigoEstado`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_orden_clientes1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `Antena`.`clientes` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Antena`.`Envios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Antena`.`Envios` (
  `idEnvios` INT NOT NULL,
  `orden_idorden` INT NOT NULL,
  `compras_idCompra` INT NOT NULL,
  `datosEnvio_idDatoEnvio` INT NOT NULL,
  PRIMARY KEY (`idEnvios`),
  INDEX `fk_Envios_orden1_idx` (`orden_idorden` ASC),
  INDEX `fk_Envios_compras1_idx` (`compras_idCompra` ASC),
  INDEX `fk_Envios_datosEnvio1_idx` (`datosEnvio_idDatoEnvio` ASC),
  CONSTRAINT `fk_Envios_orden1`
    FOREIGN KEY (`orden_idorden`)
    REFERENCES `Antena`.`orden` (`idorden`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Envios_compras1`
    FOREIGN KEY (`compras_idCompra`)
    REFERENCES `Antena`.`compras` (`idCompra`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Envios_datosEnvio1`
    FOREIGN KEY (`datosEnvio_idDatoEnvio`)
    REFERENCES `Antena`.`datosEnvio` (`idDatoEnvio`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Antena`.`ClienteMetodoPago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Antena`.`ClienteMetodoPago` (
  `idMetodoPago` MEDIUMINT UNSIGNED NOT NULL,
  `idCliente` INT NOT NULL,
  `idClienteMetodoPago` INT NOT NULL AUTO_INCREMENT,
  INDEX `fk_table1_codigo_metodo_pago1_idx` (`idMetodoPago` ASC),
  INDEX `fk_table1_clientes1_idx` (`idCliente` ASC),
  PRIMARY KEY (`idClienteMetodoPago`),
  CONSTRAINT `fk_table1_codigo_metodo_pago1`
    FOREIGN KEY (`idMetodoPago`)
    REFERENCES `Antena`.`codigo_metodo_pago` (`idMetodoPago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_clientes1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `Antena`.`clientes` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
