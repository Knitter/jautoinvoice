<?php

/* ObrasController.php
 * 
 * This file is part of jAutoInvoice, a car workshop management software.
 * Copyright (c) 2011, Sérgio Lopes.
 * http://sourceforge.net/projects/jautoinvoice
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
 */

class ObrasController extends SistemaController {

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
                            'folhaDeMarcacao'
                        ),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    /**
     * @param int $id
     * @return FolhaObra
     */
    private function carregarModeloFolhaObra($id) {
        if (($folha = FolhaObra::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $folha;
    }

    public function actionIndex() {
        $filtro = new FolhaObra();
        $filtro->unsetAttributes();

        if (isset($_REQUEST['FolhaObra'])) {
            $filtro->attributes = $_REQUEST['FolhaObra'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    public function actionCriar() {
        $folha = new FolhaObra();

        $this->performAjaxValidation($folha, 'folhaobra-form');

        if (isset($_POST['FolhaObra'])) {
            $folha->attributes = $_POST['FolhaObra'];
            if ($folha->save())
                $this->redirect(array('editar', 'id' => $folha->idFolhaObra));
        }

        $this->render('editar', array('folhaObra' => $folha));
    }

    public function actionEditar($id) {
        $folha = $this->carregarModeloFolhaObra($id);

        $this->performAjaxValidation($folha, 'folhaobra-form');

        if (isset($_POST['FolhaObra'])) {
            $folha->attributes = $_POST['FolhaObra'];
            if ($folha->save())
                $this->redirect(array('editar', 'id' => $folha->idFolhaObra));
        }

        $this->render('editar', array('folhaObra' => $folha));
    }

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($folha = $this->carregarModeloFolhaObra($id)) !== null) {

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    public function actionFolhaDeMarcacao($id) {
        if (($marcacao = Marcacao::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        
        

        $this->render('demarcacao', array(
            'marcacao' => $marcacao
        ));
    }

}
