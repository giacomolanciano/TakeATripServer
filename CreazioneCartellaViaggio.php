<?php 

define('__ROOT__', dirname(dirname(__FILE__))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){ 
echo "connessione null"; 
} 


/* 
$email = ''; 
$codice = ''; 
$codiceCartella = '123'; 
$urlCartella = 'ciao.com'; 
$nomeCartella = 'ciao'; 
*/ 

$email = $_POST["emailUtente"]; 
$codice = $_POST["codiceViaggio"]; 
$codiceCartella = $_POST["codiceCartella"]; 
$urlCartella = $_POST["urlCartella"]; 
$nomeCartella = $_POST["nomeCartella"]; 
$ordineTappa ='0';
$idCartella = 'null';
$livelloCondivisione = 'public';


$urlImmagineViaggio = $_POST["urlImmagine"];



$sql = "INSERT into takeatrip_db.CartellaViaggio VALUES('$email','$codice', '$codiceCartella','$urlCartella', '$nomeCartella')"; 
$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 



$sql = "INSERT into takeatrip_db.ImmagineViaggio VALUES('$email','$codice', '$ordineTappa' , '$idCartella', '$urlImmagineViaggio', '$livelloCondivisione')"; 
$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 

mkdir($urlCartella, 0777); 


echo "OK"; 



/* 
$statement = mysqli_prepare($conn, "INSERT into takeatrip_db.Viaggio VALUES(?, ?)"); 
if($statement == null){ 
echo "statement null"; 
} 

mysqli_stmt_bind_param($statement, "ss", $codice, $nomeViaggio); 
mysqli_stmt_execute($statement); 

mysqli_stmt_close($statement); 
*/ 
mysql_close($conn); 


?>