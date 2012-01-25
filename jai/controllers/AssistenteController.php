<?php

/* AssistenteController.php
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

class AssistenteController extends CController {

    public $layout = '//layouts/assistente';

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    public function actionIndex() {
        //TODO: por implementar!
        //TODO: validar instalação e redireccionar.
    }

    public function actionInstalar() {
        //TODO: por implementar!
        $this->render('instalar');
    }

    public function actionActualizar() {
        //TODO: por implementar!
        $this->render('actualizar');
    }

}
