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

return array(
    'basePath' => dirname(__FILE__) . '/..',
    'name' => 'jAutoInvoice',
    'defaultController' => 'publico',
    'sourceLanguage' => 'pt',
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'components' => array(
        'clientScript' => array(
            'scriptMap' => array(
                'jquery.js' => false,
                'jquery.min.js' => false,
                'jquery-ui.css' => false
            )
        ),
        'user' => array(
            'allowAutoLogin' => true,
            'class' => 'JUtilizadorWeb',
            'loginUrl' => array('public/entrar'),
        ),
        //MySQL database
        //'db' => array(
        //'connectionString' => 'mysql:host=127.0.0.1;dbname=jai',
        //'emulatePrepare' => true,
        //'username' => 'root',
        //'password' => 'toor',
        //'charset' => 'utf8',
        //'tablePrefix => ''
        //),
        'errorHandler' => array(
            'errorAction' => 'publico/erro'
        ),
    ),
    'params' => require(dirname(__FILE__) . '/params.php'),
);