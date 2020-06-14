<?php

require_once "conexao.php";
require_once "palestra.php";

$nome = filter_input(INPUT_POST, "nome");
$descricao = filter_input(INPUT_POST, "descricao");
$responsavel = filter_input(INPUT_POST, "responsavel");
$tempo = explode(" ", filter_input(INPUT_POST, "carga")." ".filter_input(INPUT_POST, "tempo"));
$data = filter_input(INPUT_POST, "data");
$local = filter_input(INPUT_POST, "local");
$inicio = filter_input(INPUT_POST, "inicio");
$termino = filter_input(INPUT_POST, "termino");

if($tempo[0] != "1"){
    $carga = $tempo[0]." ".$tempo[1].$tempo[2];
}
else{
    $carga = $tempo[0]." ".$tempo[1];
}

$palestra = new Palestra($conexao);
$palestra->setNome($nome)->setDescricao($descricao)->setResponsavel($responsavel)->setCarga($carga)->setData($data)->setLocal($local)->setInicio($inicio)->setTermino($termino)->setStatus("Apr");

$palestra->cadastrar();

header("location:../tela_adm.php");

