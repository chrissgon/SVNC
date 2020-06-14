<?php

require_once "conexao.php";
require_once "inscricao.php";

$inscricao = new Inscricao($conexao);

$palestra = filter_input(INPUT_POST, "id");
$usuario = filter_input(INPUT_POST, "usuario");

$inscricao->deletar($usuario, $palestra);

header("location: ../tela_user.php");

