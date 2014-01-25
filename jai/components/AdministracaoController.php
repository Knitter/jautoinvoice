<?php

/* This file is part of jAutoInvoice, a car workshop management software.
 * 
 * Copyright (c) 2012 - 2014, Sérgio Lopes.
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
 */

/**
 * Controlador pai de todos os controladores que fornencem serviços de 
 * administração/configuração do sistema.
 */
class AdministracaoController extends JController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);

        $urlBase = Yii::app()->baseUrl;
        $this->menu = array(
            array(
                'label' => 'Voltar',
                'url' => array('quadro/index'),
                'icon' => $urlBase . '/imagens/icones/voltar.png'
            ),
            array(
                'label' => 'Configurações',
                'url' => array('configuracao/index'),
                'icon' => $urlBase . '/imagens/icones/configuracoes.png'
            ),
            array(
                'label' => 'Funcionários',
                'url' => array('funcionario/index'),
                'icon' => $urlBase . '/imagens/icones/empregado.png'
            ),
            array(
                'label' => 'Fornecedores',
                'url' => array('fornecedor/index'),
                'icon' => $urlBase . '/imagens/icones/fornecedor.png'
            ),
            array(
                'label' => 'Material',
                'url' => array('material/index'),
                'icon' => $urlBase . '/imagens/icones/material.png'
            ),
            array(
                'label' => 'Serviços',
                'url' => array('servico/index'),
                'icon' => $urlBase . '/imagens/icones/servico.png'
            ),
            array(
                'label' => 'Categorias',
                'url' => array('categoria/index'),
                'icon' => $urlBase . '/imagens/icones/categoria.png'
            ),
            array(
                'label' => 'Combustíveis',
                'url' => array('combustivel/index'),
                'icon' => $urlBase . '/imagens/icones/combustivel.png'
            ),
            array(
                'label' => 'Marcas',
                'url' => array('marca/index'),
                'icon' => $urlBase . '/imagens/icones/marca.png'
            ),
            array(
                'label' => 'Modelos',
                'url' => array('modelo/index'),
                'icon' => $urlBase . '/imagens/icones/modelo.png'
            ),
            array(
                'label' => 'Taxas de IVA',
                'url' => array('iva/index'),
                'icon' => $urlBase . '/imagens/icones/iva.png'
            ),
            array(
                'label' => 'Registos',
                'url' => array('registo/index'),
                'icon' => $urlBase . '/imagens/icones/registos.png'
            ),
        );
    }

}
