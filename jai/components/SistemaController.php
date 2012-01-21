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
            'voltar' => $this->createUrl('/dashboard'),
            'links' => array(
                array(
                    'url' => $this->createUrl('/categorias'),
                    'icon' => 'imagens/icones/x32.fornecedor.png',
                    'label' => 'Categorias'
                ),
                array(
                    'url' => $this->createUrl('/combustiveis'),
                    'icon' => 'imagens/icones/x32.fornecedor.png',
                    'label' => 'Combustíveis'
                ),
                array(
                    'url' => $this->createUrl('/fornecedores'),
                    'icon' => 'imagens/icones/x32.fornecedor.png',
                    'label' => 'Fornecedores'
                ),
                array(
                    'url' => $this->createUrl('/marcas'),
                    'icon' => 'imagens/icones/x32.marcas.png',
                    'label' => 'Marcas'
                ),
                array(
                    'url' => $this->createUrl('/modelos'),
                    'icon' => 'imagens/icones/x32.modelos.png',
                    'label' => 'Modelos'
                ),
                array(
                    'url' => $this->createUrl('/materiais'),
                    'icon' => 'assets/images/icons/x32.materiais.png',
                    'label' => 'Materiais'
                ),
                array(
                    'url' => $this->createUrl('/servicos'),
                    'icon' => 'assets/images/icons/x32.servico.png',
                    'label' => 'Serviços'
                ),
                array(
                    'url' => $this->createUrl('/iva'),
                    'icon' => 'assets/images/icons/x32.iva.png',
                    'label' => 'Taxas de IVA'
                ),
            )
        );
    }

}