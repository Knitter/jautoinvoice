<?php

/* This file is part of jAutoInvoice, a car workshop management software.
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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 * 
 * http://sourceforge.net/projects/jautoinvoice
 */

class CategoriaController extends AdministracaoController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    public function actionIndex() {
        $filtro = new Categoria('search');
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Categoria'])) {
            $filtro->attributes = $_REQUEST['Categoria'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    public function actionAdicionar() {
        $categoria = new Categoria();

        $this->validacaoAJAX('categoria-form', $categoria);

        if (isset($_POST['Categoria'])) {
            $categoria->attributes = $_POST['Categoria'];
            if ($categoria->save())
                $this->redirect(array('editar', 'id' => $categoria->idCategoria));
        }

        $this->render('editar', array('categoria' => $categoria));
    }

    public function actionEditar($id) {
        $categoria = $this->carregarModeloCategoria($id);

        $this->validacaoAJAX('categoria-form', $categoria);

        if (isset($_POST['Categoria'])) {
            $categoria->attributes = $_POST['Categoria'];
            if ($categoria->save())
                $this->redirect(array('editar', 'id' => $categoria->idCategoria));
        }

        $this->render('editar', array('categoria' => $categoria));
    }

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($categoria = $this->carregarModeloCategoria($id))) {

            $categoria->activo = 0;
            $categoria->save();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
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
                        'actions' => array('index', 'criar', 'editar', 'apagar'),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    /**
     *
     * @param type $id
     * 
     * @return Categoria
     * @throws CHttpException 
     */
    private function carregarModeloCategoria($id) {
        if (($categoria = Categoria::model()->findByPk((int) $id)) === null) {
            //TODO: 
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $categoria;
    }

}
