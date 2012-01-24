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
                            'veiculos', 'removerVeiculo', 'editarVeiculo',
                            'adicionarVeiculo'
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

    public function actionVeiculos($id) {
        $cliente = $this->carregarModeloCliente($id);

        $filtro = new Veiculo();
        $filtro->unsetAttributes();

        $filtro->idCliente = (int) $id;

        $this->render('veiculos', array(
            'filtro' => $filtro,
            'cliente' => $cliente
        ));
    }

    public function actionAdicionarVeiculo($id) {
        $cliente = $this->carregarModeloCliente($id);
        $veiculo = new Veiculo();

        $this->performAjaxValidation('veiculo-form', $veiculo);

        if (isset($_POST['Veiculo'])) {
            $veiculo->attributes = $_POST['Veiculo'];
            $veiculo->idCliente = $cliente->idCliente;

            if ($veiculo->save())
                $this->redirect(array('editarveiculo', 'idc' => $cliente->idCliente, 'idv' => $veiculo->idVeiculo));
        }

        $criteria = new CDbCriteria();
        $criteria->condition = 'activo = 1';
        $criteria->order = 'nome';
        $combustiveis = Combustivel::model()->findAll($criteria);

        $categorias = Categoria::model()->findAll($criteria);

        $criteria->join = 'INNER JOIN Marca m ON t.idMarca = m.idMarca';
        $criteria->condition = 't.activo = 1 AND m.activo = 1';
        $criteria->order = 'm.nome, t.nome';
        $modelos = Modelo::model()->findAll($criteria);

        $this->render('editar-veiculo', array(
            'veiculo' => $veiculo,
            'cliente' => $cliente,
            'combustiveis' => $combustiveis,
            'categorias' => $categorias,
            'modelos' => $modelos
        ));
    }

    public function actionEditarVeiculo($idc, $idv) {
        $cliente = $this->carregarModeloCliente($idc);

        $veiculo = null;
        foreach ($cliente->veiculosActuais as $v) {
            if ($v->idVeiculo == $idv) {
                $veiculo = $v;
                break;
            }
        }

        if (!$veiculo) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        $this->performAjaxValidation('veiculo-form', $veiculo);

        if (isset($_POST['Veiculo'])) {
            $veiculo->attributes = $_POST['Veiculo'];
            if ($veiculo->save())
                $this->redirect(array('editarveiculo', 'idc' => $cliente->idCliente, 'idv' => $veiculo->idVeiculo));
        }

        $criteria = new CDbCriteria();
        $criteria->condition = 'activo = 1';
        $criteria->order = 'nome';
        $combustiveis = Combustivel::model()->findAll($criteria);

        $categorias = Categoria::model()->findAll($criteria);

        $criteria->join = 'INNER JOIN Marca m ON t.idMarca = m.idMarca';
        $criteria->condition = 't.activo = 1 AND m.activo = 1';
        $criteria->order = 'm.nome, t.nome';
        $modelos = Modelo::model()->findAll($criteria);

        $this->render('editar-veiculo', array(
            'cliente' => $cliente,
            'veiculo' => $veiculo,
            'combustiveis' => $combustiveis,
            'categorias' => $categorias,
            'modelos' => $modelos
        ));
    }

    public function actionRemoverVeiculo($idc, $idv) {
        //TODO: not implemented yet
    }

}