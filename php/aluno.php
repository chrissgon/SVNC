<?php

class Aluno{
    private $db, $rm, $nome, $serie, $curso, $turma, $email;

    public function __construct(\PDO $db){
        $this->db = $db;
    }

    public function atualizar_email($rm){
        $query = "update aluno set ema_alu=:email where rm_alu=:rm";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":rm", $rm);
        $stmt->bindValue(":email", $this->getEmail());
        $stmt->execute();
    }

    public function verificar_email($rm){
        $query = "select ema_alu from aluno where rm_alu=:rm";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":rm", $rm);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function login($rm, $senha){
        $query = "select * from aluno where binary rm_alu=:rm and binary sen_alu=:senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":rm", $rm);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function buscar($rm){
        $query = "select * from aluno where rm_alu=:rm";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":rm", $rm);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function buscar_curso($rm, $curso){
        $query = "select * from aluno where rm_alu=:rm and cur_alu=:curso";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":rm", $rm);
        $stmt->bindValue(":curso", $curso);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscar_ano($rm, $ano){
        $query = "select * from aluno where rm_alu=:rm and ser_alu=:ano";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":rm", $rm);
        $stmt->bindValue(":ano", $ano);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscar_curso_ano($rm, $curso, $ano){
        $query = "select * from aluno where rm_alu=:rm and cur_alu=:curso and ser_alu=:ano";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":rm", $rm);
        $stmt->bindValue(":curso", $curso);
        $stmt->bindValue(":ano", $ano);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // SET
    public function setRM($rm){
        $this->rm = $rm;
        return $this;
    }
    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }
    public function setSerie($serie){
        $this->serie = $serie;
        return $this;
    }
    public function setCurso($curso){
        $this->curso = $curso;
        return $this;
    }
    public function setTurma($turma){
        $this->turma = $turma;
        return $this;
    }
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    // GET
    public function getRM(){
        return $this->rm;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getSerie(){
        return $this->serie;
    }
    public function getCurso(){
        return $this->curso;
    }
    public function getTurma(){
        return $this->turma;
    }
    public function getEmail(){
        return $this->email;
    }
}