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

/**
 * 
 */
class LogsController extends AdministracaoController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    public function actionIndex() {
        $filtroSms = new SMS('search');
        $filtroEmail = new Email('search');

        $this->render('index', array(
            'filtroSms' => $filtroSms,
            'filtroEmail' => $filtroEmail
        ));
    }

    public function actionSms() {
        $filtro = new SMS('search');
        $this->render('sms', array('filtro' => $filtro));
    }

    public function actionEmail() {
        $filtro = new Email('search');
        $this->render('email', array('filtro' => $filtro));
    }

    public function actionDetalhesSms($id) {
        $sms = $this->carregarModeloSms($id);
        $this->render('lerSms', array('sms' => $sms));
    }

    public function actionDetalhes($id) {
        $email = $this->carregarModeloEmail($id);
        $this->render('lerEmail', array('email' => $email));
    }

    public function actionRemoverSms($id) {
        
    }

    public function actionRemoverEmail($id) {
        
    }
    
    public function accessRules() {
        return array_merge(array(
                    array(
                        'deny',
                        'users' => array('?')
                    ),
                    array(
                        'allow',
                        'actions' => array('index', 'sms', 'email', 'detalhesSms',
                            'detalhesEmail', 'removerSms', 'removerEmail'
                        ),
                        'expression' => '$user->tipo > 1'
                        )), parent::accessRules());
    }

    /**
     * @param int $id
     * 
     * @return Email
     */
    private function carregarModeloEmail($id) {
        if (($email = Email::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $email;
    }

    /**
     * @param int $id
     * 
     * @return SMS 
     */
    private function carregarModeloSms($id) {
        if (($sms = SMS::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $sms;
    }

}