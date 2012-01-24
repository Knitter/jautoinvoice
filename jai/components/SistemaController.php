<?php

/* .php
 * 
 * This file is part of jAutoInvoice, a car workshop management software.
 * Copyright (c) 2011, Sérgio Lopes.
 * http://sourceforge.net/projects/jautoinvoice
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Controlador pai para todos os controladores que fornecem as funcionalidades 
 * base da aplicação, acessível a todos os funcionários.
 */
class SistemaController extends JAIController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);

        $this->menu = array(
            'links' => array(
                array(
                    'url' => $this->createUrl('/dashboard'),
                    'icon' => 'imagens/icones/x32.voltar.png',
                    'label' => 'Voltar'
                ),
                array(
                    'url' => $this->createUrl('/configuracoes'),
                    'icon' => 'imagens/icones/x32.configuracoes.png',
                    'label' => 'Configurações'
                ),
                array('label' => 'separador'),
                array(
                    'url' => $this->createUrl('/funcionarios'),
                    'icon' => 'imagens/icones/x32.funcionario.png',
                    'label' => 'Funcionários'
                ),
                array(
                    'url' => $this->createUrl('/fornecedores'),
                    'icon' => 'imagens/icones/x32.fornecedor.png',
                    'label' => 'Fornecedores'
                ),
                array('label' => 'separador'),
                array(
                    'url' => $this->createUrl('/stock'),
                    'icon' => 'imagens/icones/x32.material.png',
                    'label' => 'Stock'
                ),
                array(
                    'url' => $this->createUrl('/servicos'),
                    'icon' => 'imagens/icones/x32.servico.png',
                    'label' => 'Serviços'
                ),
                array('label' => 'separador'),
                array(
                    'url' => $this->createUrl('/categorias'),
                    'icon' => 'imagens/icones/x32.categoria.png',
                    'label' => 'Categorias'
                ),
                array(
                    'url' => $this->createUrl('/combustiveis'),
                    'icon' => 'imagens/icones/x32.combustivel.png',
                    'label' => 'Combustíveis'
                ),
                array(
                    'url' => $this->createUrl('/marcas'),
                    'icon' => 'imagens/icones/x32.marca.png',
                    'label' => 'Marcas'
                ),
                array(
                    'url' => $this->createUrl('/modelos'),
                    'icon' => 'imagens/icones/x32.modelo.png',
                    'label' => 'Modelos'
                ),
                array('label' => 'separador'),
                array(
                    'url' => $this->createUrl('/iva'),
                    'icon' => 'imagens/icones/x32.iva.png',
                    'label' => 'Taxas de IVA'
                ),
            )
        );
    }

}