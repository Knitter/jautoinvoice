CREATE TABLE `Utilizador` (
`idUtilizador` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`username` VARCHAR( 50 ) NOT NULL UNIQUE,
`password` VARCHAR( 40 ) NOT NULL ,
`nome` VARCHAR( 255 ) NOT NULL ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `Funcionario` (
`idFuncionario` INT UNSIGNED NOT NULL PRIMARY KEY ,
`valorHora` DECIMAL (10,4) NULL ,
CONSTRAINT `fkFuncionarioUtilizador` FOREIGN KEY (`idFuncionario`) REFERENCES `Utilizador`(`idUtilizador`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `Cliente` (
`idCliente` INT UNSIGNED NOT NULL PRIMARY KEY ,
`contribuinte` VARCHAR( 9 ) NOT NULL ,
`endereco`VARCHAR( 255 ) NULL ,
CONSTRAINT `fkClienteUtilizador` FOREIGN KEY (`idCliente`) REFERENCES `Utilizador`(`idUtilizador`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;
-- private ArrayList<String> contactos;

CREATE TABLE `Marca` (
`idMarca` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR ( 100 ) NOT NULL UNIQUE ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `Modelo` (
`idModelo` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR( 100 ) NOT NULL UNIQUE ,
`activo` TINYINT NOT NULL DEFAULT 1,
`idMarca` INT UNSIGNED NOT NULL ,
CONSTRAINT `fkModeloMarca` FOREIGN KEY (`idMarca`) REFERENCES `Marca`(`idMarca`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `Categoria` (
`idCategoria` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR( 100 ) NOT NULL UNIQUE ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `Combustivel` (
`idCombustivel` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR( 100 ) NOT NULL UNIQUE ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `Veiculo` (
`idVeiculo` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`dataRegisto` DATE NULL ,
`matricula` VARCHAR( 12 ) NOT NULL ,
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
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `IVA` (
`idIVA` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`descricao` VARCHAR( 255 ) NOT NULL ,
`percentagem` DOUBLE NOT NULL ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `Fornecedor` (
`idFornecedor` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR( 255 ) NOT NULL ,
`email` VARCHAR( 255 ) NULL ,
`notas` TEXT NULL ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;
-- `telefone` VARCHAR( 12 ) NOT NULL ,
-- private String fax;

CREATE TABLE `EstadoInspeccao` (
`idEstadoInspeccao` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR( 100 ) NOT NULL UNIQUE ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `Servico` (
`idServico` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`nome` VARCHAR( 255 ) NOT NULL UNIQUE ,
`descricao` TEXT NULL ,
`activo` TINYINT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;

CREATE TABLE `LinhaServico`
`idLinhaServico` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`duracao` DOUBLE NOT NULL ,
`valorHora` DECIMAL( 10,4 ) NOT NULL ,
`notas` TEXT NULL ,
`activo` TINYINT NOT NULL DEFAULT 1 ,
`idFuncionario` INT UNSIGNED NOT NULL ,
`idServico`  INT UNSIGNED NOT NULL ,

CONSTRAINT `fkLinhaServicoFuncionario` FOREIGN KEY (`idFuncionario`) REFERENCES `Funcionario`(`idFuncionario`) ,
CONSTRAINT `fkLinhaServicoServico` FOREIGN KEY (`idServico`) REFERENCES `Servico`(`idServico`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;
-- private ArrayList<DTOLinhaGasto> gastos;
-- private DTOFolhaObra folha

CREATE TABLE `Material` (
`idMaterial` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`precoUnitario` DECIMAL( 10,4 ) NOT NULL ,
`referencia` VARCHAR ( 25 ) NOT NULL ,
`descricao` TEXT NULL ,
`activo` TINYINT NOT NULL DEFAULT 1,
`idFornecedor` INT UNSIGNED NOT NULL ,
`idIVA`  INT UNSIGNED NOT NULL ,
CONSTRAINT `fkMaterialFornecedor` FOREIGN KEY (`idFornecedor`) REFERENCES `Fornecedor`(`idFornecedor`) ,
CONSTRAINT `fkMaterialIVA` FOREIGN KEY (`idIVA`) REFERENCES `IVA`(`idIVA`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;
-- //TODO: Nr. da factura e data da compra para controlar os stocks.

CREATE TABLE `Inspeccao` (
`idInspeccao` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT ,
`data` DATETIME NOT NULL ,
`notas` TEXT NULL ,
`activo` TINYINT NOT NULL DEFAULT 1,
`idEstadoInspeccao` INT UNSIGNED NOT NULL ,
`idFuncionario` INT UNSIGNED NOT NULL ,
`idVeiculo` INT UNSIGNED NOT NULL ,
CONSTRAINT `fkInspeccaoEstadoInspeccao` FOREIGN KEY (`idEstadoInspeccao`) REFERENCES `EstadoInspeccao`(`idEstadoInspeccao`) ,
CONSTRAINT `fkInspeccaoFuncionario` FOREIGN KEY (`idFuncionario`) REFERENCES `Funcionario`(`idFuncionario`) ,
CONSTRAINT `fkInspeccaoVeiculo` FOREIGN KEY (`idVeiculo`) REFERENCES `Veiculo`(`idVeiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ;


-- private ArrayList<DTOCliente> antigosDonos;
CREATE TABLE `` (
) ENGINE=InnoDB DEFAULT CHARSER=UTF8;

CREATE TABLE `VeiculoInspeccao` (
`idVeiculo` INT UNSIGNED NOT NULL ,
`idInspeccao` INT UNSIGNED NOT NULL ,
PRIMARY KEY (`idVeiculo`, `idInspeccao`),
CONSTRAINT `fkVeiculoInspeccaoInspeccao` FOREIGN KEY (`idInspeccao`) REFERENCES `Inspeccao`(`idInspeccao`) ,
CONSTRAINT `fkVeiculoInspeccaoVeiculo` FOREIGN KEY (`idVeiculo`) REFERENCES `Veiculo`(`idVeiculo`)

