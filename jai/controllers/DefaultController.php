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

class DefaultController extends JAIController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);

        $this->layout = '//layouts/login';
    }

    public function actionIndex() {
        $model = new LoginForm();

        $this->render('index', array('model' => $model));
    }

    public function actionSobre() {
        $this->render('sobre');
    }

    public function actionLogin() {
        
    }

    public function actionLogout() {
        
    }

    public function actionError() {
        
    }

}
