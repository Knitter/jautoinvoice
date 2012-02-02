ALTER TABLE `Servico` DROP FOREIGN KEY `fkServicoIVA` ;
ALTER TABLE `Servico` DROP `idIVA` ;

ALTER TABLE `LinhaServico` ADD `custoServico` DECIMAL (10, 4) NULL ;
ALTER TABLE `LinhaServico` CHANGE `valorHora` `valorHora` DECIMAL (10, 4) NULL ;

ALTER TABLE `FolhaObra` CHANGE `descricaoAvaria` `descricaoAvaria` TEXT NULL ;

ALTER TABLE `IVA` CHANGE `percentagem` `percentagem` FLOAT NOT NULL ;

ALTER TABLE `LinhaGasto` DROP `desconto`;