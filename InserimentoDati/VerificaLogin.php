<?php

//mysqli_select_db();


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){
	echo "connessione null";
}

/*
$email = 'admin@takeatrip.com';
$password = 'D6EA8F277F779E81564F91243833C9D7DA0F1212';
*/
/*
$email = 'cip@ciop.com';
$password = '382410E305C98367E39B0C35849D814313FAB4E3';
*/


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