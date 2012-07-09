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
 * Controlador pai para todos os controladores que fornecem as funcionalidades 
 * base da aplicação, acessível a todos os funcionários.
 */
class SistemaController extends JAIController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);

        $this->menu = array(
            array(
                'label' => 'Quadro',
                'url' => $this->createUrl('/dashboard'),
                'icon' => Yii::app()->baseUrl . 'imagens/icones/quadro.png',
            ),
            array(
                'label' => 'Folhas de Obra',
                'url' => $this->createUrl('/obras'),
                'icon' => Yii::app()->baseUrl . 'imagens/icones/folhaobra.png',
            ),
            array(
                'label' => 'Marcações',
                'url' => $this->createUrl('/marcacoes'),
                'icon' => Yii::app()->baseUrl . 'imagens/icones/marcacoes.png',
            ),
            array(
                'label' => 'Clientes',
                'url' => $this->createUrl('/clientes'),
                'icon' => Yii::app()->baseUrl . 'imagens/icones/cliente.png',
            ),
            array(
                'label' => 'Administração',
                'url' => $this->createUrl('/configuracoes'),
                'icon' => Yii::app()->baseUrl . 'imagens/icones/administracao.png',
            ),
            array(
                'label' => 'Sair',
                'url' => $this->createUrl('dashboard/sair'),
                'icon' => Yii::app()->baseUrl . 'imagens/icones/sair.png',
            )
        );
    }

}