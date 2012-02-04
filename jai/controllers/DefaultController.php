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
    }

    public function actionIndex() {
        $formulario = new LoginForm();

        if (isset($_POST['LoginForm'])) {
            $formulario->attributes = $_POST['LoginForm'];
            if ($formulario->validate() && $formulario->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        $this->render('index', array('formulario' => $formulario));
    }

    public function actionSobre() {
        $this->render('sobre');
    }

    public function actionErro() {
        $this->render('erro');
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
