<?php

/* ServicosController.php
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

class ServicosController extends SistemaController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    public function accessRules() {
        return array_merge(array(
                    array('allow',
                        'actions' => array('index', 'adicionar', 'editar', 'apagar'),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    private function carregarModeloServico($id) {
        if (($servico = Servico::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $servico;
    }

    public function actionIndex() {
        $filtro = new Servico();
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Servico'])) {
            $filtro->attributes = $_REQUEST['servico'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

}
