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
        $id = $_POST["id"];
        $texto = $_POST["texto"];
        $alternativas->trocarAlternativa($idAlternativas, $texto);
    break;

    case 'apagarAlternativa':
        $alternativas = new alternativasDAO();
        $id = $_GET["id"];
        $alternativas->apagarAlternativa($id);
    break;

    default:
        echo "Tem erro na seu codigo? Você e o vergonha da pofission!";
    break;
}
?>