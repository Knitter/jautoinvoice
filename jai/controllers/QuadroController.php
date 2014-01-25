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

/**
 * 
 */
class QuadroController extends SistemaController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    public function actionIndex() {
        //- Últimos clientes a entrar no sistema, admin
        //- Avisos de configuração
        //- Estatísticas: número de reparações por mês

        $now = date('Y-m-d');
        $end = date('Y-m-d', time() + (3 * 24 * 3600));

        $criteria = new CDbCriteria();
        $criteria->addBetweenCondition('dataMarcacao', $now, $end);
        $criteria->addCondition('dataFecho IS NULL');
        $marcacoes = Marcacao::model()->findAll($criteria);

        $avisos = array();

        $this->render('index', array(
            'marcacoes' => $marcacoes,
            'avisos' => $avisos
        ));
    }

    public function accessRules() {
        return array_merge(array(
                    array(
                        'deny',
                        'users' => array('?')
                    ),
                    array(
                        'allow',
                        'actions' => array('index'),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

}