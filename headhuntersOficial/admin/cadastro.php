<?php
include '../php/conexao2.php';

session_start();

if (!isset($_SESSION['adm_id'])) {
    echo "<script>window.location=\"index.php\";</script>";
} else {
    ?>
    <html>
        <head>
            <title>Cadastro</title>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="../css/bootstrap.min.css" />

        </head>


        <body>
            <section class="h-100">
                <div class="container h-100">
                    <div class="row justify-content-md-center h-100">
                        <div class="card-wrapper col-md-6 col-ms-12" >
                            <p>&nbsp;</p>
                            <div class="card fat">
                                <div class="card-body" class="card fat">
                                    <h4 class="text-center">Cadastrar</h4>
                                    <form name="form" method="post" action="../php/insertAdm.php">
                                        <div class="form-row" style="font-size:15px">

                                            <div class="form-group col-md-12">
                                                <label for="login">Nome</label>
                                                <input id="email" type="text" class="form-control" name="nome" value="" required autofocus>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="senha">Login</label>
                                                <input id="password" type="text" class="form-control" name="login">
                                            </div>   

                                            <div class="form-group col-md-12">
                                                <label for="login">Senha</label>
                                                <input id="email" type="password" class="form-control" name="senha" value="" required autofocus>
                                            </div>



                                            <div class="form-group no-margin col-md-5" >
                                                <input id="upload" name="upload" type="submit" value="CADASTRAR" class="btn-lg btn-primary"/>
                                            </div>

                                            <div class="form-group no-margin col-md-5" >
                                                <a href="menu.php"><input value="VOLTAR" type="button" class="btn-lg btn-primary"/></a>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <script src="../js/jquery.min.js"></script>
            <script src="../bootstrap/js/bootstrap.min.js"></script>
        </body>
    </html>
    <?php
}
?>