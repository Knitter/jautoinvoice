<?php

/*
 * DefaultController.php
 *
 * This file is part of jAutoInvoice, http://sourceforge.net/p/jautoinvoice
 *
 * Copyright (C) 2011 jAutoInvoice
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class DefaultController extends CController {

    public $layout = '//layouts/default';

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionSobre() {
        $this->render('sobre');
    }

    public function actionLogin() {
        
    }

    public function actionLogout() {
        
    }

}
