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
 * Controlador pai para todos os controladores que fornecem as funcionalidades 
 * base da aplicação, acessível a todos os funcionários.
 */
class SistemaController extends JController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);

        $urlBase = Yii::app()->baseUrl;
        $this->menu = array(
            array(
                'label' => 'Quadro',
                'url' => array('quadro/index'),
                'icon' => Yii::app()->baseUrl . '/recursos/imagens/icones/quadro.png'
            ),
            array(
                'label' => 'Folhas de Obra',
                'url' => array('folhaobra/index'),
                'icon' => $urlBase . '/imagens/icones/folhaobra.png'
            ),
            array(
                'label' => 'Marcações',
                'url' => array('marcacao/index'),
                'icon' => $urlBase . '/imagens/icones/calendario.png'
            ),
            array(
                'label' => 'Clientes',
                'url' => array('cliente/index'),
                'icon' => $urlBase . '/imagens/icones/cliente.png'
            ),
            array(
                'label' => 'Configuração',
                'url' => array('configuracao/index'),
                'icon' => $urlBase . '/imagens/icones/administracao.png'
            ),
            array(
                'label' => 'Sair',
                'url' => array('publico/sair'),
                'icon' => $urlBase . '/imagens/icones/sair.png'
            )
        );
    }

}