<?php
//Abrir conexão

include_once '../php/conexao2.php';


session_start();

unset($_SESSION);

if (isset($_SESSION['Login_Emp'])) {

    echo "<script>window.location=\"../pags_emp/index_emp.php\";</script>";
} else {

    if (isset($_SESSION['Login_usu'])) {

        echo "<script>window.location=\"../pags_usu/index_usu.php\";</script>";
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
                <a class="site-logo" href="../index.php">
                    <img src="../img/logo.png" alt="" width="190" height="36">
                </a>




                <!-- responsive -->


                <div class="nav-switch">
                    <i class="fa fa-bars"></i>
                </div>

                <nav class="main-menu">
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Entrar</a></li>        
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="projetos.php">Projetos</a></li>
                        <li><a href="sobre.php">Sobre</a></li>
                        <li><a href="contato.php">Contato</a></li>        
                    </ul>
                </nav>
            </div>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">

                        <div class="container">
                            <div class="row">   

                                <div class="col-lg-6 col-md-12 p-0">    
                                    <div class="container">

                                    </div>

                                    <div class="feature-item set-bg" data-setbg="../img/tournament/1.jpg">  
                                        <div class="fi-content text-white">



                                            <a href="Login_usu.php"><button type="button" class="btn btn-outline-light">Entrar como cliente</button></a>

                                        </div>
                                    </div>
                                </div>                                    

                                <div class="col-lg-6 col-md-12 p-0">   
                                    <div class="container">
                                    </div>

                                    <div class="feature-item set-bg" data-setbg="../img/tournament/2.jpg">
                                        <div class="fi-content text-white">


                                            <a href="Login_emp.php"><button type="button" class="btn btn-outline-light">Entrar como empresa</button></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        <!-- Page info section -->
        <?php
        while ($rowVid = $video->fetch(PDO::FETCH_ASSOC)) {
            $categoria = $pdo->query("SELECT * FROM categoria WHERE cat_id = " . $rowVid['vid_cat_id']);
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
                                </div>

                                <div class="card-body">
                                    <div class="card-text text-justify">
                                        <h5 style="color: #062c33;" class="text-left">Escola: <strong><?= $rowVid['vid_escola'] ?></strong></h5>
                                        <hr>
                                        <h5 style="color: #062c33;" class="text-left">Professor(a) orientador(a): <strong><?= $rowVid['vid_orientador'] ?></strong></h5>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </section>
                <?php
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
}
?>