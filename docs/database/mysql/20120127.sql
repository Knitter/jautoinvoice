ALTER TABLE `Configuracao` DROP `grupo` ;

DROP TABLE `Material` ;

CREATE TABLE `Material` (
`idMaterial` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR( 150 ) NOT NULL ,
`precoUnitario` DECIMAL( 10, 4 ) NOT NULL ,
`referencia` VARCHAR ( 25 ) NOT NULL ,
`descricao` TEXT NULL ,
`quantidadeStock` INT NOT NULL DEFAULT 0 ,
`desconto` DECIMAL ( 10, 4 ) NULL ,
`activo` TINYINT NOT NULL DEFAULT 1 ,
`idIVA` INT UNSIGNED NOT NULL ,
CONSTRAINT `fkMaterialIVA` FOREIGN KEY (`idIVA`) REFERENCES `IVA`(`idIVA`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `MaterialFornecedor` (
`idMaterial` INT UNSIGNED NOT NULL ,
`idFornecedor` INT UNSIGNED NOT NULL ,
PRIMARY KEY (`idMaterial`, `idFornecedor`),
CONSTRAINT `fkMFMaterial` FOREIGN KEY (`idMaterial`) REFERENCES `Material`(`idMaterial`) ,
CONSTRAINT `fkMFFornecedor` FOREIGN KEY (`idFornecedor`) REFERENCES `Fornecedor`(`idFornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

ALTER TABLE `FolhaObra` CHANGE `idVeiculo` `idVeiculo` INT UNSIGNED NULL ;
ALTER TABLE `FolhaObra` ADD `matricula` VARCHAR( 12 ) NOT NULL ;

ALTER TABLE `LinhaServico` CHANGE `notas` `notas` VARCHAR( 255 ) NULL ;