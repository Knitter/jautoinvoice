<?php

/* VeiculosController.php
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

class VeiculosController extends AdministracaoController {

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
     * @return Veiculo
     */
    private function carregarModeloVeiculo($id) {
        if (($veiculo = Veiculo::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $veiculo;
    }

    public function actionIndex() {
        $filtro = new Veiculo();
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Veiculo'])) {
            $filtro->attributes = $_REQUEST['Veiculo'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    public function actionAdicionar() {
        $veiculo = new Veiculo();

        // $this->performAjaxValidation($model);

        if (isset($_POST['Veiculo'])) {
            $veiculo->attributes = $_POST['Veiculo'];
            if ($veiculo->save())
                $this->redirect(array('editar', 'id' => $veiculo->idVeiculo));
        }

        $this->render('editar', array('veiculo' => $veiculo));
    }

    public function actionEditar($id) {
        $veiculo = $this->carregarModeloVeiculo($id);

        // $this->performAjaxValidation($model);

        if (isset($_POST['Veiculo'])) {
            $veiculo->attributes = $_POST['Veiculo'];
            if ($veiculo->save())
                $this->redirect(array('editar', 'id' => $veiculo->idVeiculo));
        }

        $this->render('editar', array('veiculo' => $veiculo));
    }

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($veiculo = $this->carregarModeloVeiculo($id)) !== null) {
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

}
