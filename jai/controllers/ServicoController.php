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

class ServicoController extends AdministracaoController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    /**
     * Lista de todos os serviços activos e pesquisa.
     */
    public function actionIndex() {
        $filtro = new Servico('search');
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Servico'])) {
            $filtro->attributes = $_REQUEST['Servico'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    /**
     * 
     */
    public function actionAdicionar() {
        $servico = new Servico();

        $this->validacaoAJAX('servico-form', $servico);

        if (isset($_POST['Servico'])) {
            $servico->attributes = $_POST['Servico'];
            if ($servico->save()) {
                $this->redirect(array('editar', 'id' => $servico->idServico));
            }
        }

        $this->render('editar', array(
            'servico' => $servico
        ));
    }

    /**
     *
     * @param integer $id 
     */
    public function actionEditar($id) {
        $servico = $this->carregarModeloServico($id);

        $this->validacaoAJAX('servico-form', $servico);

        if (isset($_POST['Servico'])) {
            $servico->attributes = $_POST['Servico'];
            if ($servico->save()) {
                $this->redirect(array('editar', 'id' => $servico->idServico));
            }
        }

        $this->render('editar', array(
            'servico' => $servico
        ));
    }

    /**
     *
     * @param integer $id
     * 
     * @throws CHttpException 
     */
    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($servico = $this->carregarModeloServico($id)) !== null) {

            $servico->activo = 0;
            $servico->save();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Pedido inválido. Se tem a certeza que o pedido está correcto contacte o suporte ou confirme o registo de erros.');
        }
    }

    /**
     * 
     */
    public function actionDadosJSON() {
        $resultado = (object) array('sucesso' => 0);
        if (isset($_POST['id']) && ($servico = $this->carregarModeloServico($_POST['id'])) !== null) {
            $resultado->sucesso = 1;
            $resultado->servico = (object) array(
                        'idServico' => $servico->idServico,
                        'nome' => $servico->nome,
                        'preco' => $servico->preco
            );
        }

        echo json_encode($resultado);
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
                'actions' => array(
                    'index', 'adicionar', 'editar', 'apagar', 'dadosJSON'
                ),
                'expression' => '$user->tipo > 1'
            )), parent::accessRules());
    }

    /**
     *
     * @param integer $id
     * 
     * @return Servico
     * @throws CHttpException 
     */
    private function carregarModeloServico($id) {
        if (($servico = Servico::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'A página pedida não existe.');
        }
        return $servico;
    }

}
