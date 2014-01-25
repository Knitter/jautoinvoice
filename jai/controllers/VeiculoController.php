<?php

/* This file is part of jAutoInvoice, a car workshop management software.
 * 
 * Copyright (c) 2012 - 2014, Sérgio Lopes.
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * 
 */
class VeiculoController extends SistemaController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    public function actionIndex() {
        $this->redirect(array('cliente/index'));
    }

    public function actionLista($id, $op = 'lista') {
        $cliente = $this->carregarModeloCliente($id);

        $filtro = new Veiculo('search');
        $filtro->unsetAttributes();

        $filtro->idCliente = $cliente->idCliente;

        $this->render('lista', array(
            'cliente' => $cliente,
            'filtro' => $filtro,
            'op' => $op
        ));
    }

    public function actionAdicionar($id, $op = 'lista') {
        $cliente = $this->carregarModeloCliente($id);

        $veiculo = new Veiculo();
        $this->validacaoAJAX('veiculo-form', $veiculo);

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

        $this->validacaoAJAX('veiculo-form', $veiculo);

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
            throw new CHttpException(400, 'Pedido inválido. Se tem a certeza que o pedido está correcto contacte o suporte ou confirme o registo de erros.');
        }
    }

    //TODO: limitar a pedidos AJAX
    public function actionMatricula() {
        $criteria = new CDbCriteria();
        $criteria->order = 'matricula';
        $criteria->compare('matricula', $_GET['term'], true);
        $criteria->compare('activo', 1);

        $veiculos = array();
        foreach (Veiculo::model()->findAll($criteria) as $veiculo) {
            $veiculos[] = $veiculo->matricula;
        }

        echo json_encode($veiculos);
        Yii::app()->end();
    }

    public function accessRules() {
        return array_merge(array(
            array(
                'deny',
                'users' => array('?')
            ),
            array(
                'allow',
                'actions' => array('index', 'adicionar', 'editar', 'apagar',
                    'lista', 'matricula'
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
            throw new CHttpException(404, 'A página pedida não existe.');
        }
        return $cliente;
    }

    /**
     *
     * @param integer $id
     * 
     * @return Veiculo
     * @throws CHttpException 
     */
    private function carregarModeloVeiculo($id) {
        if (($veiculo = Veiculo::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'A página pedida não existe.');
        }
        return $veiculo;
    }

}
