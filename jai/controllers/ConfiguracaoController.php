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

class ConfiguracaoController extends AdministracaoController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    public function actionIndex() {
        $configuracoes = array(
            'nome' => '',
            'email' => '',
            'url' => '',
            'enderecoEnvio' => '',
            'enviarEmails' => 'nao',
            'sistemaActivo' => 'sim',
            'enviarNotificacoes' => 'nao',
            'permitirClientes' => 'nao',
            'htmlEmails' => 1,
            'usarSMTP' => 'nao',
            'utilizadorSMTP' => '',
            'passwordSMTP' => '',
            'servidorSMTP' => '',
            'portoSMTP' => 25,
            'prefixoSMTP' => '',
            'chaveSuporte' => '',
            'enviarSMS' => 'sim',
            'telemovelLSMS' => '',
            'utilizadorLSMS' => '',
            'passwordLSMS' => '',
            'creditosLSMS' => 0,
            'endereco' => '',
            'telefone' => '',
            'telemovel' => '',
            'fax' => '',
            'inicioActividade' => '',
            'fimActividade' => '',
            'mostrarPContacto' => 0,
            'longitude' => '',
            'latitude' => '',
            'gmapskey' => '',
        );

        foreach (Configuracao::model()->findAll() as $configuracao) {
            $configuracoes[$configuracao->chave] = $configuracao->valor;
        }

        $this->render('index', array('config' => (object) $configuracoes));
    }

    public function actionVerCreditosSMS() {
        $resultado = (object) array('sucesso' => 0);
        Yii::import('ext.lusosms.*');

        if (($cUsername = Configuracao::model()->findByPk('utilizadorLSMS')) !== null
                && ($cPassword = Configuracao::model()->findByPk('passwordLSMS')) !== null) {

            try {
                $resultado->creditos = LusoSMS::verificarCreditos($cUsername->valor, $cPassword->valor);
                if (($cCreditos = Configuracao::model()->findByPk('creditosLSMS')) == null) {
                    $cCreditos = new Configuracao();
                    $cCreditos->chave = 'creditosLSMS';
                }

                $cCreditos->valor = $resultado->creditos;
                $cCreditos->save();
                $resultado->sucesso = 1;
            } catch (AutenticacaoInvalidaException $aie) {
                $resultado->motivo = 'Erro de autenticação no sistema Luso SMS.';
            } catch (SintaxeInvalidaException $sie) {
                $resultado->motivo = 'Erro interno.';
            } catch (Exception $e) {
                $resultado->motivo = 'Erro desconhecido.';
            }
        }

        echo json_encode($resultado);
        Yii::app()->end();
    }

    public function actionGravar() {
        foreach ($_POST as $chave => $valor) {
            if ($chave != 'save') {
                if (($config = Configuracao::model()->findByPk($chave)) === null) {
                    $config = new Configuracao();
                    $config->chave = $chave;
                }
                $config->valor = $valor;

                //NOTE: ignoring save errors
                $config->save();
            }
        }

        $this->redirect(array('/configuracoes'));
    }

    public function accessRules() {
        return array_merge(array(
                    array(
                        'deny',
                        'users' => array('?')
                    ),
                    array(
                        'allow',
                        'actions' => array('index', 'verCreditosSMS', 'gravar'
                        ),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

}