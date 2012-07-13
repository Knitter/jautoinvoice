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

class ExtEmail {

    private $nomeDestino;
    private $enderecoDestino;
    private $nomeOrigem;
    private $enderecoOrigem;
    private $mensagem;
    private $assunto;

    public function __construct($nomeDestino, $enderecoDestino, $nomeOrigem, $enderecoOrigem, $assunto, $mensagem) {
        $this->nomeDestino = $nomeDestino;
        $this->enderecoDestino = $enderecoDestino;
        $this->nomeOrigem = $nomeOrigem;
        $this->enderecoOrigem = $enderecoOrigem;
        $this->assunto = $assunto;
        $this->mensagem = $mensagem;
    }

    /**
     *
     * @throws Exception 
     */
    public function enviar() {
        if (!$this->enderecoOrigem) {
            throw new Exception('Não é possível enviar e-mails sem endereço de origem.');
        }

        if (($htmlEmails = Configuracao::model()->findByPk('htmlEmails')) !== null) {
            $htmlEmails = intval($htmlEmails->valor);
        }

        if (($usarSMTP = Configuracao::model()->findByPk('usarSMTP')) !== null) {
            $usarSMTP = intval($usarSMTP->valor);
        }

        $mailer = new PHPMailer();
        $mailer->SetLanguage('pt', Yii::getPathOfAlias('ext.email.languages') . '/');

        $mailer->AddAddress($this->enderecoDestino, $this->nomeDestino);
        $mailer->From = $this->enderecoOrigem;

        $mailer->Subject = $this->assunto;
        $mailer->Body = $this->mensagem;

        if ($htmlEmails) {
            $mailer->IsHTML(true);
            $mailer->AltBody = strip_tags($this->message);
        }
        if ($usarSMTP) {
            $mailer->IsSMTP(true);

            if (($utilizadorSMTP = Configuracao::model()->findByPk('utilizadorSMTP')) === null || $utilizadorSMTP->valor == '') {
                throw new Exception('O utilizador SMTP não está definido.');
            }
            $mailer->Username = $utilizadorSMTP->valor;

            if (($passwordSMTP = Configuracao::model()->findByPk('passwordSMTP')) === null || $passwordSMTP->valor == '') {
                throw new Exception('A password de SMTP não está definida.');
            }
            $mailer->Password = $passwordSMTP->valor;

            if (($servidorSMTP = Configuracao::model()->findByPk('servidorSMTP')) === null || $servidorSMTP->vaor == '') {
                throw new Exception('Servidor de SMTP inválido.');
            }
            $mailer->Host = $servidorSMTP->valor;

            $mailer->Port = 25;
            if (($portoSMTP = Configuracao::model()->findByPk('portoSMTP')) !== null) {
                $mailer->Port = intval($portoSMTP->valor);
            }

            $mailer->SMTPSecure = 'ssl';
            if (($prefixoSMTP = Configuracao::model()->findByPk('prefixoSMTP')) !== null && $prefixoSMTP->valor != '') {
                $mailer->SMTPSecure = $prefixoSMTP->valor;
            }
        }

        try {
            $mailer->Send();
        } catch (phpmailerException $pe) {
            throw new Exception('Erro interno.', $pe);
        }
    }

}