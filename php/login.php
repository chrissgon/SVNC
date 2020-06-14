<?php

session_start();

require_once "conexao.php";
require_once "visitante.php";
require_once "responsavel.php";
require_once "aluno.php";

$visitante = new Visitante($conexao);
$responsavel = new Responsavel($conexao);
$aluno = new Aluno($conexao);

$ent = filter_input(INPUT_POST, 'option');

$vis = ($ent == "vis") ? true : false ;
$alu = ($ent == "alu") ? true : false ;
$prof = ($ent == "prof") ? true : false ;

if($vis == true){
    $cpf = filter_input(INPUT_POST, 'cpf');
    $senha = filter_input(INPUT_POST, 'senha');
    $dados_vis = $visitante->login($cpf, $senha);
    if($dados_vis != ""){
        echo "<script>let valid = true;setTimeout(function(){ window.location = '../tela_user.php' }, 4000);</script>";
        $_SESSION["usuario"] = "Visitante";
        $_SESSION["dados"] = $dados_vis;
    }
    else{
        echo "<script>setTimeout(function(){ window.location = '../login.html' }, 4000);</script>";
    }
}
else if($alu == true){
    $rm = filter_input(INPUT_POST, 'rm');
    $senha = filter_input(INPUT_POST, 'senha');
    $dados_alu = $aluno->login($rm, $senha);
    if($dados_alu != ""){
        echo "<script>let valid = true;setTimeout(function(){ window.location = '../tela_user.php' }, 4000);</script>";
        $_SESSION["usuario"] = "Aluno";
        $_SESSION["dados"] = $dados_alu;
    }
    else{
        echo "<script>setTimeout(function(){ window.location = '../login.html' }, 4000);</script>";
    }
}
else if($prof == true){
    $nome = filter_input(INPUT_POST, 'nome');
    $senha = filter_input(INPUT_POST, 'senha');
    $dados_res = $responsavel->login($nome, $senha);
    if($dados_res != ""){
        echo "<script>let valid = true;setTimeout(function(){ window.location = '../tela_res.php' }, 4000);</script>";
        $_SESSION["dados"] = $dados_res;
    }
    else{
        echo "<script>setTimeout(function(){ window.location = '../login.html' }, 4000);</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Semana Venha Nos Conhecer</title>
    <!-- METAS -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Semana Venha Nos Conhecer, Etec Paulistano, Eventos, Palestras, Projetos, Semana Paulo Freire, Oficinas">
    <meta name="description" content="Site de divulgação de eventos e projetos da Etec Paulistano">
    <meta name="author" content="Christopher">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/reset.css" />

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet">

    <!-- ICONS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <!-- LOGO -->
    <link rel="icon" href="">

    <style>
        body{
            overflow: hidden;
        }
        .container{
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            
            margin: 0;
        }
        .valid{
            display: none;
        }
        .circle{
            width: 200px;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #3369c8;
            border-radius: 100%;
            animation: circle .8s ease;
        }
        .circle i{
            color: #fff;
            font-size: 9rem;
            animation: check 1s ease;
        }
        h1{
            color: #3369c8;
            font-family: "Raleway";
            font-weight: 100;
            text-align: center;
            margin-top: 50px;
            animation: title 1.1s ease;
        }
        span{
            font-weight: 700;
        }
        p{
            color: #3369c8;
            font-family: "Raleway";
            font-size: 1.2rem;
            text-align: center;
            animation: subtitle 1.1s ease;
            transform: translateY(-25px);
        }
        .loading{
            width: 30px;
            height: 30px;
            border: 5px solid #eee;
            border-top-color: #3369c8;
            border-radius: 100%;
            animation: loading 1s linear infinite;
        }

        @keyframes circle{
            0%{
                transform: scale(0)
            }
            100%{
                transform: scale(1)
            }
        }
        @keyframes check{
            0%{
                transform: rotate(-180deg)
            }
            50%{
                transform: rotate(30deg)
            }
            100%{
                transform: rotate(0)
            }
        }
        @keyframes title{
            0%{
                transform: translateY(50px);
                opacity: 0;
            }
            50%{
                transform: translateY(-20px)
            }
            100%{
                transform: translateY(0px);
                opacity: 1
            }
        }
        @keyframes subtitle{
            0%{
                transform: translateY(80px);
                opacity: 0;
            }
            50%{
                transform: translateY(-50px)
            }
            100%{
                transform: translateY(-25px);
                opacity: 1
            }
        }
        @keyframes loading{
            to{
               transform: rotate(360deg); 
            }
        }
    </style>

</head>

<body>
    <div class="container valid">
        <div class="circle">
            <i class="material-icons">check</i>
        </div>
        <h1>Login realizado com <span>sucesso!</span></h1>
        <p>Você será redirecionado em instantes</p>
        <div class="loading"></div>
    </div>
    <div class="container invalid">
        <div class="circle">
            <i class="material-icons">close</i>
        </div>
        <h1>Não foi <span>possível</span> realizar o login!</h1>
        <p>Verifique os dados digitados</p>
        <div class="loading"></div>
    </div>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        if(valid == true){
            $('.invalid').hide();
            $('.valid').css("display","flex");
            
        }
        else{
            $('.valid').hide();
            $('.invalid').css("display","flex");
           
        }
    </script>
</body>

</html>