/* This file is part of jAutoInvoice, a car workshop management software.
 * 
 * Copyright (c) 2012, Sérgio Lopes.
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 * 
 * http://sourceforge.net/projects/jautoinvoice
 */

CREATE TABLE `Sessao` (
`idDadosSessao` INT UNSIGNED NOT NULL PRIMARY KEY ,
`token` VARCHAR( 32 ) NULL, 
`dataExpiracao` DATETIME NULL ,
`ultimaActividade` DATETIME NULL ,
`idCliente` INT UNSIGNED NULL ,
`idFuncionario` INT UNSIGNED NULL
) ENGINE=MyISAM ;

CREATE TABLE `Cliente` (
`idCliente` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`email` VARCHAR( 255 ) NULL ,
`password` VARCHAR( 40 ) NULL ,
`nome` VARCHAR( 255 ) NOT NULL ,
`contribuinte` VARCHAR( 9 ) NOT NULL ,
`telefone` VARCHAR ( 13 ) NULL ,
`telemovel` VARCHAR ( 13 ) NULL ,
`morada` VARCHAR( 255 ) NULL ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `Funcionario` (
`idFuncionario` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`username` VARCHAR( 100 ) NOT NULL UNIQUE ,
`password` VARCHAR( 40 ) NOT NULL ,
`valorHora` DECIMAL (10,4) NULL ,
`nome` VARCHAR( 255 ) NOT NULL ,
`contribuinte` VARCHAR( 9 ) NULL ,
`telefone` VARCHAR ( 13 ) NULL ,
`telemovel` VARCHAR ( 13 ) NULL ,
`admin` TINYINT NOT NULL DEFAULT 0,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `Fornecedor` (
`idFornecedor` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR( 255 ) NOT NULL ,
`email` VARCHAR( 255 ) NULL ,
`notas` TEXT NULL ,
`telefone` VARCHAR ( 13 ) NULL ,
`telemovel` VARCHAR ( 13 ) NULL ,
`website` VARCHAR ( 255 ) NULL ,
`morada` VARCHAR( 255 ) NULL ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `Marca` (
`idMarca` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR ( 100 ) NOT NULL UNIQUE ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `Modelo` (
`idModelo` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR( 100 ) NOT NULL UNIQUE ,
`activo` TINYINT NOT NULL DEFAULT 1,
`idMarca` INT UNSIGNED NOT NULL ,
CONSTRAINT `fkModeloMarca` FOREIGN KEY (`idMarca`) REFERENCES `Marca`(`idMarca`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `Categoria` (
`idCategoria` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR( 100 ) NOT NULL UNIQUE ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `Combustivel` (
`idCombustivel` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR( 100 ) NOT NULL UNIQUE ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `Veiculo` (
`idVeiculo` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`dataRegisto` DATE NULL ,
`matricula` VARCHAR( 12 ) NOT NULL UNIQUE ,
`nrChassis` VARCHAR( 25 ) NULL ,
`cilindrada` VARCHAR( 25 ) NULL ,
`nrMotor` VARCHAR( 25 ) NULL ,   
`notas` TEXT NULL ,
`activo` TINYINT NOT NULL DEFAULT 1 ,
`idCliente` INT UNSIGNED NOT NULL ,
`idCategoria` INT UNSIGNED NOT NULL ,
`idCombustivel` INT UNSIGNED NOT NULL ,
`idModelo` INT UNSIGNED NOT NULL ,
CONSTRAINT `fkVeiculoCliente` FOREIGN KEY (`idCliente`) REFERENCES `Cliente`(`idCliente`) ,
CONSTRAINT `fkVeiculoCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `Categoria`(`idCategoria`) ,
CONSTRAINT `fkVeiculoCombustivel` FOREIGN KEY (`idCombustivel`) REFERENCES `Combustivel`(`idCombustivel`) ,
CONSTRAINT `fkVeiculoModelo` FOREIGN KEY (`idModelo`) REFERENCES `Modelo`(`idModelo`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `ClienteVeiculo` (
`idVeiculo` INT UNSIGNED NOT NULL ,
`idCliente` INT UNSIGNED NOT NULL ,
PRIMARY KEY (`idVeiculo`, `idCliente`),
CONSTRAINT `fkClienteVeiculoCliente` FOREIGN KEY (`idCliente`) REFERENCES `Cliente`(`idCliente`) ,
CONSTRAINT `fkClienteVeiculoVeiculo` FOREIGN KEY (`idVeiculo`) REFERENCES `Veiculo`(`idVeiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `FolhaObra` (
`idFolhaObra` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`data` DATETIME NOT NULL ,
`descricaoAvaria` TEXT NULL ,
`kms` INT NOT NULL ,
`activo` TINYINT NOT NULL DEFAULT 1 ,
`matricula` VARCHAR( 12 ) NOT NULL ,
`idVeiculo` INT UNSIGNED NULL ,
`idFuncionario` INT UNSIGNED NOT NULL ,
CONSTRAINT `FolhaObraVeiculo` FOREIGN KEY (`idVeiculo`) REFERENCES `Veiculo`(`idVeiculo`) ,
CONSTRAINT `FolhaObraFuncionario` FOREIGN KEY (`idFuncionario`) REFERENCES `Funcionario`(`idFuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `Iva` (
`idIva` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`descricao` VARCHAR( 255 ) NOT NULL ,
`percentagem` FLOAT NOT NULL ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `Marcacao` (
`idMarcacao` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`dataMarcacao` DATETIME NOT NULL ,
`idFolhaObra` INT UNSIGNED NULL ,
`idVeiculo` INT UNSIGNED NULL ,
`criado` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
`descricao` VARCHAR( 150 ) NULL ,
`notas` TEXT NULL ,
`dataFecho` DATETIME NULL ,
`activo` TINYINT NOT NULL DEFAULT 1 ,
CONSTRAINT `fkMFolhaObra` FOREIGN KEY (`idFolhaObra`) REFERENCES `FolhaObra`(`idFolhaObra`) ,
CONSTRAINT `fkMVeiculo` FOREIGN KEY (`idVeiculo`) REFERENCES `Veiculo`(`idVeiculo`) 
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `Servico` (
`idServico` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR( 255 ) NOT NULL UNIQUE ,
`descricao` TEXT NULL ,
`preco` DECIMAL (10, 4) NULL ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `LinhaServico` (
`idLinhaServico` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`duracao` DOUBLE NOT NULL ,
`valorHora` DECIMAL( 10, 4 ) NULL ,
`notas` VARCHAR( 255 ) NULL ,
`custoServico` DECIMAL (10, 4) NULL ,
`activo` TINYINT NOT NULL DEFAULT 1 ,
`idFuncionario` INT UNSIGNED NOT NULL ,
`idServico`  INT UNSIGNED NOT NULL ,
`idFolhaObra` INT UNSIGNED NOT NULL ,
CONSTRAINT `fkLinhaServicoFuncionario` FOREIGN KEY (`idFuncionario`) REFERENCES `Funcionario`(`idFuncionario`) ,
CONSTRAINT `fkLinhaServicoFolhaObra` FOREIGN KEY (`idFolhaObra`) REFERENCES `FolhaObra`(`idFolhaObra`) ,
CONSTRAINT `fkLinhaServicoServico` FOREIGN KEY (`idServico`) REFERENCES `Servico`(`idServico`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `Configuracao` (
`chave` VARCHAR( 150 ) NOT NULL PRIMARY KEY ,
`valor` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `Material` (
`idMaterial` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR( 150 ) NOT NULL ,
`precoUnitario` DECIMAL( 10, 4 ) NOT NULL ,
`referencia` VARCHAR ( 25 ) NOT NULL ,
`descricao` TEXT NULL ,
`quantidadeStock` INT NOT NULL DEFAULT 0 ,
`activo` TINYINT NOT NULL DEFAULT 1 ,
`idIva` INT UNSIGNED NOT NULL ,
CONSTRAINT `fkMaterialIva` FOREIGN KEY (`idIva`) REFERENCES `Iva`(`idIva`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `MaterialFornecedor` (
`idMaterial` INT UNSIGNED NOT NULL ,
`idFornecedor` INT UNSIGNED NOT NULL ,
PRIMARY KEY (`idMaterial`, `idFornecedor`),
CONSTRAINT `fkMFMaterial` FOREIGN KEY (`idMaterial`) REFERENCES `Material`(`idMaterial`) ,
CONSTRAINT `fkMFFornecedor` FOREIGN KEY (`idFornecedor`) REFERENCES `Fornecedor`(`idFornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `LinhaGasto` (
`idLinhaGasto` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`quantidade` TINYINT NOT NULL ,
`precoUnitario` DECIMAL( 10,4 ) NOT NULL , 
`idMaterial` INT UNSIGNED NOT NULL ,
`idIva` INT UNSIGNED NOT NULL ,
`idLinhaServico` INT UNSIGNED NOT NULL ,
`activo` TINYINT NOT NULL DEFAULT 1 ,
CONSTRAINT `fkLinhaGastoMaterial` FOREIGN KEY (`idMaterial`) REFERENCES `Material`(`idMaterial`) ,
CONSTRAINT `fkLinhaGastoIva` FOREIGN KEY (`idIva`) REFERENCES `Iva`(`idIva`) ,
CONSTRAINT `fkLinhaGastoLinhaServico` FOREIGN KEY (`idLinhaServico`) REFERENCES `LinhaServico`(`idLinhaServico`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

CREATE TABLE `Sms` (
`idSms` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`idFuncionario` INT UNSIGNED NOT NULL ,
`idCliente` INT UNSIGNED NOT NULL ,
`numero` VARCHAR( 13 ) NOT NULL ,
`mensagem` VARCHAR( 160 ) NOT NULL ,
`codigoErro` VARCHAR( 25 ) NOT NULL ,
`data` DATETIME NOT NULL ,
CONSTRAINT `fkSmsFuncionario` FOREIGN KEY (`idFuncionario`) REFERENCES `Funcionario`(`idFuncionario`) ,
CONSTRAINT `fkSmsCliente` FOREIGN KEY (`idCliente`) REFERENCES `Cliente`(`idCliente`) 
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;

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
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE utf8_unicode_ci ;






