<?php
include './php/conexao2.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Head Hunters</title>
        <meta charset="UTF-8">
        <meta name="description" content="Game Warrior Template">
        <meta name="keywords" content="warrior, game, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="shortcut icon" />

        <!-- fontes -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/owl.carousel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/animate.css" />
        <link rel="stylesheet" href="sass/style.scss" />
        <link href="css/slider.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        <header class="header-section">
            <div class="container">
                <!-- logo -->
                <a class="site-logo" href="index.php">
                    <img src="img/logo.png" alt="" width="190" height="36">
                </a>




                <!-- responsive -->


                <div class="nav-switch">
                    <i class="fa fa-bars"></i>
                </div>

                <nav class="main-menu">
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Entrar</a></li>        
                        <li><a href="#">Home</a></li>
                        <li><a href="pags/projetos.php">Projetos</a></li>
                        <li><a href="pags/sobre.php">Sobre</a></li>
                        <li><a href="pags/contato.php">Contato</a></li>        
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

                                    <div class="feature-item set-bg" data-setbg="img/tournament/1.jpg">  
                                        <div class="fi-content text-white">



                                            <a href="pags/Login_usu.php"><button type="button" class="btn btn-outline-light">Entrar como cliente</button></a>

                                        </div>
                                    </div>
                                </div>                                    

                                <div class="col-lg-6 col-md-12 p-0">   
                                    <div class="container">
                                    </div>

                                    <div class="feature-item set-bg" data-setbg="img/tournament/2.jpg">
                                        <div class="fi-content text-white">


                                            <a href="pags/Login_emp.php"><button type="button" class="btn btn-outline-light">Entrar como empresa</button></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>  




        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/slider-1.jpg" alt="Primeiro Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="hs-text">
                            <h4 style="text-align: center; color: #ffffff;">
                                O Head Hunters foi criado para facilitar a vida dos jovens que ainda não conseguiram arrumar um emprego fixo, e que desejam ter uma oportunidade para conseguir trabalhar naquilo em que estão buscando especialização, com isso o aluno terá a oportunidade de mostrar o que é realmente capaz de fazer.
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/slider-2.jpg" alt="Segundo Slide">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="hs-text">
                            <h4 style="text-align: center; color: #ffffff;">
                                O Head Hunters está olhando o lado das empresas, grandes ou pequenas que estão procurando profissionais jovens que terão muito tempo de trabalho pela frente, e que suprem as suas necessidades da maneira mais rápida e produtiva possível.
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>



        <!--fim Slide-->


        <!-- Recursos -->

        <div class="hs-item set-bg" data-setbg="img/review-bg.png">
            <section class="feature-section spad">
                <div class="container">
                    <h2 class="text-center card-header border-black" style="color: #000;">Um pouco sobre nós</h2>   
                    <div class="row"> 
                        <div class="col-lg-12 col-md-6">
                            <div class="feature-item set-bg" data-setbg="img/img3.jpg">
                                <div class="fi-content text-white">
                                    <section class="row">
                                        <div class="col-md-6 sm-md-12">
                                            <h4>Nosso objetivo</h4>
                                            <p class="text-justify" style="font-size: 18px">
                                                O <strong>Headhunters</strong> é um sistema web desenvolvido para ser a ponte entre as empresas que necessitam de novos funcionários e os usuários que procuram emprego. O trabalho de conclusão de curso (TCC) pode ser um ótimo portfólio de entrada ao mercado de trabalho para um aluno que está cursando o ensino técnico ou uma faculdade.
                                            </p>
                                        </div>
                                        <div class="col-md-6 sm-md-6">
                                            <div class="container text-center">
                                                <img src="img/img1.jpg" class="img-fluid img-thumbnail" style="height: 300px; width: 1000px;" alt=""/>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </section>
        </div>

        <div class="hs-item set-bg" data-setbg="img/img9.jpg">
            <section class="feature-section spad">
                <div class="container">
                    <h2 class="text-center card-header border-white" style="color: #fff;">Alguns tipos de tcc's</h2>   
                    <hr>
                    <div class="row"> 
                        <div class="col-lg-4 col-md-6 p-0">
                            <div class="feature-item set-bg" data-setbg="img/features/2.jpg">
                                <div class="fi-content text-white">
                                    <h4>Aplicativos mobile</h4><br>
                                    <p class="text-justify">
                                        Um aplicativo mobile, conhecido normalmente por seu nome abreviado app, é um software desenvolvido para ser instalado em um dispositivo eletrônico móvel, como um PDA, telefone celular, smartphone ou um leitor de MP3. Esta aplicação pode ser instalada no dispositivo.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 p-0">
                            <div class="feature-item set-bg" data-setbg="img/features/1.jpg">
                                <div class="fi-content text-white">
                                    <h4><a href="#">Desenvolvimento web</a></h4><br>
                                    <p class="text-justify">
                                        Desenvolvimento web é o termo utilizado para descrever o desenvolvimento de sites, na Internet ou numa intranet. Este é o profissional que trabalha desenvolvendo websites, podendo ser um Web Designer (Desenvolvedor do Layout), ou Web Developer(Desenvolvedor de sistemas).
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 p-0">
                            <div class="feature-item set-bg" data-setbg="img/features/4.jpg">
                                <div class="fi-content text-white">
                                    <h4><a href="#">Jogos</a></h4><br>
                                    <p class="text-justify">
                                        Os jogos para computador evoluíram de simples sistemas de jogos baseados em texto e/ou interfaces gráficas simples e de jogabilidade limitada, para uma vasta gama de títulos visual e sonoramente mais avançados, e de jogabilidade mais complexa, fazendo assim, ser cirado uma indústria especializada.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="feature-section spad">
                <div class="container">
                    <h2 class="text-center card-header border-white" style="color: #fff;">Crie uma conta!</h2>   
                    <br>
                    <div class="row"> 
                        <div class="col-lg-6 col-md-6 p-0">
                            <div class="feature-item set-bg" data-setbg="img/tournament/1.jpg">
                                <div class="fi-content text-white">
                                    <h4>Usuário cliente</h4>
                                    <p class="text-justify">
                                        O usuário cliente é aquele que vai postar os vídeos para que os usuários de tipo empresa possam analisar mais profundamente o projeto, uma vez que eles terão acesso à descrição do vídeo. O vídeo poderá ser assistido por usuários sem conta, mas os mesmos não terão acesso a quem postou, descrição e data que foi postado o vídeo.
                                    </p>
                                    <a href="pags/Cadastro_usu.php"><button type="button" class="btn btn-primary">Criar uma conta como cliente</button></a>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 p-0">
                            <div class="feature-item set-bg" data-setbg="img/tournament/2.jpg">
                                <div class="fi-content text-white">
                                    <h4>Usuário empresa</h4>
                                    <p class="text-justify">
                                        O usuário empresa é aquele que vai ter acesso ao perfil do usuário cliente a partir dos vídeos, podendo assim, entrar em contato com o mesmo utilizando algum servidor de email. Além disso, o usuário empresa terá acesso a todos os clientes cadastrados, caso procure um em específico.                                       
                                    </p>
                                    <a href="pags/Cadastro_emp.php"><button type="button" class="btn btn-primary">Criar uma conta como empresa</button></a>

                                </div>
                            </div>
                        </div>                       
                    </div>
                </div>
            </section>
        </div>
        <!-- fim pontuação -->

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
        <script src="js/index.js" type="text/javascript"></script>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.marquee.min.js"></script>
        <script src="js/main.js"></script>
        <!--fim-->


    </body>

</html>