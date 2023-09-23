<?php
//Abrir conexão

include_once '../php/conexao2.php';


session_start();

if (!isset($_SESSION['Login_Emp_id'])) {

    echo "<script>window.location=\"../pags/Login_emp.php\";</script>";
} else {



$cli_id = $_GET['cli_id'];

$resultado = $pdo->query("SELECT * FROM cliente WHERE cli_id = $cli_id");

$rowVideosUsu = $pdo->query("SELECT * FROM video WHERE vid_cli_id = $cli_id");
?>
﻿<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Head Hunters</title>
        <meta charset="UTF-8">
        <meta name="description" content="HeadHunters">
        <meta name="keywords" content="HeadHunters">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="shortcut icon" />

        <!-- fontes -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/font-awesome.min.css" />
        <link rel="stylesheet" href="../css/owl.carousel.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/animate.css" />

    </head>

    <body>
        <!--Carregador da pagina-->
        <div id="preloder">
            <div class="loader"></div>
        </div>
        <!--fim Carregador-->

        <!--Header-->
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
        <!--fim Header-->

        <section class="page-info-section set-bg" data-setbg="../img/slider-1.jpg">
            <div class="pi-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 text-white">
                            <h2>Perfil</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <!-- Hero section -->


        <section class="page-section review-page spad">
            <div class="container">
                <?php
                while ($rowCli = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $estado = $pdo->query("SELECT * FROM estado WHERE est_id = " . $rowCli['cli_id_estado']);
                    $cidade = $pdo->query("SELECT * FROM cidade  WHERE cid_id = " . $rowCli['cli_id_cidade']);
                    $genero = $pdo->query("SELECT * FROM genero WHERE sexo_id = " . $rowCli['cli_id_genero']);
                    while ($rowEst = $estado->fetch(PDO::FETCH_ASSOC)) {
                        while ($rowCid = $cidade->fetch(PDO::FETCH_ASSOC)) {
                            while ($rowGen = $genero->fetch(PDO::FETCH_ASSOC)) {

                                function formataTelefone($numero) {
                                    if (strlen($numero) == 10) {
                                        $novo = substr_replace($numero, '(', 0, 0);
                                        $novo = substr_replace($novo, '9', 3, 0);
                                        $novo = substr_replace($novo, ')', 3, 0);
                                    } else {
                                        $novo = substr_replace($numero, '(', 0, 0);
                                        $novo = substr_replace($novo, ')', 3, 0);
                                    }
                                    return $novo;
                                }
                                
                                $num = $rowCli['cli_celular'];
                                
                                $numeroFormatado = formataTelefone($num);

                                $data = $rowCli['cli_data_nasc'];
                                $dataForm = implode("/", array_reverse(explode("-", $data)));

                                $nbr_cpf = $rowCli['cli_cpf'];

                                $parte_um = substr($nbr_cpf, 0, 3);
                                $parte_dois = substr($nbr_cpf, 3, 3);
                                $parte_tres = substr($nbr_cpf, 6, 3);
                                $parte_quatro = substr($nbr_cpf, 9, 2);

                                $cpfCompleto = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";
                                ?> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <br>
                                        <img class="card-img-top img-fluid img-thumbnail" src="../img/users/<?= $rowCli['cli_img'] ?>" alt="Foto de perfil">
                                        <br>
                                        <hr>
                                        <div class="card-body">
                                            <h4 class="card-title" style="color: black; text-align: center"><?= $rowCli['cli_nome'] ?></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="recent-game-item card-body">                           
                                            <h5 style="color: #000000">Estado</h5>
                                            <h6 style="color: #495057"><?= $rowEst['est_sigla'] ?> - <?= $rowEst['est_uf'] ?></h6>
                                            <hr>
                                            <h5 style="color: #000000">Cidade</h5>
                                            <h6 style="color: #495057"><?= $rowCid['cid_nome'] ?></h6>
                                            <hr>
                                            <h5 style="color: #000000">Gênero</h5>
                                            <h6 style="color: #495057"><?= $rowGen['sexo_opcao'] ?></h6>                             
                                            <hr>
                                            <h5 style="color: #000000">Data de nascimento</h5>
                                            <h6 style="color: #495057"><?php echo $dataForm; ?></h6>                             
                                            <hr>
                                            <h5 style="color: #000000">Email</h5>
                                            <h6 style="color: #495057"><?= $rowCli['cli_email'] ?></h6>                              
                                            <hr>
                                            <h5 style="color: #000000">CPF</h5>
                                            <h6 style="color: #495057"><?php echo $cpfCompleto; ?></h6>  
                                            <hr>
                                            <h5 style="color: #000000">Número</h5>
                                            <h6 style="color: #495057"><?php echo $numeroFormatado; ?></h6>  
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                }
                ?>
            </div>
        </section>
        <!-- Fim Hero section -->
        <div class="container">
            <h3 class="text-center">Vídeos deste usuário</h3>
            <hr>
        </div>

        <section class="page-section recent-game-page spad">
            <div class="container">
                <section class="row">
                    <?php
                    while ($rowVid = $rowVideosUsu->fetch(PDO::FETCH_ASSOC)) {
                        $categoria = $pdo->query("SELECT * FROM categoria WHERE cat_id = " . $rowVid['vid_cat_id']);
                        while ($rowCat = $categoria->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <div class="col-md-6">
                                <div class="recent-game-item text-center">
                                    <div class="rgi-thumb set-bg" data-setbg="../img/thumb/<?= $rowVid['vid_imagem'] ?>">
                                    </div>
                                    <div class="rgi-content">
                                        <h4 style="color: #000"><a href="video.php?vid_id=<?= $rowVid['vid_id'] ?>" style="color: #0056b3;"><?= $rowVid['vid_titulo'] ?></a></h4>
                                        <p style="color: #333"><?= $rowVid['vid_subtit'] ?></p>
                                        <hr>
                                        <p style="color: #333">Postado em <?= $rowVid['vid_dataenvio'] ?></p>
                                        <h6 style="color: #000"><strong><?= $rowCat['cat_nome'] ?></strong></h6>

                                    </div>
                                </div>
                            </div>	
                            <?php
                        }
                    }
                    ?>
                </section> 
            </div>
        </section>

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