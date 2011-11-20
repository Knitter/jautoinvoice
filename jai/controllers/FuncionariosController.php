<?php

/* FuncionariosController.php
 * 
 * This file is part of jAutoInvoice, a car workshop management software.
 * 
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

class FuncionariosController extends JAIController {

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

    /**
     * @param int $id
     * @return Funcionario
     */
    public function carregarModeloFuncionario($id) {
        if (($funcionario = Funcionario::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $funcionario;
    }

    public function actionIndex() {
        $filtro = new Funcionario();
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Funcionario'])) {
            $filtro->attributes = $_REQUEST['Funcionario'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    public function actionAdicionar() {
        $funcionario = new Funcionario();

        // $this->performAjaxValidation($model);

        if (isset($_POST['Funcionario'])) {
            $funcionario->attributes = $_POST['Funcionario'];
            if ($funcionario->save())
                $this->redirect(array('editar', 'id' => $funcionario->idFuncionario));
        }

        $this->render('editar', array('funcionario' => $funcionario));
    }

    public function actionEditar($id) {
        $funcionario = $this->carregarModeloFuncionario($id);

        // $this->performAjaxValidation($model);

        if (isset($_POST['Funcionario'])) {
            $funcionario->attributes = $_POST['Funcionario'];
            if ($funcionario->save())
                $this->redirect(array('editar', 'id' => $funcionario->idFuncionario));
        }

        $this->render('editar', array('funcionario' => $funcionario));
    }

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($funcionario = $this->carregarModeloFuncionario($id)) !== null) {

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

}
