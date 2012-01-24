<?php

/* MarcacoesController.php
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

class MarcacoesController extends SistemaController {

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
                        'actions' => array('index', 'marcar',
                            'cancelar', 'eventos', 'acContribuinte', 'acMatricula'
                        ),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    private function carregarModeloMarcacao($id) {
        if (($marcacao = Marcacao::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $marcacao;
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionAcMatricula() {
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

    public function actionAcContribuinte() {
        $criteria = new CDbCriteria();
        $criteria->order = 'nome';
        $criteria->compare('contribuinte', $_GET['term'], true);
        $criteria->compare('activo', 1);

        $clientes = array();
        foreach (Cliente::model()->findAll($criteria) as $cliente) {
            $clientes[] = $cliente->contribuinte;
        }

        echo json_encode($clientes);

        Yii::app()->end();
    }

    public function actionMarcar() {
        
    }

    public function actionCancelar($id) {
        
    }

    public function actionEventos() {
        $eventos = array();

        if (isset($_GET['start']) && isset($_GET['end'])) {
            $criteria = new CDbCriteria();
            $criteria->addBetweenCondition('dataMarcacao', date('Y-m-d H:i:s', $_GET['start'] / 1000), date('Y-m-d H:i:s', $_GET['end']));
            $criteria->compare('activo', 1);

            foreach (Marcacao::model()->findAll($criteria) as $evt) {
                $eventos[] = (object) array(
                            'title' => ($evt->descricao ? $evt->descricao : $evt->veiculo->matricula),
                            'start' => strtotime($evt->dataMarcacao),
                            'allDay' => false
                );
            }
        }

        echo json_encode($eventos);
        Yii::app()->end();
    }

}