<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysqli_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}
/*
$seguace= "google106655636733146200245";
$seguito = "google108205700469353945427";
*/

$seguace= $_POST["email"];
$seguito = $_POST["emailEsterno"];


$statement = mysqli_prepare($conn, "INSERT into takeatrip_db.Following VALUES(?, ?)");
if($statement == null){
	echo "ERRORE(Statement null)";
} else {
	echo "OK";
}

mysqli_stmt_bind_param($statement, "ss",  $seguace, $seguito);

mysqli_stmt_execute($statement);

mysqli_stmt_close($statement);

mysqli_close($conn);
?>