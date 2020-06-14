<?php
    session_start();

    header ("Content-type: text/html; charset=UTF-8");

    require_once "php/conexao.php";
    require_once "php/palestra.php";
    require_once "php/responsavel.php";
    require_once "php/administrador.php";

    $palestra = new Palestra($conexao);

    if(!isset($_SESSION["dados"])){
        header("location: login_adm.html");
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
    <link rel="stylesheet" type="text/css" href="css/tela_adm.css" />

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
        <!-- PALESTRA -->
        <form class="modal modal-palestra" method="post" action="php/alterar_palestra.php">
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
                        <option value="" selected disabled></option>
                        <?php
                            $responsavel = new Responsavel($conexao);
                            $stmt_res = $responsavel->listar();
                            foreach($stmt_res as $lista){
                                echo "<option value=".$lista["id_res"].">";
                                echo $lista["nom_res"];
                                echo "</option>";
                            }
                        ?>
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
        <!-- CHAMADA -->
        <form class="modal modal-chamada" action="php/efetuar_chamada.php" method="post">
            <header class="header">
                <h3>Realizar chamada?</h3>
            </header>
            <article class="info">
                <p class="input hidden">
                    <input type="text" name="id" pattern="[0-9]+" placeholder="Id">
                </p>
                <p>Certeza que deseja realizar a chamada da <br><span>Nome</span></p>
            </article>
            <input type="submit" value="Sim">
        </form>
        <!-- LISTA - PALESTRANTE -->
        <form class="modal modal-palestrante" action="php/cadastro_responsavel.php" method="post">
            <header class="header">
                <h3>Palestrante</h3>
            </header>
            <article class="info">
                <p class="input">
                    <input type="text" name="nome" minlength="4" pattern="[a-zA-ZÀ-ž\s\']+" placeholder="Nome" required>
                </p>
                <p class="input">
                    <input type="text" name="profissao" minlength="4" pattern="[a-zA-ZÀ-ž\s\']+" placeholder="Profissão" required>
                </p>
                <p class="input">
                    <textarea name="descricao" pattern="[a-zA-ZÀ-ž\s]+" minlength="10" placeholder="Descriçao" required></textarea>
                </p>
            </article>
            <input type="submit" value="Cadastrar">
        </form>
        <!-- CONFIGURAÇÕES -->
        <!-- cadastro -->
        <form class="modal modal-configuracoes cadastro" action="php/cadastro_administrador.php" method="post">
            <header class="header">
                <h3>Administrador</h3>
            </header>
            <article class="info">
                <p class="input">
                    <input type="text" name="nome" minlength="4" maxlength="10" pattern="[a-zA-ZÀ-ž]+" placeholder="Nome" required>
                </p>
                <p class="input">
                    <input type="text" name="senha" minlength="4" maxlength="25" placeholder="Senha" required>
                </p>
            </article>
            <input type="submit" value="Cadastrar">
        </form>
        <!-- edicao -->
        <form class="modal modal-configuracoes edicao" action="php/alterar_administrador.php" method="post">
            <header class="header">
                <h3>Administrador</h3>
            </header>
            <article class="info">
                <p class="input hidden">
                    <input type="text" name="id" pattern="[0-9]+" placeholder="Id">
                </p>
                <p class="input">
                    <input type="text" name="nome" minlength="4" maxlength="10" pattern="[a-zA-ZÀ-ž]+" placeholder="Nome" required>
                </p>
                <p class="input">
                    <input type="text" name="senha" minlength="4" maxlength="25" placeholder="Senha" required>
                </p>
            </article>
            <input type="submit" value="Editar">
        </form>
    </section>

    <!-- NAV -->
    <section class="navbar">
        <!-- btn-nav -->
        <a class="btn-nav"><i class="material-icons">menu</i></a>
        <!-- menu -->
        <article class="menu">
            <h3>Menu</h3>
            <a class="aba inicial"><i class="material-icons">home</i>Inicial</a>
            <h3>Palestras</h3>
            <a class="aba cadastrar"><i class="material-icons">add</i>Cadastrar</a>
            <a class="aba chamada"><i class="material-icons">done_all</i>Chamada</a>
            <h3>Professores</h3>
            <a class="aba lista"><i class="material-icons">list</i>Lista</a>
            <h3>Conta</h3>
            <a class="aba configuracoes"><i class="material-icons">settings</i>Configurações</a>
        </article>
        <article class="menu">
            <a class="aba leave" href="php/logout.php"><i class="material-icons">input</i>Sair</a>
        </article>
    </section>

    <!-- HEADER -->
    <section class="header">
        <h1>Área do Administrador</h1>
    </section>

    <!-- INICIAL -->
    <section class="container inicial">
        <!-- status -->
        <article class="status">
            <h4>Cadastro de palestra</h4>
            <!-- btn-status -->
            <div class="btn-status">
                <?php
                    $status_pales = $palestra->status();
                    if($status_pales["val_sta"] == 1 ){
                        echo "<input type='checkbox' name='status' id='status' checked>";
                    } else{
                        echo "<input type='checkbox' name='status' id='status'>";
                    }
                ?>
                <label for="status"></label>
            </div>
        </article>

        <!-- item -->
        <article class="item">
            <h3>Encaminhados</h3>
            <?php
                $pales_enc = $palestra->listar("Enc");
                foreach($pales_enc as $lista){
                    // itens
                    echo "<article class='itens' id='".$lista["id_pales"]."'>";
                    echo "<p>".$lista["nom_pales"]."</p>";
                    echo "<article class='opcoes'>";
                    echo "<a class='btn negar'><i class='material-icons'>clear</i></a>";
                    echo "<a class='btn aprovar'><i class='material-icons'>check</i></a>";
                    echo "</article>";
                    echo "</article>";
                    
                };
            ?>
        </article>
        <article class="item">
            <h3>Aprovados</h3>
            <?php
                $pales_apr = $palestra->listar("Apr");
                foreach($pales_apr as $lista){
                    // itens
                    echo "<article class='itens' id='".$lista["id_pales"]."'>";
                    echo "<p>".$lista["nom_pales"]."</p>";
                    echo "<article class='opcoes'>";
                    echo "<a class='btn negar'><i class='material-icons'>clear</i></a>";
                    echo "</article>";
                    echo "</article>";
                };
            ?>
        </article>
        <article class="item">
            <h3>Negados</h3>
            <?php
                $pales_neg = $palestra->listar("Neg");
                foreach($pales_neg as $lista){
                    // itens
                    echo "<article class='itens' id='".$lista["id_pales"]."'>";
                    echo "<p>".$lista["nom_pales"]."</p>";
                    echo "<article class='opcoes'>";
                    echo "<a class='btn aprovar'><i class='material-icons'>check</i></a>";
                    echo "</article>";
                    echo "</article>";
                };
            ?>
        </article>
    </section>

    <!-- CADASTRAR -->
    <section class="container cadastrar">
        <h3>Cadastro</h3>
        <form class="info" action="php/cadastro_palestra.php" method="post">
            <p class="input">
                <input type="text" name="nome" minlength="5" pattern="[a-zA-ZÀ-ž\s\']+" required>
                <label for="">Nome</label>
            </p>
            <p class="input">
                <textarea name="descricao" minlength="10" pattern="[a-zA-ZÀ-ž\s]+" required></textarea>
                <label for="">Descrição</label>
            </p>
            <p class="input">
                <select name="responsavel">
                    <option value="" selected disabled>Responsável</option>
                    <?php
                        $responsavel = new Responsavel($conexao);
                        $stmt_res = $responsavel->listar();
                        foreach($stmt_res as $lista){
                            echo "<option value=".$lista["id_res"].">";
                            echo "<p>".$lista["nom_res"]."</p>";
                            echo "</option>";
                        }
                    ?>
                </select>
            </p>
            <p class="input">
                <input type="text" name="carga" maxlength="2" pattern="[0-9]+" title="Somente Números" required>
                <select name="tempo">
                    <option value="hora s" selected>Hora(s)</option>
                    <option value="minuto s">Minuto(s)</option>
                </select>
                <label for="">Carga Horária</label>
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
                <input type="text" name="local" minlength="5" pattern="[a-zA-ZÀ-ž0-9\s]+" required>
                <label for="">Local</label>
            </p>
            <p class="input">
                <input type="text" name="inicio" minlength="5" maxlength="5" pattern="[0-9\:]+" required>
                <label for="">Inicio</label>
            </p>
            <p class="input">
                <input type="text" name="termino" minlength="5" maxlength="5" pattern="[0-9\:]+" required>
                <label for="">Término</label>
            </p>
            <input type="submit" value="Cadastrar">
        </form>
    </section>

    <!-- CHAMADA -->
    <section class="container chamada">
        <h3>Chamada</h3>
        <article class="lista">
            <?php
                $pales_apr = $palestra->listar("Apr");
                foreach($pales_apr as $lista){
                    // itens
                    echo "<article class='itens' id='".$lista["id_pales"]."'>";
                    echo "<p class='nome'>".$lista["nom_pales"]."</p>";
                    echo "</article>";
                };
            ?>
        </article>
    </section>

    <!-- LISTA -->
    <section class="container lista">
        <h3>Palestrantes</h3>
        <article class="cadastro">
            <p><i class="material-icons">add</i>Cadastrar palestrante</p>
        </article>
        <article class="info">
            <?php
                $responsavel = new Responsavel($conexao);
                $stmt_res = $responsavel->listar();
                foreach($stmt_res as $lista){
                    echo "<article class='itens' id=".$lista["id_res"].">";
                    echo "<article class='info'>";
                    echo "<header class='header'>";
                    echo "<h4>Informações</h4>";
                    echo "</header>";
                    echo "<p>".$lista["nom_res"]."</p>";
                    echo "<p>".$lista["pro_res"]."</p>";
                    echo "<p>".$lista["des_res"]."</p>";
                    echo "</article>";
                    echo "<article class='info'>";
                    echo "<header class='header'>";
                    echo "<h4>Palestras</h4>";
                    $lista_res = $palestra->listar_responsavel("Apr", $lista["id_res"]);
                    echo "</header>";
                    foreach($lista_res as $lista){
                        echo "<p>".$lista["nom_pales"]."</p>";
                    }
                    echo "</article>";
                    echo "</article>";
                }
            ?>
        </article>
    </section>
    
    <!-- CONFIGURAÇÕES -->
    <section class="container configuracoes">
        <h3>Administradores</h3>
        <article class="cadastro">
            <p><i class="material-icons">add</i>Cadastrar Administrador</p>
        </article>
        <article class="info">
            <?php
                $admin = new Administrador($conexao);
                $lista_adm = $admin->listar();
                foreach($lista_adm as $lista){
                    echo "<article class='itens' id=".$lista["id_adm"].">";
                    echo "<p>".ucfirst($lista["nom_adm"])."</p>";
                    echo "</article>";
                }
            ?>
        </article>
    </section>
</body>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- JS -->
    <script src="js/pred.js"></script>
    <script src="js/tela_adm.js"></script>
</html>