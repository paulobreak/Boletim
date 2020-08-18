-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bd_boletim2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_boletim2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_boletim2` DEFAULT CHARACTER SET latin1 ;
USE `bd_boletim2` ;

-- -----------------------------------------------------
-- Table `bd_boletim2`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`perfil` (
  `idperfil` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `perfil` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`idperfil`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;

INSERT INTO `perfil` (`idperfil`,`perfil`) VALUES
(1,'Administrador'),
(2,'Professor'),
(3,'Aluno');

-- -----------------------------------------------------
-- Table `bd_boletim2`.`login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`login` (
  `id_login` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `usuario` VARCHAR(45) NOT NULL COMMENT '',
  `senha` VARCHAR(45) NOT NULL COMMENT '',
  `perfil_idperfil` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id_login`)  COMMENT '',
  INDEX `fk_login_perfil1_idx` (`perfil_idperfil` ASC)  COMMENT '',
  CONSTRAINT `fk_login_perfil1`
    FOREIGN KEY (`perfil_idperfil`)
    REFERENCES `bd_boletim2`.`perfil` (`idperfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;

INSERT INTO `login` (`id_login`, `usuario`, `senha`, `perfil_idperfil`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1),
(2, 'professor', '202cb962ac59075b964b07152d234b70', 2),
(3, 'aluno', '202cb962ac59075b964b07152d234b70', 3);

-- -----------------------------------------------------
-- Table `bd_boletim2`.`pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`pessoa` (
  `Id_Pessoa` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `CPF` VARCHAR(14) NULL DEFAULT NULL COMMENT '',
  `Data_Nascimento` DATE NULL DEFAULT NULL COMMENT '',
  `Nome` VARCHAR(100) NULL DEFAULT NULL COMMENT '',
  `Telefone` VARCHAR(14) NULL DEFAULT NULL COMMENT '',
  `Sexo` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `Turno` VARCHAR(10) NULL DEFAULT NULL COMMENT '',
  `Turma` VARCHAR(10) NULL DEFAULT NULL COMMENT '',
  `matricula` BIGINT(10) NULL DEFAULT NULL COMMENT '',
  `login_id_login` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Pessoa`)  COMMENT '',
  INDEX `fk_pessoa_login1_idx` (`login_id_login` ASC)  COMMENT '',
  CONSTRAINT `fk_pessoa_login1`
    FOREIGN KEY (`login_id_login`)
    REFERENCES `bd_boletim2`.`login` (`id_login`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_boletim2`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`aluno` (
  `Id_aluno` BIGINT(10) NOT NULL AUTO_INCREMENT COMMENT '',
  `Serie` VARCHAR(10) NULL DEFAULT NULL COMMENT '',
  `pessoa_Id_Pessoa` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`Id_aluno`)  COMMENT '',
  INDEX `fk_aluno_pessoa1_idx` (`pessoa_Id_Pessoa` ASC)  COMMENT '',
  CONSTRAINT `fk_aluno_pessoa1`
    FOREIGN KEY (`pessoa_Id_Pessoa`)
    REFERENCES `bd_boletim2`.`pessoa` (`Id_Pessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_boletim2`.`professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`professor` (
  `Id_Prof` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `email` VARCHAR(100) NULL DEFAULT NULL COMMENT '',
  `pessoa_Id_Pessoa` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Prof`)  COMMENT '',
  INDEX `fk_professor_pessoa1_idx` (`pessoa_Id_Pessoa` ASC)  COMMENT '',
  CONSTRAINT `fk_professor_pessoa1`
    FOREIGN KEY (`pessoa_Id_Pessoa`)
    REFERENCES `bd_boletim2`.`pessoa` (`Id_Pessoa`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_boletim2`.`frequencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`frequencia` (
  `Id_frequencia` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `Frequencia_Aula` VARCHAR(10) NULL DEFAULT NULL COMMENT '',
  `professor_Id_Prof` INT(11) NOT NULL COMMENT '',
  `data_frequencia` DATE NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`Id_frequencia`)  COMMENT '',
  INDEX `fk_frequencia_professor1_idx` (`professor_Id_Prof` ASC)  COMMENT '',
  CONSTRAINT `fk_frequencia_professor1`
    FOREIGN KEY (`professor_Id_Prof`)
    REFERENCES `bd_boletim2`.`professor` (`Id_Prof`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_boletim2`.`aluno_frequencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`aluno_frequencia` (
  `Id_aluno_frequencia` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `aluno_frequenciacol` DATETIME NULL DEFAULT NULL COMMENT '',
  `frequencia_Id_frequencia` INT(11) NOT NULL COMMENT '',
  `aluno_Matricula` BIGINT(10) NOT NULL COMMENT '',
  PRIMARY KEY (`Id_aluno_frequencia`)  COMMENT '',
  INDEX `fk_aluno_frequencia_frequencia1_idx` (`frequencia_Id_frequencia` ASC)  COMMENT '',
  INDEX `fk_aluno_frequencia_aluno1_idx` (`aluno_Matricula` ASC)  COMMENT '',
  CONSTRAINT `fk_aluno_frequencia_aluno1`
    FOREIGN KEY (`aluno_Matricula`)
    REFERENCES `bd_boletim2`.`aluno` (`Id_aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aluno_frequencia_frequencia1`
    FOREIGN KEY (`frequencia_Id_frequencia`)
    REFERENCES `bd_boletim2`.`frequencia` (`Id_frequencia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_boletim2`.`aviso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`aviso` (
  `Id_Aviso` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `Data_Aviso` DATE NULL DEFAULT NULL COMMENT '',
  `Aviso_Professor` LONGTEXT NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`Id_Aviso`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_boletim2`.`nota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`nota` (
  `Id_Nota` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `Nota1` DECIMAL(10,2) NULL DEFAULT NULL COMMENT '',
  `Id_Prof` INT(11) NULL DEFAULT NULL COMMENT '',
  `Nota2` DECIMAL(10,2) NULL DEFAULT NULL COMMENT '',
  `aluno_Id_aluno` BIGINT(10) NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Nota`)  COMMENT '',
  INDEX `Id_Prof` (`Id_Prof` ASC)  COMMENT '',
  INDEX `fk_nota_aluno1_idx` (`aluno_Id_aluno` ASC)  COMMENT '',
  CONSTRAINT `fk_nota_aluno1`
    FOREIGN KEY (`aluno_Id_aluno`)
    REFERENCES `bd_boletim2`.`aluno` (`Id_aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `nota_ibfk_1`
    FOREIGN KEY (`Id_Prof`)
    REFERENCES `bd_boletim2`.`professor` (`Id_Prof`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_boletim2`.`disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`disciplina` (
  `Id_Disciplina` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `Nome_disciplina` VARCHAR(15) NULL DEFAULT NULL COMMENT '',
  `professor_Id_Prof` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`Id_Disciplina`)  COMMENT '',
  INDEX `fk_disciplina_professor1_idx` (`professor_Id_Prof` ASC)  COMMENT '',
  CONSTRAINT `fk_disciplina_professor1`
    FOREIGN KEY (`professor_Id_Prof`)
    REFERENCES `bd_boletim2`.`professor` (`Id_Prof`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_boletim2`.`boletim`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`boletim` (
  `Id_Boletim` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `Id_Nota` INT(11) NULL DEFAULT NULL COMMENT '',
  `Matricula` BIGINT(10) NULL DEFAULT NULL COMMENT '',
  `Id_Disciplina` INT(11) NULL DEFAULT NULL COMMENT '',
  `Id_Frequencia` INT(11) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`Id_Boletim`)  COMMENT '',
  INDEX `Cod_Nota` (`Id_Nota` ASC)  COMMENT '',
  INDEX `Matricula` (`Matricula` ASC)  COMMENT '',
  INDEX `Cod_Disciplina` (`Id_Disciplina` ASC)  COMMENT '',
  CONSTRAINT `boletim_ibfk_1`
    FOREIGN KEY (`Id_Nota`)
    REFERENCES `bd_boletim2`.`nota` (`Id_Nota`),
  CONSTRAINT `boletim_ibfk_2`
    FOREIGN KEY (`Matricula`)
    REFERENCES `bd_boletim2`.`aluno` (`Id_aluno`),
  CONSTRAINT `boletim_ibfk_3`
    FOREIGN KEY (`Id_Disciplina`)
    REFERENCES `bd_boletim2`.`disciplina` (`Id_Disciplina`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_boletim2`.`cad_aviso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`cad_aviso` (
  `Id_Prof` INT(11) NULL DEFAULT NULL COMMENT '',
  `Id_Aviso` INT(11) NULL DEFAULT NULL COMMENT '',
  INDEX `Id_Prof` (`Id_Prof` ASC)  COMMENT '',
  INDEX `Cod_Aviso` (`Id_Aviso` ASC)  COMMENT '',
  CONSTRAINT `cad_aviso_ibfk_1`
    FOREIGN KEY (`Id_Prof`)
    REFERENCES `bd_boletim2`.`professor` (`Id_Prof`),
  CONSTRAINT `cad_aviso_ibfk_2`
    FOREIGN KEY (`Id_Aviso`)
    REFERENCES `bd_boletim2`.`aviso` (`Id_Aviso`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_boletim2`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`turma` (
  `Id_Turma` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `Turno_Turma` VARCHAR(10) NULL DEFAULT NULL COMMENT '',
  `Serie` VARCHAR(10) NULL DEFAULT NULL COMMENT '',
  `Nome` VARCHAR(10) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`Id_Turma`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_boletim2`.`disciplina_turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`disciplina_turma` (
  `Id_Turma` INT(11) NULL DEFAULT NULL COMMENT '',
  `Id_Disciplina` INT(11) NULL DEFAULT NULL COMMENT '',
  INDEX `Cod_Turma` (`Id_Turma` ASC)  COMMENT '',
  INDEX `Cod_Disciplina` (`Id_Disciplina` ASC)  COMMENT '',
  CONSTRAINT `disciplina_turma_ibfk_1`
    FOREIGN KEY (`Id_Turma`)
    REFERENCES `bd_boletim2`.`turma` (`Id_Turma`),
  CONSTRAINT `disciplina_turma_ibfk_2`
    FOREIGN KEY (`Id_Disciplina`)
    REFERENCES `bd_boletim2`.`disciplina` (`Id_Disciplina`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_boletim2`.`pesquisa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`pesquisa` (
  `Id_Aviso` INT(11) NULL DEFAULT NULL COMMENT '',
  `Matricula` BIGINT(10) NULL DEFAULT NULL COMMENT '',
  INDEX `Cod_Aviso` (`Id_Aviso` ASC)  COMMENT '',
  INDEX `Matricula` (`Matricula` ASC)  COMMENT '',
  CONSTRAINT `pesquisa_ibfk_1`
    FOREIGN KEY (`Id_Aviso`)
    REFERENCES `bd_boletim2`.`aviso` (`Id_Aviso`),
  CONSTRAINT `pesquisa_ibfk_2`
    FOREIGN KEY (`Matricula`)
    REFERENCES `bd_boletim2`.`aluno` (`Id_aluno`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_boletim2`.`turma_aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_boletim2`.`turma_aluno` (
  `Matricula` BIGINT(10) NULL DEFAULT NULL COMMENT '',
  `Id_Turma` INT(11) NULL DEFAULT NULL COMMENT '',
  INDEX `Matricula` (`Matricula` ASC)  COMMENT '',
  INDEX `Cod_Turma` (`Id_Turma` ASC)  COMMENT '',
  CONSTRAINT `turma_aluno_ibfk_1`
    FOREIGN KEY (`Matricula`)
    REFERENCES `bd_boletim2`.`aluno` (`Id_aluno`),
  CONSTRAINT `turma_aluno_ibfk_2`
    FOREIGN KEY (`Id_Turma`)
    REFERENCES `bd_boletim2`.`turma` (`Id_Turma`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
