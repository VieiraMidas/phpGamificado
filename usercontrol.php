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
        $users->id = $_GET["id"];
        $users->apagar();
        break;

    case 'trocaSenha':
        $users = new UsuarioDAO();
        $users->id = $_POST["id"];
        $users->senha = $_POST["senha"];
        $users->trocaSenha();
        break;

    case 'trocaEmail':
        $users = new UsuarioDAO();
        $users->id = $_POST["id"];
        $users->nome = $_POST["nome"];
        $users->email = $_POST["email"];
        $users->trocaEmail();
        break;

    case 'logar':
        $users = new UsuarioDAO();
        $users->email = $_POST["email"];
        $users->senha = $_POST["senha"];
        $users->logar();
        break;
    case 'editar':
        $users = new UsuarioDAO();
        $users->id = $_POST["id"];
        $users->email = $_POST["email"];
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
