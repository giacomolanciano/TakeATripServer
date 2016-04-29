<?php

//mysqli_select_db();

define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}
/*
$nome = 'Giovanni';
$cognome = 'Rossi';
$dataNascita = '0000-00-00';
$email = 'pp@gmail.com';
$password ='asdf';
$image = '';
$codAccount = '0'; 
$nazionalita= 'prova';
$sesso= 'prova';
$username= 'giova18';
$lavoro= 'prova';
$descrizione= 'prova';
$tipo= 'prova';
$nomeCognomeUsername= $nome.$cognome.$username;
*/


$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$dataNascita = $_POST["dataNascita"];
$email = $_POST["email"];
$password = $_POST["password"];
$image = '';
$codAccount = '0'; 
$nazionalita= $_POST["nazionalita"];
$sesso= $_POST["sesso"];
$username= $_POST["username"];
$lavoro= $_POST["lavoro"];
$descrizione= $_POST["descrizione"];
$tipo= $_POST["tipo"];
$nomeCognomeUsername= $nome.$cognome.$username;





$sql = "INSERT into takeatrip_db.Profilo VALUES('$email', '$codAccount','$password','$nome', '$cognome', '$dataNascita', '$image', '$nazionalita', '$sesso', '$username', '$lavoro', '$descrizione', '$tipo', '$nomeCognomeUsername')"; 
$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 


$sql = "INSERT into takeatrip_db.ImmagineProfilo VALUES('$email', '0', 'null' )"; 
$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 

$sql = "INSERT into takeatrip_db.ImmagineCopertina VALUES('$email', '0', 'null' )"; 
$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 


/*
$statement = mysqli_prepare($conn, "INSERT into takeatrip_db.Profilo VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
if($statement == null){
	echo "statement null";
}

mysqli_stmt_bind_param($statement, "sisssssssssss",  $email, $codAccount, $password, $nome, $cognome, $dataNascita, $image, $nazionalita, $sesso, $username, $lavoro, $descrizione, $tipo );

mysqli_stmt_execute($statement);

mysqli_stmt_close($statement);
*/




mysql_close($conn);

//mysqli_close($conn);
?>