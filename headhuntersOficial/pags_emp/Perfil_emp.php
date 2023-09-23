<?php


include_once '../php/conexao2.php';

session_start();

if (!isset($_SESSION['Login_Emp_id'])) {

    echo "<script>window.location=\"../pags/Login_emp.php\";</script>";
} else {


    $sth10 = $pdo->prepare('select * from empresa where emp_email = :session and emp_senha = :session1');
    $sth10->bindValue(":session", $_SESSION['Login_Emp']['emp_email']);
    $sth10->bindValue(":session1", $_SESSION['Login_Emp']['emp_senha']);
    $sth10->execute();
    $linha = $sth10->fetch(PDO::FETCH_ASSOC);
    extract($linha);


    $idEstado = $linha['emp_estado'];
    $idCidade = $linha['emp_cidade'];
    $emp_id = $linha['emp_id'];


    $sth3 = $pdo->prepare("select * from estado where est_id = '$idEstado' ");
    $sth3->execute();
    $estado_emp = $sth3->fetch(PDO::FETCH_ASSOC);
    extract($estado_emp);



    $sth4 = $pdo->prepare("select * from cidade where cid_id = '$idCidade'");
    $sth4->execute();
    $cidade_emp = $sth4->fetch(PDO::FETCH_ASSOC);
    extract($cidade_emp);
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
            <section class="page-section recent-game-page spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <br>
                            <img class="card-img-top img-fluid img-thumbnail" src="../img/users/<?= $linha['emp_imagem'] ?>" alt="Card image cap">
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
                                <form action="../php/updateEmpresa.php" method="post" name="Update_emp" >
                                    <div class="group">
                                        <h5 style="color: #000000">CNPJ</h5>
                                        &nbsp;

                                        <input class="form-control" id="cnpj" name="emp_cnpj" type="text" maxlength="45" value="<?= $linha['emp_cnpj'] ?>" required > 
                                        <span class="bar"></span>
                                    </div>

                                    <hr>
                                    <div class="group">
                                        <h5 style="color: #000000">Nome do Representante</h5>                                                    
                                        &nbsp;

                                        <input class="form-control" id="razao" name="emp_representante" type="text" maxlength="45" value="<?= $linha['emp_representante'] ?>" required>
                                        <span class="bar"></span>
                                    </div>
                                    <hr>
                                    <div class="group">
                                        <h5 style="color: #000000">Razão</h5>
                                        &nbsp;

                                        <input class="form-control" id="razao" name="emp_razao" type="text" maxlength="45" value="<?= $linha['emp_razao'] ?>" required>
                                        <span class="bar"></span>
                                    </div>

                                    <hr>
                                    <div class="group">
                                        <h5 style="color: #000000">Email</h5>
                                        &nbsp;

                                        <input class="form-control" name="emp_email" type="email"  maxlength="45" value="<?= $linha['emp_email'] ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                                        <span class="bar"></span>
                                    </div>

                                    <hr>
                                    <div class="group">
                                        <h5 style="color: #000000">Senha</h5>
                                        &nbsp;

                                        <input class="form-control" id="senha" name="emp_senha" type="password" maxlength="45" value="<?= $linha['emp_senha'] ?>" pattern="[a-z0-9]+$" required>
                                        <span class="bar"></span>
                                    </div>


                                    <hr>
                                    <div class="group">
                                        <h5 style="color: #000000">Estado</h5>
                                        &nbsp;

                                        <select class="form-control" id="estado1" name="emp_estado" class="borda" > 

                                            <option value="<?= $estado_emp['est_id'] ?>" ><?= $estado_emp['est_uf'] ?> </option>
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
                                        <select class="form-control" id="cidade1" name="emp_cidade"  class="borda"> 
                                            <option value="<?= $cidade_emp['cid_id'] ?>"><?= $cidade_emp['cid_nome'] ?></option>

                                        </select>
                                    </div>
                                    <hr>
                                    <center>
                                        <input id="cadastrar_emp" name="Atualizar" type="submit" value="Atualizar" class="btn btn-info"/>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
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
            <script src="../js/carregarCidades.js" type="text/javascript"></script>
            <script src="../js/main.js"></script>
            <script src="../js/jquery.mask.min.js" type="text/javascript"></script>  
            <script src="../js/mascaraCNPJ.js" type="text/javascript"></script>
            <script src="../js/carregaCidades1.js" type="text/javascript"></script>


        </body>

    </html>



    <?php
}


if (@$_GET['go'] == 'sair') {
    unset($_SESSION['Login_Emp_id']);
    echo "<script>window.location=\"../index.php\";</script>";
}

if (@$_GET['go'] == 'apagar') {
    unset($_SESSION['Login_Emp_id']);

    $sql_code = "DELETE FROM empresa WHERE emp_id = $emp_id";

    if ($pdo->query($sql_code)) {
        echo "<script>alert('O usuário foi deletado com sucesso!');window.location=\"../index.php\";</script>";
    }
}
?>
  




