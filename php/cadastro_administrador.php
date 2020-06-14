<?php

require_once "conexao.php";
require_once "administrador.php";

$nome = filter_input(INPUT_POST, "nome");
$senha = filter_input(INPUT_POST, "senha");

$administrador = new Administrador($conexao);
$administrador->setNome($nome)->setSenha($senha);
$administrador->cadastrar();

header("location: ../tela_adm.php");