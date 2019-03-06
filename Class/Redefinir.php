<?php
require 'config.php';

class Redefinir
{

    //Variáveis
    private $pdo;
    private $email;
    private $mensagem;
    private $token;
    private $id;
    private $id_usuarios;

    public function __construct()
    {
        try
        {
            $this->pdo = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASS);
        }catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    /*Função que pegará o e-mail e selecionará no banco vendo
     * se aquele e-mail existe, retornando o e-mail e o id.
     */
    public function verificaEmail($e)
    {
        $sql = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
        $sql->execute(array($e));

        if($sql->rowCount() > 0)
        {
            $sql = $sql->fetch();
            $id = $sql['id'];

            $this->id = $id;
            $this->email = $e;

            return true;
        }
    }

    public function setLink()
    {
        $token = md5(time().rand(0, 999).rand(0, 9999));
        $this->token = $token;

        $link = LINK.$this->token;

        $mensagem = "<div class='alert alert-success'><div class='h5 text-center'>Clique no link para alterar a sua senha</div><br/>".
                    "<a href='$link'>$link</a></div>";

        return $this->mensagem = $mensagem;
    }

    public function insertToken()
    {
        $sql = $this->pdo->prepare('INSERT INTO usuarios_token (id_usuarios, hash, expirado_em) VALUES (?, ?, ?)');
        $sql->execute(array($this->id, $this->token, date('Y-m-d H:i', strtotime('+2 months'))));

        return true;
    }

    public function verificaToken($t)
    {
        $sql = $this->pdo->prepare('SELECT * FROM usuarios_token WHERE hash = ? AND used = 0 AND expirado_em > NOW()');
        $sql->execute(array($t));

        if($sql->rowCount() > 0)
        {
            $sql = $sql->fetch();
            return $this->id_usuarios = $sql['id_usuarios'];
        }

        return $this->token;
    }

    public function insertSenha($s)
    {
        $sql = $this->pdo->prepare('UPDATE usuarios SET senha = ? WHERE id = ?');
        $sql->execute(array($s, $this->id_usuarios));

        return true;
    }

    public function updateEstado()
    {
        $sql = $this->pdo->prepare('UPDATE usuarios_token SET used = 1 WHERE id_usuarios = ?');
        $sql->execute(array($this->id_usuarios));

        return true;
    }

}