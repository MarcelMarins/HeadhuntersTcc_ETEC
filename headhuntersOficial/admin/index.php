<?php
include '../php/conexao2.php';

session_start();

if (!isset($_SESSION['adm_id'])) {
   
    

?>
<html>
    <head>
        <title>Admin</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css" />

    </head>


    <body>
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper" style="width: 450px; height: 500px">
                        <p>&nbsp;</p>
                        <div class="card fat">
                            <div class="card-body" class="card fat">
                                <h4 class="text-center">Login</h4>
                                <form name="form" method="post" action="../php/validarLoginAdm.php">
                                    <div class="form-row" style="font-size:15px">
                                        <div class="form-group col-md-12">
                                            <label for="login">Login</label>
                                            <input id="email" type="text" class="form-control" name="login" value="" required autofocus>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="senha">Senha</label>
                                            <input id="password" type="password" class="form-control" name="senha">
                                        </div>                                                               

                                        <div class="form-group no-margin col-md-4" >
                                            <input id="upload" name="upload" type="submit" value="ENTRAR" class="btn-lg btn-primary"/>
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
 
 
} else {
    
     echo "<script>window.location=\"menu.php\";</script>";
     
}
?>
