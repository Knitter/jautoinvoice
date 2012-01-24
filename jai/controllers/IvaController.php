<?php

/* IvaController.php
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

class IvaController extends AdministracaoController {

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
                        'actions' => array('index', 'criar', 'editar', 'apagar'),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    /**
     * @param int $id
     * @return IVA
     */
    private function carregarModeloIVA($id) {
        if (($iva = IVA::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $iva;
    }

    public function actionIndex() {
        $filtro = new IVA();
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Iva'])) {
            $filtro->attributes = $_REQUEST['Iva'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    public function actionCriar() {
        $iva = new IVA();

        $this->performAjaxValidation('iva-form', $iva);

        if (isset($_POST['Iva'])) {
            $iva->attributes = $_POST['Iva'];
            if ($iva->save())
                $this->redirect(array('editar', 'id' => $iva->idIVA));
        }

        $this->render('editar', array('iva' => $iva));
    }

    public function actionEditar($id) {
        $iva = $this->carregarModeloIVA($id);

        $this->performAjaxValidation('iva-form', $iva);

        if (isset($_POST['Iva'])) {
            $iva->attributes = $_POST['Iva'];
            if ($iva->save())
                $this->redirect(array('editar', 'id' => $iva->idIVA));
        }

        $this->render('editar', array('iva' => $iva));
    }

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($iva = $this->carregarModeloIVA($id)) !== null) {

            $iva->activo = 0;
            $iva->save();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

}