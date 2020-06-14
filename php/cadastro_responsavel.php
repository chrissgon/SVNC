<?php

require_once "conexao.php";
require_once "responsavel.php";

$nome = filter_input(INPUT_POST, "nome");
$profissao = filter_input(INPUT_POST, "profissao");
$descricao =  filter_input(INPUT_POST, "descricao");
$senha = explode(" ", strtolower($nome));

$responsavel = new Responsavel($conexao);
$responsavel->setNome($nome)->setProfissao($profissao)->setDescricao($descricao)->setSenha($senha[0].$senha[1]);
$responsavel->cadastrar();

header("location: ../tela_adm.php");