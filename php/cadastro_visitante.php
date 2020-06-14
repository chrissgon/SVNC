<?php

require_once 'conexao.php';
require_once 'visitante.php';

$visitante = new Visitante($conexao);

$cpf = filter_input(INPUT_POST, 'cpf');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$descricao = filter_input(INPUT_POST, 'descricao');
$senha = filter_input(INPUT_POST, 'senha');

$visitante->setCpf($cpf)->setNome($nome)->setEmail($email)->setDescricao($descricao)->setSenha($senha);
$visitante->cadastrar();

header("location: ../login.html");