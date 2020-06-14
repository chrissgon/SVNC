<?php
session_start();

require_once "conexao.php";
require_once "palestra.php";

$palestra = new Palestra($conexao);

$id_pales = filter_input(INPUT_POST, "id");
$dados_pales = $palestra->buscar($id_pales);

$palestra->setStatus("Con");
$palestra->atualizar_status($id_pales);

$_SESSION["dados_pales"] = $dados_pales;

header("location: ../tela_chamada.php");