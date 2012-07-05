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

CREATE TABLE `SMS` (
`idSMS` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`idFuncionario` INT UNSIGNED NOT NULL ,
`idCliente` INT UNSIGNED NOT NULL ,
`numero` VARCHAR( 13 ) NOT NULL ,
`mensagem` VARCHAR( 160 ) NOT NULL ,
`codigoErro` VARCHAR( 25 ) NOT NULL ,
`data` DATETIME NOT NULL ,
CONSTRAINT `fkSMSFuncionario` FOREIGN KEY (`idFuncionario`) REFERENCES `Funcionario`(`idFuncionario`) ,
CONSTRAINT `fkSMSCliente` FOREIGN KEY (`idCliente`) REFERENCES `Cliente`(`idCliente`) 
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `Email` (
`idEmail` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`idFuncionario` INT UNSIGNED NOT NULL ,
`idCliente` INT UNSIGNED NOT NULL ,
`endereco` VARCHAR( 255 ) NOT NULL ,
`mensagem` TEXT NOT NULL ,
`data` DATETIME NOT NULL ,
`estado` TINYINT NOT NULL DEFAULT 1,
`debug` TEXT NULL ,
`assunto` VARCHAR( 255 ) NOT NULL ,
CONSTRAINT `fkEmailFuncionario` FOREIGN KEY (`idFuncionario`) REFERENCES `Funcionario`(`idFuncionario`) ,
CONSTRAINT `fkEmailCliente` FOREIGN KEY (`idCliente`) REFERENCES `Cliente`(`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;