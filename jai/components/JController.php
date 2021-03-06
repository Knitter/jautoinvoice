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

class JController extends CController {

    public $layout;
    protected $titulo;
    protected $menu;

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);

        $this->layout = '//layouts/main';
        $this->menu = array();
    }

    public function filters() {
        return array(
            'accessControl'
        );
    }

    public final function validacaoAJAX($form, $model) {
        if (isset($_POST['ajax']) && ($_POST['ajax'] === $form || (is_array($form) && in_array($_POST['ajax'], $form)))) {
            echo CActiveForm::validate($model);

            Yii::app()->end();
        }
    }

    public function accessRules() {
        return array(array('deny', 'users' => array('*')));
    }

}