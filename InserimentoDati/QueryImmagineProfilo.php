<?php 

//mysqli_select_db(); 



define('__ROOT__', dirname(dirname(dirname(__FILE__)))); 
require_once(__ROOT__.'/takeatrip_db_config.php');

$conn = mysql_connect(HOSTNAME,DBUSER,DBPASS,DBNAME);

if($conn == null){ 
echo "connessione null"; 
} 



$email = $_POST["email"]; 


$q = mysql_query("SELECT idImmagineProfilo, urlImmagineProfilo FROM takeatrip_db.ImmagineProfilo , takeatrip_db.Profilo WHERE 
emailProfilo = email and email = '$email' "); 



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
//stampa null 
print(json_encode($output)); 
} 




mysql_close($conn); 
?>