<?php 

define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){ 
echo "connessione null"; 
} 


$email = $_POST["emailUtente"]; 
$codice = $_POST["codiceViaggio"]; 
$codiceCartella = $_POST["codiceCartella"]; 
$urlCartella = $_POST["urlCartella"]; 
$nomeCartella = $_POST["nomeCartella"]; 



$sql = "INSERT into takeatrip_db.CartellaViaggio VALUES('$email','$codice', '$codiceCartella','$urlCartella', '$nomeCartella')"; 
$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 

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