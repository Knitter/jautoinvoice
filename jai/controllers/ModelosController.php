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

class ModelosController extends Controller {

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

    private function carregarModeloModelo($id) {
        if (($modelo = Modelo::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $modelo;
    }

    public function actionIndex() {
        $filtro = new Modelo();
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Modelo'])) {
            $filtro->attributes = $_REQUEST['Modelo'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    public function actionCreate() {
        $modelo = new Modelo();

        // $this->performAjaxValidation($modelo);

        if (isset($_POST['Modelo'])) {
            $modelo->attributes = $_POST['Modelo'];
            if ($modelo->save()) {
                $this->redirect(array('view', 'id' => $modelo->idModelo));
            }
        }

        $this->render('editar', array('modelo' => $modelo));
    }

    public function actionUpdate($id) {
        $modelo = $this->carregarModeloModelo($id);

        // $this->performAjaxValidation($modelo);

        if (isset($_POST['Modelo'])) {
            $modelo->attributes = $_POST['Modelo'];
            if ($modelo->save()) {
                $this->redirect(array('editar', 'id' => $modelo->idModelo));
            }
        }

        $this->render('editar', array('modelo' => $modelo));
    }

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($modelo = $this->carregarModeloModelo($id)) !== null) {
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

}
