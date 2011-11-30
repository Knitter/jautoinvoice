<?php

/* MeusServicosController.php
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

class MeusServicosController extends ClienteController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    public function accessRules() {
        return array_merge(array(
                    array(
                        'deny',
                        'users' => array('?')
                    ),
                    array(
                        'allow',
                        'actions' => array('sair'),
                        'users' => array('@')
                    ),
                    array(
                        'allow',
                        'actions' => array('index'),
                        'expression' => '$user->tipo == 1'
                        )), parent::accessRules());
    }

    public function actionIndex() {
        //TODO: not implemented yet, gráficos e informações úteis
        $this->render('index');
    }

}