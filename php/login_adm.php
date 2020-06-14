<?php

session_start();

require_once "conexao.php";
require_once "administrador.php";

$usuario = filter_input(INPUT_POST, 'user');
$senha = filter_input(INPUT_POST, 'senha');

$admin = new Administrador($conexao);

$aut = $admin->login($usuario, $senha);

if($aut != ""){
    echo "<script>window.location='../tela_adm.php'</script>";
    $_SESSION["dados"] = true;
}
else{
    echo "<script>alert('Não foi possível realizar o login. Dados inseridos incorretos!'); window.location='../login_adm.html'</script>";
}