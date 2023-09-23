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
                                    <div class="col-md-6">
                                        <h3 class="text-center card-header border-" style="color: #fff;">Cadastro de empresa</h3>   
                                        <p>&nbsp;</p>
                                        <div class="card-body text-white">
                                            <div class="text-align-center">

                                                <form action="../php/insertEmpresa.php" method="post" name="Cadastro_emp" enctype="multipart/form-data">

                                                    <div class="row col-sm-12 col-md-12">

                                                        <div class="form-group col col-md-6 col-sm-12 ">
                                                            <label >CNPJ</label>
                                                            <input  class="form-control"  placeholder="00.000.000/0000-00" id="cnpj" name="emp_cnpj" type="text" maxlength="18" pattern="([0-9]{2}[\.]?[0-9]{3}[\.]?[0-9]{3}[\/]?[0-9]{4}[-]?[0-9]{2})|([0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2})" required>
                                                        </div>
                                                        <div class="col col-sm-12 col-md-6">
                                                            <label>Nome do Representante</label>
                                                            <input class="form-control"  placeholder="Nome" id="rep" name="emp_representante" type="text" maxlength="45" required>
                                                        </div>
                                                    </div>
                                                    &nbsp;
                                                    <div class="row col-sm-12 col-md-12">
                                                        <div class="col col-sm-12 col-md-6">
                                                            <label>Razão</label>
                                                            <input class="form-control"  placeholder="Razão" id="razao" name="emp_razao" type="text" maxlength="45" required>
                                                        </div>
                                                        <div class="col col-sm-12 col-md-6">
                                                            <label>Email</label>
                                                            <input class="form-control"  placeholder="Email" name="emp_email" type="email"  maxlength="45" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                                                        </div>
                                                    </div>
                                                    &nbsp;
                                                    <div class="row col-sm-12 col-md-12">
                                                        <div class="col col-sm-12 col-md-6">
                                                            <label>Senha</label>
                                                            <input class="form-control"  placeholder="Senha" id="senha" name="emp_senha" type="password" maxlength="45" pattern="[a-z0-9]+$" required>
                                                        </div>
                                                        <div class="col col-sm-12 col-md-6">
                                                            <label>Estado</label>
                                                            <select class="form-control" id="estado1" name="emp_estado" class="borda" > 
                                                                <option value="">Escolha um estado</option>
                                                                <?php
                                                                $select = $pdo->prepare("SELECT * FROM estado ORDER BY est_uf ");
                                                                $select->execute();
                                                                $fetchAll = $select->fetchAll();

                                                                foreach ($fetchAll as $estado) {
                                                                    echo '<option value= "' . $estado['est_id'] . '">' . $estado['est_uf'] . '</option>';
                                                                };
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    &nbsp;
                                                    <div  class="row col-md-12 col-sm-12">
                                                        <div class="form-group col col-md-6 col-sm-12 ">
                                                            <label>Cidade</label>
                                                            <select  class="form-control" id="cidade1" name="emp_cidade"  class="borda"> 
                                                                <option value="">Escolha uma cidade</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group col col-md-6 col-sm-12 ">
                                                            <label>Foto de perfil</label>
                                                            <input type="file" name="imagem" accept="image/jpg, image/jpeg, image/png" required>
                                                        </div>
                                                    </div>
                                                    
                                                    &ensp;
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="check" required>
                                                        <label class="form-check-label" for="exampleCheck1">Li e concordo com os <a href="../Contrato/Contrato Usuário.pdf" style="color: #4ecbe3;" class="font-weight-bold"><u><strong>termos de política e privacidade</strong></u></a></label>
                                                    </div>
                                                    &ensp;

                                                    <center>

                                                        <div  class="col col-sm-12 col-md-12">

                                                            <input id="cadastrar_emp" name="cadastrar" type="submit" value="Cadastrar" class="btn btn-info"/>

                                                        </div>
                                                    </center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Hero section end -->





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
                <script src="../js/carregaCidades1.js" type="text/javascript"></script>
                <script src="../js/mascaraCNPJ.js" type="text/javascript"></script>
                <script src="../js/mascaras.js" type="text/javascript"></script>
                <script src="../js/ValidarCorText.js" type="text/javascript"></script>

            </body>

        </html>

        <?php
    }
}
?>