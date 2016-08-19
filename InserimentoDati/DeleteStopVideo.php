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
DELETE FROM takeatrip_db.VideoViaggio 
WHERE
    codiceViaggio = '$codiceViaggio'
    AND urlVideo = '$url';");


if($q==null){
	echo("variabile nulla");
}

while($e=mysql_fetch_assoc($q)){
        $output[]=$e;
}

print(json_encode($output));

mysql_close($conn);
?>