<?php

require_once "conexao.php";
require_once "palestra.php";

$id = filter_input(INPUT_POST, "id");
$nome = filter_input(INPUT_POST, "nome");
$descricao = filter_input(INPUT_POST, "descricao");
$responsavel = filter_input(INPUT_POST, "responsavel");
$carga = filter_input(INPUT_POST, "carga");
$data = filter_input(INPUT_POST, "data");
$local = filter_input(INPUT_POST, "local");
$inicio = filter_input(INPUT_POST, "inicio");
$termino = filter_input(INPUT_POST, "termino");

$stmt_pales = new Palestra($conexao);

$stmt_res = $stmt_pales->buscar_responsavel($responsavel);
$id_res = $stmt_res["id_res"];

$stmt_pales->setNome($nome)->setDescricao($descricao)->setResponsavel($id_res)->setCarga($carga)->setData($data)->setLocal($local)->setInicio($inicio)->setTermino($termino);
$dados_pales = $stmt_pales->atualizar($id);

header("location: ../tela_res.php");
