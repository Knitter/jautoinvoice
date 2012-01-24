<?php

/* CombustiveisController.php
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

class CombustiveisController extends AdministracaoController {

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
                        'actions' => array('index', 'criar', 'editar', 'apagar'),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    /**
     *
     * @param int $id
     * @return Combustivel
     */
    private function carregarModeloCombustivel($id) {
        if (($combustivel = Combustivel::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $combustivel;
    }

    public function actionIndex() {
        $filtro = new Combustivel();
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Combustivel'])) {
            $filtro->attributes = $_REQUEST['Combustivel'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    public function actionCriar() {
        $combustivel = new Combustivel();

        $this->performAjaxValidation('combustivel-form', $combustivel);

        if (isset($_POST['Combustivel'])) {
            $combustivel->attributes = $_POST['Combustivel'];
            if ($combustivel->save())
                $this->redirect(array('editar', 'id' => $combustivel->idCombustivel));
        }

        $this->render('editar', array('combustivel' => $combustivel));
    }

    public function actionEditar($id) {
        $combustivel = $this->carregarModeloCombustivel($id);

        $this->performAjaxValidation('combustivel-form', $combustivel);

        if (isset($_POST['Combustivel'])) {
            $combustivel->attributes = $_POST['Combustivel'];
            if ($combustivel->save())
                $this->redirect(array('editar', 'id' => $combustivel->idCombustivel));
        }

        $this->render('editar', array('combustivel' => $combustivel));
    }

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($combustivel = $this->carregarModeloCombustivel($id))) {

            $combustivel->activo = 0;
            $combustivel->save();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

}
