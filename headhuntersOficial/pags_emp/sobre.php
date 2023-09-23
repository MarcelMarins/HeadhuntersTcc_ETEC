
<?php

include_once '../php/conexao2.php';

session_start();

if (!isset($_SESSION['Login_Emp_id'])) {

    echo "<script>window.location=\"../pags/Login_emp.php\";</script>";
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
        <section class="page-info-section set-bg" data-setbg="../img/page-top-bg/4.jpg">
            <div class="pi-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 text-white">
                            <h2>Sobre</h2>
                            <p>Uma plataforma com o objetivo de divulgar projetos de TCC’s e deixa-los de fácil acesso à empresas, que
                                poderão visualiza-los e julgar o projeto (ou os desenvolvedores do mesmo) se eles possuem potencial.
                                Facilitando o contato entre os desenvolvedores e a empresa, a plataforma terá o intuito de ser uma grande
                                ajuda aos alunos desenvolvedores do projeto, complementando assim, o conceito do currículo.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="tournaments-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tournament-item mb-4 mb-lg-0">
                            <div class="ti-notic" style="background: #4ecbe3;">Clientes</div>
                            <div class="ti-content">
                                <div class="ti-thumb set-bg" data-setbg="../img/tournament/1.jpg"></div>
                                <div class="ti-text">
                                    <ul>
                                        <li>- O usuário terá um perfil para postar o seu projeto de conclusão de curso,
                                            passando as informações do projeto.
                                        </li>
                                        <li>- O usuário postará alguns de seus dados pessoais, mas só aparecerá para as empresas cadastradas
                                            no site.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="tournament-item">
                            <div class="ti-notic"  style="background: #4ecbe3;">Empresas</div>
                            <div class="ti-content">
                                <div class="ti-thumb set-bg" data-setbg="../img/tournament/2.jpg"></div>
                                <div class="ti-text">
                                    <ul>
                                        <li>- A empresa criará um perfil para poder procurar os talentos.</li>
                                        <li> - A empresa poderá entrar em contato com os usuários que postam os vídeos de seus projetos para
                                            adquirir mais informações e entrar em contato com eles.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- Page info section -->

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