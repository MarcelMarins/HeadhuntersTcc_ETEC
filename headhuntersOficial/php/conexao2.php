<?php

define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DB_NAME', 'headhunters');

try{
	
	$pdo = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Devolve onde está o erro
        $pdo->exec('SET CHARACTER SET utf8');

	
}catch( PDOException $e){

      echo 'Erro ao conectar com MySQL: '. $e->getMessage();
	  

	
}
?>
