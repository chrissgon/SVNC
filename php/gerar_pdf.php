<?php

session_start();

header ("Content-type: text/html; charset=UTF-8");

require_once "../fpdf/fpdf.php";
require_once "conexao.php";
require_once "aluno.php";
require_once "visitante.php";
require_once "palestra.php";
require_once "email.php";

$pdf = new FPDF('L','pt', 'A4');
$aluno = new Aluno($conexao);
$visitante = new Visitante($conexao);
$palestra = new Palestra($conexao);

$dados_pales = $_SESSION["dados_pales"];
$id_pales = $dados_pales["id_pales"];

$res_pales = $palestra->buscar_responsavel($dados_pales["res_pales"]);
$res_pales = $palestra->buscar_responsavel($dados_pales["res_pales"]);
$ini_pales = explode(":", $dados_pales["ini_pales"]);
$ter_pales = explode(":", $dados_pales["ter_pales"]);
$duracao_pales = mktime($ter_pales[0], $ter_pales[1]) - mktime($ini_pales[0], $ini_pales[1]);
$duracao_pales = round($duracao_pales / 60, 0);
$duracao_pales = $duracao_pales." minutos";

// GERAL
mkdir("../pdf/".$id_pales, 0755);
foreach($_POST["inscritos"] as $inscritos){
    
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->AddFont('Raleway','','Raleway.php');
    $pdf->SetFont('Raleway','',22);
    $pdf->Image('../img/certificado.png',0, 0, 842, 595);

    if(strlen($inscritos) == "5"){
        $dados_alu = $aluno->buscar($inscritos);
        $nome = utf8_decode($dados_alu["nom_alu"]);
        $nome_pales = utf8_decode($dados_pales["nom_pales"]);
        $nome_res = utf8_decode($res_pales["nom_res"]);
        $data_pales = utf8_decode($dados_pales["dat_pales"]);
        
    }
    else{
        $dados_vis = $visitante->find($inscritos);
        $nome = utf8_decode($dados_vis["nom_vis"]);
        $nome_pales = utf8_decode($dados_pales["nom_pales"]);
        $nome_res = utf8_decode($res_pales["nom_res"]);
        $data_pales = utf8_decode($dados_pales["dat_pales"]);
    }

    // nome
    $pdf->SetTextColor(64, 103, 114);
    $pdf->SetXY(186,265);
    $pdf->MultiCell(600,25,$nome,0,'L');
    // palestra
    $pdf->SetTextColor(64, 103, 114);
    $pdf->SetXY(186,345);
    $pdf->MultiCell(600,25,$nome_pales,0,'L');
    // responsavel
    $pdf->SetFont('Raleway','',19);
    $pdf->SetTextColor(51, 51, 51);
    $pdf->SetXY(318,384);
    $pdf->MultiCell(600,25,$nome_res,0,'L');
    // data
    $pdf->SetXY(245,416);
    $pdf->MultiCell(600,25,$dados_pales["dat_pales"],0,'L');
    // duracao
    $pdf->SetXY(620,416);
    $pdf->MultiCell(600,25,$duracao_pales,0,'L');
}
$pdf->Output("../pdf/".$id_pales."/Geral.pdf", "F");

// ESPECIFICOS
foreach($_POST["inscritos"] as $inscritos){
    $pdf = new FPDF('L','pt', 'A4');
    $pdf->AddPage();
    $pdf->AddFont('Raleway','','Raleway.php');
    $pdf->SetFont('Raleway','',22);
    $pdf->Image('../img/certificado.png',0, 0, 842, 595);

    if(strlen($inscritos) == "5"){
        $dados_alu = $aluno->buscar($inscritos);
        $nome = utf8_decode($dados_alu["nom_alu"]);
        $nome_pales = utf8_decode($dados_pales["nom_pales"]);
        $nome_res = utf8_decode($res_pales["nom_res"]);
        $data_pales = utf8_decode($dados_pales["dat_pales"]);
        $email = $dados_alu["ema_alu"];
    }
    else{
        $dados_vis = $visitante->find($inscritos);
        $nome = utf8_decode($dados_vis["nom_vis"]);
        $nome_pales = utf8_decode($dados_pales["nom_pales"]);
        $nome_res = utf8_decode($res_pales["nom_res"]);
        $data_pales = utf8_decode($dados_pales["dat_pales"]);
        $email = $dados_vis["ema_vis"];
    }

    // nome
    $pdf->SetTextColor(64, 103, 114);
    $pdf->SetXY(186,265);
    $pdf->MultiCell(600,25,$nome,0,'L');
    // palestra
    $pdf->SetTextColor(64, 103, 114);
    $pdf->SetXY(186,345);
    $pdf->MultiCell(600,25,$nome_pales,0,'L');
    // responsavel
    $pdf->SetFont('Raleway','',19);
    $pdf->SetTextColor(51, 51, 51);
    $pdf->SetXY(318,384);
    $pdf->MultiCell(600,25,$nome_res,0,'L');
    // data
    $pdf->SetXY(245,416);
    $pdf->MultiCell(600,25,$dados_pales["dat_pales"],0,'L');
    // duracao
    $pdf->SetXY(620,416);
    $pdf->MultiCell(600,25,$duracao_pales,0,'L');
    $pdf->Output("../pdf/".$id_pales."/$nome.pdf", "F");

    enviarEmail("../pdf/$id_pales/$nome.pdf", $nome_pales, $email);
}

header("location: ../tela_adm.php");