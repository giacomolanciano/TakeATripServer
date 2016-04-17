<?php 

//mysqli_select_db(); 


define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){ 
echo "connessione null"; 
} 


/* 
$email = 'lucagiacomelli1604@gmail.com'; 



*/ 


//$email = 'google108205700469353945427'; 

$email = $_POST["email"]; 





$q = mysql_query("SELECT count(*) FROM takeatrip_db.Following WHERE Following.segue = '$email' "); 




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