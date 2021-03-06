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
 * 
 * http://sourceforge.net/projects/jautoinvoice
 */

/**
 * 
 */
class RegistoController extends AdministracaoController {

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
    }

    public function actionIndex() {
        $filtroSms = new Sms('search');
        $filtroSms->unsetAttributes();

        $filtroEmail = new Email('search');
        $filtroEmail->unsetAttributes();

        if (isset($_POST['Sms'])) {
            $filtroSms->attributes = $_POST['Sms'];
        }

        if (isset($_POST['Email'])) {
            $filtroEmail->attributes = $_POST['Email'];
        }

        $this->render('index', array(
            'filtroSms' => $filtroSms,
            'filtroEmail' => $filtroEmail
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

    /**
     *
     * @param integer $id
     * 
     * @return Email
     * @throws CHttpException 
     */
    private function carregarModeloEmail($id) {
        if (($email = Email::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'A página pedida não existe.');
        }

        return $email;
    }

    /**
     *
     * @param integer $id
     * 
     * @return Sms
     * @throws CHttpException 
     */
    private function carregarModeloSms($id) {
        if (($sms = Sms::model()->findByPk((int) $id)) === null) {
            throw new CHttpException(404, 'A página pedida não existe.');
        }

        return $sms;
    }

}
