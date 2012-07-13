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
            throw new CHttpException(400, 'Pedido inválido. Se tem a certeza que o pedido está correcto contacte o suporte ou confirme o registo de erros.');
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

                    $registo = new Email();
                    $email = new ExtEmail($cliente->nome, $cliente->email, $nome, $enderecoEmail->valor
                                    , (!empty($_POST['assunto']) ? $_POST['assunto'] : 'Sem assunto.'), $_POST['mensagem']);

                    try {
                        $email->enviar();
                        $resultado->sucesso = 1;

                        //Registar e-mail enviado
                        $registo->idFuncionario = Yii::app()->user->id;
                        $registo->idCliente = $cliente->idCliente;
                        $registo->endereco = $cliente->email;
                        $registo->assunto = (!empty($_POST['assunto']) ? $_POST['assunto'] : 'Sem assunto.');
                        $registo->mensagem = $_POST['mensagem'];
                        $registo->data = date('Y-m-d H:i:s');

                        $registo->save();
                    } catch (Exception $e) {
                        $resultado->motivo = $e->getMessage();
                        $registo->debug = $e->getMessage();
                    }

                    $registo->estado = $resultado->sucesso;
                    $registo->save();
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

                    $registo = new Sms();
                    try {
                        $sms = new LusoSMS($cUsername->valor, $cPassword->valor, $_POST['sms'], $cOrigem->valor, $cliente->telemovel);
                        $sms->enviar();

                        $resultado->sucesso = 1;

                        $registo->idFuncionario = Yii::app()->user->id;
                        $registo->idCliente = $cliente->idCliente;
                        $registo->numero = $cliente->telemovel;
                        $registo->mensagem = $_POST['sms'];
                        $registo->data = date('Y-m-d H:i:s');

                        $registo->save();
                    } catch (CaracteresExcedidosException $cee) {
                        $resultado->motivo = 'Número de caracteres excedidos.';
                        $registo->codigoErro = 'caracteres_excedidos';
                        $registo->save();
                    } catch (ErroComunicacaoException $ece) {
                        $resultado->motivo = 'Ocorreu um erro de comunicação com o sistema Luso SMS.';
                        $registo->codigoErro = 'erro_comunicacao';
                        $registo->save();
                    } catch (CreditoInsuficienteException $cie) {
                        $resultado->motivo = 'Não possui créditos suficientes para enviar novas SMSs.';
                        $registo->codigoErro = 'credito_insuficiente';
                        $registo->save();
                    } catch (AutenticacaoInvalidaException $aie) {
                        $resultado->motivo = 'Falha na autenticação do sistema Luso SMS.';
                        $registo->codigoErro = 'autenticacao_invalida';
                        $registo->save();
                    } catch (SintaxeInvalidaException $sie) {
                        $resultado->motivo = 'Erro interno.';
                        $registo->codigoErro = 'sintaxe_invalida';
                        $registo->save();
                    } catch (Exception $e) {
                        $resultado->motivo = 'Erro desconhecido.';
                        $registo->codigoErro = 'desconhecido';
                        $registo->save();
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

    public function actionPassword($id) {
        $cliente = $this->carregarModeloCliente($id);

        if ($utilizador->email) {
            if (($enderecoEmail = Configuracao::model()->findByPk('enderecoEmail')) !== null
                    && $enderecoEmail->valor != '') {

                Yii::import('ext.email.*');

                $nome = 'jAutoInvoice';
                $config = Configuracao::model()->findByPk('nome');
                if ($config && $config->valor != '') {
                    $nome = $config->valor;
                }

                try {
                    //TODO: validate
                    $pass = Cliente::hash($this->random());
                    $email = new ExtEmail($cliente->nome, $cliente->email, $nome, $enderecoEmail->valor, 'Nova password',
                                    sprintf('A sua password de acesso ao sistema %s foi alterada para %s', $nome, $pass));

                    $email->enviar();

                    $utilizador->password = $pass;
                    $utilizador->save();
                } catch (Exception $ex) {
                    //TODO: mostrar mensagem de erro
                }
            }
        }

        $this->redirect(array('cliente/editar', 'id' => $id));
    }

    public function accessRules() {
        return array_merge(array(
                    array(
                        'deny',
                        'users' => array('?')
                    ),
                    array(
                        'allow',
                        'actions' => array('index', 'adicionar', 'editar', 'apagar', 'email', 'sms', 'password'),
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
            throw new CHttpException(404, 'A página pedida não existe.');
        }

        return $cliente;
    }

    private function random($size = 9) {
        $password = '';
        $data = array('aeioubcdfghjklmnpqrstvwxyz', '1234567890', '+#&@');
        for ($i = 0; $i < $size; $i++) {
            $password .= $data[$index = rand(0, 2)][($index % 2 == 0) ?
                            strtoupper(rand(0, strlen($data[$index]))) :
                            rand(0, strlen($data[$index]))];
        }

        return $password;
    }

}