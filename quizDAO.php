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
        if($rs)
            header("Location: /questoes");
        else
            echo $this->conQuiz->error;
	}
	public function trocarQuiz(){
        $sql = "UPDATE questions SET Desafio WHERE IDDesafio=$id";
        $rs = $this->conQuiz->query($sql);
        if($rs)
            header("Location: /questoes");
        else
            echo $this->conQuiz->error;
    }
    public function buscarQuiz(){
        
        $sql = "SELECT * FROM questions";
        $rs = $this->conQuiz->query($sql);
        while ($linha = $rs->fetch_object()){
            $listaDePerguntas[] = $linha;
        }
        return $listaDePerguntas;
    }
	public function apagarQuiz($id){
		$sql = "DELETE FROM questions WHERE IDDesafio=$id";
        $rs = $this->conQuiz->query($sql);
        if ($rs) header("Location: /questoes");
        else echo $this->conQuiz->error;
	}
	
}
?>