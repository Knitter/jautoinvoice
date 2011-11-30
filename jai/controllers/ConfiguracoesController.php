<?php

/* ConfiguracoesController.php
 * 
 * This file is part of jAutoInvoice.
 *
 * Sandscape is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Sandscape is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Sandscape.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * Copyright (c) 2011, Sérgio Lopes.
 * http://sourceforge.net/projects/jautoinvoice
 */

class ConfiguracoesController extends JAIController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);

        $this->menu = array(
            'voltar' => $this->createUrl('/dashboard'),
            'links' => array(
                array(
                    'url' => $this->createUrl('/fornecedores'),
                    'icon' => 'assets/images/icons/x32-fornecedor.png',
                    'label' => 'Fornecedores'
                ),
                array(
                    'url' => $this->createUrl('/materiais'),
                    'icon' => 'assets/images/icons/x32-material.png',
                    'label' => 'Materiais'
                ),
                array(
                    'url' => $this->createUrl('/servicos'),
                    'icon' => 'assets/images/icons/x32-servico.png',
                    'label' => 'Serviços'
                ),
                array(
                    'url' => $this->createUrl('/marcas'),
                    'icon' => 'assets/images/icons/x32-marca.png',
                    'label' => 'Marcas'
                ),
                array(
                    'url' => $this->createUrl('/iva'),
                    'icon' => 'assets/images/icons/x32-iva.png',
                    'label' => 'Taxas de IVA'
                ),
                array(
                    'url' => $this->createUrl('/funcionarios'),
                    'icon' => 'assets/images/icons/x32-funcionario.png',
                    'label' => 'Funcionários'
                ),
                array(
                    'url' => $this->createUrl('/permissoes'),
                    'icon' => 'assets/images/icons/x32-permissoes.png',
                    'label' => 'Permissões'
                ),
            )
        );
    }

    public function accessRules() {
        return array_merge(array(
                    array('allow',
                        'actions' => array('index'),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    public function actionIndex() {
        $this->render('index');
    }

}