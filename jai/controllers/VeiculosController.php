<?php

/* VeiculosController.php
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
class VeiculosController extends SistemaController {

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
                        'actions' => array('index', 'criar', 'editar', 'apagar', 'lista'
                        ),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    /**
     * @param int $id
     * 
     * @return Cliente
     * @throws CHttpException 
     */
    private function carregarModeloCliente($id) {
        if (($cliente = Cliente::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $cliente;
    }

    /**
     *
     * @param type $id
     * @return type
     * 
     * @throws CHttpException 
     */
    private function carregarModeloVeiculo($id) {
        if (($veiculo = Veiculo::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $veiculo;
    }

    public function actionIndex() {
        $this->redirect(array('/clientes'));
    }

    public function actionLista($id, $op = 'lista') {
        $cliente = $this->carregarModeloCliente($id);

        $filtro = new Veiculo();
        $filtro->unsetAttributes();
        $filtro->idCliente = $cliente->idCliente;

        $this->render('lista', array(
            'cliente' => $cliente,
            'filtro' => $filtro,
            'op' => $op
        ));
    }

    public function actionCriar($id, $op = 'lista') {
        $cliente = $this->carregarModeloCliente($id);
        $veiculo = new Veiculo();

        $this->performAjaxValidation('veiculo-form', $veiculo);

        if (isset($_POST['Veiculo'])) {
            $veiculo->attributes = $_POST['Veiculo'];
            $veiculo->idCliente = $cliente->idCliente;

            if ($veiculo->save()) {
                $this->redirect(array('editar', 'idc' => $cliente->idCliente, 'idv' => $veiculo->idVeiculo, 'op' => $op));
            }
        }

        $criteria = new CDbCriteria();
        $criteria->order = 'nome';
        $criteria->compare('activo', 1);
        $combustiveis = Combustivel::model()->findAll($criteria);

        $categorias = Categoria::model()->findAll($criteria);

        //TODO: make DB independent
        $criteria->join = 'INNER JOIN Marca m ON t.idMarca = m.idMarca';
        $criteria->condition = 't.activo = 1 AND m.activo';
        $criteria->order = 'm.nome, t.nome';
        $modelos = Modelo::model()->findAll($criteria);

        $this->render('editar', array(
            'veiculo' => $veiculo,
            'cliente' => $cliente,
            'combustiveis' => $combustiveis,
            'categorias' => $categorias,
            'modelos' => $modelos,
            'op' => $op
        ));
    }

    public function actionEditar($idc, $idv, $op = 'lista') {
        $cliente = $this->carregarModeloCliente($idc);

        $veiculo = $this->carregarModeloVeiculo($idv);

        $this->performAjaxValidation('veiculo-form', $veiculo);

        if (isset($_POST['Veiculo'])) {
            $veiculo->attributes = $_POST['Veiculo'];
            if ($veiculo->save()) {
                $this->redirect(array('editar', 'idc' => $cliente->idCliente, 'idv' => $veiculo->idVeiculo, 'op' => $op));
            }
        }

        $criteria = new CDbCriteria();
        $criteria->order = 'nome';
        $criteria->compare('activo', 1);
        $combustiveis = Combustivel::model()->findAll($criteria);

        $categorias = Categoria::model()->findAll($criteria);

        //TODO: make DB independent
        $criteria->join = 'INNER JOIN Marca m ON t.idMarca = m.idMarca';
        $criteria->condition = 't.activo = 1 AND m.activo';
        $criteria->order = 'm.nome, t.nome';
        $modelos = Modelo::model()->findAll($criteria);

        $this->render('editar', array(
            'cliente' => $cliente,
            'veiculo' => $veiculo,
            'combustiveis' => $combustiveis,
            'categorias' => $categorias,
            'modelos' => $modelos,
            'op' => $op
        ));
    }

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($veiculo = $this->carregarModeloVeiculo($id)) !== null) {

            $veiculo->activo = 0;
            $veiculo->save();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

}