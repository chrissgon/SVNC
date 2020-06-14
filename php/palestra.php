<?php

class Palestra{
    private $db, $id, $nome, $descricao, $responsavel, $carga, $data, $local, $inicio, $termino, $status;

    public function __construct(\PDO $db){
        $this->db = $db;
    }

    public function status(){
        $query = "select val_sta from status where nom_sta = 'palestra'";
        $stmt = $this->db->query($query);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function desabilitar_cadastro($status){
        $query = "update status set val_sta=:status where nom_sta='palestra'";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":status", $status);
        $stmt->execute();
    }

    public function cadastrar(){
        $query = "insert into palestra(nom_pales, des_pales, res_pales, car_pales, dat_pales, loc_pales, ini_pales, ter_pales, sta_pales) values(:nome, :descricao, :responsavel, :carga, :data, :local, :inicio, :termino, :status)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":nome", $this->getNome());
        $stmt->bindValue(":descricao", $this->getDescricao());
        $stmt->bindValue(":responsavel", $this->getResponsavel());
        $stmt->bindValue(":carga", $this->getCarga());
        $stmt->bindValue(":data", $this->getData());
        $stmt->bindValue(":local", $this->getLocal());
        $stmt->bindValue(":inicio", $this->getInicio());
        $stmt->bindValue(":termino", $this->getTermino());
        $stmt->bindValue(":status", $this->getStatus());
        $stmt->execute();
    }

    public function listar_dados(){
        $query = "select * from palestra where sta_pales='Apr' order by ini_pales";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function listar($status){
        $query = "select * from palestra where sta_pales='{$status}'";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function listar_responsavel($status, $id){
        $query = "select * from palestra where sta_pales='{$status}' and res_pales='{$id}'";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscar($id){
        $query = "select * from palestra where id_pales=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function buscar_responsavel($param){
        $query = "select * from responsavel where id_res=:param or nom_res=:param";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":param", $param);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function atualizar($id){
        $query = "update palestra set nom_pales=:nome, des_pales=:descricao, res_pales=:responsavel, car_pales=:carga, dat_pales=:data, loc_pales=:local, ini_pales=:inicio, ter_pales=:termino where id_pales=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":nome", $this->getNome());
        $stmt->bindValue(":descricao", $this->getDescricao());
        $stmt->bindValue(":responsavel", $this->getResponsavel());
        $stmt->bindValue(":carga", $this->getCarga());
        $stmt->bindValue(":data", $this->getData());
        $stmt->bindValue(":local", $this->getLocal());
        $stmt->bindValue(":inicio", $this->getInicio());
        $stmt->bindValue(":termino", $this->getTermino());
        $stmt->execute();
    }

    public function atualizar_status($id){
        $query = "update palestra set sta_pales=:status where id_pales=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":status", $this->getStatus());
        $stmt->execute();
    }

    // SET
    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }
    public function setResponsavel($responsavel){
        $this->responsavel = $responsavel;
        return $this;
    }
    public function setCarga($carga){
        $this->carga = $carga;
        return $this;
    }
    public function setData($data){
        $this->data = $data;
        return $this;
    }
    public function setLocal($local){
        $this->local = $local;
        return $this;
    }
    public function setInicio($inicio){
        $this->inicio = $inicio;
        return $this;
    }
    public function setTermino($termino){
        $this->termino = $termino;
        return $this;
    }
    public function setStatus($status){
        $this->status = $status;
        return $this;
    }

    // GET
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function getResponsavel(){
        return $this->responsavel;
    }
    public function getCarga(){
        return $this->carga;
    }
    public function getData(){
        return $this->data;
    }
    public function getLocal(){
        return $this->local;
    }
    public function getInicio(){
        return $this->inicio;
    }
    public function getTermino(){
        return $this->termino;
    }
    public function getStatus(){
        return $this->status;
    }
}