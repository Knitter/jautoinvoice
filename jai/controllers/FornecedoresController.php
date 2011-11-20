<?php

/* FornecedoresController.php
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

class FornecedoresController extends JAIController {

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

    private function carregarModeloFornecedor($id) {
        if (($fornecedor = Fornecedor::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $fornecedor;
    }

    public function actionIndex() {
        $filtro = new Fornecedor();
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Fornecedor'])) {
            $filtro->attributes = $_REQUEST['Fornecedor'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    public function actionAdicionar() {
        $fornecedor = new Fornecedor();

        // $this->performAjaxValidation($model);

        if (isset($_POST['Fornecedor'])) {
            $fornecedor->attributes = $_POST['Fornecedor'];
            if ($fornecedor->save())
                $this->redirect(array('editar', 'id' => $fornecedor->idFornecedor));
        }

        $this->render('editar', array('fornecedor' => $fornecedor));
    }

    public function actionEditar($id) {
        $fornecedor = $this->carregarModeloFornecedor($id);

        // $this->performAjaxValidation($model);

        if (isset($_POST['Fornecedor'])) {
            $fornecedor->attributes = $_POST['Fornecedor'];
            if ($fornecedor->save())
                $this->redirect(array('editar', 'id' => $fornecedor->idFornecedor));
        }

        $this->render('editar', array('fornecedor' => $fornecedor));
    }

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($fornecedor = $this->carregarModeloFornecedor($id))) {
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

}
