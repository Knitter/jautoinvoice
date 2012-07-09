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

class ModeloController extends AdministracaoController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

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

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($modelo = $this->carregarModeloModelo($id)) !== null) {

            $modelo->activo = 0;
            $modelo->save();

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
     * @return Modelo
     * 
     * @throws CHttpException 
     */
    private function carregarModeloModelo($id) {
        if (($modelo = Modelo::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $modelo;
    }

}
