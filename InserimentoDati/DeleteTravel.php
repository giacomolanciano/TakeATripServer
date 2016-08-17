<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}


$codiceViaggio = $_POST["codiceViaggio"];

$q = mysql_query("
DELETE FROM takeatrip_db.Tag 
WHERE
    codiceViaggio = '$codiceViaggio';
DELETE FROM takeatrip_db.NotaTappa 
WHERE
    codViaggio = '$codiceViaggio';
DELETE FROM takeatrip_db.ImmagineViaggio 
WHERE
    codiceViaggio = '$codiceViaggio';
DELETE FROM takeatrip_db.VideoViaggio 
WHERE
    codiceViaggio = '$codiceViaggio';
DELETE FROM takeatrip_db.AudioViaggio 
WHERE
    codiceViaggio = '$codiceViaggio';
DELETE FROM takeatrip_db.Tappa 
WHERE
    codiceViaggio = '$codiceViaggio';
DELETE FROM takeatrip_db.Itinerario 
WHERE
    codiceViaggio = '$codiceViaggio';
DELETE FROM takeatrip_db.CartellaViaggio 
WHERE
	codiceViaggio = '$codiceViaggio';
DELETE FROM takeatrip_db.Filtro 
WHERE
	codiceViaggio = '$codiceViaggio';
DELETE FROM takeatrip_db.Tipologia 
WHERE
	codiceViaggio = '$codiceViaggio';
DELETE FROM takeatrip_db.PartePer 
WHERE
	codiceViaggio = '$codiceViaggio';
DELETE FROM takeatrip_db.Viaggio 
WHERE
	codice = '$codiceViaggio';");


if($q==null){
	echo("variabile nulla");
}

while($e=mysql_fetch_assoc($q)){
        $output[]=$e;
}


if($output != null){
	print(json_encode($output));
}
else{
	print(json_encode($output));
}




mysql_close($conn);
?>