<?php

include_once '../../php/conexao2.php';

$con_id = $_GET['con_id'];

$sql = "DELETE FROM contato WHERE con_id=:con_id";

$query = $pdo->prepare($sql);
$query->execute(array(':con_id' => $con_id));

echo "<script>alert('Os dados foram excluidos com sucesso');window.location=\"select.php\";</script>";
?>
