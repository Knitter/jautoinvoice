<?php

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

/**
 * Controlador pai de todos os controladores que fornencem serviços de 
 * administração/configuração do sistema.
 */
class AdministracaoController extends JController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);

        $this->menu = array(
            array(
                'label' => 'Voltar',
                'url' => $this->createUrl('/quadro'),
                'icon' => Yii::app()->baseUrl . '/recursos/imagens/icones/voltar.png',
            ),
            array(
                'label' => 'Configurações',
                'url' => $this->createUrl('/configuracao'),
                'icon' => Yii::app()->baseUrl . '/recursos/imagens/icones/configuracoes.png',
            ),
            array(
                'label' => 'Funcionários',
                'url' => $this->createUrl('/funcionario'),
                'icon' => Yii::app()->baseUrl . '/recursos/imagens/icones/empregado.png',
            ),
            array(
                'label' => 'Fornecedores',
                'url' => $this->createUrl('/fornecedor'),
                'icon' => Yii::app()->baseUrl . '/recursos/imagens/icones/fornecedor.png',
            ),
            array(
                'label' => 'Material',
                'url' => $this->createUrl('/material'),
                'icon' => Yii::app()->baseUrl . '/recursos/imagens/icones/material.png',
            ),
            array(
                'label' => 'Serviços',
                'url' => $this->createUrl('/servico'),
                'icon' => Yii::app()->baseUrl . '/recursos/imagens/icones/servico.png',
            ),
            array(
                'label' => 'Categorias',
                'url' => $this->createUrl('/categoria'),
                'icon' => Yii::app()->baseUrl . '/recursos/imagens/icones/categoria.png',
            ),
            array(
                'label' => 'Combustíveis',
                'url' => $this->createUrl('/combustivel'),
                'icon' => Yii::app()->baseUrl . '/recursos/imagens/icones/combustivel.png',
            ),
            array(
                'label' => 'Marcas',
                'url' => $this->createUrl('/marca'),
                'icon' => Yii::app()->baseUrl . '/recursos/imagens/icones/marca.png',
            ),
            array(
                'label' => 'Modelos',
                'url' => $this->createUrl('/modelo'),
                'icon' => Yii::app()->baseUrl . '/recursos/imagens/icones/modelo.png',
            ),
            array(
                'label' => 'Taxas de IVA',
                'url' => $this->createUrl('/iva'),
                'icon' => Yii::app()->baseUrl . '/recursos/imagens/icones/iva.png',
            ),
            array(
                'label' => 'Registos',
                'url' => $this->createUrl('/registo'),
                'icon' => Yii::app()->baseUrl . '/recursos/imagens/icones/registos.png',
            ),
        );
    }

}