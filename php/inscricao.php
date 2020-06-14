<?php

class Inscricao{
    private $db, $id_pales, $id_res, $id_vis, $id_alu;

    public function __construct(\PDO $db){
        $this->db = $db;
    }

    public function cadastrar(){
        $query = "insert into inscricao(id_pales, id_res, id_vis, id_alu) values(:palestra, :responsavel, :visitante, :aluno)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":palestra", $this->getPalestra());
        $stmt->bindValue(":responsavel", $this->getResponsavel());
        $stmt->bindValue(":visitante", $this->getVisitante());
        $stmt->bindValue(":aluno", $this->getAluno());
        $stmt->execute();
    }

    public function listar($id){
        $query = "select * from inscricao where id_pales=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function listar_aluno($id){
        $query = "select * from inscricao where id_pales=:id and id_alu <> ''";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function listar_visitante($id){
        $query = "select * from inscricao where id_pales=:id and id_vis <> ''";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscar($id){
        $query = "select * from inscricao where id_vis=:id or id_alu=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function inscritos($id){
        $query = "select * from inscricao where id_vis=:id or id_alu=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deletar($usuario, $palestra){
        $query = "delete from inscricao where (id_vis=:usuario or id_alu=:usuario) and (id_pales=:palestra)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":usuario", $usuario);
        $stmt->bindValue(":palestra", $palestra);
        $stmt->execute();
    }

    // SET
    public function setPalestra($id_pales){
        $this->id_pales = $id_pales;
        return $this;
    }
    public function setResponsavel($id_res){
        $this->id_res = $id_res;
        return $this;
    }
    public function setVisitante($id_vis){
        $this->id_vis = $id_vis;
        return $this;
    }
    public function setAluno($id_alu){
        $this->id_alu = $id_alu;
        return $this;
    }

    // GET
    public function getPalestra(){
        return $this->id_pales;
    }
    public function getResponsavel(){
        return $this->id_res;
    }
    public function getVisitante(){
        return $this->id_vis;
    }
    public function getAluno(){
        return $this->id_alu;
    }
}