<?php

require_once "conexao.php";
require_once "palestra.php";

$id_pales = filter_input(INPUT_GET, "id");

$stmt_pales = new Palestra($conexao);
$dados_pales = $stmt_pales->buscar($id_pales);

$id_res = $dados_pales["res_pales"];
$dados_res = $stmt_pales->buscar_responsavel($id_res);

echo $dados_pales["nom_pales"]."*".$dados_pales["des_pales"]."*".$dados_res["nom_res"]."*".$dados_pales["car_pales"]."*".$dados_pales["dat_pales"]."*".$dados_pales["loc_pales"]."*".$dados_pales["ini_pales"]."*".$dados_pales["ter_pales"]."*".$dados_pales["sta_pales"];