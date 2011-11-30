<?php

/* AdministracaoController.php
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

class AdministracaoController extends JAIController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);

        $this->menu = array(
            'voltar' => false,
            'links' => array(
//                array(
//                    'url' => $this->createUrl('/dashboard'),
//                    'icon' => 'assets/images/icons/x32-folhaobra.png',
//                    'label' => 'Folhas de Obra'
//                ),
                array(
                    'url' => $this->createUrl('/folhasobra'),
                    'icon' => 'assets/images/icons/x32-folhaobra.png',
                    'label' => 'Folhas de Obra'
                ),
                array(
                    'url' => $this->createUrl('/marcacoes'),
                    'icon' => 'assets/images/icons/x32-marcacoes.png',
                    'label' => 'Marcações'
                ),
                array(
                    'url' => $this->createUrl('/clientes'),
                    'icon' => 'assets/images/icons/x32-cliente.png',
                    'label' => 'Clientes'
                ),
                array(
                    'url' => $this->createUrl('/veiculos'),
                    'icon' => 'assets/images/icons/x32-veiculo.png',
                    'label' => 'Veículos'
                ),
                array(
                    'url' => $this->createUrl('/configuracoes'),
                    'icon' => 'assets/images/icons/x32-configuracoes.png',
                    'label' => 'Configurações'
                ),
                array(
                    'url' => $this->createUrl('site/sair'),
                    'icon' => 'assets/images/icons/x32-sair.png',
                    'label' => 'Sair'
                )
            )
        );
    }

}