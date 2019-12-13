<?php

require "config.php";

class quizDAO

{
	public $Desafio;
	
	public $TDesafio;
	private $conQuiz;

	function __construct(){
        $this->conQuiz = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }
	public function inserirQuiz(){
		$sql = "INSERT INTO questions VALUES (0, '$this->Desafio', '$this->TDesafio')"; 
        $rs = $this->conQuiz->query($sql);
        session_start();
        if ($rs) {
            $_SESSION["success"] = "Inserção de questão realizada com sucesso";
        } else {
            $_SESSION["dangen"] = "Error Fatal...você não conseguiu inserir a questão ;)";
        }
        header("Location: /questoes");
	}
	public function trocarQuiz(){
        $sql = "UPDATE questions SET Desafio='$this->Desafio', TDesafio='$this->TDesafio' WHERE IDDesafio='$this->id'";
        $rs = $this->conQuiz->query($sql);
        session_start();
        if ($rs) {
            $_SESSION["success"] = "Troca de informações da questão realizada com sucesso";
        } else {
            $_SESSION["dangen"] = "Error Fatal...você não conseguiu as informações da questão ;)";
        }
        header("Location: /questoes");
    }
    public function buscarQuiz(){
        
        $sql = "SELECT * FROM questions";
        $rs = $this->conQuiz->query($sql);
        while ($linha = $rs->fetch_object()){
            $listaDePerguntas[] = $linha;
        }
        return $listaDePerguntas;
    }
	public function apagarQuiz(){
		$sql = "DELETE FROM questions WHERE IDDesafio=$this->id";
        $rs = $this->conQuiz->query($sql);
        session_start();
        if ($rs) {
            $_SESSION["success"] = "Exclusão da questão realizada com sucesso";
        } else {
            $_SESSION["dangen"] = "Error Fatal...você não conseguiu excluir a questão ;)";
        }
        header("Location: /questoes");
	}
	
}
?>