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
$url = $_POST["url"];



$sql = "UPDATE takeatrip_db.VideoViaggio 
	SET VideoViaggio.livelloCondivisione ='$livello' WHERE VideoViaggio.codiceViaggio='$codice' AND VideoViaggio.ordineTappa='$ordine' AND VideoViaggio.urlVideo = '$url';"; 

$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 


$sql = "UPDATE takeatrip_db.AudioViaggio 
	SET AudioViaggio.livelloCondivisione ='$livello' WHERE AudioViaggio.codiceViaggio='$codice' AND AudioViaggio.ordineTappa='$ordine' AND AudioViaggio.urlAudio = '$url';"; 

$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 


$sql = "UPDATE takeatrip_db.ImmagineViaggio 
	SET ImmagineViaggio.livelloCondivisione ='$livello' WHERE ImmagineViaggio.codiceViaggio='$codice' AND ImmagineViaggio.ordineTappa='$ordine' AND ImmagineViaggio.urlImmagineViaggio = '$url';"; 

$mysql_result=mysql_query($sql,$conn) or die(mysql_error()); 





echo "OK"; 

mysql_close($conn);
?>