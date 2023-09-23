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
        
    
$pesquisar = filter_input(INPUT_GET, 'pesquisa', FILTER_DEFAULT);

if (!empty($pesquisar)) {
    $resultado = $pdo->query("SELECT * FROM video WHERE vid_titulo LIKE '%$pesquisar%'");
} else {
    $resultado = $pdo->query("SELECT * FROM video");
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
        <!-- Header section end -->



        <section class="page-info-section set-bg" data-setbg="../img/page-top-bg/3.jpg">
            <div class="pi-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 text-white">
                            <h2>Videos Recentes</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <p>&nbsp;</p> 
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
                            <form class="search-widget" action="projetos.php">
                                <input type="submit" class="text-center" style="font-size: 16px; text-align: center" value="Limpar pesquisa"/>
                            </form>
                        </div>
                    </section>
                </div>             
            </div>
        </section>
        <!-- Page info section -->
        <section class="page-section recent-game-page spad">
            <div class="container">
                <section class="row">
                    <?php
                    while ($rowVid = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        $categoria = $pdo->query("SELECT * FROM categoria WHERE cat_id = " . $rowVid['vid_cat_id']);
                        while ($rowCat = $categoria->fetch(PDO::FETCH_ASSOC)) {
                            $data = $rowVid['vid_dataenvio'];
                            $dataForm = implode("/",array_reverse(explode("-",$data)));
                            ?>
                            <div class="col-md-6">
                                <div class="recent-game-item text-center">
                                    <div class="rgi-thumb set-bg" data-setbg="../img/thumb/<?= $rowVid['vid_imagem'] ?>">
                                    </div>
                                    <div class="rgi-content">
                                        <h4 style="color: #000"><a href="video.php?vid_id=<?= $rowVid['vid_id'] ?>" style="color: #0056b3;"><?= $rowVid['vid_titulo'] ?></a></h4>
                                        <p style="color: #333"><?= $rowVid['vid_subtit'] ?></p>
                                        <hr>
                                        <p style="color: #333">Postado em <?php echo $dataForm; ?></p>
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
        <!-- Page info section -->


        <!-- Page section -->

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
}
?>