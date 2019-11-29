<?php

require "verificaUsuario.php";

include "UsuarioDAO.php";
include "alertas.php";
$usuarioDAO = new UsuarioDAO();
$lista = ($usuarioDAO->buscar());

include "cabecalho.php";
include "menuLateral.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="css/all.min.css">
        <title>Usuários</title>
    </head>
    <body>

        <div class="col-10">
        <?php mostrarAlerta("success");?>
            <h1>Usuários</h1>
            <button class="btn btn-dark" data-toggle="modal" data-target="#newmodal">
                <i class="fas fa-user-plus">

                </i> Novo usuário</button>
                        <br>
                        <br>
                    <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>

                        <?php foreach ($lista as $users): ?>
                        <tr>
                            <td><?=$users->UserID?></td>
                            <td><?=$users->Nome?></td>
                            <td><?=$users->Email?></td>
                            <td>
                                <button class="btn btn-dark btn-editar"><i class="fas fa-pen"></i></button>
                                <button class="btn btn-warning alterar-senha" data-id="<?=$users->UserID?>"><i class="fas fa-pen" data-toggle="modal" data-target="#modalsenha"></i></button>
                                <a class="btn btn-danger" href="usercontrol.php?acao=apagar&id=<?=$users->UserID?>"><i class="fas fa-trash-alt"></i></a>
                            </td>


                        </tr>
                        <?php endforeach?>
                    </table>
        <!--modal-->
        <div class="modal fade" id="newmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Novo Usuário</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="usercontrol.php?acao=inserir" method="POST">
        <div class="input-group mb-3">
                        <input type="text" name="nome" class="form-control" placeholder="Usuário" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="E-mail" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">@example.com</span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="senha" class="form-control" placeholder="Senha" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    <!--modal troca senha-->
    <div class="modal fade" id="modalsenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Alterar Senha</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="usercontrol.php?acao=trocaSenha" method="POST">
        <div class="input-group mb-3">

                    </div>
                    <input type="hidden" name="id" id="campo-id">
                    <div class="input-group mb-3">

                        <input type="text" name="senha" class="form-control" placeholder="Senha" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var botao = document.querySelector(".alterar-senha");
        console.log(botao);
        botao.addEventListener("click", function(){
            //window.alert(botao.getAttribute("data-id"));
            var campo = document.querySelector("#campo-id");
            campo.value = botao.getAttribute("data-id");
        });
    </script>
</html>