<?php 

include '../php/conexao2.php';


$pegaCidades = $pdo -> prepare("select * from cidade where cid_est_id='".$_POST['id']."'");
$pegaCidades -> execute();

$fetchAll = $pegaCidades -> fetchall();
foreach($fetchAll as $cidade){
    echo '<option value= "' . $cidade['cid_id'] . '">'.$cidade['cid_nome'].'</option>';
    
}

