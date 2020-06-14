<?php

class Administrador{
    private $db, $nome, $senha;

    public function __construct(\PDO $db){
        $this->db = $db;
    }

    public function listar(){
        $query = "select * from admin";
        $stmt = $this->db->query($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function cadastrar(){
        $query = "insert into admin(nom_adm, sen_adm) values(:nome, :senha)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome", $this->getNome());
        $stmt->bindValue(":senha", $this->getSenha());
        $stmt->execute();
    }

    public function login($nome, $senha){
        $query = "select * from admin where binary nom_adm=:nome and binary sen_adm=:senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function buscar($id){
        $query = "select * from admin where id_adm=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function alterar($id){
        $query = "update admin set nom_adm=:nome, sen_adm=:senha where id_adm=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome", $this->getNome());
        $stmt->bindValue(":senha", $this->getSenha());
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    // SET
    public function setNome($nome){
        $this->nome = $nome;
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
    public function getSenha(){
        return $this->senha;
    }
}