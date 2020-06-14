<?php

require_once 'conexao.php';
require_once 'visitante.php';

$visitante = new Visitante($conexao);
$visitante->setCpf("")->setNome("")->setEmail("")->setDescricao("")->setSenha("");
$visitante->alterar("");//Param - Chave Primaria;