<?php

class Email {

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