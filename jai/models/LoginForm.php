<?php

/* LoginForm.php
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

class LoginForm extends CFormModel {

    public $identificacao;
    public $password;
    public $lembrarMe;
    private $credenciais;

    public function rules() {
        return array(
            array('identificacao, password', 'required'),
            array('lembrarMe', 'boolean'),
            array('password', 'autenticar'),
        );
    }

    public function attributeLabels() {
        return array(
            'identificacao' => 'Identificação',
            'lembrarMe' => 'Lembrar-se de mim',
        );
    }

    public function autenticar($attribute, $params) {
        if (!$this->hasErrors()) {
            $this->credenciais = new Credenciais($this->identificacao, $this->password);
            if (!$this->credenciais->authenticate())
                $this->addError('password', 'Dados de autenticação inválidos.');
        }
    }

    public function login() {
        if ($this->credenciais === null) {
            $this->credenciais = new Credenciais($this->identificacao, $this->password);
            $this->credenciais->authenticate();
        }

        if ($this->credenciais->errorCode === Credenciais::ERROR_NONE) {
            //lembrar durante 7 dias
            $duracao = $this->lembrarMe ? 3600 * 24 * 7 : 0;
            Yii::app()->user->login($this->credenciais, $duracao);

            return true;
        }

        return false;
    }

}
