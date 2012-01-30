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
                        'actions' => array('index', 'marcar', 'actualizar',
                            'apagar', 'eventos'
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
        $inicio = 8;
        if (($config = Configuracao::model()->findByPk('inicioActividade')) !== null && intval($config->valor)) {
            $inicio = int($config->valor);
        }

        $fim = 18;
        if (($config = Configuracao::model()->findByPk('fimActividade')) !== null && intval($config->valor)) {
            $fim = int($config->valor);
        }

        $this->render('index', array(
            'inicio' => $inicio,
            'fim' => $fim
        ));
    }

    public function actionMarcar() {
        $resultado = (object) array('sucesso' => 0);
        $marcacao = new Marcacao();

        if (!empty($_POST['matricula'])) {
            $criteria = new CDbCriteria();
            $criteria->compare('matricula', $_POST['matricula']);
            $criteria->compare('activo', 1);

            if (($veiculo = Veiculo::model()->find($criteria)) !== null) {
                $marcacao->idVeiculo = $veiculo->idVeiculo;
            }
        }

        $data = date('Y-m-d', $_POST['data'] / 1000);
        if (!empty($_POST['hora'])) {
            $tempo = explode(':', $_POST['hora']);
            if (count($tempo) == 2) {
                $data .= sprintf(' %d:%d:00', $tempo[0], $tempo[1]);
            }
        }
        $marcacao->dataMarcacao = $data;
        $marcacao->descricao = !empty($_POST['descricao']) ? $_POST['descricao'] :
                ($marcacao->idVeiculo ? 'Serviço a ' . $veiculo->matricula : 'Serviço desconhecido');

        if (!empty($_POST['notas'])) {
            $marcacao->notas = $_POST['notas'];
        }

        if ($marcacao->save()) {
            $resultado->sucesso = 1;
            $resultado->evento = (object) array(
                        'id' => $marcacao->idMarcacao,
                        'title' => $marcacao->descricao,
                        'start' => strtotime($marcacao->dataMarcacao),
                        'allDay' => false,
                        'notas' => $marcacao->notas,
                        //TODO: mover matricula para dentro da marcacao
                        'matricula' => ($marcacao->idVeiculo ? $veiculo->matricula : '')
            );
        }

        echo json_encode($resultado);
        Yii::app()->end();
    }

    public function actionApagar() {
        $resultado = (object) array('sucesso' => 0);
        if (!empty($_POST['id'])) {
            $marcacao = $this->carregarModeloMarcacao($_POST['id']);

            $marcacao->activo = 0;
            if ($marcacao->save()) {
                $resultado->sucesso = 1;
            }
        }
        echo json_encode($resultado);
        Yii::app()->end();
    }

    public function actionEventos() {
        $eventos = array();

        if (isset($_GET['start']) && isset($_GET['end'])) {
            $criteria = new CDbCriteria();
            $criteria->addBetweenCondition('dataMarcacao', date('Y-m-d H:i:s', $_GET['start'] / 1000), date('Y-m-d H:i:s', $_GET['end']));
            $criteria->compare('activo', 1);

            foreach (Marcacao::model()->findAll($criteria) as $evt) {
                $eventos[] = (object) array(
                            'id' => $evt->idMarcacao,
                            'title' => $evt->descricao,
                            'start' => strtotime($evt->dataMarcacao),
                            'allDay' => false,
                            'notas' => $evt->notas,
                            'matricula' => ($evt->idVeiculo ? $evt->veiculo->matricula : '')
                );
            }
        }

        echo json_encode($eventos);
        Yii::app()->end();
    }

    public function actionActualizar() {
        $resultado = (object) array('sucesso' => 0);
        if (!empty($_POST['id'])) {
            $marcacao = $this->carregarModeloMarcacao($_POST['id']);

            if (!empty($_POST['matricula'])) {
                $criteria = new CDbCriteria();
                $criteria->compare('matricula', $_POST['matricula']);
                $criteria->compare('activo', 1);

                if (($veiculo = Veiculo::model()->find($criteria)) !== null) {
                    $marcacao->idVeiculo = $veiculo->idVeiculo;
                }
            } else if ($marcacao->idVeiculo) {
                $marcacao->idVeiculo = null;
                //$marcacao->matricula = null;
            }

            $data = date('Y-m-d', $_POST['data'] / 1000);
            if (!empty($_POST['hora'])) {
                $tempo = explode(':', $_POST['hora']);
                if (count($tempo) == 2) {
                    $data .= sprintf(' %d:%d:00', $tempo[0], $tempo[1]);
                }
            }
            $marcacao->dataMarcacao = $data;
            $marcacao->descricao = !empty($_POST['descricao']) ? $_POST['descricao'] :
                    ($marcacao->idVeiculo ? 'Serviço a ' . $veiculo->matricula : 'Serviço desconhecido');

            if (!empty($_POST['notas'])) {
                $marcacao->notas = $_POST['notas'];
            } else if ($marcacao->notas) {
                $marcacao->notas = null;
            }

            if ($marcacao->save()) {
                $resultado->sucesso = 1;
                $resultado->evento = (object) array(
                            'id' => $marcacao->idMarcacao,
                            'title' => $marcacao->descricao,
                            'start' => strtotime($marcacao->dataMarcacao),
                            'allDay' => false,
                            'notas' => $marcacao->notas,
                            //TODO: mover matricula para dentro da marcacao
                            'matricula' => ($marcacao->idVeiculo ? $veiculo->matricula : '')
                );
            }
        }
        echo json_encode($resultado);
        Yii::app()->end();
    }

}