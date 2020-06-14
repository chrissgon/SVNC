<?php
    session_start();

    require_once "php/conexao.php";
    require_once "php/responsavel.php";
    require_once "php/palestra.php";

    $responsavel = new Responsavel($conexao);
    $palestra = new Palestra($conexao);

    $dados_res = $_SESSION["dados"];

    echo "<script>let id=".$dados_res["id_res"]."</script>";

    if(!isset($_SESSION["dados"])){
        header("location: login.html");
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
    <link rel="stylesheet" type="text/css" href="css/tela_res.css" />

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
        <!-- CADASTRO -->
        <form class="modal modal-cadastro" method="post" action="php/cadastro_palestra_responsavel.php">
            <!-- header -->
            <header class="header">
                <h3>Cadastro</h3>
            </header>
            <!-- info -->
            <article class="info">
                <p class="input">
                    <input type="text" name="nome" minlength="5" pattern="[a-zA-ZÀ-ž\s\']+" placeholder="Nome" required>
                </p>
                <p class="input">
                    <textarea name="descricao" minlength="10" pattern="[a-zA-ZÀ-ž\s]+" placeholder="Descrição" required></textarea>
                </p>
                <p class="input">
                    <select name="responsavel" required>
                        <option value="<?php echo $dados_res["id_res"] ?>">
                        <?php
                            $stmt_res = $responsavel->buscar($dados_res["id_res"]);
                            echo "<p>".$stmt_res["nom_res"]."</p>";
                        ?>
                        </option>
                    </select>
                </p>
                <p class="input">
                    <input type="text" name="carga" maxlength="2" pattern="[0-9]+" title="Somente Números" placeholder="Carga Horária" required>
                    <select name="tempo">
                        <option value="hora s" selected>Hora(s)</option>
                        <option value="minuto s">Minuto(s)</option>
                    </select>
                </p>
                <p class="input">
                    <select name="data">
                        <option value="" selected disabled>Data</option>
                        <option value="21/10" >21/10</option>
                        <option value="22/10" >22/10</option>
                        <option value="23/10" >23/10</option>
                        <option value="24/10" >24/10</option>
                        <option value="25/10" >25/10</option>
                    </select>
                </p>
                <p class="input">
                    <input type="text" name="local" minlength="5" pattern="[a-zA-ZÀ-ž0-9\s]+" placeholder="Local" required>
                </p>
                <p class="input">
                    <input type="text" name="inicio" minlength="5" maxlength="5" pattern="[0-9\:]+" placeholder="Inicio" required>
                </p>
                <p class="input">
                    <input type="text" name="termino" minlength="5" maxlength="5" pattern="[0-9\:]+" placeholder="Término" required>
                </p>
            </article>
            <input type="submit" value="Cadastrar">
        </form>

        <!-- EDIÇÃO -->
        <form class="modal modal-palestra" method="post" action="php/alterar_palestra_responsavel.php">
            <!-- header -->
            <header class="header">
                <h3>Informações</h3>
            </header>
            <!-- info -->
            <article class="info">
                <p class="input hidden">
                    <input type="text" name="id" pattern="[0-9]+" placeholder="Id">
                </p>
                <p class="input">
                    <input type="text" name="nome" minlength="5" pattern="[a-zA-ZÀ-ž\s\']+" placeholder="Nome" required>
                </p>
                <p class="input">
                    <textarea name="descricao" pattern="[a-zA-ZÀ-ž\s]+" minlength="10" placeholder="Descriçao" required></textarea>
                </p>
                <p class="input">
                    <select name="responsavel" required>
                        <option value="<?php echo $dados_res["id_res"] ?>">
                        <?php
                            $stmt_res = $responsavel->buscar($dados_res["id_res"]);
                            echo "<p>".$stmt_res["nom_res"]."</p>";
                        ?>
                        </option>
                    </select>
                </p>
                <p class="input">
                    <input type="text" name="carga" pattern="[0-9a-zA-ZÀ-ž\s]+" minlength="4" placeholder="Carga Horária" required>
                </p>
                <p class="input">
                    <input type="text" name="data" pattern="[0-9\/]+" minlength="5" maxlength="5" placeholder="Data" required>
                </p>
                <p class="input">
                    <input type="text" name="local" pattern="[0-9a-zA-ZÀ-ž\s]+" minlength="5" placeholder="Local" required>
                </p>
                <p class="input">
                    <input type="text" name="inicio" pattern="[0-9\:]+" minlength="5" maxlength="5" placeholder="Início" required>
                </p>
                <p class="input">
                    <input type="text" name="termino" pattern="[0-9\:]+" minlength="5" maxlength="5" placeholder="Término" required>
                </p>
            </article>
            <footer class="footer">
                <article class="btn-form">
                    <a class="btn-form edicao"><i class="material-icons">edit</i></a>
                </article>
                <article class="btn-form">
                    <input type="submit" value="">
                    <i class="material-icons">send</i>
                </article>
            </footer>
        </form>
    </section>

    <!-- NAV -->
    <section class="navbar">
        <!-- btn-nav -->
        <a class="btn-nav"><i class="material-icons">menu</i></a>
        <!-- menu -->
        <article class="menu">
            <h3>Menu</h3>
            <a class="aba home"><i class="material-icons">home</i>Home</a>
            <h3>Conta</h3>
            <a class="aba configuracoes"><i class="material-icons">settings</i>Configurações</a>
        </article>
        <article class="menu">
            <a class="aba leave" href="php/logout.php"><i class="material-icons">input</i>Sair</a>
        </article>
    </section>

    <!-- HEADER -->
    <header class="header">
        <h1>Área do Professor</h1>
    </header>

    <!-- DADOS -->
    <section class="dados">
        <p><i class="material-icons">perm_identity</i><?php echo $dados_res["nom_res"]?></p>
    </section>

    <!-- HOME -->
    <section class="container home">
        <!-- cadastro -->
        <?php
            $status_pales = $palestra->status();
            $status_pales = $status_pales["val_sta"] == 0 ? "desabilitado" : "";
        ?>
        <article class="cadastro <?php echo $status_pales?>">
            <p><i class="material-icons">add</i>Cadastrar palestra</p>
        </article>
        <!-- itens -->
        <article class="item">
            <h3>Encaminhados</h3>
            <?php
                $pales_enc = $palestra->listar_responsavel("Enc", $dados_res["id_res"]);
                foreach($pales_enc as $lista){
                    // itens
                    echo "<article class='itens' id='".$lista["id_pales"]."'>";
                    echo "<p>".$lista["nom_pales"]."</p>";
                    echo "</article>";
                };
            ?>
        </article>
        <article class="item">
            <h3>Aprovados</h3>
            <?php
                $pales_apr = $palestra->listar_responsavel("Apr", $dados_res["id_res"]);
                foreach($pales_apr as $lista){
                    // itens
                    echo "<article class='itens' id='".$lista["id_pales"]."'>";
                    echo "<p>".$lista["nom_pales"]."</p>";
                    echo "</article>";
                };
            ?>
        </article>
        <article class="item">
            <h3>Negados</h3>
            <?php
                $pales_neg = $palestra->listar_responsavel("Neg", $dados_res["id_res"]);
                foreach($pales_neg as $lista){
                    // itens
                    echo "<article class='itens' id='".$lista["id_pales"]."'>";
                    echo "<p>".$lista["nom_pales"]."</p>";
                    echo "</article>";
                };
            ?>
        </article>
    </section>

    <!-- CONFIGURACOES -->
    <section class="container configuracoes">
        <h3>Conta</h3>
        <form class="info" method="post" action="php/alterar_responsavel.php">
            <p class="input hidden">
                <input type="text" name="id" placeholder="Id" required>
            </p>
            <p class="input">
                <input type="text" name="nome" minlength="4" pattern="[a-zA-ZÀ-ž\s\']+" placeholder="Nome" required>
            </p>
            <p class="input">
                <input type="text" name="profissao" minlength="4" pattern="[a-zA-ZÀ-ž\s\']+" placeholder="Profissão" required>
            </p>
            <p class="input">
                <textarea name="descricao" pattern="[a-zA-ZÀ-ž\s]+" minlength="10" placeholder="Descriçao" required></textarea>
            </p>
            <p class="input">
                <input type="text" name="senha" minlength="5" placeholder="Senha" required>
            </p>
            <input type="submit" value="Alterar">
            </form>
    </section>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- JS -->
    <script src="js/pred.js"></script>
    <script src="js/tela_res.js"></script>
</body>
</html>