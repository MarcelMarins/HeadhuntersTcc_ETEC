<?php
//Abrir conexão

include_once '../php/conexao2.php';


session_start();

if (!isset($_SESSION['Login_Emp_id'])) {

    echo "<script>window.location=\"../pags/Login_emp.php\";</script>";
} else {



$vid_id = $_GET['vid_id'];

$video = $pdo->query("SELECT * FROM video WHERE vid_id = " . $vid_id);
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

        <!-- Page info section -->
        <?php
        while ($rowVid = $video->fetch(PDO::FETCH_ASSOC)) {
            $cliente = $pdo->query("SELECT * FROM cliente WHERE cli_id = " . $rowVid['vid_cli_id']);
            $categoria = $pdo->query("SELECT * FROM categoria WHERE cat_id = " . $rowVid['vid_cat_id']);
            while ($rowCli = $cliente->fetch(PDO::FETCH_ASSOC)) {
                $estado = $pdo->query("SELECT * FROM estado WHERE est_id = " . $rowCli['cli_id_estado']);
                $cidade = $pdo->query("SELECT * FROM cidade  WHERE cid_id = " . $rowCli['cli_id_cidade']);
                $genero = $pdo->query("SELECT * FROM genero WHERE sexo_id = " . $rowCli['cli_id_genero']);

                while ($rowEst = $estado->fetch(PDO::FETCH_ASSOC)) {
                    while ($rowCid = $cidade->fetch(PDO::FETCH_ASSOC)) {
                        while ($rowGen = $genero->fetch(PDO::FETCH_ASSOC)) {
                            while ($rowCat = $categoria->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <section class="page-section single-blog-page spad">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="blog-content">
                                                    <h3 class="text-center"><?= $rowVid['vid_titulo'] ?></h3>
                                                    <h6 class="text-center" style="color: #062c33;"><?= $rowVid['vid_subtit'] ?></h6>
                                                    <hr>
                                                    <div class="meta-comment text-center"><?= $rowCat['cat_nome'] ?></div>                                    
                                                    <div class="img-fluid" style="text-align: center"><iframe src="https://www.youtube.com/embed/<?= $rowVid['vid_linkyt'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width:100%; height: 500px"></iframe></div>
                                                    &nbsp;
                                                    <p style="color: #062c33;" class="text-justify"><?= $rowVid['vid_descricao'] ?></p> 


                                                </div>

                                                <h4 class="card-header text-center">Sobre a equipe</h4>          
                                                <div class="card-body">
                                                    <div class="card-text text-justify">
                                                        <p style="color: #545b62;"><?= $rowVid['vid_equipe'] ?></p>
                                                        <hr>
                                                        <h5 style="color: #062c33;" class="text-left">Escola: <strong><?= $rowVid['vid_escola'] ?></strong></h5>
                                                        <hr>
                                                        <h5 style="color: #062c33;" class="text-left">Professor(a) orientador(a): <strong><?= $rowVid['vid_orientador'] ?></strong></h5>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="container">
                                            <hr>
                                            &nbsp;
                                            <h4 class="card-header text-center">Perfil do cliente</h4>  
                                            <div class="col-lg-12 card">
                                                <div class="card-title text-center">
                                                    &nbsp;
                                                    <a href="perfil_usu.php?cli_id=<?= $rowVid['vid_cli_id'] ?>"><h3 style="color: #0062cc;"><?= $rowCli['cli_nome'] ?></h3></a>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="recent-game-item">
                                                            <div class="container text-center">
                                                                <img src="../img/users/<?= $rowCli['cli_img'] ?>" class="img-fluid img-thumbnail card-img">
                                                                <hr>


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
                                    </div>
                                </section>
                                <?php
                            }
                        }
                    }
                }
            }
        }
        ?>
        <!-- Page section end -->


        <!-- Footer top section -->
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
        <!-- Footer top section end -->

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