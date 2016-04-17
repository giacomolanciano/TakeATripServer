<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}

/*
$emailProfilo = 'google118018255783762108439';
$codViaggio = '9637453b-b637-4ffb-e749-b1eb10d62172';
$ordineTappa = 8;
*/



$emailProfilo = $_POST["emailProfilo"];
$codViaggio = $_POST["codViaggio"];
$ordineTappa = $_POST["ordineTappa"];





$q = mysql_query("SELECT nota FROM takeatrip_db.NotaTappa WHERE emailProfilo = '$emailProfilo' and codViaggio = '$codViaggio' and ordineTappa = $ordineTappa");



				
				
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