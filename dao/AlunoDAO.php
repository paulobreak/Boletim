<?php

require_once 'conexao/conexao.php';

class AlunoDAO{
    public $pdo = null;
    
    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }
//Cadastrar Aluno
    public function inserir($aluno){
        try {
            $sql = "INSERT INTO login (usuario,senha,perfil_idperfil) 
                VALUES (?,?, 3) ";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $aluno->getUsuario());
            $stmt->bindValue(2, $aluno->getSenha());
            $stmt->execute();
            
            $idlogin =  $this->pdo->lastInsertId();
            
            $sql2="INSERT INTO pessoa 
                (cpf, data_nascimento, nome,telefone,sexo,turma,turno,matricula, login_id_login)
                VALUES (?,?,?,?,?,?,?,?,?)";   
            
            $stmt = $this->pdo->prepare($sql2);
            
            $stmt->bindValue(1, $aluno->getCpf());
            $stmt->bindValue(2, $aluno->getDt_nascimento());
            $stmt->bindValue(3, $aluno->getNome());
            $stmt->bindValue(4, $aluno->getTelefone());
            $stmt->bindValue(5, $aluno->getSexo());
            $stmt->bindValue(6, $aluno->getTurma());
            $stmt->bindValue(7, $aluno->getTurno());
            $stmt->bindValue(8, $aluno->getMatricula());
            $stmt->bindValue(9, $idlogin);     
            $stmt->execute();
            
            $idpessoa = $this->pdo->lastInsertId();
            
            $sql3="INSERT INTO aluno (serie, pessoa_Id_Pessoa)
                VALUES (?,?)";  
            
            $stmt = $this->pdo->prepare($sql3);
                 
            $stmt->bindValue(1, $aluno->getSerie());     
            $stmt->bindValue(2, $idpessoa); 
           
            
            return $stmt->execute();
        } catch (PDOException $exc) {
            
            echo $exc->getMessage();
            die();
        }
    }
    
//Alterar Professor    
    public function alterarAlunoByID($aluno){
        try{
            $sql =  "UPDATE aluno INNER JOIN
                    pessoa ON pessoa.Id_Pessoa = aluno.pessoa_Id_Pessoa
                    INNER JOIN
                    login ON pessoa.login_Id_login = login.Id_login 
                    SET usuario=?,senha=?,nome=?,cpf=?,telefone=?,data_nascimento=?,sexo=?,
                    turma=?,turno=?,serie=?,telefone=?
                    WHERE
                    Id_aluno=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $aluno->getUsuario());
            $stmt->bindValue(2, $aluno->getSenha());
            $stmt->bindValue(3, $aluno->getNome());
            $stmt->bindValue(4, $aluno->getCpf());
            $stmt->bindValue(5, $aluno->getTelefone());
            $stmt->bindValue(6, $aluno->getDt_Nascimento());
            $stmt->bindValue(7, $aluno->getSexo());
            $stmt->bindValue(8, $aluno->getTurma());
            $stmt->bindValue(9, $aluno->getTurno());
            $stmt->bindValue(10, $aluno->getSerie());
            $stmt->bindValue(11, $aluno->getTelefone());
            $stmt->bindValue(12, $aluno->getIdAluno());

            return $stmt->execute();
        } catch (PDOException $exc){
            echo $exc->getMessage();
            die();
        }
    } 
//Listar alunos
    public function getAllAlunos(){
        try{
            $sql = "SELECT 
                    nome, turma,serie,turno, matricula,id_aluno
                    FROM
                    aluno
                    INNER JOIN
                    pessoa ON pessoa.Id_Pessoa = aluno.pessoa_Id_Pessoa
                        INNER JOIN
                    login ON pessoa.login_Id_login = login.Id_login";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $alunos = $stmt->fetchAll
                    (PDO::FETCH_ASSOC);
            return $alunos;
        } catch (PDOException $exc) {
            echo $exc->getMenssage();
            die();
        }
    }
//Excluir aluno
    public function excluirById($id){
        try{
            $sql = "DELETE aluno , pessoa , login  FROM aluno
                        INNER JOIN
                            pessoa ON pessoa.Id_Pessoa = aluno.pessoa_Id_Pessoa
                        INNER JOIN
                            login ON pessoa.login_Id_login = login.Id_login
                        WHERE
                            Id_aluno=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id);
            
            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }
//Alterar aluno
    public function getAlunosById($id){
        try{
            $sql = "SELECT * FROM aluno "
                    . " INNER JOIN
                            pessoa ON pessoa.Id_Pessoa = aluno.pessoa_Id_Pessoa
                        INNER JOIN
                            login ON pessoa.login_Id_login = login.Id_login
                       WHERE Id_aluno=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $aluno= $stmt->fetch(PDO::FETCH_ASSOC);
            return $aluno;
        } catch (PDOException $exc){
            echo $exc->getMessage();
            die();
        }
    }
    public function getAlunosByIdLogin($id){
        try{
            $sql = "SELECT * FROM aluno "
                    . " INNER JOIN
                            pessoa ON pessoa.Id_Pessoa = aluno.pessoa_Id_Pessoa
                        INNER JOIN
                            login ON pessoa.login_Id_login = login.Id_login
                       WHERE login.Id_login=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $aluno= $stmt->fetch(PDO::FETCH_ASSOC);
            return $aluno;
        } catch (PDOException $exc){
            echo $exc->getMessage();
            die();
        }
    }
    public function verificarAluno($aluno){
        try{
            $sql = "SELECT * FROM login WHERE usuario= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $aluno);
            $stmt->execute();
            $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

            if($aluno == NULL || empty($aluno)){
                return false;
            }else{
                return true;
            }
            
        } catch (PDOException $exc){
            echo $exc->getMessage();
            die();
        }
    }
}

