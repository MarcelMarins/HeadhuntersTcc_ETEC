<?php
include_once '../php/conexao2.php';

session_start();

if (!isset($_SESSION['Login_usu_id'])) {
    echo "<script>window.location=\"../pags/Login_usu.php\";</script>";
} else {


    $sth2 = $pdo->prepare('select * from cliente where cli_id = :session');
    $sth2->bindValue(":session", $_SESSION['Login_usu_id']['cli_id']);
    $sth2->execute();
    $linha = $sth2->fetch(PDO::FETCH_ASSOC);
    extract($linha);


    $idEstado = $linha['cli_id_estado'];
    $idCidade = $linha['cli_id_cidade'];
    $idGenero = $linha['cli_id_genero'];
    $data = $linha['cli_data_nasc'];
    $id_usu = $linha['cli_id'];

    $resultado = $pdo->query("SELECT * FROM video WHERE vid_cli_id = " . $id_usu);


    $data = implode("/", array_reverse(explode("-", $data)));

    $sth3 = $pdo->prepare("select * from estado where est_id = '$idEstado'");
    $sth3->execute();
    $estado_usu = $sth3->fetch(PDO::FETCH_ASSOC);
    extract($estado_usu);


    $sth4 = $pdo->prepare("select * from cidade where cid_id = '$idCidade'");
    $sth4->execute();
    $cidade_usu = $sth4->fetch(PDO::FETCH_ASSOC);
    extract($cidade_usu);

    $sth5 = $pdo->prepare("select * from genero where sexo_id = '$idGenero'");
    $sth5->execute();
    $genero_usu = $sth5->fetch(PDO::FETCH_ASSOC);
    extract($genero_usu);
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
            <section class="page-section recent-game-page spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <br>
                            <img class="card-img-top img-fluid img-thumbnail" src="../img/users/<?= $linha['cli_img'] ?>" alt="Card image cap">
                            <br>
                            <div class="card-body">
                                <section class="row">
                                    <div class="col-6 text-left">
                                        <a href="?go=apagar" onClick= "return confirm('Você deseja apagar sua conta?')"><button type="button" class="btn btn-outline-danger">Apagar usuário</button></a>
                                        <hr>
                                        <a href="?go=sair" onClick= "return confirm('Você deseja sair?')"><button type="button" class="btn btn-outline-secondary">Sair</button></a>                                     
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="recent-game-item card-body">  
                                <form action="../php/updateUsuario.php" method="post" name="Update_usu" >
                                    <div class="group">
                                        <h5 style="color: #000000">Nome</h5>
                                        &nbsp;
                                        <input id="nome" name="cli_nome" class="form-control" type="text" pattern="[a-zA-Z0-9\s]+$" size="40" value="<?= $linha['cli_nome'] ?>" required>
                                        <span class="bar"></span>
                                    </div>

                                    <hr>

                                    <div class="group">
                                        <h5 style="color: #000000">Email</h5>
                                        &nbsp;
                                        <input  id="email" name="cli_email" class="form-control" type="email" value="<?= $linha['cli_email'] ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  maxlength="45"   required>
                                        <span class="bar"></span>
                                    </div>
                                    <hr>

                                    <div class="group">
                                        <h5 style="color: #000000">Senha</h5>
                                        &nbsp;
                                        <input  name="cli_senha" type="password" class="form-control" value="<?= $linha['cli_senha'] ?>" maxlength="45"   required>
                                        <span class="bar"></span>
                                    </div>
                                    <hr>

                                    <div class="group">
                                        <h5 style="color: #000000">CPF</h5>
                                        &nbsp;
                                        <input id="cpf" name="cli_cpf" type="text"  class="form-control" maxlength="14" value="<?= $linha['cli_cpf'] ?>"  pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required>
                                        <span class="bar"></span>
                                    </div>
                                    <hr>

                                    <div class="group">
                                        <h5 style="color: #000000">Data de Nascimento</h5>
                                        &nbsp;
                                        <input id="data_nasc" name="cli_data_nasc" class="form-control" type="text" maxlength="10" value="<?= $data ?>" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" required> 
                                        <span class="bar"></span>
                                    </div>
                                    <hr>

                                    <div class="group">
                                        <h5 style="color: #000000">Celular</h5>
                                        &nbsp;
                                        <input id="celular" name="cli_celular" class="form-control" type="text" value="<?= $linha['cli_celular'] ?>"  maxlength="16" required>
                                        <span class="bar"></span>
                                    </div>
                                    <hr>


                                    <div class="group">
                                        <h5 style="color: #000000">Estado</h5>
                                        &nbsp;
                                        <select class="form-control"  id="estado" name="cli_id_estado"  > 

                                            <option value="<?= $estado_usu['est_id'] ?>" ><?= $estado_usu['est_uf'] ?> </option>
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
                                    <hr>

                                    <h5 style="color: #000000">Cidade</h5>
                                    &nbsp;
                                    <div class="group">


                                        <select class="form-control" id="cidade" name="cli_id_cidade"  class="borda"> 
                                            <option value="<?= $cidade_usu['cid_id'] ?>"><?= $cidade_usu['cid_nome'] ?></option>

                                        </select>
                                    </div>
                                    <hr>

                                    <h5 style="color: #000000">Gênero</h5>
                                    &nbsp;
                                    <div class="group">
                                        <select class="form-control" name="cli_id_genero" > 

                                            <option value="<?= $genero_usu['sexo_id'] ?>"><?= $genero_usu['sexo_opcao'] ?></option>
                                            <?php
                                            $select = $pdo->prepare("SELECT * FROM genero ORDER BY sexo_opcao  ");
                                            $select->execute();
                                            $fetchAll = $select->fetchAll();

                                            foreach ($fetchAll as $sexo) {
                                                echo '<option value= "' . $sexo['sexo_id'] . '">' . $sexo['sexo_opcao'] . '</option>';
                                            };
                                            ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <center>
                                        <input id="cadastrar_emp" name="Atualizar_usu" type="submit" value="Atualizar" class="btn btn-info"/>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </section>
            <div class="container">
                <h3 class="text-center">Meus vídeos</h3>
                <hr>
            </div>
            <section class="page-section recent-game-page spad">
                <div class="container">
                    <section class="row">
                        <?php
                        while ($rowVid = $resultado->fetch(PDO::FETCH_ASSOC)) {
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
                                            <hr>
                                            <a href="../php/deleteVideo.php?video_id=<?= $rowVid['vid_id'] ?>" onClick= "return confirm('Você deseja excluir o vídeo?')"><button type="button" class="btn btn-outline-danger">Apagar vídeo</button></a> 


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
            <!-- Fim Hero section -->

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
            <script src="../js/jquery-3.2.1.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="../js/owl.carousel.min.js"></script>
            <script src="../js/jquery.marquee.min.js"></script>
            <script src="../js/main.js"></script>
            <script src="../js/carregarCidades.js" type="text/javascript"></script>
            <script src="../js/jquery.mask.min.js" type="text/javascript"></script>  
            <script src="../js/mascaras.js" type="text/javascript"></script>
            <script src="../js/carregaCidades1.js" type="text/javascript"></script>
        </body>

    </html>



    <?php
}

if (@$_GET['go'] == 'sair') {
    unset($_SESSION);
    echo "<script>window.location=\"../index.php\";</script>";
}

if (@$_GET['go'] == 'apagar') {
    unset($_SESSION);

    $sql_code = "DELETE FROM cliente WHERE cli_id = $id_usu";

    if ($pdo->query($sql_code)) {
        echo "<script>alert('O usuário foi deletado com sucesso!');window.location=\"../index.php\";</script>";
    }
}
?>
