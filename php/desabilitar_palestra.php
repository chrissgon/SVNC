<?php
    require_once "conexao.php";
    require_once "palestra.php";

    $palestra = new Palestra($conexao);

    $status = filter_input(INPUT_POST, "status");
    $palestra->desabilitar_cadastro($status);
?>