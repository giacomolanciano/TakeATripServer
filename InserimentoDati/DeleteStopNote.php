<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}


$codiceViaggio = $_POST["codiceViaggio"];
$nota = $_POST["nota"];
$email = $_POST["emailProfilo"];


mysql_set_charset($conn, "UTF8");
$q = mysql_query("
DELETE FROM takeatrip_db.NotaTappa 
WHERE
	emailProfilo = '$email'
    AND codiceViaggio = '$codiceViaggio'
    AND nota = '$nota';");


if($q==null){
	echo("variabile nulla");
}

while($e=mysql_fetch_assoc($q)){
        $output[]=$e;
}

print(json_encode($output));

mysql_close($conn);
?>