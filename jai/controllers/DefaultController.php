<?php

/* DefaultController.php
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

class DefaultController extends JaiController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);

        $this->menu = array(
            array(
                'label' => 'Início',
                'url' => $this->createUrl('/default'),
                'icon' => 'imagens/icones/inicio.png',
            ),
            array(
                'label' => 'Contactos',
                'url' => $this->createUrl('default/contactos'),
                'icon' => 'imagens/icones/contactos.png',
            ),
            array(
                'label' => 'Entrar',
                'url' => $this->createUrl('default/login'),
                'icon' => 'imagens/icones/login.png',
                'visible' => Yii::app()->user->isGuest
            ),
            array(
                'label' => 'Dashboard',
                'url' => $this->createUrl('/dashboard'),
                'icon' => 'imagens/icones/dashboard.png',
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
        $this->render('contactos');
    }

    public function actionLogin() {
        $formulario = new LoginForm();

        if (isset($_POST['LoginForm'])) {
            $formulario->attributes = $_POST['LoginForm'];
            if ($formulario->validate() && $formulario->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        $this->render('login', array('formulario' => $formulario));
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
