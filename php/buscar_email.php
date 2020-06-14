<?php

require_once "conexao.php";
require_once "visitante.php";
require_once "aluno.php";

$visitante = new Visitante($conexao);
$aluno = new Aluno($conexao);

$usuario = filter_input(INPUT_GET, "usuario");
$id = filter_input(INPUT_GET, "id");

if($usuario == "Visitante"){
    $stmt = $visitante->verificar_email($id);
    $email = $stmt["ema_vis"];
}
else if($usuario == "Aluno"){
    $stmt = $aluno->verificar_email($id);
    $email = $stmt["ema_alu"];
}

echo $email;
