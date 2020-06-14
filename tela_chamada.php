<?php
    session_start();

    header ("Content-type: text/html; charset=UTF-8");

    require_once "php/conexao.php";
    require_once "php/inscricao.php";
    require_once "php/visitante.php";
    require_once "php/aluno.php";

    $inscricao = new Inscricao($conexao);
    $visitante = new Visitante($conexao);
    $aluno = new Aluno($conexao);
    
    $dados_pales = $_SESSION["dados_pales"];
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
    <link rel="stylesheet" type="text/css" href="css/tela_chamada.css" />

    <!-- ICONS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <!-- LOGO -->
    <link rel="icon" href="">

</head>

<body>

    <!-- NAV -->
    <section class="navbar">
        <!-- btn-nav -->
        <a class="btn-nav"><i class="material-icons">filter_list</i></a>
        <!-- menu -->
        <article class="menu">
            <h3>Filtro</h3>
            <article class="info">
                <p class="input">
                    <strong>Entidade</strong>
                    <select name="entidade">
                        <option selected value="todos">Todos</option>
                        <option value="aluno">Aluno</option>
                        <option value="visitante">Visitante</option>
                    </select>
                </p>
                <p class="input aluno hidden">
                    <strong>Curso</strong>
                    <select name="curso">
                        <option selected value="todos">Todos</option>
                        <option value="Informática">Informática</option>
                        <option value="Meio">Meio Ambiente</option>
                        <option value="Desenvolvimento">Desenvolvimento de Sistemas</option>
                    </select>
                </p>
                <p class="input aluno hidden">
                    <strong>Série</strong>
                    <select name="serie">
                        <option selected value="todos">Todos</option>
                        <option value="1">1º Ano</option>
                        <option value="2">2º Ano</option>
                        <option value="3">3º Ano</option>
                    </select>
                </p>
                <a class="btn-filtro"><i class="material-icons">filter_list</i></a>
            </article>
    </section>

    <!-- HEADER -->
    <section class="header">
        <h1><?php echo $dados_pales["nom_pales"]?></h1>
        <input type="text" name="nome" class="filtro nome" placeholder="Nome">
    </section>

    <!-- LISTA -->
    <form class="container lista" method="post" action="php/gerar_pdf.php">
        <h3>Lista de Inscritos</h3>
        <article class="itens">
            <?php
                $inscritos = $inscricao->listar($dados_pales["id_pales"]);

                foreach($inscritos as $lista){
                    if($lista["id_vis"] == null){
                        $dados_alu = $aluno->buscar($lista["id_alu"]);
                        $curso = explode(" ",$dados_alu["cur_alu"]);
                        echo "<article class='item aluno ".$curso[0]." ".$dados_alu["ser_alu"]."'>";
                        echo "<label>";
                        echo "<input type='checkbox' value=".$dados_alu["rm_alu"]." name='inscritos[]'>";
                        echo "<a class='checkbox'>";
                        echo "<p></p>";
                        echo "<p></p>";
                        echo "</a>";
                        echo "</label>";
                        echo "<p>";
                        echo $dados_alu["nom_alu"];
                        echo "</p>";
                        echo "</article>";
                    }
                    else{
                        $dados_vis = $visitante->find($lista["id_vis"]);
                        echo "<article class='item visitante'>";
                        echo "<label>";
                        echo "<input type='checkbox' value=".$dados_vis["cpf_vis"]." name='inscritos[]'>";
                        echo "<a class='checkbox'>";
                        echo "<p></p>";
                        echo "<p></p>";
                        echo "</a>";
                        echo "</label>";
                        echo "<p>";
                        echo $dados_vis["nom_vis"];
                        echo "</p>";
                        echo "</article>";
                    }
                }
            ?>
        </article>
        <input type="submit" value="Finalizar">
    </form>

</body>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- JS -->
    <script src="js/pred.js"></script>
    <script src="js/tela_chamada.js"></script>
</html>