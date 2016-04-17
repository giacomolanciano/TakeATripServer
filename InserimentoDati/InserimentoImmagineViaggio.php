<?php 

define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){ 
echo "connessione null"; 
} 


$email = $_POST["email"]; 
$codiceViaggio = $_POST["codice"];
$id = $_POST["id"]; 
$url = $_POST['url']; 


$sql = "UPDATE takeatrip_db.ImmagineViaggio SET idImmagine='$id', urlImmagineViaggio='$url' WHERE codiceViaggio = '$codiceViaggio' "; 
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