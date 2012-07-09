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

/**
 * 
 */
class ClienteController extends SistemaController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    public function actionIndex() {
        $filtro = new Cliente('search');
        $filtro->unsetAttributes();

        if (isset($_REQUEST['Cliente'])) {
            $filtro->attributes = $_REQUEST['Cliente'];
        }

        $this->render('index', array('filtro' => $filtro));
    }

    public function actionAdicionar() {
        $cliente = new Cliente();

        $this->validacaoAJAX('cliente-form', $cliente);

        if (isset($_POST['Cliente'])) {
            $cliente->attributes = $_POST['Cliente'];
            if ($cliente->save())
                $this->redirect(array('editar', 'id' => $cliente->idCliente));
        }

        $this->render('editar', array('cliente' => $cliente));
    }

    public function actionEditar($id) {
        $cliente = $this->carregarModeloCliente($id);

        $this->validacaoAJAX('cliente-form', $cliente);

        if (isset($_POST['Cliente'])) {
            $cliente->attributes = $_POST['Cliente'];
            if ($cliente->save())
                $this->redirect(array('editar', 'id' => $cliente->idCliente));
        }

        $this->render('editar', array('cliente' => $cliente));
    }

    public function actionApagar($id) {
        if (Yii::app()->request->isPostRequest && ($cliente = $this->carregarModeloCliente($id)) !== null) {

            $cliente->activo = 0;
            $cliente->save();

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
                && ($cliente = Cliente::model()->findByPk((int) $_POST['destinatario'])) !== null) {
            if ($cliente->email) {
                if (($enderecoEmail = Configuracao::model()->findByPk('enderecoEmail')) !== null
                        && $enderecoEmail->valor != '') {

                    Yii::import('ext.email.*');

                    $nome = 'jAutoInvoice';
                    $config = Configuracao::model()->findByPk('nome');
                    if ($config && $config->valor != '') {
                        $nome = $config->valor;
                    }

                    $email = new Email($cliente->nome, $cliente->email, $nome, $enderecoEmail->valor
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

    public function actionSms() {
        $resultado = (object) array('sucesso' => 0);
        if (!empty($_POST['sms']) && !empty($_POST['cliente'])
                && ($cliente = Cliente::model()->findByPk((int) $_POST['cliente'])) !== null) {

            if ($cliente->telemovel) {
                Yii::import('ext.lusosms.*');

                if (($cUsername = Configuracao::model()->findByPk('utilizadorLSMS')) !== null
                        && ($cPassword = Configuracao::model()->findByPk('passwordLSMS')) !== null
                        && ($cOrigem = Configuracao::model()->findByPk('passwordLSMS')) !== null) {

                    try {
                        $sms = new LusoSMS($cUsername->valor, $cPassword->valor, $_POST['sms'], $cOrigem->valor, $cliente->telemovel);
                        $sms->enviar();

                        $resultado->sucesso = 1;
                    } catch (CaracteresExcedidosException $cee) {
                        $resultado->motivo = 'Número de caracteres excedidos.';
                    } catch (ErroComunicacaoException $ece) {
                        $resultado->motivo = 'Ocorreu um erro de comunicação com o sistema Luso SMS.';
                    } catch (CreditoInsuficienteException $cie) {
                        $resultado->motivo = 'Não possui créditos suficientes para enviar novas SMSs.';
                    } catch (AutenticacaoInvalidaException $aie) {
                        $resultado->motivo = 'Falha na autenticação do sistema Luso SMS.';
                    } catch (SintaxeInvalidaException $sie) {
                        $resultado->motivo = 'Erro interno.';
                    } catch (Exception $e) {
                        $resultado->motivo = 'Erro desconhecido.';
                    }
                } else {
                    $resultado->motivo = 'Configurações Luso SMS inválidas.';
                }
            } else {
                $resultado->motivo = 'Sem telemóvel de destino.';
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
                        'actions' => array('index', 'criar', 'editar', 'apagar',
                            'email', 'sms'
                        ),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    /**
     *
     * @param type $id
     * 
     * @return Cliente
     * @throws CHttpException 
     */
    private function carregarModeloCliente($id) {
        if (($cliente = Cliente::model()->findByPk((int) $id)) === null) {
            //TODO:
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $cliente;
    }

}