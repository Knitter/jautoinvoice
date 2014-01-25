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

class ModeloController extends AdministracaoController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    /**
     * Lista dos modelos existentes.
     */
    public function actionIndex() {
        $filtro = new Modelo('search');
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Modelo'])) {
            $filtro->attributes = $_REQUEST['Modelo'];
        }

        $criteria = new CDbCriteria();
        $criteria->order = 'nome';
        $criteria->compare('activo', 1);
        $marcas = Marca::model()->findAll($criteria);

        $this->render('index', array(
            'filtro' => $filtro,
            'marcas' => $marcas
        ));
    }

    /**
     * Permite a adição de novos modelos.
     */
    public function actionAdicionar() {
        $modelo = new Modelo();

        $this->validacaoAJAX('modelo-form', $modelo);

        if (isset($_POST['Modelo'])) {
            $modelo->attributes = $_POST['Modelo'];
            if ($modelo->save()) {
                $this->redirect(array('editar', 'id' => $modelo->idModelo));
            }
        }

        $criteria = new CDbCriteria();
        $criteria->order = 'nome';
        $criteria->compare('activo', 1);
        $marcas = Marca::model()->findAll($criteria);

        $this->render('editar', array(
            'modelo' => $modelo,
            'marcas' => $marcas
        ));
    }

    /**
     * Permite a edição de modelos de veículos.
     * 
     * @param integer $id ID do registo do modelo.
     */
    public function actionEditar($id) {
        $modelo = $this->carregarModeloModelo($id);

        $this->validacaoAJAX('modelo-form', $modelo);

        if (isset($_POST['Modelo'])) {
            $modelo->attributes = $_POST['Modelo'];
            if ($modelo->save()) {
                $this->redirect(array('editar', 'id' => $modelo->idModelo));
            }
        }

        $criteria = new CDbCriteria();
        $criteria->order = 'nome';
        $criteria->compare('activo', 1);
        $marcas = Marca::model()->findAll($criteria);

        $this->render('editar', array(
            'modelo' => $modelo,
            'marcas' => $marcas
        ));
    }

    /**
     * Remove um registo de modelo de veículo.
     * 
     * @param integer $id ID do registo a remover.
     * @throws CHttpException 
     */
    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($modelo = $this->carregarModeloModelo($id)) !== null) {

            $modelo->activo = 0;
            $modelo->save();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Pedido inválido. Se tem a certeza que o pedido está correcto contacte o suporte ou confirme o registo de erros.');
        }
    }

    /**
     * Regras de acesso às acções do controlador.
     * 
     * @return array Lista de regras de acesso.
     */
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
     * Carrega um registo de modelo de veículo.
     * 
     * @param integer $id ID do registo a carregar.
     * 
     * @return Modelo Registo encontrado.
     * @throws CHttpException 
     */
    private function carregarModeloModelo($id) {
        if (($modelo = Modelo::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'A página pedida não existe.');
        }
        return $modelo;
    }

}
