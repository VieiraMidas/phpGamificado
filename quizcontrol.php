<?php
include "quizDAO.php";
$acao = $_GET["acao"];
switch ($acao) {
    case 'inserirQuiz':
        $questions= new quizDAO();
        $questions->Desafio = $_POST["Desafio"];
        $questions->TDesafio = $_POST["TDesafio"];
        $questions->inserirQuiz();
        break;
        
    case 'apagarQuiz':
        $questions = new quizDAO();
        $questions->id =  $_GET["id"];
        $questions->apagarQuiz();
        break;
    
    case 'trocarQuiz':
        $questions = new quizDAO();
        $questions->id =  $_POST["id"];
        $questions->TDesafio = $_POST["TDesafio"];
        $questions->Desafio =  $_POST["Desafio"];
        $questions->trocarQuiz();
        break;
    
    default:
        echo "Seu PC vai explodir mané...e tem coisa errada nesse código";
        break;
}
?>