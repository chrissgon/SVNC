<?php
session_start();

require_once "php/conexao.php";
require_once "php/visitante.php";
require_once "php/aluno.php";
require_once "php/palestra.php";
require_once "php/inscricao.php";

$palestra = new Palestra($conexao);
$inscricao = new Inscricao($conexao);

if(!isset($_SESSION["dados"])){
    header("location: login.html");
}

$dados = $_SESSION["dados"];
$usuario = $_SESSION["usuario"];


if($usuario == "Visitante"){
    echo "<script>let usuario = 'Visitante'; let id = ".$dados["cpf_vis"]."</script>";
    $nome = $dados["nom_vis"];
    $identificador = $dados["cpf_vis"];
}
else if($usuario == "Aluno"){
    echo "<script>let usuario = 'Aluno'; let id = ".$dados["rm_alu"]."</script>";
    $nome = $dados["nom_alu"];
    $identificador = $dados["rm_alu"];
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
    <link rel="stylesheet" type="text/css" href="css/tela_user.css" />

    <!-- ICONS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <!-- LOGO -->
    <link rel="icon" href="">

</head>

<body>
    <!-- MODAL -->
    <section class="container-modal">
        <header class="load">

        </header>
        <!-- EMAIL -->
        <article class="modal modal-email">
            <!-- header -->
            <header class="header">
                <h3>Cadastre o seu email</h3>
            </header>
            <!-- info -->
            <article class="info">
                <p class="input">
                    <input type="email" name="email" placeholder="Email" required>
                </p>
            </article>
            <input type="submit" value="Cadastrar">
        </article>

        <!-- INSCRIÇÃO -->
        <article class="modal inscricao">
            <!-- header -->
            <header class="header">
                <h3>Aviso</h3>
            </header>
            <!-- info -->
            <article class="info">
                <p class="mensagem"></p>
                <p class="reload">
                    <a class="animation"></a>
                </p>
            </article>
        </article>

        <!-- PROGRAMACAO -->
        <article class="modal programacao">
            <!-- header -->
            <header class="header">
                <h3 class="nome"></h3>
            </header>
            <!-- info -->
            <article class="info">
                <p class="descricao"><i class="material-icons">description</i><strong></strong></p>
                <p class="responsavel"><i class="material-icons">account_circle</i><strong></strong></p>
                <p class="duracao"><i class="material-icons">timer</i><strong></strong></p>
                <p class="data"><i class="material-icons">event</i><strong></strong></p>
                <p class="local"><i class="material-icons">domain</i><strong></strong></p>
                <p class="horario"><i class="material-icons">access_time</i><strong class="inicio"></strong> - <strong class="termino"></strong></p>
            </article>
        </article>

        <!-- LISTA -->
        <article class="modal lista">
            <!-- header -->
                <header class="header">
                    <h3>Deseja excluir a inscrição?</h3>
                </header>
            <!-- info -->
            <form class="info" method="post" action="php/deletar_inscricao.php">
                <p class="input hidden">
                    <input type="text" name="id">
                </p>
                <p class="input hidden">
                    <input type="text" name="usuario">
                </p>
                <p class="nome"></p>
                <input type="submit" value="Sim">
            </form>
        </article>
    </section>

    <!-- NAV -->
    <section class="navbar">
        <!-- btn-nav -->
        <a class="btn-nav"><i class="material-icons">menu</i></a>
        <!-- menu -->
        <article class="menu">
            <h3>Palestras</h3>
            <a class="aba inscricao"><i class="material-icons">add</i>Inscrição</a>
            <a class="aba programacao"><i class="material-icons">today</i>Programação</a>
            <h3>Conta</h3>
            <a class="aba lista"><i class="material-icons">list_alt</i>Lista</a>
        </article>
        <article class="menu">
            <a class="aba leave" href="php/logout.php"><i class="material-icons">input</i>Sair</a>
        </article>
    </section>

    <!-- HEADER -->
    <header class="header">
        <h1>Área do <?php echo $usuario?></h1>
    </header>

    <!-- DADOS -->
    <section class="dados">
        <p><i class="material-icons">perm_identity</i><?php echo $nome?></p>
    </section>

    <!-- INSCRICAO -->
    <section class="container inscricao">
        <article class="data">
            <a class="dia 21 aba-ativa"><p>Segunda</p></a>
            <a class="dia 22"><p>Terça</p></a>
            <a class="dia 23"><p>Quarta</p></a>
            <a class="dia 24"><p>Quinta</p></a>
            <a class="dia 25"><p>Sexta</p></a>
        </article>
        <article class="container-palestra">
            <table class="palestras">
                <thead class="header">
                    <tr>
                        <th>Nome</th>
                        <th>Responsável</th>
                        <th>Local</th>
                        <th>Início</th>
                        <th>Término</th>
                    </tr>
                </thead>
                <tbody class="info">
                    <?php
                        $dados_pales = $palestra->listar_dados();
                        foreach($dados_pales as $lista){
                            echo "<tr class=".substr($lista["dat_pales"], 0, 2).">";
                            echo "<td>";
                            echo "<label for=".$lista["id_pales"].">";
                            echo "<input type='checkbox' id=".$lista['id_pales']." name='id_palestras'>";
                            echo "<a class='checkbox'>";
                            echo "<p></p>";
                            echo "<p></p>";
                            echo "</a>";
                            echo "</label>";
                            echo $lista["nom_pales"];
                            echo "</td>";
                            $res_pales = $palestra->buscar_responsavel($lista["res_pales"]);
                            echo "<td>".$res_pales["nom_res"]."</td>";
                            echo "<td>".$lista["loc_pales"]."</td>";
                            echo "<td>".$lista["ini_pales"]."</td>";
                            echo "<td>".$lista["ter_pales"]."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            
        </article>
        <input type="submit" value="Inscrever" class="btn-inscricao">
    </section>

    <!-- PROGRAMACAO -->
    <section class="container programacao">
        <article class="container-palestra">
            <table class="palestras">
                <thead class="header">
                    <tr>
                        <th>Nome</th>
                        <th>Responsável</th>
                        <th>Local</th>
                        <th>Início</th>
                        <th>Término</th>
                    </tr>
                </thead>
                <tbody class="info">
                    <?php
                        
                        $dados_pales = $palestra->listar_dados();
                        foreach($dados_pales as $lista){
                            echo "<tr id=".$lista["id_pales"].">";
                            echo "<td>".$lista["nom_pales"]."</td>";
                            $res_pales = $palestra->buscar_responsavel($lista["res_pales"]);
                            echo "<td>".$res_pales["nom_res"]."</td>";
                            echo "<td>".$lista["loc_pales"]."</td>";
                            echo "<td>".$lista["ini_pales"]."</td>";
                            echo "<td>".$lista["ter_pales"]."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </article>
    </section>

    <!-- LISTA -->
    <section class="container lista">
        <h3>Palestras Inscritas</h3>
        <article class="container-palestra">
            <table class="palestras">
                <thead class="header">
                    <tr>
                        <th>Nome</th>
                        <th>Responsável</th>
                        <th>Local</th>
                        <th>Início</th>
                        <th>Término</th>
                    </tr>
                </thead>
                <tbody class="info">
                    <?php
                        
                        $dados_ins = $inscricao->inscritos($identificador);
                        foreach($dados_ins as $lista){
                            $dados_pales = $palestra->buscar($lista["id_pales"]);
                            echo "<tr id=".$lista["id_pales"].">";
                            echo "<td>".$dados_pales["nom_pales"]."</td>";
                            $res_pales = $palestra->buscar_responsavel($dados_pales["res_pales"]);
                            echo "<td>".$res_pales["nom_res"]."</td>";
                            echo "<td>".$dados_pales["loc_pales"]."</td>";
                            echo "<td>".$dados_pales["ini_pales"]."</td>";
                            echo "<td>".$dados_pales["ter_pales"]."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </article>
    </section>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- JS -->
    <script src="js/pred.js"></script>
    <script src="js/tela_user.js"></script>
</body>
</html>