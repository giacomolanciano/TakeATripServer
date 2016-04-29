<?php

//mysqli_select_db();

define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysqli_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}




$nome = $_POST["nome"];
$fonte =  'google';



$statement = mysqli_prepare($conn, "INSERT into takeatrip_db.POI VALUES(?, ?)");
if($statement == null){
	echo "statement null";
}

mysqli_stmt_bind_param($statement, "ss",  $nome, $fonte);

mysqli_stmt_execute($statement);

mysqli_stmt_close($statement);

mysqli_close($conn);
?>