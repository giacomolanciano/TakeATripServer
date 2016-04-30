<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}



$livello = $_POST["livelloCondivisione"];
$codice = $_POST["codiceViaggio"];

$sql = "UPDATE takeatrip_db.Viaggio SET Viaggio.livelloCondivisione ='$livello' WHERE Viaggio.codice='$codice';"; 

$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 


echo "OK"; 

mysql_close($conn);
?>