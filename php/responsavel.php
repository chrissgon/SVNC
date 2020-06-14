<?php

class Responsavel{
    private $db, $nome, $profissao, $descricao, $senha;

    public function __construct(\PDO $db){
        $this->db = $db;
    }

    public function alterar($id){
        $query = "update responsavel set nom_res=:nome, pro_res=:profissao, des_res=:descricao, sen_res=:senha where id_res=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":nome", $this->getNome());
        $stmt->bindValue(":profissao", $this->getProfissao());
        $stmt->bindValue(":descricao", $this->getDescricao());
        $stmt->bindValue(":senha", $this->getSenha());
        $stmt->execute();
    }

    public function buscar($id){
        $query = "select * from responsavel where id_res=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function listar(){
        $query = "select * from responsavel";
        $stmt =  $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function cadastrar(){
        $query = "insert into responsavel(nom_res, pro_res, des_res, sen_res) values(:nome, :profissao, :descricao, :senha)";
        $stmt =  $this->db->prepare($query);
        $stmt->bindValue(":nome", $this->getNome());
        $stmt->bindValue(":profissao", $this->getProfissao());
        $stmt->bindValue(":descricao", $this->getDescricao());
        $stmt->bindValue(":senha", $this->getSenha());
        $stmt->execute();
    }

    public function login($nome, $senha){
        $query = "select * from responsavel where binary nom_res=:nome and binary sen_res=:senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // SET
    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }
    public function setProfissao($profissao){
        $this->profissao = $profissao;
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
    public function getNome(){
        return $this->nome;
    }
    public function getProfissao(){
        return $this->profissao;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function getSenha(){
        return $this->senha;
    }
}