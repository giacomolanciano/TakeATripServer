<?php 

define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){ 
echo "connessione null"; 
} 

/*
$codiceViaggio = $_POST["codice"];
$id = $_POST["id"]; 
*/

$codiceViaggio = 'a491aee0-6d5c-45a7-db55-da802e60be18';
$id = '123'; 

$sql = "UPDATE takeatrip_db.Viaggio SET idFotoViaggio='$id' WHERE codiceViaggio = '$codiceViaggio' "; 
$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 


/*
$sql = "INSERT into takeatrip_db.ImmagineCopertina VALUES('$email', '$id', '$url' )"; 
$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 
*/
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