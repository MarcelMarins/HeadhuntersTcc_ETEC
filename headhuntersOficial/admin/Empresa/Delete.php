<?php

include_once '../../php/conexao2.php';

$emp_id = $_GET['emp_id'];

$sql = "DELETE FROM empresa WHERE emp_id=:emp_id";

$query = $pdo->prepare($sql);
$query->execute(array(':emp_id' => $emp_id));

echo "<script>alert('Os dados foram excluidos com sucesso');window.location=\"select.php\";</script>";
?>