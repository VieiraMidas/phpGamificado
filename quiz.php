<?php
require("verificaUsuario.php");
include "quizDAO.php";
include "alertas.php";

$quizDAO = new quizDAO();
$listaQuiz = ($quizDAO->buscarQuiz());

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
    <title>Desafios</title>
</head>

<body>

    <div class="col-10">
        <?php mostrarAlerta("success");?>
        <h1>Desafios</h1>
        <button class="btn btn-dark" data-toggle="modal"  data-target="#newmodalQuiz">
            Cadastrar pergunta
        </button>
        <table class="table">
            <tr>
                <th>id</th>
                <th>Desafio</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>

            <?php foreach($listaQuiz as $questions): ?>
                <tr>
                    <td><?= $questions->IDDesafio?></td>
                    <td><?= $questions->Desafio?></td>
                    <td><?= $questions->TDesafio?></td>
                    <td>
                        <a href="alternativas.php" class="btn btn-dark" href="\alternativas?idQuestao=<?=$questions->IDDesafio?>"><i class="fas fa-list-ol"></i></a>
                        <button class="btn btn-warning alterar-questao" data-id="<?= $questions->IDDesafio?>"><i class="fas fa-pen" data-toggle="modal" data-target="#modalEditar"></i></button>
                        <a class="btn btn-danger" href="quizcontrol.php?acao=apagarQuiz&id=<?= $questions->IDDesafio?>"><i class="fas fa-trash-alt"></i></a>
                    </td>


                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <!--modal inserir-->
    <div class="modal fade" id="newmodalQuiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nova questão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="quizcontrol.php?acao=inserirQuiz" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" name="Desafio" class="form-control" placeholder="Escreva a pergunta..."  aria-describedby="basic-addon1">
                            <input type="text" name="TDesafio" class="form-control" placeholder="Digite o tipo da questão..."  aria-describedby="basic-addon1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                            <button type="submit" class="btn btn-primary" href="quizcontrol.php?acao=inserirQuiz&ID=<?= $questions->Desafio?>">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--modal editar-->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Alterar Pergunta e Tipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="quizcontrol.php?acao=trocarQuiz" method="POST">
                    <div class="input-group mb-3">
                    </div>
                    <input type="hidden" name="id" id="campo-id">
                    <div class="input-group mb-3">
                        <input type="text" name="Desafio" class="form-control" placeholder="Nova Pergunta" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="TDesafio" class="form-control" placeholder="Novo Tipo" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
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
    var botao = document.querySelector(".alterar-questao");
    console.log(botao);
    botao.addEventListener("click", function(){
        //window.alert(botao.getAttribute("data-id"));
        var campo = document.querySelector("#campo-id");
        campo.value = botao.getAttribute("data-id");
    });
</script>
</html>