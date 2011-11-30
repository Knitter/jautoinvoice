CREATE TABLE "DadosSessao" (
"idDadosSessao" INTEGER UNSIGNED NOT NULL PRIMARY KEY ,
"token" VARCHAR( 32 ) NULL, 
"dataExpiracao" DATETIME NULL ,
"ultimaActividade" DATETIME NULL ,
"idCliente" INTEGER UNSIGNED NULL ,
"idFuncionario" INTEGER UNSIGNED NULL
) ;

CREATE TABLE "Cliente" (
"idCliente" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"email" VARCHAR( 255 ) NULL ,
"password" VARCHAR( 40 ) NULL ,
"nome" VARCHAR( 255 ) NOT NULL ,
"contribuinte" VARCHAR( 9 ) NOT NULL ,
"telefone" VARCHAR ( 9 ) NULL ,
"telemovel" VARCHAR ( 9 ) NULL ,
"morada" VARCHAR( 255 ) NULL ,
"activo" TINYINT NOT NULL DEFAULT 1
) ;

CREATE TABLE "Funcionario" (
"idFuncionario" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"username" VARCHAR( 100 ) NOT NULL UNIQUE ,
"password" VARCHAR( 40 ) NOT NULL ,
"valorHora" DECIMAL (10,4) NULL ,
"nome" VARCHAR( 255 ) NOT NULL ,
"contribuinte" VARCHAR( 9 ) NOT NULL ,
"admin" TINYINT NOT NULL DEFAULT 0,
"activo" TINYINT NOT NULL DEFAULT 1
) ;

CREATE TABLE "Fornecedor" (
"idFornecedor" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"nome" VARCHAR( 255 ) NOT NULL ,
"email" VARCHAR( 255 ) NULL ,
"notas" TEXT NULL ,
"telefone" VARCHAR ( 9 ) NULL ,
"telemovel" VARCHAR ( 9 ) NULL ,
"website" VARCHAR ( 255 ) NULL ,
"morada" VARCHAR( 255 ) NULL ,
"activo" TINYINT NOT NULL DEFAULT 1
) ;

CREATE TABLE "Marca" (
"idMarca" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"nome" VARCHAR ( 100 ) NOT NULL UNIQUE ,
"activo" TINYINT NOT NULL DEFAULT 1
) ;

CREATE TABLE "Modelo" (
"idModelo" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"nome" VARCHAR( 100 ) NOT NULL UNIQUE ,
"activo" TINYINT NOT NULL DEFAULT 1,
"idMarca" INTEGER UNSIGNED NOT NULL ,
CONSTRAINT "fkModeloMarca" FOREIGN KEY ("idMarca") REFERENCES "Marca"("idMarca")
) ;

CREATE TABLE "Categoria" (
"idCategoria" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"nome" VARCHAR( 100 ) NOT NULL UNIQUE ,
"activo" TINYINT NOT NULL DEFAULT 1
) ;

CREATE TABLE "Combustivel" (
"idCombustivel" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"nome" VARCHAR( 100 ) NOT NULL UNIQUE ,
"activo" TINYINT NOT NULL DEFAULT 1
) ;

CREATE TABLE "Veiculo" (
"idVeiculo" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"dataRegisto" DATE NULL ,
"matricula" VARCHAR( 12 ) NOT NULL ,
"nrChassis" VARCHAR( 25 ) NULL ,
"cilindrada" VARCHAR( 25 ) NULL ,
"nrMotor" VARCHAR( 25 ) NULL ,   
"notas" TEXT NULL ,
"activo" TINYINT NOT NULL DEFAULT 1 ,
"idCliente" INTEGER UNSIGNED NOT NULL ,
"idCategoria" INTEGER UNSIGNED NOT NULL ,
"idCombustivel" INTEGER UNSIGNED NOT NULL ,
"idModelo" INTEGER UNSIGNED NOT NULL ,
CONSTRAINT "fkVeiculoCliente" FOREIGN KEY ("idCliente") REFERENCES "Cliente"("idCliente") ,
CONSTRAINT "fkVeiculoCategoria" FOREIGN KEY ("idCategoria") REFERENCES "Categoria"("idCategoria") ,
CONSTRAINT "fkVeiculoCombustivel" FOREIGN KEY ("idCombustivel") REFERENCES "Combustivel"("idCombustivel") ,
CONSTRAINT "fkVeiculoModelo" FOREIGN KEY ("idModelo") REFERENCES "Modelo"("idModelo")
) ;

CREATE TABLE "ClienteVeiculo" (
"idVeiculo" INTEGER UNSIGNED NOT NULL ,
"idCliente" INTEGER UNSIGNED NOT NULL ,
PRIMARY KEY ("idVeiculo", "idCliente"),
CONSTRAINT "fkClienteVeiculoCliente" FOREIGN KEY ("idCliente") REFERENCES "Cliente"("idCliente") ,
CONSTRAINT "fkClienteVeiculoVeiculo" FOREIGN KEY ("idVeiculo") REFERENCES "Veiculo"("idVeiculo")
) ;

CREATE TABLE "FolhaObra" (
"idFolhaObra" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"data" DATETIME NOT NULL ,
"descricaoAvaria" TEXT NOT NULL ,
"kms" INTEGER NOT NULL ,
"activo" TINYINT NOT NULL DEFAULT 1,
"idVeiculo" INTEGER UNSIGNED NOT NULL ,
"idFuncionario" INTEGER UNSIGNED NOT NULL ,
CONSTRAINT "FolhaObraVeiculo" FOREIGN KEY ("idVeiculo") REFERENCES "Veiculo"("idVeiculo") ,
CONSTRAINT "FolhaObraFuncionario" FOREIGN KEY ("idFuncionario") REFERENCES "Funcionario"("idFuncionario")
) ;

CREATE TABLE "IVA" (
"idIVA" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"descricao" VARCHAR( 255 ) NOT NULL ,
"percentagem" DOUBLE NOT NULL ,
"activo" TINYINT NOT NULL DEFAULT 1
) ;

CREATE TABLE "Material" (
"idMaterial" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"precoUnitario" DECIMAL( 10,4 ) NOT NULL ,
"referencia" VARCHAR ( 25 ) NOT NULL ,
"descricao" TEXT NULL ,
"activo" TINYINT NOT NULL DEFAULT 1,
"idFornecedor" INTEGER UNSIGNED NOT NULL ,
"idIVA" INTEGER UNSIGNED NOT NULL ,
CONSTRAINT "fkMaterialFornecedor" FOREIGN KEY ("idFornecedor") REFERENCES "Fornecedor"("idFornecedor") ,
CONSTRAINT "fkMaterialIVA" FOREIGN KEY ("idIVA") REFERENCES "IVA"("idIVA")
) ;

CREATE TABLE "Marcacao" (
"idMarcacao" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"dataMarcacao" DATETIME NOT NULL ,
"idFolhaObra" INTEGER UNSIGNED NULL ,
"idVeiculo" INTEGER UNSIGNED NULL ,
"criado" TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
"activo" TINYINT NOT NULL DEFAULT 1 ,
CONSTRAINT "fkMFolhaObra" FOREIGN KEY ("idFolhaObra") REFERENCES "FolhaObra"("idFolhaObra") ,
CONSTRAINT "fkMVeiculo" FOREIGN KEY ("idVeiculo") REFERENCES "Veiculo"("idVeiculo") 
) ;

CREATE TABLE "Servico" (
"idServico" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"nome" VARCHAR( 255 ) NOT NULL UNIQUE ,
"descricao" TEXT NULL ,
"activo" TINYINT NOT NULL DEFAULT 1
) ;

CREATE TABLE "LinhaServico" (
"idLinhaServico" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"duracao" DOUBLE NOT NULL ,
"valorHora" DECIMAL( 10,4 ) NOT NULL ,
"notas" TEXT NULL ,
"activo" TINYINT NOT NULL DEFAULT 1 ,
"idFuncionario" INTEGER UNSIGNED NOT NULL ,
"idServico"  INTEGER UNSIGNED NOT NULL ,
"idFolhaObra" INTEGER UNSIGNED NOT NULL ,
CONSTRAINT "fkLinhaServicoFuncionario" FOREIGN KEY ("idFuncionario") REFERENCES "Funcionario"("idFuncionario") ,
CONSTRAINT "fkLinhaServicoFolhaObra" FOREIGN KEY ("idFolhaObra") REFERENCES "FolhaObra"("idFolhaObra") ,
CONSTRAINT "fkLinhaServicoServico" FOREIGN KEY ("idServico") REFERENCES "Servico"("idServico")
) ;

/*
CREATE TABLE "LinhaGasto" (
"idLinhaGasto" INTEGER UNSIGNED NOT NULL PRIMARY KEY  ,
"quantidade" TINYINT NOT NULL ,
"precoUnitario" DECIMAL( 10,4 ) NOT NULL , 
"activo" TINYINT NOT NULL DEFAULT 1 ,
"idMaterial" INTEGER UNSIGNED NOT NULL ,
"idLInhaServico" INTEGER UNSIGNED NOT NULL ,
CONSTRAINT "fkLinhaGastoMaterial" FOREIGN KEY ("idMaterial") REFERENCES "Material"("idMaterial") ,
CONSTRAINT "fkLinhaGastoLinhaServico" FOREIGN KEY ("idLinhaServico") REFERENCES "LinhaServico"("idLinhaServico")
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 ; */