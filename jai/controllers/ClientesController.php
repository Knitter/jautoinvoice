<?php

/* ClientesController.php
 * 
 * This file is part of jAutoInvoice, a car workshop management software.
 * 
 * Copyright (c) 2012, Sérgio Lopes <knitter.is@gmail.com>.
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

/**
 * 
 */
class ClientesController extends SistemaController {

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
                        'actions' => array('index', 'criar', 'editar', 'apagar',
                            'emai', 'sms'
                        ),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    /**
     * @param int $id
     * 
     * @return Cliente
     */
    private function carregarModeloCliente($id) {
        if (($cliente = Cliente::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $cliente;
    }

    public function actionIndex() {
        $filtro = new Cliente();
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Cliente'])) {
            $filtro->attributes = $_REQUEST['Cliente'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    public function actionCriar() {
        $cliente = new Cliente();

        $this->performAjaxValidation('cliente-form', $cliente);

        if (isset($_POST['Cliente'])) {
            $cliente->attributes = $_POST['Cliente'];
            if ($cliente->save())
                $this->redirect(array('editar', 'id' => $cliente->idCliente));
        }

        $this->render('editar', array('cliente' => $cliente));
    }

    public function actionEditar($id) {
        $cliente = $this->carregarModeloCliente($id);

        $this->performAjaxValidation('cliente-form', $cliente);

        if (isset($_POST['Cliente'])) {
            $cliente->attributes = $_POST['Cliente'];
            if ($cliente->save())
                $this->redirect(array('editar', 'id' => $cliente->idCliente));
        }

        $this->render('editar', array('cliente' => $cliente));
    }

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($cliente = $this->carregarModeloCliente($id)) !== null) {

            $cliente->activo = 0;
            $cliente->save();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    public function actionEmail() {
        //TODO: not implemented yet!
        if (!empty($_POST['idClienteEmail'])) {
            
        }
    }

    public function actionSms() {
        //TODO: not implemented yet!
        if (!empty($_POST['idClienteSms'])) {
            
        }
    }

}