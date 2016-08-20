<?php

//mysqli_select_db();

define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}


$ordine = $_POST["ordine"];
$codiceViaggio = $_POST["codiceViaggio"];
$emailProfilo = $_POST["emailProfilo"];
$timestamp = $_POST["timestamp"];
$nota = $_POST["nota"];
$livelloCondivisione = $_POST["livelloCondivisione"]


$sql = "INSERT INTO takeatrip_db.NotaTappa VALUES('$emailProfilo','$codiceViaggio','$ordine','$timestamp','$nota','$livelloCondivisione');"; 
$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 

echo "OK"; 

mysql_close($conn);
?>