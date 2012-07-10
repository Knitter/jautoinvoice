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

class FornecedorController extends AdministracaoController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    public function actionIndex() {
        $filtro = new Fornecedor('search');
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Fornecedor'])) {
            $filtro->attributes = $_REQUEST['Fornecedor'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    public function actionAdicionar() {
        $fornecedor = new Fornecedor();

        $this->validacaoAJAX('fornecedor-form', $fornecedor);

        if (isset($_POST['Fornecedor'])) {
            $fornecedor->attributes = $_POST['Fornecedor'];
            if ($fornecedor->save())
                $this->redirect(array('editar', 'id' => $fornecedor->idFornecedor));
        }

        $this->render('editar', array('fornecedor' => $fornecedor));
    }

    public function actionEditar($id) {
        $fornecedor = $this->carregarModeloFornecedor($id);

        $this->validacaoAJAX('fornecedor-form', $fornecedor);

        if (isset($_POST['Fornecedor'])) {
            $fornecedor->attributes = $_POST['Fornecedor'];
            if ($fornecedor->save())
                $this->redirect(array('editar', 'id' => $fornecedor->idFornecedor));
        }

        $this->render('editar', array('fornecedor' => $fornecedor));
    }

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($fornecedor = $this->carregarModeloFornecedor($id))) {

            $fornecedor->activo = 0;
            $fornecedor->save();

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    public function actionEmail() {
        $resultado = (object) array('sucesso' => 0);
        if (!empty($_POST['destinatario']) && !empty($_POST['mensagem'])
                && ($fornecedor = Fornecedor::model()->findByPk((int) $_POST['destinatario'])) !== null) {
            if ($fornecedor->email) {
                if (($enderecoEmail = Configuracao::model()->findByPk('enderecoEmail')) !== null
                        && $enderecoEmail->valor != '') {

                    Yii::import('ext.email.*');

                    $nome = 'jAutoInvoice';
                    $config = Configuracao::model()->findByPk('nome');
                    if ($config && $config->valor != '') {
                        $nome = $config->valor;
                    }

                    $email = new Email($fornecedor->nome, $fornecedor->email, $nome, $enderecoEmail->valor
                                    , (!empty($_POST['assunto']) ? $_POST['assunto'] : 'Sem assunto.'), $_POST['mensagem']);
                    try {
                        $email->enviar();
                        $resultado->sucesso = 1;
                    } catch (Exception $e) {
                        $resultado->motivo = $e->getMessage();
                    }
                } else {
                    $resultado->motivo = 'Não está definido um endereço de origem.';
                }
            } else {
                $resultado->motivo = 'Não existe endereço de destino.';
            }
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
                        'actions' => array('index', 'adicionar', 'editar', 'apagar', 'email'),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    /**
     *
     * @param type $id
     * @return type
     * @throws CHttpException 
     */
    private function carregarModeloFornecedor($id) {
        if (($fornecedor = Fornecedor::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $fornecedor;
    }

}
