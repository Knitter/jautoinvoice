<?php

/* .php
 * 
 * This file is part of jAutoInvoice, a car workshop management software.
 * 
 * Copyright (c) 2012, Sérgio Lopes <knitter.is@gmail.com>s.
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

class Credenciais extends CBaseUserIdentity {

    private $identificacao;
    private $password;
    private $id;
    private $name;

    public function __construct($identificacao, $password) {
        $this->identificacao = $identificacao;
        $this->password = $password;
    }

    public function authenticate() {
        $this->errorCode = self::ERROR_NONE;
        $cliente = Cliente::model()->findByAttributes(array('email' => $this->identificacao));
        $funcionario = Funcionario::model()->findByAttributes(array('username' => $this->identificacao));

        if ($cliente === null && $funcionario === NULL) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            $sessao = null;
            if ($cliente !== null) {
                if ($cliente->password !== Cliente::hash($this->password)) {
                    $this->errorCode = self::ERROR_PASSWORD_INVALID;
                } else {
                    $this->id = $cliente->idCliente;
                    $this->name = $cliente->nome;
                    $this->setState('tipo', 1);

                    if (($sessao = DadosSessao::model()->find('idCliente = :id', array(':id' => $cliente->idCliente))) === null) {
                        $sessao = new DadosSessao();
                        $sessao->idCliente = $cliente->idCliente;
                    }
                }
            } else {
                if ($funcionario->password !== Funcionario::hash($this->password)) {
                    $this->errorCode = self::ERROR_PASSWORD_INVALID;
                } else {
                    $this->id = $funcionario->idFuncionario;
                    $this->name = $funcionario->nome;
                    $this->setState('tipo', ($funcionario->admin ? 3 : 2));

                    if (($sessao = DadosSessao::model()->find('idFuncionario = :id', array(':id' => $funcionario->idFuncionario))) === null) {
                        $sessao = new DadosSessao();
                        $sessao->idFuncionario = $funcionario->idFuncionario;
                    }
                }
            }
            if ($sessao) {
                $agora = time();
                $token = md5($agora . $this->id . $this->name);
                $expira = $agora + (3600 * 24 * 7);

                $this->setState('token', $token);

                $sessao->token = $token;
                $sessao->dataExpiracao = date('Y-m-d H:i', $expira);
                $sessao->ultimaActividade = date('Y-m-d H:i', $agora);
                $sessao->save();
            }
        }

        return!$this->errorCode;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

}