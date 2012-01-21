-- Actualização do tamanho dos campos de telefone e adição de contactos para funcionários
ALTER TABLE `Funcionario` ADD `telefone` VARCHAR ( 13 ) NULL ;
ALTER TABLE `Funcionario` ADD `telemovel` VARCHAR ( 13 ) NULL ;

ALTER TABLE `Cliente` CHANGE `telefone` `telefone` VARCHAR ( 13 ) NULL ;
ALTER TABLE `Cliente` CHANGE `telemovel` `telemovel` VARCHAR ( 13 ) NULL ;

ALTER TABLE `Fornecedor` CHANGE `telefone` `telefone` VARCHAR ( 13 ) NULL ;
ALTER TABLE `Fornecedor` CHANGE `telemovel` `telemovel` VARCHAR ( 13 ) NULL ;

-- Adicionar descrição às marcações
ALTER TABLE `Marcacao` ADD `descricao` VARCHAR( 150 ) NULL ;