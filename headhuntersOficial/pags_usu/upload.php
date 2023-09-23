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
        <section class="page-info-section set-bg img-fluid" data-setbg="../img/page-top-bg/3.jpg">
            <div class="pi-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 text-white">
                            <h2>Upload</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page info section -->


        <!-- Page section -->
        <section class="page-section review-page spad">
            <div class="container">
                <form action="../php/insertVideo.php" method="post" name="Cadastro" enctype="multipart/form-data">

                    <div class="row col-sm-12 col-md-12">
                        <div class="form-group col col-md-6 col-sm-12 ">
                            <label>Título do vídeo</label>
                            <input class="form-control"  placeholder="Título" name="titulo" type="text" size="40" required>
                        </div>

                        <div class="form-group col col-md-6 col-sm-12 ">
                            <label>Subtitulo</label>
                            <input class="form-control"  placeholder="Subtitulo" name="sub" type="text"  maxlength="45" required>
                        </div>
                    </div>
                    &ensp;
                    <div class="row col-sm-12 col-md-12">
                        <div class="form-group col col-md-6 col-sm-12 ">
                            <label>Escola</label>
                            <input class="form-control"  placeholder="Escola" name="escola" type="text" size="40" required>
                        </div>

                        <div class="form-group col col-md-6 col-sm-12 ">
                            <label>Orientador</label>
                            <input class="form-control"  placeholder="Orientador" name="orientador" type="text"  maxlength="45" required>
                        </div>
                    </div>
                    &ensp;
                    <div class="row col-sm-12 col-md-12">
                        <div class="form-group col col-md-6 col-sm-12 ">
                            <label>Categoria</label>

                            <select class="form-control" name="categoria" > 

                                <option value="">Escolha a categoria</option>
                                <?php
                                $select = $pdo->prepare("SELECT * FROM categoria ORDER BY cat_nome");
                                $select->execute();
                                $fetchAll = $select->fetchAll();

                                foreach ($fetchAll as $cat) {
                                    echo '<option value= "' . $cat['cat_id'] . '">' . $cat['cat_nome'] . '</option>';
                                };
                                ?>
                            </select>


                        </div>

                        <div class="form-group col col-md-6 col-sm-12 ">
                            <label>Link do vídeo</label>
                            <input class="form-control"  placeholder="Link do vídeo" name="linkyt" type="text"  maxlength="255" required>
                        </div>
                    </div>
                    &ensp;



                    <div class="row col-sm-12 col-md-12">
                        <div class="form-group col col-md-12 col-sm-12 ">
                            <label>Descrição</label> 
                            <textarea class="form-control" placeholder="Descrição" name="desc" rows="8" cols="500" required></textarea>    
                        </div>                   
                    </div>

                    <div class="row col-sm-12 col-md-12">
                        <div class="form-group col col-md-12 col-sm-12 ">
                            <label>Equipe</label> 
                            <textarea class="form-control" placeholder="Equipe" name="equipe" rows="8" cols="500" required></textarea>    
                        </div>                   
                    </div>
                    &ensp;
                    <div class="row col-sm-12 col-md-12">
                        <div class="form-group col col-md-12 col-sm-12 ">
                            <label>Thumnail do vídeo</label> 
                            <input type="file" name="imagem" accept="image/jpg, image/jpeg, image/png" required>
                        </div>                   
                    </div>


                    &ensp;
                    <center>
                        <div  class="col col-sm-12 col-md-12">
                            <input id="upload" name="upload" type="submit" value="Enviar" class="btn btn-info"/>
                        </div>
                    </center>
                </form>










                <!--
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Título do vídeo</label>
                                            <input type="text" class="form-control" name="titulo" value="" style="height: 50px">
                                        </div>
                                        <div class="form-group col-md-12">  
                                            <label>Descrição</label>
                                            <textarea class="form-control" name="descricao" rows="8" cols="500"></textarea>           
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Link do vídeo Youtube</label>
                                            <input type="text" class="form-control" name="linkyt" style="height: 50px">
                                        </div>
                
                                        <div class="form-group col-md8 card">
                                            <label class="card-header text-center">Thumbnail do vídeo</label> 
                                            <div class="card-body text-center">
                                                <input type="file" name="imagem" accept="image/jpg, image/jpeg, image/png">
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="form-group no-margin col-md-4 text-center" >
                                        <input type="submit" class="btn btn-info btn-block" value="Enviar vídeo">	
                                    </div>  
                                </form> 
                
                
                
                
                
                
                
                            </div>
                        </form>
                -->
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