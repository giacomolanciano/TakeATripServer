<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}


/*
$segue= 'lucagiacomelli1604@gmail.com';
$seguito ='google106655636733146200245';
*/

/* 
L'email di segue è colui che viene seguito da seguito!*/ 

$segue= $_POST["emailEsterno"];
$seguito = $_POST["email"];



$statement = mysqli_prepare($conn, "INSERT into takeatrip_db.Following VALUES(?, ?)");
if($statement == null){
	echo "statement null";
}

mysqli_stmt_bind_param($statement, "ss",  $segue, $seguito);

mysqli_stmt_execute($statement);

mysqli_stmt_close($statement);

mysqli_close($conn);
?>