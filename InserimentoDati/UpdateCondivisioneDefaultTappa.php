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
$ordine = $_POST["ordine"];


$sql = "UPDATE takeatrip_db.Tappa SET Tappa.livelloCondivisioneTappa ='$livello' WHERE Tappa.codiceViaggio='$codice' AND Tappa.ordine='$ordine';"; 

$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 


echo "OK"; 

mysql_close($conn);
?>