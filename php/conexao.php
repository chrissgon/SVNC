<?php
    //header ('Content-type: text/html; charset=UTF-8');
    try{
        $conexao = new \PDO("mysql:host=localhost; dbname=bancosvnc", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    catch(\PDOException $e){
        die ("Não foi possivel estabelecer a conexão com o banco - Erro: ".$e->getCode());
    };