<?php

require_once "conexao.php";
require_once "inscricao.php";
require_once "palestra.php";

$inscricao = new Inscricao($conexao);
$palestra = new Palestra($conexao);
$horario = array();
$verificador = false;

// pegando valores
$pales_sel = filter_input(INPUT_GET, "id_palestra");
$id_usuario = filter_input(INPUT_GET, "id");
$id_palestra = explode(",", $pales_sel);

foreach($id_palestra as $id){
    $dados_pales_sel = $palestra->buscar($id);

    // verificar dupla inscrição
    $inscritos_usu = $inscricao->inscritos($id_usuario);
    foreach($inscritos_usu as $lista_inscritos){
        $dados_pales_ins = $palestra->buscar($lista_inscritos["id_pales"]);
        if($dados_pales_ins["id_pales"] == $dados_pales_sel["id_pales"] || ($dados_pales_ins["ini_pales"] == $dados_pales_sel["ini_pales"] && $dados_pales_ins["dat_pales"] == $dados_pales_sel["dat_pales"])){
            $verificador = true;
        }
    }

    // verificar horarios iguais
    array_push($horario, $dados_pales_sel["ini_pales"], $dados_pales_sel["dat_pales"]);
    $duplicado = array_unique( array_diff_assoc( $horario, array_unique( $horario ) ) );
    if(count($duplicado) >= 2){
        $verificador = true;
        
    }
    
}

// decisão final
if($verificador == true){
    echo "Erro";
}
else{
    foreach($id_palestra as $lista_id){
        $dados_pales_sel = $palestra->buscar($lista_id);
        if(strlen($id_usuario) == 5){
            $inscricao->setPalestra($lista_id)->setResponsavel($dados_pales_sel["res_pales"])->setAluno($id_usuario);
        }
        else{
            $inscricao->setPalestra($lista_id)->setResponsavel($dados_pales_sel["res_pales"])->setVisitante($id_usuario);
        }
        $inscricao->cadastrar();
    }
}

