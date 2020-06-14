<?php

class Visitante{
    private $db, $cpf, $nome, $email, $descricao, $senha;
    
    public function __construct(\PDO $db){
        $this->db = $db;
    }
    
    public function atualizar_email($cpf){
        $query = "update visitante set ema_vis=:email where cpf_vis=:cpf";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":cpf", $cpf);
        $stmt->bindValue(":email", $this->getEmail());
        $stmt->execute();
    }

    public function verificar_email($cpf){
        $query = "select ema_vis from visitante where cpf_vis=:cpf";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":cpf", $cpf);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    

    public function find($cpf){
        $query = "select * from visitante where cpf_vis=:cpf";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":cpf", $cpf);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function login($cpf, $senha){
        $query = "select * from visitante where binary cpf_vis='{$cpf}' and binary sen_vis='{$senha}'";
        $stmt = $this->db->query($query);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function cadastrar(){
        $query = "insert into visitante(cpf_vis, nom_vis, ema_vis, des_vis, sen_vis) values(:cpf, :nome, :email, :descricao, :senha)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":cpf", $this->getCpf());
        $stmt->bindValue(":nome", $this->getNome());
        $stmt->bindValue(":email", $this->getEmail());
        $stmt->bindValue(":descricao", $this->getDescricao());
        $stmt->bindValue(":senha", $this->getSenha());
        $stmt->execute();
    }

    public function listar($query){
        $query = $query;
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function alterar($cpf){
        $query = "update visitante set cpf_vis=:cpf, nom_vis=:nome, ema_vis=:email, des_vis=:descricao, sen_vis=:senha where cpf_vis=:cpfParam";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":cpfParam", $cpf);
        $stmt->bindValue(":cpf", $this->getCpf());
        $stmt->bindValue(":nome", $this->getNome());
        $stmt->bindValue(":email", $this->getEmail());
        $stmt->bindValue(":descricao", $this->getDescricao());
        $stmt->bindValue(":senha", $this->getSenha());
        $stmt->execute();
    }

    public function deletar($cpf){
        $query = "delete from visitante where cpf_vis=:cpf";
        $stmt->bindValue(":cpf", $cpf);
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    // SET
    public function setCpf($cpf){
        $this->cpf = $cpf;
        return $this;
    }
    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }
    public function setSenha($senha){
        $this->senha = $senha;
        return $this;
    }

    // GET
    public function getCpf(){
        return $this->cpf;  
    }
    public function getNome(){
        return $this->nome;  
    }
    public function getEmail(){
        return $this->email;  
    }
    public function getDescricao(){
        return $this->descricao;  
    }
    public function getSenha(){
        return $this->senha;  
    }
}