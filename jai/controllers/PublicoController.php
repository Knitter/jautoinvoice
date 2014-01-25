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

class PublicoController extends JController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);

        $contactos = false;
        if (($conf = Configuracao::model()->findByPk('mostrarPContacto')) !== null) {
            $contactos = intval($conf->valor);
        }

        $urlBase = Yii::app()->baseUrl;
        $this->menu = array(
            array(
                'label' => 'Início',
                'url' => array('publico/index'),
                'icon' => $urlBase . '/imagens/icones/casa.png',
            ),
            array(
                'label' => 'Contactos',
                'url' => array('publico/contactos'),
                'icon' => $urlBase . '/imagens/icones/contactos.png',
                'visible' => $contactos
            ),
            array(
                'label' => 'Entrar',
                'url' => array('publico/entrar'),
                'icon' => $urlBase . '/imagens/icones/entrar.png',
                'visible' => Yii::app()->user->isGuest
            ),
            array(
                'label' => 'Quadro',
                'url' => array('quadro/index'),
                'icon' => $urlBase . '/imagens/icones/quadro.png',
                'visible' => !Yii::app()->user->isGuest
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionSobre() {
        $this->render('sobre');
    }

    public function actionContactos() {
        $dados = (object) array(
                    'nome' => '',
                    'email' => '',
                    'endereco' => '',
                    'fax' => '',
                    'telefone' => '',
                    'telemovel' => '',
                    'inicio' => '',
                    'fim' => '',
                    'url' => '',
                    'gmapskey' => '',
                    'latitude' => '',
                    'longitude' => '',
        );
        if (($config = Configuracao::model()->findByPk('geral_contactos_gmapskey')) != null) {
            $dados->gmapskey = $config->valor;
        }
        if (($config = Configuracao::model()->findByPk('geral_contactos_latitude')) != null) {
            $dados->latitude = $config->valor;
        }
        if (($config = Configuracao::model()->findByPk('geral_contactos_longitude')) != null) {
            $dados->longitude = $config->valor;
        }
        if (($config = Configuracao::model()->findByPk('geral_empresa_email')) != null) {
            $dados->email = $config->valor;
        }
        if (($config = Configuracao::model()->findByPk('geral_empresa_endereco')) != null) {
            $dados->endereco = $config->valor;
        }
        if (($config = Configuracao::model()->findByPk('geral_empresa_fax')) != null) {
            $dados->fax = $config->valor;
        }
        if (($config = Configuracao::model()->findByPk('geral_empresa_horario_fim')) != null) {
            $dados->fim = $config->valor;
        }
        if (($config = Configuracao::model()->findByPk('geral_empresa_horario_inicio')) != null) {
            $dados->inicio = $config->valor;
        }
        if (($config = Configuracao::model()->findByPk('geral_empresa_nome')) != null) {
            $dados->nome = $config->valor;
        }
        if (($config = Configuracao::model()->findByPk('geral_empresa_telefone')) != null) {
            $dados->telefone = $config->valor;
        }
        if (($config = Configuracao::model()->findByPk('geral_empresa_telemovel')) != null) {
            $dados->telemovel = $config->valor;
        }
        if (($config = Configuracao::model()->findByPk('geral_empresa_url')) != null) {
            $dados->url = $config->valor;
        }

        $this->render('contactos', array('dados' => $dados));
    }

    public function actionEntrar() {
        $formulario = new FormularioEntrada();

        if (isset($_POST['FormularioEntrada'])) {
            $formulario->attributes = $_POST['FormularioEntrada'];

            if ($formulario->validate() && $formulario->login()) {
                $this->redirect(array('quadro/index'));
            }
        }
        $this->render('entrar', array('formulario' => $formulario));
    }

    public function actionSair() {
        Yii::app()->user->logout();

        $this->redirect(array('publico/index'));
    }

    public function actionErro() {
        if (($erro = Yii::app()->errorHandler->error)) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $erro['message'];
            } else {
                $this->render('erro', $erro);
            }
        }
    }

    public function accessRules() {
        return array_merge(array(
            array(
                'allow',
                'users' => array('*')
            ),
                ), parent::accessRules());
    }

}
