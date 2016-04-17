<?php 

define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){ 
echo "connessione null"; 
} 


/*
$codice = '3d388ba1-cf7c-414b-a1ea-232f5be58155'; 
$filtro = 'filtrogrecia'; 
*/


$codice = $_POST["codiceViaggio"]; 
$filtro = $_POST["filtro"]; 


$sql = "INSERT into takeatrip_db.Filtro VALUES('$codice', '$filtro')"; 
$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 



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