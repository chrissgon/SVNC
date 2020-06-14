<?php

require_once "conexao.php";
require_once "visitante.php";
require_once "aluno.php";

$visitante = new Visitante($conexao);
$aluno = new Aluno($conexao);

$usuario = filter_input(INPUT_GET, "usuario");
$id = filter_input(INPUT_GET, "id");
$email = filter_input(INPUT_GET, "email");

if($usuario == "Visitante"){
    $visitante->setEmail($email);
    $visitante->atualizar_email($id);
}
else if($usuario == "Aluno"){
    $aluno->setEmail($email);
    $aluno->atualizar_email($id);
}