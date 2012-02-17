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
                        'actions' => array(
                            'index', 'criar', 'editar', 'apagar',
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
        $filtro = new FolhaObra('search');
        $filtro->unsetAttributes();

        if (isset($_REQUEST['FolhaObra'])) {
            $filtro->attributes = $_REQUEST['FolhaObra'];
        }

        $criteria = new CDbCriteria();
        $criteria->order = 'nome';
        $criteria->compare('activo', 1);

        $funcionarios = Funcionario::model()->findAll($criteria);

        $this->render('index', array(
            'filtro' => $filtro,
            'funcionarios' => $funcionarios
        ));
    }

    public function actionCriar() {
        $folha = new FolhaObra();

        $this->performAjaxValidation($folha, 'folhaobra-form');

        if (isset($_POST['FolhaObra'])) {
            $folha->attributes = $_POST['FolhaObra'];

            if (($veiculo = Veiculo::model()->find('matricula = :m', array(':m' => $_POST['FolhaObra']['matricula']))) != null) {
                $folha->idVeiculo = $veiculo->idVeiculo;
            }

            if ($folha->save()) {
                if (!empty($_POST['linhasServico'])) {
                    foreach ($_POST['linhasServico'] as $ls) {
                        $linhaJSON = json_decode($ls);

                        $linhaServico = new LinhaServico();
                        $linhaServico->idFolhaObra = $folha->idFolhaObra;
                        $linhaServico->duracao = $linhaJSON->duracao;
                        $linhaServico->notas = $linhaJSON->notas;

                        $linhaServico->idFuncionario = $linhaJSON->funcionario->id;
                        $linhaServico->valorHora = $linhaJSON->funcionario->valorHora;

                        $linhaServico->idServico = $linhaJSON->servico->id;
                        $linhaServico->custoServico = $linhaJSON->servico->preco;

                        if ($linhaServico->save()) {
                            foreach ($linhaJSON->gastos as $linhaJSON) {

                                $linhaGasto = new LinhaGasto();
                                $linhaGasto->idLinhaServico = $linhaServico->idLinhaServico;
                                $linhaGasto->quantidade = $linhaJSON->quantidade;

                                $linhaGasto->idMaterial = $linhaJSON->material->id;
                                $linhaGasto->precoUnitario = $linhaJSON->material->precoUnitario;
                                $linhaGasto->idIVA = $linhaJSON->material->iva->id;

                                $linhaGasto->save();
                            }
                        }
                    }
                }

                $this->redirect(array('editar', 'id' => $folha->idFolhaObra));
            }
        }

        $criteria = new CDbCriteria();

        $criteria->order = 'nome';
        $criteria->compare('activo', 1);

        $funcionarios = Funcionario::model()->findAll($criteria);
        $servicos = Servico::model()->findAll($criteria);
        $materiais = Material::model()->findAll($criteria);

        $this->render('editar', array(
            'folhaObra' => $folha,
            'funcionarios' => $funcionarios,
            'servicos' => $servicos,
            'materiais' => $materiais
        ));
    }

    public function actionEditar($id) {
        
    }

    public function actionApagar($id) {
        
    }

    public function actionFolhaDeMarcacao($id) {
        if (($marcacao = Marcacao::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        $folhaObra = new FolhaObra();
        $folhaObra->data = $marcacao->dataMarcacao;
        $folhaObra->descricaoAvaria = $marcacao->descricao . "\n" . $marcacao->notas;
        //TODO: ver a matricula de veículos não existentes
        //$folhaObra->matricula = $marcacao->matricula;
        //if ($marcacao->idVeiculo && ($veiculo = Veiculo::model()->find('matriculoa = :m', array(':m' => $marcacao->matricula))) !== null) {
        //    $folhaObra->idVeiculo = $marcacao->idVeiculo;
        //}
        $folhaObra->idFuncionario = Yii::app()->user->id;

        $criteria = new CDbCriteria();

        $criteria->order = 'nome';
        $criteria->compare('activo', 1);

        $funcionarios = Funcionario::model()->findAll($criteria);
        $servicos = Servico::model()->findAll($criteria);
        $materiais = Material::model()->findAll($criteria);

        $this->render('editar', array(
            'folhaObra' => $folhaObra,
            'funcionarios' => $funcionarios,
            'servicos' => $servicos,
            'materiais' => $materiais
        ));
    }

}
