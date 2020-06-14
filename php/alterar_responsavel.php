<?php

require_once "conexao.php";
require_once "responsavel.php";

$responsavel = new Responsavel($conexao);

$id = filter_input(INPUT_POST, "id");
$nome = filter_input(INPUT_POST, "nome");
$profissao = filter_input(INPUT_POST, "profissao");
$descricao = filter_input(INPUT_POST, "descricao");
$senha = filter_input(INPUT_POST, "senha");


$responsavel->setNome($nome)->setProfissao($profissao)->setDescricao($descricao)->setSenha($senha);

$responsavel->alterar($id);

header("location: ../tela_res.php");