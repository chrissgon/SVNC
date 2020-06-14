<?php

require_once "conexao.php";
require_once "responsavel.php";

$responsavel = new Responsavel($conexao);

$id = filter_input(INPUT_GET, "id");

$dados = $responsavel->buscar($id);

echo $dados["nom_res"]."*".$dados["pro_res"]."*".$dados["des_res"]."*".$dados["sen_res"];