
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- aluno_turma
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `aluno_turma`;

CREATE TABLE `aluno_turma`
(
    `SQ_PESSOA` INTEGER NOT NULL,
    `SQ_TURMA` INTEGER NOT NULL,
    INDEX `fk_ALUNO_TURMA_ALUNO_idx` (`SQ_PESSOA`),
    INDEX `fk_ALUNO_TURMA_TURMA1_idx` (`SQ_TURMA`),
    CONSTRAINT `fk_ALUNO_TURMA_ALUNO`
        FOREIGN KEY (`SQ_PESSOA`)
        REFERENCES `pessoa` (`SQ_PESSOA`),
    CONSTRAINT `fk_ALUNO_TURMA_TURMA1`
        FOREIGN KEY (`SQ_TURMA`)
        REFERENCES `turma` (`SQ_TURMA`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- endereco
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco`
(
    `SQ_ENDERECO` INTEGER NOT NULL AUTO_INCREMENT,
    `BAIRRO` VARCHAR(50),
    `RUA` VARCHAR(50),
    `CEP` VARCHAR(10),
    `COMPLEMENTO` VARCHAR(50),
    `CIDADE` VARCHAR(50),
    `NUMERO` VARCHAR(20),
    `ID_UF` INTEGER NOT NULL,
    PRIMARY KEY (`SQ_ENDERECO`),
    INDEX `fk_ENDERECO_UF1_idx` (`ID_UF`),
    CONSTRAINT `fk_ENDERECO_UF1`
        FOREIGN KEY (`ID_UF`)
        REFERENCES `uf` (`ID_UF`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- faixa
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `faixa`;

CREATE TABLE `faixa`
(
    `ID_FAIXA` INTEGER NOT NULL,
    `DS_FAIXA` VARCHAR(50),
    PRIMARY KEY (`ID_FAIXA`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- modalidade
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `modalidade`;

CREATE TABLE `modalidade`
(
    `ID_MODALIDADE` INTEGER NOT NULL,
    `DESCRICAO` VARCHAR(50),
    PRIMARY KEY (`ID_MODALIDADE`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- pessoa
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pessoa`;

CREATE TABLE `pessoa`
(
    `SQ_PESSOA` INTEGER NOT NULL,
    `NOME` VARCHAR(50) NOT NULL,
    `RG` VARCHAR(9) NOT NULL,
    `CPF` VARCHAR(14) NOT NULL,
    `DT_NASCIMENTO` DATETIME,
    `TEL_RESIDENCIAL` VARCHAR(14),
    `TEL_CELULAR` VARCHAR(14),
    `NOME_PAI` VARCHAR(50),
    `NOME_MAE` VARCHAR(50),
    `EMAIL` VARCHAR(100),
    `DT_ENTRADA` DATETIME,
    `SQ_ENDERECO` INTEGER NOT NULL,
    `ID_FAIXA` INTEGER,
    PRIMARY KEY (`SQ_PESSOA`),
    INDEX `fk_PESSOA_ENDERECO1_idx` (`SQ_ENDERECO`),
    INDEX `fk_PESSOA_FAIXA1_idx` (`ID_FAIXA`),
    CONSTRAINT `fk_PESSOA_ENDERECO1`
        FOREIGN KEY (`SQ_ENDERECO`)
        REFERENCES `endereco` (`SQ_ENDERECO`),
    CONSTRAINT `fk_PESSOA_FAIXA1`
        FOREIGN KEY (`ID_FAIXA`)
        REFERENCES `faixa` (`ID_FAIXA`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- turma
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `turma`;

CREATE TABLE `turma`
(
    `SQ_TURMA` INTEGER NOT NULL AUTO_INCREMENT,
    `HORARIO` TIME NOT NULL,
    `SQ_PESSOA` INTEGER NOT NULL,
    `ID_MODALIDADE` INTEGER NOT NULL,
    PRIMARY KEY (`SQ_TURMA`),
    INDEX `fk_TURMA_PESSOA1_idx` (`SQ_PESSOA`),
    INDEX `fk_TURMA_MODALIDADE1_idx` (`ID_MODALIDADE`),
    CONSTRAINT `fk_TURMA_MODALIDADE1`
        FOREIGN KEY (`ID_MODALIDADE`)
        REFERENCES `modalidade` (`ID_MODALIDADE`),
    CONSTRAINT `fk_TURMA_PESSOA1`
        FOREIGN KEY (`SQ_PESSOA`)
        REFERENCES `pessoa` (`SQ_PESSOA`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- uf
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `uf`;

CREATE TABLE `uf`
(
    `ID_UF` INTEGER NOT NULL,
    `NM_UF` VARCHAR(2),
    `DS_UF` VARCHAR(50),
    PRIMARY KEY (`ID_UF`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
