<?php

/* AdministracaoController.php
 * 
 * This file is part of jAutoInvoice, a car workshop management software.
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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * http://sourceforge.net/projects/jautoinvoice
 */

/**
 * Controlador pai de todos os controladores que fornencem serviços de 
 * administração/configuração do sistema.
 */
class AdministracaoController extends JAIController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);

        $this->menu = array(
            'voltar' => false,
            'links' => array(
                array(
                    'url' => $this->createUrl('/dashboard'),
                    'icon' => 'imagens/icones/x32.dashboard.png',
                    'label' => 'Dashboard'
                ),
                array('label' => 'separador'),
                array(
                    'url' => $this->createUrl('/obras'),
                    'icon' => 'imagens/icones/x32.folhaobra.png',
                    'label' => 'Folhas de Obra'
                ),
                array(
                    'url' => $this->createUrl('/marcacoes'),
                    'icon' => 'imagens/icones/x32.marcacoes.png',
                    'label' => 'Marcações'
                ),
                array('label' => 'separador'),
                array(
                    'url' => $this->createUrl('/clientes'),
                    'icon' => 'imagens/icones/x32.cliente.png',
                    'label' => 'Clientes'
                ),
                array('label' => 'separador'),
                array(
                    'url' => $this->createUrl('/configuracoes'),
                    'icon' => 'imagens/icones/x32.configuracoes.png',
                    'label' => 'Configurações'
                ),
                array('label' => 'separador'),
                array(
                    'url' => $this->createUrl('dashboard/sair'),
                    'icon' => 'imagens/icones/x32.sair.png',
                    'label' => 'Sair'
                )
            )
        );
    }

}