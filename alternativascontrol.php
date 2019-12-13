<?php
include "alternativasDAO.php";
$acao = $_GET["acao"];
switch ($acao){
    case 'inserirAlternativa':
		$alternativa = new AlternativasDAO();
		$alternativa->texto = $_POST["texto"];
		$alternativa->idQuestao = $_POST["idQuestao"];
		if (isset($_POST["correta"])) $alternativa->correta = 1;
		else $alternativa->correta = 0;
		$alternativa->inserirAlternativa();
		break;

    case 'trocarAlternativa':
        $alternativas = new alternativasDAO();
        $alternativas->id = $_POST["id"];
        $alternativas->correta = $_POST["correta"];
        $alternativas->texto = $_POST["texto"];
        $alternativas->trocarAlternativas();
    break;

    case 'apagarAlternativa':
        $alternativas = new alternativasDAO();
        $alternativas->id = $_GET["id"];
        $alternativas->apagarAlternativas();
    break;

    default:
        echo "Tem erro na seu codigo? Você e o vergonha da pofission!";
    break;
}
?>