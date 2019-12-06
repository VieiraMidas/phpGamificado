<?php
//Back do User
include "UsuarioDAO.php";
$acao = $_GET["acao"];

switch ($acao) {
    case 'inserir':
        $users = new UsuarioDAO();
        $users->nome = $_POST["nome"];
        $users->email = $_POST["email"];
        $users->senha = $_POST["senha"];
        $users->inserir();
        break;

    case 'apagar':
        $users = new UsuarioDAO();
        $id = $_GET["id"];
        $users->apagar($id);
        break;

    case 'trocaSenha':
        $users = new UsuarioDAO();
        $id = $_POST["id"];
        $senha = $_POST["senha"];
        $users->trocaSenha($id, $senha);
        break;

    case 'trocaEmail':
        $users = new UsuarioDAO();
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $users->trocaEmail($id, $nome, $email);
        break;

    case 'logar':
        $users = new UsuarioDAO();
        $users->email = $_POST["email"];
        $users->senha = $_POST["senha"];
        $users->logar();
        break;
    case 'editar':
        $users = new UsuarioDAO();
        $id = $_POST["id"];
        $email = $_POST["email"];
        $users->editar($id, $email);
        break;
    case 'sair':
        $users = new UsuarioDAO();
        $users->sair();
        break;

    default:
        echo "Seu PC vai explodir mané...e tem coisa errada nesse código";
        break;
}
