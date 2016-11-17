<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}


$codiceViaggio = $_POST["codiceViaggio"];
$url = $_POST["url"];


$q = mysql_query("
DELETE FROM takeatrip_db.ImmagineViaggio 
WHERE
    codiceViaggio = '$codiceViaggio'
    AND urlImmagineViaggio = '$url';");


if($q==null){
	echo("variabile nulla");
}
else{
	echo("OK");
}



mysql_close($conn);
?>