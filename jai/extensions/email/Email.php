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

    public function enviar() {
        if (!$this->enderecoOrigem) {
            throw new Exception('');
        }

        //$port = Config::getInstance()->get('email.smtp.port');
        if (!$port) {
            $port = 25;
        }

        //$lang = explode('_', Config::getInstance()->get('locale.language'));
        //$lang = $lang[0];

        $mailer = new PHPMailer();
        //$mailer->SetLanguage($lang, APPROOT . '/core/helpser/phpmailer/languages/');

        $mailer->AddAddress($this->enderecoDestino, $this->nomeDestino);
        //$mailer->From = Config::getInstance()->get('email.email');

        $mailer->Body = $this->mensagem;

        //if (Config::getInstance()->get('email.html')) {
        //$mailer->IsHTML(true);
        //$mailer->AltBody = strip_tags($this->message);
        //}
        //if (Config::getInstance()->get('email.usesmtp')) {
        //$username = Config::getInstance()->get('email.smtp.username');
        //$password = Config::getInstance()->get('email.smtp.password');
        //$host = Config::getInstance()->get('email.smtp.host');
        //if (!$username || !$password || !$host) {
        //throw new Exception('');
        //}
        //$mailer->IsSMTP(true);
        //$mailer->Username = $username;
        //$mailer->Password = $password;
        //$mailer->Port = $port;
        //$mailer->Host = $host;
        //$mailer->SMTPSecure = Config::getInstance()->get('email.smtp.prefix');
        //}

        try {
            $mailer->Send();
        } catch (phpmailerException $pe) {
            throw new Exception('', $pe);
        }
    }

}