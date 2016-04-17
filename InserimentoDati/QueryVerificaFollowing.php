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


//$emailFollower = 'google106655636733146200245'; 
//$emailFollowing = 'google118018255783762108439'; 

$emailFollower = $_POST["emailFollower"];
$emailFollowing = $_POST["emailFollowing"]; 





$q = mysql_query("SELECT * FROM takeatrip_db.Following WHERE Following.seguito = '$emailFollowing' and Following.segue = '$emailFollower' "); 




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