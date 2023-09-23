<?php
//Abrir conexão

include_once '../php/conexao2.php';


session_start();

if (!isset($_SESSION['Login_Emp_id'])) {

    echo "<script>window.location=\"../pags/Login_emp.php\";</script>";
} else {



$pesquisar = filter_input(INPUT_GET, 'pesquisa', FILTER_DEFAULT);

if (!empty($pesquisar)) {
    $resultado = $pdo->query("SELECT * FROM cliente WHERE cli_nome LIKE '%$pesquisar%'");
} else {
    $resultado = $pdo->query("SELECT * FROM cliente");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Head Hunters</title>
        <meta charset="UTF-8">
        <meta name="description" content="HeadHunters">
        <meta name="keywords" content="HeadHunters">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link href="../img/favicon.ico" rel="shortcut icon" />

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/font-awesome.min.css" />
        <link rel="stylesheet" href="../css/owl.carousel.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/animate.css" />

        <style type="text/css">
            #preloder {
                font-size: 18px;
            }

            #preloder {
                font-size: sd;
            }

            .page-section.recent-game-page.spad .row .col-lg-4.col-md-7.sidebar.pt-5.pt-lg-0 .widget-item table tr th table tr th div {
                font-family: "Arial Black", Gadget, sans-serif;
                font-size: 14px;
            }

            #preloder2 {
                font-size: 18px;
                font-family: "Arial Black", Gadget, sans-serif;
            }

            .page-section.recent-game-page.spad .row .col-lg-4.col-md-7.sidebar.pt-5.pt-lg-0 .widget-item table tr th div table tr th table tr th {
                color: #FF0000;
            }

            .page-section.recent-game-page.spad .row .col-lg-4.col-md-7.sidebar.pt-5.pt-lg-0 .widget-item table tr th div table tr #preloder2 {
                font-family: Tahoma, Geneva, sans-serif;
            }

            .page-section.recent-game-page.spad .row .col-lg-8 .row .col-md-6 .recent-game-item .rgi-content p {
                color: #000000;
            }
        </style>

    </head>

    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Header section -->
        <header class="header-section">
            <div class="container">
                <!-- logo -->
                <a class="site-logo" href="index.php">
                    <img src="../img/logo.png" alt="" width="190" height="36">
                </a>
                <!-- responsive -->
                <div class="nav-switch">
                    <i class="fa fa-bars"></i>
                </div>
                <nav class="main-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="projetos.php">Projetos</a></li>
                        <li><a href="usuarios.php">Clientes</a></li>                        
                        <li><a href="Perfil_emp.php">Meu perfil</a></li>					
                        <li><a href="sobre.php">Sobre</a></li>
                        <li><a href="contato.php">Contato</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <!-- Header section end -->

        <!-- Page info section -->
        <section class="page-info-section set-bg" data-setbg="../img/page-top-bg/1.jpg">
            <div class="pi-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 text-white">
                            <h2>Usuários</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <p>&nbsp;</p> 

        <!-- Page info section -->
        <section>
            <div class="container">
                <div class="widget-item">
                    <section class="row">
                        <div class="col-10">
                            <form class="search-widget" action="#">
                                <input type="text" name="pesquisa"  placeholder="Escreva o nome do projeto que deseja ver e pressione a tecla Enter">
                            </form>
                        </div>
                        <div class="col-2">
                            <form class="search-widget" action="usuarios.php">
                                <input type="submit" class="text-center" style="font-size: 16px; text-align: center" value="Limpar pesquisa"/>
                            </form>
                        </div>
                    </section>
                </div>             
            </div>
        </section>

        <!-- Page section -->
        <section class="page-section recent-game-page spad">
            <div class="container">
                <?php
                while ($rowCli = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $estado = $pdo->query("SELECT * FROM estado WHERE est_id = " . $rowCli['cli_id_estado']);
                    $cidade = $pdo->query("SELECT * FROM cidade  WHERE cid_id = " . $rowCli['cli_id_cidade']);
                    $genero = $pdo->query("SELECT * FROM genero WHERE sexo_id = " . $rowCli['cli_id_genero']);
                    while ($rowEst = $estado->fetch(PDO::FETCH_ASSOC)) {
                        while ($rowCid = $cidade->fetch(PDO::FETCH_ASSOC)) {
                            while ($rowGen = $genero->fetch(PDO::FETCH_ASSOC)) {
                                ?> 
                                <div class="row">
                                    <div class="col-lg-12 card">
                                        <div class="card-title text-center">
                                            <br>
                                            <h3><?= $rowCli['cli_nome'] ?></h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="recent-game-item">
                                                    <div class="container text-center">

                                                        <img src="../img/users/<?= $rowCli['cli_img'] ?>" class="img-fluid img-thumbnail card-img">
                                                        <hr>
                                                        <a href="perfil_usu.php?cli_id=<?= $rowCli['cli_id'] ?>" class="btn btn-info">Acessar perfil do usuário</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="recent-game-item card-title">

                                                    <h5 style="color: #000000">Estado</h5>
                                                    <h6 style="color: #495057"><?= $rowEst['est_sigla'] ?> - <?= $rowEst['est_uf'] ?></h6>
                                                    <hr>
                                                    <h5 style="color: #000000">Cidade</h5>
                                                    <h6 style="color: #495057"><?= $rowCid['cid_nome'] ?></h6>
                                                    <hr>
                                                    <h5 style="color: #000000">Gênero</h5>
                                                    <h6 style="color: #495057"><?= $rowGen['sexo_opcao'] ?></h6>                                              
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <?php
                            }
                        }
                    }
                }
                ?>

            </div>

        </section>

        <!-- Page section end -->


        <!-- Footer section -->
        <footer class="footer-section">
            <section class="row">
                <div class="container">
                    <div class="col-md-12">
                        <h6 class="text-white text-center">
                            <span>Headhunters© Copyright 2019</span>
                        </h6>
                        <hr>
                        <p class="text-white text-center">
                            Todos os direitos reservados
                        </p>
                    </div>
                </div>
            </section>
        </footer>
        <!-- Footer section end -->


        <!--====== Javascripts & Jquery ======-->
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/jquery.marquee.min.js"></script>
        <script src="../js/main.js"></script>
    </body>

</html>

<?php

}

?>