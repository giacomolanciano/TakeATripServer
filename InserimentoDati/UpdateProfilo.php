<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}
/*
$nome = 'LucaZZO';
$cognome = 'GiacomelliSA';
$dataNascita = '1993-04-16';
$email = 'lucagiacomelli1604@gmail.com';
$password = "ciaoneeee";
$image = '';
$codAccount = '1';
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




$statement = mysqli_prepare($conn, "UPDATE  takeatrip_db.Profilo SET Profilo.codAccount='$codAccount', Profilo.password='$password', Profilo.nome='$nome',  Profilo.cognome='$cognome', Profilo.dataNascita='$dataNascita', Profilo.image='$image', Profilo.nazionalita='$nazionalita', Profilo.sesso='$sesso', Profilo.username='$username', Profilo.lavoro='$lavoro', Profilo.descrizione='$descrizione', Profilo.tipo='$tipo' WHERE Profilo.email = '$email'");
if($statement == null){
	echo "statement null";
}

mysqli_stmt_bind_param($statement, "sisssdsssssss",  $email, $codAccount, $password, $nome, $cognome, $dataNascita, $image, $nazionalita, $sesso, $username, $lavoro, $descrizione, $tipo);

mysqli_stmt_execute($statement);

mysqli_stmt_close($statement);

mysqli_close($conn);
?>
