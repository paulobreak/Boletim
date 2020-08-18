<?php

require_once 'conexao/conexao.php';

class ProfessorDAO {

    public $pdo = null;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

//Cadastrar Professor
    public function inserir($professor) {

        try {
            $sql = "INSERT INTO login (usuario,senha,perfil_idperfil) 
                VALUES (?,?, 2) ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $professor->getUsuario());
            $stmt->bindValue(2, $professor->getSenha());
            $stmt->execute();

            $idlogin = $this->pdo->lastInsertId();

            $sql2 = "INSERT INTO pessoa 
                (cpf, data_nascimento, nome,telefone,sexo,turno,login_id_login)
                VALUES (?,?,?,?,?,?,?)";

            $stmt = $this->pdo->prepare($sql2);

            $stmt->bindValue(1, $professor->getCpf());
            $stmt->bindValue(2, $professor->getDt_nascimento());
            $stmt->bindValue(3, $professor->getNome());
            $stmt->bindValue(4, $professor->getTelefone());
            $stmt->bindValue(5, $professor->getSexo());
            $stmt->bindValue(6, $professor->getTurno());;
            $stmt->bindValue(7, $idlogin);
            $stmt->execute();

            $idpessoa = $this->pdo->lastInsertId();

            $sql3 = "INSERT INTO professor (email, pessoa_Id_Pessoa)
                VALUES (?,?)";

            $stmt = $this->pdo->prepare($sql3);

            $stmt->bindValue(1, $professor->getEmail());
            $stmt->bindValue(2, $idpessoa);
            $stmt->execute();

            $idpessoa = $this->pdo->lastInsertId();

            $sql4 = "INSERT INTO disciplina (nome_disciplina, professor_Id_prof)
                VALUES (?,?)";

            $stmt = $this->pdo->prepare($sql4);

            $stmt->bindValue(1, $professor->getDisciplina());
            $stmt->bindValue(2, $idpessoa);

            return $stmt->execute();
        } catch (PDOException $exc) {

            echo $exc->getMessage();
            die();
        }
    }

//Alterar Professor    
    public function alterarProfessorByID($professor) {
        try {
            $sql = "UPDATE professor INNER JOIN
                    pessoa ON pessoa.Id_Pessoa = professor.pessoa_Id_Pessoa
                    INNER JOIN
                    login ON pessoa.login_Id_login = login.Id_login
                    INNER JOIN
                    disciplina ON professor.Id_prof = disciplina.professor_Id_Prof 
                    SET usuario=?,senha=?,nome=?,cpf=?,data_nascimento=?,sexo=?,email=?,
                    turno=?,nome_disciplina=?,telefone=?
                    WHERE
                    Id_Prof=?";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $professor->getUsuario());
            $stmt->bindValue(2, $professor->getSenha());
            $stmt->bindValue(3, $professor->getNome());
            $stmt->bindValue(4, $professor->getCpf());
            $stmt->bindValue(5, $professor->getDt_nascimento());
            $stmt->bindValue(6, $professor->getSexo());
            $stmt->bindValue(7, $professor->getEmail());
            $stmt->bindValue(8, $professor->getTurno());
            $stmt->bindValue(9, $professor->getDisciplina());
            $stmt->bindValue(10, $professor->getTelefone());
            $stmt->bindValue(11, $professor->getIdProfessor());

            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }

//Listar professores
    public function getAllProfessores() {
        try {
            $sql = "SELECT 
                    nome,
                    turno,
                    nome_disciplina,
                    matricula,
                    id_prof
                    FROM
                    disciplina
                        INNER JOIN
                    professor
                        INNER JOIN
                    pessoa ON pessoa.Id_Pessoa = professor.pessoa_Id_Pessoa
                        INNER JOIN
                    login ON pessoa.login_Id_login = login.Id_login";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $professores = $stmt->fetchAll
                    (PDO::FETCH_ASSOC);
            return $professores;
        } catch (PDOException $exc) {
            echo $exc->getMenssage();
            die();
        }
    }

//Excluir professor
    public function excluirById($id) {
        try {
            $sql = "DELETE professor , pessoa , login , disciplina FROM professor
                        INNER JOIN
                            pessoa ON pessoa.Id_Pessoa = professor.pessoa_Id_Pessoa
                        INNER JOIN
                            login ON pessoa.login_Id_login = login.Id_login
                        INNER JOIN
                            disciplina ON professor.Id_prof = disciplina.professor_Id_Prof 
                        WHERE
                            Id_prof=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id);

            return $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }

//Alterar professor
    public function getProfessoresById($id) {
        try {
            $sql = "SELECT * FROM professor "
                    . " INNER JOIN
                            pessoa ON pessoa.Id_Pessoa = professor.pessoa_Id_Pessoa
                        INNER JOIN
                            login ON pessoa.login_Id_login = login.Id_login
                        INNER JOIN
                            disciplina ON professor.Id_prof = disciplina.professor_Id_Prof 
                       WHERE Id_Prof=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $professor = $stmt->fetch(PDO::FETCH_ASSOC);
            return $professor;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }
    public function getProfessoresByUsuario($usuario) {
        try {
            $sql = "SELECT * FROM professor "
                    . " INNER JOIN
                            pessoa ON pessoa.Id_Pessoa = professor.pessoa_Id_Pessoa
                        INNER JOIN
                            login ON pessoa.login_Id_login = login.Id_login

                       WHERE login.usuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuario);
            $stmt->execute();
            $professor = $stmt->fetch(PDO::FETCH_ASSOC);
            return $professor;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }
    
    public function verificarProfessor($professor){
        try{
            $sql = "SELECT * FROM login WHERE usuario= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $professor);
            $stmt->execute();
            $professor = $stmt->fetch(PDO::FETCH_ASSOC);

            if($professor == NULL || empty($professor)){
                return false;
            }else{
                return true;
            }
            
        } catch (PDOException $exc){
            echo $exc->getMessage();
            die();
        }
    }

    /*  public function consulta($professor) {
      try {
      $sql = "SELECT
      pr.email,
      p.cpf,
      p.data_nascimento,
      p.nome,
      p.telefone,
      p.sexo,
      p.turno,
      p.turma,
      p.matricula,
      l.usuario,
      l.senha,
      d.nome
      FROM
      professor pr
      INNER JOIN
      pessoa p ON p.Id_Pessoa = pr.pessoa_Id_Pessoa
      INNER JOIN
      login l ON p.login_Id_login = l.Id_login
      INNER JOIN
      ministra m ON pr.Id_Prof = m.Id_Prof
      INNER JOIN
      disciplina d ON d.Id_Disciplina = m.Id_Disciplina";

      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(1, $professor->getEmail());
      $stmt->bindValue(2, $professor->getCpf());
      $stmt->bindValue(3, $professor->getData_nascimento());
      $stmt->bindValue(4, $professor->getNome());
      $stmt->bindValue(5, $professor->getTelefone());
      $stmt->bindValue(6, $professor->getSexo());
      $stmt->bindValue(7, $professor->getTurno());
      $stmt->bindValue(8, $professor->getMatricula());
      $stmt->bindValue(9, $professor->getCidade());
      $stmt->bindValue(10, $professor->getCep());
      $stmt->bindValue(11, $professor->getEndereco());
      $stmt->bindValue(12, $professor->getCasa());
      $stmt->bindValue(13, $professor->getBairro());
      $stmt->bindValue(14, $professor->getUsuario());
      $stmt->bindValue(15, $professor->getSenha());

      return $stmt->execute();
      } catch (PDOException $exc) {
      echo $exc->getMessage();
      }
      } */
}
