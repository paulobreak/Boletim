<?php

require_once 'conexao/conexao.php';

class NotaDAO{
    public  $pdo = null;
    
    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }
    
    public function inserir($nota1,$nota2,$idaluno,$idprofessor){
        try{
            $sql = "INSERT INTO nota"
                    . "(nota1,nota2,id_prof,aluno_id_aluno)"
                    . "VALUES (?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $nota1);
            $stmt->bindValue(2, $nota2);
            $stmt->bindValue(3, $idprofessor);
            $stmt->bindValue(4, $idaluno);
            
            return $stmt->execute();
            
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }
    public function  getAllNotas(){
        try{
            $sql = "SELECT * from nota";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $notas = $stmt->fetchAll
                    (PDO::FETCH_ASSOC);
            return $notas;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    public function  getAllNotasByAluno($idAluno){
        try{
            $sql = "SELECT * from disciplina
inner join professor on disciplina.professor_id_prof = professor.id_prof
inner join nota on professor.id_prof = nota.id_prof
            where aluno_Id_aluno =?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idAluno);
            $stmt->execute();
            $notas = $stmt->fetchAll
                    (PDO::FETCH_ASSOC);
            return $notas;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
        public function getNotasById($id) {
        try {
            $sql = "SELECT * FROM nota
                       WHERE Id_nota=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $nota = $stmt->fetch(PDO::FETCH_ASSOC);
            return $professor;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }
}



