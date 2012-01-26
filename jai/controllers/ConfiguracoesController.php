<?php

/* .php
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

class ConfiguracoesController extends AdministracaoController {

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
                        'actions' => array('index', 'verCreditosSMS'
                        ),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    public function actionIndex() {
        $configuracoes = (object) array(
                    'enderecoEmail' => '',
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
                    'enviarSMS' => 0,
                    'utilizadorLSMS' => '',
                    'passwordLSMS' => '',
                    'creditosLSMS' => 0
        );

        if (($c = Configuracao::model()->findByPk('enderecoEmail')) !== null) {
            $configuracoes->enderecoEmail = $c->valor;
        }
        
        if (($c = Configuracao::model()->findByPk('enviarEmails')) !== null) {
            $configuracoes->enviarEmails = intval($c->valor);
        }

        if (($c = Configuracao::model()->findByPk('sistemaActivo')) !== null) {
            $configuracoes->sistemaActivo = intval($c->valor);
        }

        if (($c = Configuracao::model()->findByPk('enviarNotificacoes')) !== null) {
            $configuracoes->enviarNotificacoes = intval($c->valor);
        }

        if (($c = Configuracao::model()->findByPk('permitirClientes')) !== null) {
            $configuracoes->permitirClientes = intval($c->valor);
        }

        if (($c = Configuracao::model()->findByPk('htmlEmails')) !== null) {
            $configuracoes->htmlEmails = intval($c->valor);
        }

        if (($c = Configuracao::model()->findByPk('usarSMTP')) !== null) {
            $configuracoes->usarSMTP = intval($c->valor);
        }

        if (($c = Configuracao::model()->findByPk('utilizadorSMTP')) !== null) {
            $configuracoes->utilizadorSMTP = $c->valor;
        }

        if (($c = Configuracao::model()->findByPk('passwordSMTP')) !== null) {
            $configuracoes->passwordSMTP = $c->valor;
        }

        if (($c = Configuracao::model()->findByPk('servidorSMTP')) !== null) {
            $configuracoes->servidorSMTP = $c->valor;
        }

        if (($c = Configuracao::model()->findByPk('portoSMTP')) !== null) {
            $configuracoes->portoSMTP = intval($c->valor);
        }

        if (($c = Configuracao::model()->findByPk('prefixoSMTP')) !== null) {
            $configuracoes->prefixoSMTP = $c->valor;
        }

        if (($c = Configuracao::model()->findByPk('chaveSuporte')) !== null) {
            $configuracoes->chaveSuporte = $c->valor;
        }

        if (($c = Configuracao::model()->findByPk('enviarSMS')) !== null) {
            $configuracoes->enviarSMS = intval($c->valor);
        }

        if (($c = Configuracao::model()->findByPk('utilizadorLSMS')) !== null) {
            $configuracoes->utilizadorLSMS = $c->valor;
        }

        if (($c = Configuracao::model()->findByPk('passwordLSMS')) !== null) {
            $configuracoes->passwordLSMS = $c->valor;
        }

        if (($c = Configuracao::model()->findByPk('creditosLSMS')) !== null) {
            $configuracoes->creditosLSMS = intval($c->valor);
        }

        $this->render('index', array('config' => $configuracoes));
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
                    $cCreditos->grupo = 'Luso SMS';
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

}