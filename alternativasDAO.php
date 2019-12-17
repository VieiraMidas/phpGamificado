<?php 

require "config.php";

class alternativasDAO{
    
    public $texto;
    public $correta;
    public $idQuestao;
    private $conAlternativa;

    public function __construct(){
        $this->conAlternativa = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }
    public function inserirAlternativa(){
        $sql = "INSERT INTO  alternativas  VALUES(0, '$this->texto','$this->correta', '$this->idQuestao')";
        $rs = $this->conAlternativa->query($sql);
        session_start();
        if ($rs) {
            $_SESSION["success"] = "Inserção de alternativa realizada com sucesso";
        } else {
            $_SESSION["dangen"] = "Error Fatal...você não conseguiu inserir a alternativa ;)";
        }
        header("Location: /alternativas?idQuestaoAlt=".$this->idQuestao);
    }
    public function trocarAlternativas(){
        $sql = "UPDATE alternativas SET texto = '$this->texto', correta = '$this->correta' WHERE idAlternativa = '$this->id'";
        $rs = $this->conAlternativa->query($sql);
        session_start();
        if ($rs) {
            $_SESSION["success"] = "Troca de informações da alternativa realizada com sucesso";
        } else {
            $_SESSION["dangen"] = "Error Fatal...você não conseguiu realizar a troca de informações da alternativa ;)";
        }
        header("Location: /alternativas");
    }
    public function buscarAlternativas(){
        $sql = "SELECT * FROM alternativas";
        $rs = $this->conAlternativa->query($sql);
        while($linha = $rs->fetch_object()){
            $listaDeAlternativas[] = $linha;
        }
        return $listaDeAlternativas;
    }
    public function apagarAlternativas(){
        $sql = "DELETE FROM alternativas WHERE idAlternativa = $this->id";
        $rs = $this->conAlternativa->query($sql);
        session_start();
        if ($rs) {
            $_SESSION["success"] = "Exclusão de alternativa realizada com sucesso";
        } else {
            $_SESSION["dangen"] = "Error Fatal...você não conseguiu apagar a alternativa;)";
        }
        header("Location: /alternativas");
    }

}
?>