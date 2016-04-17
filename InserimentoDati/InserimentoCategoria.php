<?php

//mysqli_select_db();

define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}

/*
$email = 'lucagiacomelli1604@gmail.com';
$categoria = 'Mare';
*/

$email = $_POST["email"];
$categoria = $_POST["categoria"];
$codAccount = $_POST["codAccount"];



$statement = mysqli_prepare($conn, "INSERT into takeatrip_db.Appartiene VALUES(?, ?, ?)");
if($statement == null){
	echo "statement null";
}

mysqli_stmt_bind_param($statement, "ssi",  $email, $categoria, $codAccount	);
mysqli_stmt_execute($statement);

mysqli_stmt_close($statement);

mysqli_close($conn);
?>