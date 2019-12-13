<?php
require "config.php";
class UsuarioDAO
{
    public $nome;
    public $email;
    public $senha;
    private $con;

    public function __construct()
    {
        $this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }
    public function apagar()
    {

        $sql = "DELETE FROM users WHERE UserID=$this->id";
        $rs = $this->con->query($sql);
        session_start();
        if ($rs) {
            $_SESSION["success"] = "usuário apagado com sucesso";
        } else {
            $_SESSION["dangen"] = "Error Fatal...você não conseguiu se apagar ;)";
        }
        header("Location: /usuarios");

    }
    public function inserir()
    {

        $sql = "INSERT INTO users VALUES (0, '$this->nome', '$this->email', md5('$this->senha'))";
        $rs = $this->con->query($sql);
        session_start();
        if ($rs) {
            $_SESSION["success"] = "usuário inserido com sucesso";
        } else {
            $_SESSION["dangen"] = "Error Fatal...você não conseguiu inserir ;)";
        }
        header("Location: /usuarios");

    }
    public function buscar()
    {

        $sql = "SELECT * FROM users";
        $rs = $this->con->query($sql);
        while ($linha = $rs->fetch_object()) {
            $listaDeUsuarios[] = $linha;
        }
        return $listaDeUsuarios;
    }

    public function trocaSenha()
    {
        $sql = "UPDATE users SET Senha=md5('$this->senha') WHERE UserID='$this->id'";
        $rs = $this->con->query($sql);
        session_start();
        if ($rs) {
            $_SESSION["success"] = "Troca de senha realizada com sucesso";
        } else {
            $_SESSION["dangen"] = "Error Fatal...você não conseguiu trocar a senha do usuário ;)";
        }
        header("Location: /usuarios");

    }

    public function trocaEmail()
    {
        $sql = "UPDATE users SET Email='$this->email', Nome='$this->nome' WHERE UserID='$this->id'";
        $rs = $this->con->query($sql);
        session_start();
        if ($rs) {
            $_SESSION["success"] = "Atualização realizada com sucesso";
        } else {
            $_SESSION["dangen"] = "Error Fatal...você não conseguiu realizar a atualização do usuário ;)";
        }
        header("Location: /usuarios");

    }

    public function logar()
    {
        $sql = "SELECT * FROM users WHERE
            email='$this->email' AND
            senha=md5('$this->senha')";
        $rs = $this->con->query($sql);
        if ($rs->num_rows>0) {
            session_start();
            $_SESSION["logado"] = true;
            header("Location:/usuarios");
        } else {
            header("Location:/?erro=1");
        }
    }
    public function sair()
    {
        session_start();
        session_destroy();
        header("Location: /");
    }
}
