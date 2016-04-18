<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}




$email = $_POST["email"];
$password = $_POST["password"];


$q = mysql_query("SELECT * FROM takeatrip_db.Profilo 
				WHERE  email = '$email'
				and password = '$password'");

				
				
if($q==null){
	echo("variabile nulla");
}

while($e=mysql_fetch_assoc($q)){
        $output[]=$e;
}

print(json_encode($output));

mysql_close($conn);
?>