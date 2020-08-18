<?php
require_once 'conexao/conexao.php';
class AvisoDAO{
    public  $pdo = null;
    
    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function inserir($aviso){
        try{
            $sql = "INSERT INTO aviso"
                    . "(Aviso_professor)"
                    . "VALUES(?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $aviso->getAviso());

            return $stmt->execute();        
        } catch (PDOException $exc) {
                echo $exc->getMessage();
                die();
        }
    }
    public function alterarAvisoByID($aviso){
        try{
            $sql =  " UPDATE aviso".
                    " SET  Aviso_professor=?".
                    " WHERE id_aviso = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $aviso->getAviso());
            $stmt->bindValue(2, $aviso->getIdAviso());

            return $stmt->execute();
        } catch (PDOException $exc){
            echo $exc->getMessage();
            die();
        }
    }
        public function getAviso(){
        try{
            $sql = "SELECT nome,aviso_professor,a.id_aviso FROM aviso a
left JOIN cad_aviso on a.id_aviso = cad_aviso.id_aviso
left join professor on cad_aviso.id_prof = professor.id_prof
left join pessoa on professor.pessoa_id_pessoa = pessoa.id_pessoa";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $avisos = $stmt->fetchAll
                    (PDO::FETCH_ASSOC);
            return $avisos;
        } catch (PDOException $exc){
            echo $exc->getMessage();
            die();
        }
    }
        public function excluirAvisoById($id){
        try{
            $sql =  "DELETE FROM aviso WHERE Id_Aviso=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id);

            return $stmt->execute();
        } catch (PDOException $exc){
            echo $exc->getMessage();
            die();
        }
    }
        public function getAvisoById($id){
        try{
            $sql = "SELECT * FROM aviso WHERE Id_Aviso= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $aviso = $stmt->fetch(PDO::FETCH_ASSOC);
            return $aviso;
        } catch (PDOException $exc){
            echo $exc->getMessage();
            die();
        }
    }
}

