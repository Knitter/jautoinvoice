<?php

class LusoSMS {

    private static $URL_CREDITO = "//http://www.lusosms.com/ver_credito_get.php";
    private static $URL_API = "//http://www.lusosms.com/enviar_sms_get.php";
    private static $MAX = 150;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $mensagem;

    /**
     * @var string
     */
    private $de;

    /**
     * @var string
     */
    private $para;

    public function __construct($username, $password, $mensagem = null, $de = null, $para = null) {
        $this->username = $username;
        $this->password = $password;
        $this->mensagem = $mensagem;
        $this->de = $de;
        $this->para = $para;
    }

    public function enviar() {
        if (empty($this->mensagem)) {
            throw new Exception('A tentar enviar uma SMS sem texto.');
        }

        if (empty($this->para)) {
            throw new Exception('A tentar enviar uma SMS sem destino válido.');
        }

        if (count($this->mensagem) > 150) {
            throw new CaracteresExcedidosException('Não é possível enviar mais de 150 caracteres.');
        }

        $url = sprintf('%s?username=%s&password=%s&origem=%s&destino=%s&mensagem=%s'
                , self::$URL_API, $this->username, $this->password, $this->de, $this->para
                , urlencode($this->mensagem)
        );
        if (!($fh = fopen($url, 'r'))) {
            throw new Exception('Não foi possível abrir o endereço URL da API. fopen falhou!');
        }
        $resultado = fgets($fh, 1024);
        fclose($fh);

        switch ($resultado) {
            case 'mensagem_enviada':
                //DO NOTHING; 
                break;
            case 'erro_comunicacao':
                throw new ErroComunicacaoException('Servidor respondeu indicando erro de comunicação.');
                break;
            case 'credito_insuficiente':
                throw new CreditoInsuficienteException('Servidor respondeu indicando crédito insuficiente.');
                break;
            case 'autenticacao_invalida':
                throw new AutenticacaoInvalidaException('Servidor respondeu indicando erro de autenticação.');
                break;
            case 'sintaxe_invalida':
                throw new SintaxeInvalidaException('Servidor respondeu indicando erro de sintaxe.');
                break;
            case 'caracteres_excedidos':
                throw new CaracteresExcedidosException('Servidor respondeu indicando excesso de caracteres na mensagem.');
                break;
            default:
                throw new Exception('Ocorreu um erro desconhecido, a resposta do servidor foi inesperada [' . $resultado . '].');
        }
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    public function getDe() {
        return $this->de;
    }

    public function setDe($de) {
        $this->de = $de;
    }

    public function getPara() {
        return $this->para;
    }

    public function setPara($para) {
        $this->para = $para;
    }

    public static function verificarCreditos($username, $password) {
        if (empty($username) || empty($password)) {
            throw new Exception('Os dados de acesso indicados não são válidos.');
        }
        $creditos = 0;

        $url = sprintf('%s?username=%s&password=%s', self::$URL_CREDITO, $username, $password);
        if (!($fh = fopen($url, 'r'))) {
            throw new Exception('Não foi possível abrir o endereço URL da API. fopen falhou!');
        }
        $resultado = fgets($fh, 1024);
        fclose($fh);

        switch ($resultado) {
            case 'autenticacao_invalida':
                throw new AutenticacaoInvalidaException('Servidor respondeu indicando erro de autenticação.');
                break;
            case 'sintaxe_invalida':
                throw new SintaxeInvalidaException('Servidor respondeu indicando erro de sintaxe.');
                break;
            default:
                $creditos = intval($resultado);
        }

        return $resultado;
    }

}
