<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}

/*
$emailProfilo = $_POST["emailProfilo"];
$codViaggio = $_POST["codViaggio"];
$ordineTappa = $_POST["ordineTappa"];
*/

$emailProfilo = $_GET["emailProfilo"];
$codViaggio = $_GET["codViaggio"];
$ordineTappa = $_GET["ordineTappa"];



$q = mysql_query("
SELECT 
    iv.nota, iv.ordineTappa, iv.livelloCondivisione 
FROM 
    takeatrip_db.Viaggio v, takeatrip_db.NotaTappa iv 
WHERE 
    v.codice = '$codViaggio' 
    and v.codice = iv.codViaggio 
    and iv.ordineTappa= '$ordineTappa'
    and (iv.emailProfilo = '$emailProfilo' 
        or iv.livelloCondivisione = 'Public' 
        or iv.livelloCondivisione = 'Travel')
order by iv.timestamp desc");



				
				
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