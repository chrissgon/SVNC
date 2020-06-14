<?php

require_once "conexao.php";
require_once "administrador.php";

$administrador = new Administrador($conexao);

$id_adm = filter_input(INPUT_GET, "id");

$dados_adm = $administrador->buscar($id_adm);

echo $dados_adm["nom_adm"]." ".$dados_adm["sen_adm"];