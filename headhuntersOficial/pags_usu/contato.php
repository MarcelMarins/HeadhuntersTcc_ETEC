<?php

include_once '../php/conexao2.php';

session_start();

if (!isset($_SESSION['Login_usu_id'])) {
    echo "<script>window.location=\"../pags/Login_usu.php\";</script>";
} else {

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

                <!-- site menu -->
                <nav class="main-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="projetos.php">Projetos</a></li>
                        <li><a href="upload.php">Enviar vídeos</a></li>
                        <li><a href="perfil_usu.php">Meu perfil</a></li>
                        <li><a href="sobre.php">Sobre</a></li>                
                        <li><a href="contato.php">Contato</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <!-- Header section end -->

        <!-- Page info section -->
        <section class="page-info-section set-bg" data-setbg="../img/page-top-bg/5.jpg">
            <div class="pi-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 text-white">
                            <p>
                            <h3>Contato com Head Hunters</h3>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page info section -->


        <!-- Page section -->
        <section class="page-section spad contact-page">
            <div class="container">
                <section class="page-section review-page spad">
                    <div class="container">
                        <form name="form" method="POST" action="../php/insertContatoUsu.php"  enctype="multipart/form-data">
                            <div class="form-row card-body">
                                <div class="form-group col-md-6">
                                    <label>Assunto</label>
                                    <input type="text" class="form-control" name="assunto" value="" style="height: 50px">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="" style="height: 50px">
                                </div>
                                <section class="row">
                                    <div class="form-group col-md-12">  
                                        <label>Mensagem</label>
                                        <textarea class="form-control" name="msg" rows="8" cols="500"></textarea>           
                                    </div>
                                    
                                    <div class="form-group col-3">
                                        <input type="submit" class="btn btn-info btn-block text-align-right" value="Enviar">	
                                    </div>  
                                </section>
                            </div>
                        </form> 
                    </div>
                </section>
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


        <!-- load for map -->
        <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWTIlluowDL-X4HbYQt3aDw_oi2JP0Krc&sensor=false"></script>
        <script src="../js/map.js"></script>

    </body>

</html>

<?php



}


?>