<?php
include '../php/conexao2.php';

session_start();

unset($_SESSION);


if (isset($_SESSION['Login_Emp'])) {
    echo "<script>window.location=\"../pags_emp/index_emp.php\";</script>";
} else {
    if (isset($_SESSION['Login_usu'])) {
        echo "<script>window.location=\"../pags_usu/index_usu.php\";</script>";
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
                <link href="img/favicon.ico" rel="shortcut icon" />

                <!-- Google Fonts -->
                <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

                <!-- Stylesheets -->
                <link href="../css/jquery.mobile-1.4.5.min.css" rel="stylesheet" type="text/css"/>
                <link rel="stylesheet" href="../css/bootstrap.min.css" />
                <link rel="stylesheet" href="../css/font-awesome.min.css" />
                <link rel= "stylesheet" href="../css/owl.carousel.css" />
                <link rel="stylesheet" href="../css/style.css" />
                <link rel="stylesheet" href="../css/animate.css" />
                <link href="../css/alinhar.css" rel="stylesheet" type="text/css"/>
                <link href="../css/borda.css" rel="stylesheet" type="text/css"/>
                <link href="../css/Card.css" rel="stylesheet" type="text/css"/>


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


                <!-- Hero section -->
                <section class="hero-section">
                    <div class="hero-slider owl-carousel">
                        <div class="hs-item set-bg" data-setbg="../img/img2.png">
                            <div class="hs-text">
                                <center>
                                    <p>&nbsp;</p>
                                    <div class="text-left" style="width: 26rem; ">
                                        <h3 class="text-center card-header border-black" style="color: #fff;">Entrar como cliente</h3>   
                                        <div class="card-body text-align-center">

                                            <form action="../php/validarLoginUsuario.php" method="post" name="Cadastro" >

                                                <div class=" col col-sm-12 col-md-12 text-white">
                                                    <label>E-mail</label>
                                                    <input class="form-control"  placeholder="Email" name="usuario" type="text" size="40" maxlength="45" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>


                                                </div>

                                                &ensp;


                                                <div class=" col col-sm-12 col-md-12 text-white">
                                                    <label>Senha</label>
                                                    <input class="form-control"  placeholder="Senha" name="senha" type="password" size="40" maxlength="45"  required="">


                                                </div>

                                                &ensp;


                                                <center>
                                                    <div class="text-center">
                                                        <h6 style="color: #fff;">Não possui uma conta? <a href="Cadastro_usu.php"  style="color: ">Cadastre-se!</a></h6>
                                                    </div>
                                                    &ensp;

                                                    <div  class="col col-sm-12 col-md-12 ">

                                                        <input name="btnlogin" type="submit" value="Login" class="btn btn-info "/>


                                                    </div>
                                                </center>




                                            </form>

                                            &ensp;



                                        </div>
                                    </div>
                                </center>

                                <p>&nbsp;</p>


                            </div>
                        </div>
                </section>
                <!-- Hero section end  
                <div class="text-center">
                                                <h6 style="color: #000;">Não possui uma conta? <a href="Cadastro_usu.php">Cadastre-se!</a></h6>
                                            </div>
                -->





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
                <script src="../js/jquery.min.js"></script>
                <script src="../js/jquery-3.2.1.min.js" ></script>
                <script src="../js/bootstrap.min.js" ></script>
                <script src="../js/owl.carousel.min.js" ></script>
                <script src="../js/jquery.marquee.min.js" ></script>
                <script src="../js/main.js" ></script>
                <script src="../js/jquery.mask.min.js" type="text/javascript"></script>
                <script src="../js/carregarCidades.js" type="text/javascript"></script>     
                <script src="../js/mascaras.js" type="text/javascript"></script>
                <script src="../js/ValidarCorText.js" type="text/javascript"></script>

            </body>

        </html>


        <?php
    }
}
?>