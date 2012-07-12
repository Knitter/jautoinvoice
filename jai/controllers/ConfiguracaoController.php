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
            'geral_empresa_nome' => '',
            'geral_empresa_email' => '',
            'geral_empresa_url' => '',
            'geral_sistema_activo' => 'sim',
            'geral_sistema_notificacoes' => 'nao',
            'geral_sistema_clientes' => 'nao',
            'geral_empresa_endereco' => '',
            'geral_empresa_telefone' => '',
            'geral_empresa_telemovel' => '',
            'geral_empresa_fax' => '',
            'geral_empresa_horario_inicio' => '',
            'geral_empresa_horario_fim' => '',
            'geral_contactos_mostrar' => 0,
            'geral_contactos_longitude' => '',
            'geral_contactos_latitude' => '',
            'geral_contactos_gmapskey' => '',
            'email_enviar' => 'nao',
            'email_html' => 1,
            'email_endereco' => '',
            'email_smtp_usar' => 'nao',
            'email_smtp_utilizador' => '',
            'email_smtp_password' => '',
            'email_smtp_servidor' => '',
            'email_smtp_porto' => 25,
            'email_smtp_prefixo' => '',
            'sms_enviar' => 'sim',
            'sms_telemovel' => '',
            'sms_utilizador' => '',
            'sms_passwordL' => '',
            'sms_creditos' => 0,
            'suporte_chave' => ''
        );

        $notificacoes = array(
            'nao' => 'Não',
            'email' => 'Apenas E-mail',
            'sms' => 'Apenas SMS',
            'emailsms' => 'E-mail ou SMS',
            'smsemail' => 'SMS ou E-mail'
        );

        if (isset($_POST['save'])) {
            unset($_POST['save']);

            foreach ($_POST as $chave => $valor) {
                if (($config = Configuracao::model()->findByPk($chave)) === null) {
                    $config = new Configuracao();
                    $config->chave = $chave;
                }
                $config->valor = $valor;

                if ($config->save()) {
                    
                }
            }
        }

        $nim = array('nao' => 'Não', 'sim' => 'Sim');

        foreach (Configuracao::model()->findAll() as $configuracao) {
            $configuracoes[$configuracao->chave] = $configuracao->valor;
        }

        $this->render('index', array(
            'config' => (object) $configuracoes,
            'nim' => $nim,
            'notificacoes' => $notificacoes
        ));
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
                $resultado->motivo = 'Erro de autenticação no Gateway de SMSs. ' . $aie->getMessage();
            } catch (SintaxeInvalidaException $sie) {
                $resultado->motivo = 'Erro interno. ' . $sie->getMessage();
            } catch (Exception $e) {
                $resultado->motivo = 'Erro desconhecido. ' . $e->getMessage();
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
                        'actions' => array('index', 'verCreditosSMS', 'gravar'
                        ),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

}