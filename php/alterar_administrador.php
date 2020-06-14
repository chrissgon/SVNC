<?php

require_once "conexao.php";
require_once "administrador.php";

$id = filter_input(INPUT_POST, "id");
$nome = filter_input(INPUT_POST, "nome");
$senha = filter_input(INPUT_POST, "senha");

$administrador = new Administrador($conexao);
$administrador->setNome($nome)->setSenha($senha);
$administrador->alterar($id);

header("location: ../tela_adm.php");
