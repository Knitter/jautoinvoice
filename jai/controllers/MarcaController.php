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

class MarcaController extends AdministracaoController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    /**
     * 
     */
    public function actionIndex() {
        $filtro = new Marca('search');
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Marca'])) {
            $filtro->attributes = $_REQUEST['Marca'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    /**
     * 
     */
    public function actionAdicionar() {
        $marca = new Marca();

        $this->validacaoAJAX('marca-form', $marca);

        if (isset($_POST['Marca'])) {
            $marca->attributes = $_POST['Marca'];
            if ($marca->save()) {
                $this->redirect(array('editar', 'id' => $marca->idMarca));
            }
        }

        $this->render('editar', array('marca' => $marca));
    }

    /**
     *
     * @param integer $id 
     */
    public function actionEditar($id) {
        $marca = $this->carregarModeloMarca($id);

        $this->validacaoAJAX('marca-form', $marca);

        if (isset($_POST['Marca'])) {
            $marca->attributes = $_POST['Marca'];
            if ($marca->save()) {
                $this->redirect(array('editar', 'id' => $marca->idMarca));
            }
        }

        $this->render('editar', array('marca' => $marca));
    }

    /**
     *
     * @param integer $id
     * 
     * @throws CHttpException 
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest && ($marca = $this->carregarModeloMarca($id))) {

            $marca->activo = 0;
            $marca->save();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Pedido inválido. Se tem a certeza que o pedido está correcto contacte o suporte ou confirme o registo de erros.');
        }
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
     *
     * @param integer $id
     * @return Marca
     * 
     * @throws CHttpException 
     */
    private function carregarModeloMarca($id) {
        if (($marca = Marca::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'A página pedida não existe.');
        }
        return $marca;
    }

}
