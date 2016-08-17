<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}


$codiceViaggio = $_POST["codiceViaggio"];
$ordineTappa = $_POST["ordineTappa"];


$q = mysql_query("
DELETE FROM takeatrip_db.Tag 
WHERE
    codiceViaggio = '$codiceViaggio'
    AND ordineTappa = '$ordineTappa';
DELETE FROM takeatrip_db.NotaTappa 
WHERE
    codViaggio = '$codiceViaggio'
    AND ordineTappa = '$ordineTappa';
DELETE FROM takeatrip_db.ImmagineViaggio 
WHERE
    codiceViaggio = '$codiceViaggio'
    AND ordineTappa = '$ordineTappa';
DELETE FROM takeatrip_db.VideoViaggio 
WHERE
    codiceViaggio = '$codiceViaggio'
    AND ordineTappa = '$ordineTappa';
DELETE FROM takeatrip_db.AudioViaggio 
WHERE
    codiceViaggio = '$codiceViaggio'
    AND ordineTappa = '$ordineTappa';
DELETE FROM takeatrip_db.Tappa 
WHERE
    codiceViaggio = '$codiceViaggio'
    AND ordine = '$ordineTappa';");


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