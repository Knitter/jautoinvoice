<?php

/* ClientesController.php
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

class MateriaisController extends SistemaController {

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
                        'actions' => array('index', 'adicionar', 'editar', 'apagar'),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    /**
     * @param int $id
     * @return Material
     */
    private function carregarModeloMaterial($id) {
        if (($material = Material::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $material;
    }

    public function actionIndex() {
        $filtro = new Material();
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Material'])) {
            $filtro->attributes = $_REQUEST['Material'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    public function actionAdicionar() {
        $material = new Material();

        $this->performAjaxValidation('material-form', $material);

        if (isset($_POST['Material'])) {
            $material->attributes = $_POST['Material'];
            if ($material->save())
                $this->redirect(array('editar', 'id' => $material->idMaterial));
        }

        $this->render('editar', array('material' => $material));
    }

    public function actionEditar($id) {
        $material = $this->carregarModeloMaterial($id);

        $this->performAjaxValidation('material-form', $material);

        if (isset($_POST['Material'])) {
            $material->attributes = $_POST['Material'];
            if ($material->save())
                $this->redirect(array('editar', 'id' => $material->idMaterial));
        }

        $this->render('editar', array('material' => $material));
    }

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($material = $this->carregarModeloMaterial($id)) !== null) {

            $material->activo = 0;
            $material->save();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

}