CREATE TABLE `LinhaGasto` (
`idLinhaGasto` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`quantidade` TINYINT NOT NULL ,
`precoUnitario` DECIMAL( 10,4 ) NOT NULL , 
`desconto` DECIMAL( 10,4 ) NULL , 
`idMaterial` INT UNSIGNED NOT NULL ,
`idIVA` INT UNSIGNED NOT NULL ,
`idLinhaServico` INT UNSIGNED NOT NULL ,
`activo` TINYINT NOT NULL DEFAULT 1 ,
CONSTRAINT `fkLinhaGastoMaterial` FOREIGN KEY (`idMaterial`) REFERENCES `Material`(`idMaterial`) ,
CONSTRAINT `fkLinhaGastoIVA` FOREIGN KEY (`idIVA`) REFERENCES `IVA`(`idIVA`) ,
CONSTRAINT `fkLinhaGastoLinhaServico` FOREIGN KEY (`idLinhaServico`) REFERENCES `LinhaServico`(`idLinhaServico`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;