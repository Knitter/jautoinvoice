<?php

/* FuncionariosController.php
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

class FuncionariosController extends AdministracaoController {

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
                        'actions' => array(
                            'index', 'criar', 'editar', 'apagar', 'dadosJSON'
                        ),
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

    public function actionCriar() {
        $funcionario = new Funcionario();

        $this->performAjaxValidation('funcionario-form', $funcionario);

        if (isset($_POST['Funcionario'])) {
            $funcionario->attributes = $_POST['Funcionario'];
            $funcionario->password = Funcionario::hash($funcionario->password);

            if ($funcionario->save())
                $this->redirect(array('editar', 'id' => $funcionario->idFuncionario));
        }

        $this->render('editar', array('funcionario' => $funcionario));
    }

    public function actionEditar($id) {
        $funcionario = $this->carregarModeloFuncionario($id);

        $this->performAjaxValidation('funcionario-form', $funcionario);

        if (isset($_POST['Funcionario'])) {
            $funcionario->attributes = $_POST['Funcionario'];
            $funcionario->password = Funcionario::hash($funcionario->password);

            if ($funcionario->save())
                $this->redirect(array('editar', 'id' => $funcionario->idFuncionario));
        }

        $this->render('editar', array('funcionario' => $funcionario));
    }

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($funcionario = $this->carregarModeloFuncionario($id)) !== null) {

            $funcionario->activo = 0;
            $funcionario->save();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    public function actionDadosJSON() {
        $resultado = (object) array('sucesso' => 0);
        if (isset($_POST['id']) && ($funcionario = $this->carregarModeloFuncionario($_POST['id'])) !== null) {
            $resultado->sucesso = 1;
            $resultado->funcionario = (object) array(
                        'idFuncionario' => $funcionario->idFuncionario,
                        'nome' => $funcionario->nome,
                        'valorHora' => $funcionario->valorHora ? $funcionario->valorHora : 0
            );
        }

        echo json_encode($resultado);
        Yii::app()->end();
    }

}
