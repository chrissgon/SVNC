<?php

require_once "conexao.php";
require_once "palestra.php";

$id = $_GET["id"];
$status = $_GET["status"];

$palestra = new Palestra($conexao);

$palestra->setStatus($status);
$palestra->atualizar_status($id);